<?php

namespace App\Http\Controllers;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Model\BusinessSetting;
use App\Model\Currency;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use function App\CPU\translate;


class ESewaController extends Controller
{


    public function payWithESewa(Request $request)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $currency_code = 'USD';
        } else {
            $default = BusinessSetting::where(['type' => 'system_default_currency'])->first()->value;
            $currency_code = Currency::find($default)->code;
        }
        $total_tax = 0;
        $cart_items = CartManager::get_cart();
        $shipping_cost = CartManager::get_shipping_cost();
        $discount = session()->has('coupon_discount') ? session('coupon_discount') : 0;
        if (!$discount) {
            foreach ($cart_items as $item) {
                $total_tax += $item['tax'] * $item['quantity'];
                $discount += $item['discount'] * $item['quantity'];
            }
        }

        $sub_total = CartManager::cart_sub_total() - $discount;
        $total = CartManager::cart_grand_total();

        $tran = OrderManager::gen_unique_id();
        session()->put('transaction_ref', $tran);
        $data['data'] = [
            'amt' => $sub_total,
            'pdc' => $shipping_cost,
            'psc' => 0,
            'txAmt' => $total_tax,
            'tAmt' => $total,
            'pid' => $tran,
            'scd' => config('esewa.merchant_code'),
            'su' => route('esewa.success'),
            'fu' => route('esewa.fail')
        ];
        if (count($data ?? [])) {
            return view('web-views.esewa', $data);
        }
        Toastr::error(translate('successfully_added_review'));
        return back();

    }

    public function success(Request $request)
    {

        if (isset($request->oid) && isset($request->amt) && isset($request->refId)) {

            $unique_id = \session('transaction_ref');
            $order_ids = [];
            foreach (CartManager::get_cart_group_ids() as $group_id) {
                $data = [
                    'payment_method' => 'esewa',
                    'order_status' => 'confirmed',
                    'payment_status' => 'paid',
                    'transaction_ref' =>  $request->refId,
                    'order_group_id' => $unique_id,
                    'cart_group_id' => $group_id
                ];
                $order_id = OrderManager::generate_order($data);
                $order_ids[] = $order_id;
            }
            CartManager::cart_clean();
            if (count($order_ids??[])) {
                $url = "https://uat.esewa.com.np/epay/transrec";
                $data = [
                    'amt' => $request->amt,
                    'rid' => $request->refId,
                    'pid' => $unique_id,
                    'scd' => config('esewa.merchant_code')
                ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                //dd($response);
                curl_close($curl);

                $response_code = $this->get_xml_node_value('response_code', $response);

                if (trim($response_code) == 'Success') {

                    if (session()->has('payment_mode') && \session('payment_mode') == 'app') {
                        return redirect()->route('payment-success');
                    }
                    if (auth('customer')->check()) {
                        Toastr::success('Payment success.');
                        return view('web-views.checkout-complete');
                    }
                }
            }
        }
    }

    public function fail(Request $request)
    {
        if (auth('customer')->check()) {
            Toastr::error('Payment failed.');
            return view('web-views.checkout-complete');
        }
    }

    public function get_xml_node_value($node, $xml)
    {
        if (!$xml) {
            return false;
        }
        $found = preg_match('#<' . $node . '(?:\s+[^>]+)?>(.*?)' .
            '</' . $node . '>#s', $xml, $matches);
        if ($found) {

            return $matches[1];

        }

        return false;
    }
}
