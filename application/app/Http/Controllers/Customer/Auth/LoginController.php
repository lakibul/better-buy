<?php

namespace App\Http\Controllers\Customer\Auth;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\CPU\SMS_module;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\PhoneOrEmailVerification;
use App\Model\Wishlist;
use App\Models\UserLogHistory;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public $company_name;

    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function captcha($tmp)
    {

        $phrase = new PhraseBuilder;
        $code = $phrase->build(4);
        $builder = new CaptchaBuilder($code, $phrase);
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        $builder->build($width = 100, $height = 40, $font = null);
        $phrase = $builder->getPhrase();

        if (Session::has('default_captcha_code')) {
            Session::forget('default_captcha_code');
        }
        Session::put('default_captcha_code', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function login()
    {
        session()->put('keep_return_url', url()->previous());
        return view('customer-view.auth.login');
    }

    public function otp_generate(Request $request)
    {
        if ($request->phone == null && $request->email == null) {
            $response['status'] = 'failed';
            $response['message'] = 'Phone or Email is required!!';
            return response()->json($response);
        }

        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'email' => 'sometimes|email|nullable'
        ]);


        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $user = User::where(function ($q) use ($request) {
            $q->where('phone', $request->phone);
//                    ->orWhere('email', $request->email);
        })->first();

        if (!$user) {
            $user = new User();
            $user->phone = $request->phone;
            $user->is_active = 1;
            $user->is_phone_verified = 0;
            $user->is_email_verified = 0;
            $user->password = Hash::make(rand(1, 999999999));
            $user->save();

            $user = User::find($user->id);
            $user->unique_id = $user->id . mt_rand(1111, 99999);
            $user->save();

            Http::post(config('app.core_url') . '/api/register-user', [
                'user_id' => $user->id,
                'type' => User::class
            ]);
        }

        $otp = Helpers::otp_generator();
        DB::connection('super_mysql')->table('phone_or_email_verifications')->updateOrInsert([
            'phone_or_email' => $request->phone,
            'token' => $otp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $temporary_token = Str::random(40);
        $user->temporary_token = $temporary_token;
        $user->save();
        $sms = SMS_module::send($request['phone'], $otp);

        $response['status'] = 'success';
        $response['message'] = 'otp generate successful';
        $response['otp'] = $otp;
        $response['temporary_token'] = $temporary_token;
        $response['phone'] = $user->phone;
        return response()->json($response);
    }

    public function login_otp(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'otp_one' => 'required|string',
            'otp_two' => 'required|string',
            'otp_three' => 'required|string',
            'otp_four' => 'required|string',
            'otp_five' => 'required|string',
            'otp_six' => 'required|string',
            'temporary_token' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        $otp = $request->otp_one . $request->otp_two . $request->otp_three . $request->otp_four . $request->otp_five . $request->otp_six;

        $verify = PhoneOrEmailVerification::where(['phone_or_email' => $request->phone, 'token' => $otp])->first();

        if (!isset($verify)) {
            $response['status'] = 'failed';
            $response['message'] = 'Credentials do not match or account has been suspended.';
            return response()->json($response);
        }

//        $phone_verification = Helpers::get_business_settings('phone_verification');
//        $email_verification = Helpers::get_business_settings('email_verification');

        $user = User::where(['temporary_token' => $request->temporary_token])->first();
        if ($user) {
            if (!$user->is_phone_verified) {
                $user->is_phone_verified = 1;
                $user->save();
            }
//            if (!$user->is_email_verified) {
//                !$user->is_email_verified = 1;
//                $user->save();
//            }
            $user->temporary_token = null;
            $user->save();
            $verify->delete();
            if ($user->is_active && auth('customer')->loginUsingId($user->id)) {

                $arr['user_id'] = $user->id;

                $log_response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'device-id' => exec('getmac'),
                    'browser' => 'web',
                    'os' => 'web',
                    'device-model' => 'web',
                ])->post(config('app.super_url') . '/api/v1/customer/user_log', $arr);

                $log_response = $log_response->json();

                if (!$log_response) {
                    auth()->guard('customer')->logout();
                    session()->forget('wish_list');
                    $response['status'] = 'failed';
                    $response['message'] = 'Something went wrong';
                    return response()->json($response, 400);
                }

                $user->update(['last_active_at' => now()]);

                $wish_list = Wishlist::whereHas('wishlistProduct', function ($q) {
                    return $q;
                })->where('customer_id', auth('customer')->user()->id)->pluck('product_id')->toArray();

                session()->put('wish_list', $wish_list);
//            Toastr::info('Welcome to ' . Helpers::get_business_settings('company_name') . '!');
                CartManager::cart_to_db();
                $response['status'] = 'success';
                $response['message'] = 'You are logged in';
                return response()->json($response);
            }
        }


        $response['status'] = 'failed';
        $response['message'] = 'Credentials do not match or account has been suspended....';
        return response()->json($response);
    }


    public function submit(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required|min:4'
        ]);

        //recaptcha validation
        $recaptcha = Helpers::get_business_settings('recaptcha');
        if (isset($recaptcha) && $recaptcha['status'] == 1) {
            try {
                $request->validate([
                    'g-recaptcha-response' => [
                        function ($attribute, $value, $fail) {
                            $secret_key = Helpers::get_business_settings('recaptcha')['secret_key'];
                            $response = $value;
                            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;
                            $response = \file_get_contents($url);
                            $response = json_decode($response);
                            if (!$response->success) {
                                $fail(\App\CPU\translate('ReCAPTCHA Failed'));
                            }
                        },
                    ],
                ]);
            } catch (\Exception $exception) {
            }
        } else {
            if (strtolower($request->default_captcha_value) != strtolower(Session('default_captcha_code'))) {
                Session::forget('default_captcha_code');
                return back()->withErrors(\App\CPU\translate('Captcha Failed'));
            }
        }

        $remember = ($request['remember']) ? true : false;

        $user = User::where(['phone' => $request->user_id])->orWhere(['email' => $request->user_id])->first();

        if (isset($user) == false) {
            Toastr::error('Credentials do not match or account has been suspended.');
            return back()->withInput();
        }

        $phone_verification = Helpers::get_business_settings('phone_verification');
        $email_verification = Helpers::get_business_settings('email_verification');
        if ($phone_verification && !$user->is_phone_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }
        if ($email_verification && !$user->is_email_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }

        if (isset($user) && $user->is_active && auth('customer')->attempt(['email' => $user->email, 'password' => $request->password], $remember)) {
            $wish_list = Wishlist::whereHas('wishlistProduct', function ($q) {
                return $q;
            })->where('customer_id', auth('customer')->user()->id)->pluck('product_id')->toArray();

            session()->put('wish_list', $wish_list);
            Toastr::info('Welcome to ' . Helpers::get_business_settings('company_name') . '!');
            CartManager::cart_to_db();
            return redirect(session('keep_return_url'));
        }

        Toastr::error('Credentials do not match or account has been suspended.');
        return back()->withInput();
    }

    public function logout(Request $request)
    {
        auth()->guard('customer')->logout();
        session()->forget('wish_list');
        Toastr::info('Come back soon, ' . '!');
        return redirect()->route('home');
    }

}
