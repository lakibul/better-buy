<?php

namespace App\Http\Controllers\Admin;

use App\CPU\helpers;
use App\Http\Controllers\Controller;
use App\Model\EcomAdminActivityLog;
use App\Model\SellerActivityLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function admin_activity(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $data['logs'] = EcomAdminActivityLog::with(['admin'])->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('ip_address', 'like', "%{$value}%")
                        ->orWhere('browser', 'like', "%{$value}%")
                        ->orWhere('os', 'like', "%{$value}%")
                        ->orWhere('device_model', 'like', "%{$value}%")
                        ->orWhere('activity_type', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $data['logs'] = EcomAdminActivityLog::with(['admin']);
        }

        $data['logs'] =  $data['logs']->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        $data['search'] =  $search;

        return view('admin-views.log.admin-log.log_show',$data);
    }

    public function seller_activity(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $data['logs'] = SellerActivityLog::with(['seller'])->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('ip_address', 'like', "%{$value}%")
                        ->orWhere('browser', 'like', "%{$value}%")
                        ->orWhere('os', 'like', "%{$value}%")
                        ->orWhere('device_model', 'like', "%{$value}%")
                        ->orWhere('activity_type', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $data['logs'] = SellerActivityLog::with(['seller']);
        }

        $data['logs'] =  $data['logs']->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        $data['search'] =  $search;

        return view('admin-views.log.seller-log.log_show',$data);
    }

    public function merchant_activity(Request $request)
    {
        return view('admin-views.log.merchant-log.log_show');
    }
}
