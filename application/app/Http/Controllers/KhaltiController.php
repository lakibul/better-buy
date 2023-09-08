<?php

namespace App\Http\Controllers;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Model\BusinessSetting;
use App\Model\Currency;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use function App\CPU\translate;


class KhaltiController extends Controller
{

    public function payWithKhalti(Request $request)
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
            'purchase_order_id' => $tran,
            'amount' => $total,
            'purchase_order_name' => 'ecom_' . $tran,
            "return_url" => route('khalti.response'),
            "website_url" => route('home'),
        ];
        if (count($data ?? [])) {
            return view('web-views.khalti', $data);
        }
        Toastr::error('failed.');
        return back();

    }


    public function submit(Request $request)
    {
        $cart_items = CartManager::get_cart();


        $product_details = [];
        foreach ($cart_items as $key => $item) {


            $product_details[$key]['identity'] = $item->product_id;
            $product_details[$key]['name'] = $item->name;
            $product_details[$key]['total_price'] = ($item->price*100) * $item->quantity ?? 1;
            $product_details[$key]['quantity'] = $item->quantity;
            $product_details[$key]["unit_price"] = $item->price*100;
        }
        $arr = [
            "return_url" => $request->return_url,
            "website_url" => $request->website_url,
            "purchase_order_id" => $request->purchase_order_id,
            "amount" => $request->amount*100,
            "purchase_order_name" => $request->purchase_order_name,
            "customer_info" => [
                "name" => config('app.env') == 'local' ? 'Ashim Upadhaya' : auth('customer')->user()->f_name,
                "email" => auth('customer')->user()->email,
                "phone" => config('app.env') == 'local' ? 9811496763 : auth('customer')->user()->phone
            ],
            "product_details" => $product_details

        ];

        $response = Http::withHeaders([
            "Authorization" => config('khalti.test_secret'),
            "Content-Type" => "application/json",
        ])->post('https://a.khalti.com/api/v2/epayment/initiate/', $arr);
        $response = (object)$response->json();
        if (isset($response->pidx)) {
            return redirect($response->payment_url);
        }
        $validation_error = [];
        foreach ($response as $key => $error) {
            if (is_array($error)) {
                foreach ($error as $err) {
                    $validation_error[$key] = $err;
                }
            } else {
                $validation_error[$key] = $error;
            }
        }
        Toastr::error($validation_error['error_key'] ?? 'Payment failed');

        return redirect()->route('checkout-details');
    }

    public function response(Request $request)
    {
        if (isset($request->pidx) && isset($request->transaction_id) && isset($request->amount)) {
            $pidx['pidx'] = $request->pidx;
            $response = Http::withHeaders([
                "Authorization" => config('khalti.test_secret'),
                "Content-Type" => "application/json",
            ])->post('https://a.khalti.com/api/v2/epayment/lookup/', $pidx);


            $response = (object)$response->json();

            if ($response->status == 'Completed') {
                $unique_id = \session('transaction_ref');
                $order_ids = [];
                foreach (CartManager::get_cart_group_ids() as $group_id) {
                    $data = [
                        'payment_method' => 'khalti',
                        'order_status' => 'confirmed',
                        'payment_status' => 'paid',
                        'transaction_ref' => $request->transaction_id,
                        'order_group_id' => $unique_id,
                        'cart_group_id' => $group_id
                    ];
                    $order_id = OrderManager::generate_order($data);
                    $order_ids[] = $order_id;
                }
                CartManager::cart_clean();

                if ($order_ids) {
                    if (session()->has('payment_mode') && \session('payment_mode') == 'app') {
                        return redirect()->route('payment-success');
                    }
                    if (auth('customer')->check()) {
                        Toastr::success('Payment success.');
                        return view('web-views.checkout-complete');
                    }
                } else {
                    Toastr::error('payment successful but order failed');
                    return back()->withInput();
                }
            } elseif ($response->status == 'Pending') {
                $msg = 'Payment is pending';
                $this->fail($msg);
            } elseif ($response->status == 'Refunded') {
                $msg = 'Payment is refunded';
                $this->fail($msg);
            }
            $msg = 'Something went wrong';
            $this->fail($msg);
        }

    }


    public function fail($msg)
    {
        if (auth('customer')->check()) {
            Toastr::error($msg);
            return view('web-views.checkout-complete');
        }
    }

}
