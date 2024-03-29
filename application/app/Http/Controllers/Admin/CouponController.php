<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\Log_module;
use App\Http\Controllers\Controller;
use App\Model\Coupon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function add_new(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $cou = Coupon::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('title', 'like', "%{$value}%")
                        ->orWhere('code', 'like', "%{$value}%")
                        ->orWhere('discount_type', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $cou = new Coupon();
        }

        $cou = $cou->withCount('order')->latest()->paginate(Helpers::pagination_limit())->appends($query_param);

        return view('admin-views.coupon.add-new', compact('cou', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'title' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'discount' => 'required',
            'min_purchase' => 'required',
            'limit' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->coupon_type = $request->coupon_type;
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->start_date = $request->start_date;
        $coupon->expire_date = $request->expire_date;
        $coupon->min_purchase = Convert::usd($request->min_purchase);
        $coupon->max_discount = Convert::usd($request->max_discount != null ? $request->max_discount : $request->discount);
        $coupon->discount = $request->discount_type == 'amount' ? Convert::usd($request->discount) : $request['discount'];
        $coupon->discount_type = $request->discount_type;
        $coupon->limit = $request->limit;
        $coupon->status = 1;
        $coupon->save();

        //log
        Log_module::couponAdd($coupon);

        Toastr::success('Coupon added successfully!');
        return back();
    }

    public function edit($id)
    {
        $c = Coupon::where(['id' => $id])->first();
        return view('admin-views.coupon.edit', compact('c'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$id,
            'title' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'discount' => 'required',
            'min_purchase' => 'required',
            'limit' => 'required',
        ]);

        $coupon = DB::table('coupons')->where(['id' => $id])->update([
            'coupon_type' => $request->coupon_type,
            'title' => $request->title,
            'code' => $request->code,
            'start_date' => $request->start_date,
            'expire_date' => $request->expire_date,
            'min_purchase' => Convert::usd($request->min_purchase),
            'max_discount' => Convert::usd($request->max_discount != null ? $request->max_discount : $request->discount),
            'discount' => $request->discount_type == 'amount' ? Convert::usd($request->discount) : $request['discount'],
            'discount_type' => $request->discount_type,
            'updated_at' => now(),
            'limit' => $request->limit,
        ]);

        //log
        Log_module::couponUpdated($coupon);

        Toastr::success('Coupon updated successfully!');
        return back();
    }

    public function status(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->status = $request->status;
        $coupon->save();
        // $data = $request->status;
        // return response()->json($data);
        //log
        Log_module::couponStatus($coupon);
        Toastr::success('Coupon status updated!');
        return back();
    }

    public function delete($id)
    {
        $coupon = Coupon::find($id);
        //log
        Log_module::couponDelete($coupon);
        $coupon->delete();
        Toastr::success('Coupon deleted successfully!');
        return back();
    }
}
