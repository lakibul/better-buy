<!-- Footer -->
<style>
    .social-media :hover {
        color: {{$web_config['secondary_color']}} !important;
    }
    .start_address_under_line{
        {{Session::get('direction') === "rtl" ? 'width: 344px;' : 'width: 331px;'}}
    }
</style>
<div class="__inline-9 rtl" id="footer-wrapper">
    <div class="d-flex mt-3"
            style="background: #fff;padding:20px;">
        <div class="container d-flex flex-wrap justify-content-between">
            <div class="footer-feature-card d-flex">
                <div>
                    <a href="{{route('about-us')}}">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{asset("assets/front-end/img/footer/img1.png")}}"
                                         alt="">
                                </div>

                            </div>
                            <div >
                                <div>
                                    <p class="m-0 p-font">
                                        {{ \App\CPU\translate('Secured Payment')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="footer-feature-card d-flex">
                <div >
                    <a href="{{route('contacts')}}">
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{asset("assets/front-end/img/footer/img2.png")}}"
                                         alt="">
                                </div>

                            </div>
                            <div>
                                <div>
                                    <p class="m-0 p-font">
                                        {{ \App\CPU\translate('Excellent Customer Service')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="footer-feature-card d-flex">
                <div >
                    <a href="{{route('helpTopic')}}">
                        <div class="d-flex  align-items-center">
                            <div class="mr-3">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{asset("assets/front-end/img/footer/img3.png")}}"
                                         alt="">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <p class="m-0 p-font">
                                        {{ \App\CPU\translate('Excellent CG Pay Service')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="footer-feature-card d-flex">
                <div >
                    <a href="{{route('helpTopic')}}">
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{asset("assets/front-end/img/footer/img4.png")}}"
                                         alt="">
                                </div>

                            </div>
                            <div>
                                <div>
                                    <p class="m-0 p-font">
                                        {{ \App\CPU\translate('FAQ')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="footer-feature-card d-flex">
                <div>
                    <a href="{{route('helpTopic')}}">
                        <div class="d-flex  align-items-center">
                            <div class="mr-3">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{asset("assets/front-end/img/footer/img5.png")}}"
                                         alt="">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <p class="m-0 p-font">
                                        {{ \App\CPU\translate('Verified Seller')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small mdb-color rtl">
        <!-- Footer Links -->
        <div class="pt-4">
            <div class="container text-center __pb-13px">
                <!-- Footer links -->
                <div
                    class="row text-center {{Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'}} mt-3 pb-3 ">

                            <div class="d-none col-md-2 footer-padding-bottom" >
                                <h6 class="footer-heder">{{\App\CPU\translate('special')}}</h6>
                                <ul class="widget-list __pb-10px">
                                    @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                                    @if(isset($flash_deals))
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.7);"
                                            href="{{route('flash-deals',[$flash_deals['id']])}}">
                                                {{\App\CPU\translate('flash_deal')}}
                                            </a>
                                        </li>
                                    @endif
                                    <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                    href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('featured_products')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                    href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('latest_products')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                    href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{\App\CPU\translate('best_selling_product')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                    href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('top_rated_product')}}</a>
                                    </li>

                                </ul>
                            </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 footer-padding-bottom" >
                        <h6 class="footer-heder">{{\App\CPU\translate('Information')}}</h6>
                        <ul class="widget-list __pb-10px">
                            @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                            @if(isset($flash_deals))
                                <li class="widget-list-item">
                                    <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.7);"
                                       href="{{route('flash-deals',[$flash_deals['id']])}}">
                                        {{\App\CPU\translate('flash_deal')}}
                                    </a>
                                </li>
                            @endif
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('About Us')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('FAQ')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{\App\CPU\translate('Terms & Condition')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('Privacy Policy')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('Return Policy')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('Refund Policy')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 footer-padding-bottom" >
                        <h6 class="footer-heder">{{\App\CPU\translate('Stores')}}</h6>
                        <ul class="widget-list __pb-10px">
                            @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                            @if(isset($flash_deals))
                                <li class="widget-list-item">
                                    <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.7);"
                                       href="{{route('flash-deals',[$flash_deals['id']])}}">
                                        {{\App\CPU\translate('flash_deal')}}
                                    </a>
                                </li>
                            @endif
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('CG Digital')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                            href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('LG Shoppe')}}</a>
                            </li>
                        </ul>
                    </div>
                            <div class="d-none col-md-2 footer-padding-bottom" style="{{Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''}}">
                                <h6 class="footer-heder">{{\App\CPU\translate('account_&_shipping_info')}}</h6>
                                @if(auth('customer')->check())
                                    <ul class="widget-list __pb-10px">
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('user-account')}}">{{\App\CPU\translate('profile_info')}}</a>
                                        </li>
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('wishlists')}}">{{\App\CPU\translate('wish_list')}}</a>
                                        </li>

                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                        </li>
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{ route('account-address') }}">{{\App\CPU\translate('address')}}</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="widget-list __pb-10px">
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('customer.auth.login')}}">{{\App\CPU\translate('profile_info')}}</a>
                                        </li>
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('customer.auth.login')}}">{{\App\CPU\translate('wish_list')}}</a>
                                        </li>

                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                        </li>
                                        <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                        href="{{route('customer.auth.login')}}">{{\App\CPU\translate('address')}}</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 footer-padding-bottom" style="{{Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''}}">
                        <h6 class="footer-heder">{{\App\CPU\translate('Services')}}</h6>
                            <ul class="widget-list __pb-10px">
                                <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                href="{{route('user-account')}}">{{\App\CPU\translate('Store locator')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                href="{{route('wishlists')}}">{{\App\CPU\translate('Courier Delivery Location')}}</a>
                                </li>

                                <li class="widget-list-item"><a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                                                                href="{{route('track-order.index')}}">{{\App\CPU\translate('Warranty Info')}}</a>
                                </li>
                            </ul>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 footer-padding-bottom" style="{{Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''}}">
                        <h6 class="footer-heder">{{\App\CPU\translate('Contact Us')}}</h6>

                            <ul class="widget-list __pb-10px">
                                <li class="widget-list-item">
                                    <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="tel: {{$web_config['phone']}}">
                                        <span ><i class="fa fa-phone m-2"></i>{{\App\CPU\Helpers::get_business_settings('company_phone')}} </span>
                                    </a>
                                </li>
                                <li class="widget-list-item">
                                    <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="mailto: {{\App\CPU\Helpers::get_business_settings('company_email')}}">
                                        <span ><i class="fa fa-envelope m-2"></i> {{\App\CPU\Helpers::get_business_settings('company_email')}} </span>
                                    </a>
                                </li>

                                <li class="widget-list-item"> @if(auth('customer')->check())
                                        <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="{{route('account-tickets')}}">
                                            <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                        </a><br>
                                    @else
                                        <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="{{route('customer.auth.login')}}">
                                            <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                        </a><br>
                                    @endif
                                </li>
                            </ul>

                    </div>
                            <div class="col-lg-4 col-md-5 col-sm-12 footer-padding-bottom" >
                                    <div class="mb-2">
                                        <h6 class="font-weight-bold footer-heder">{{\App\CPU\translate('Newsletter')}}</h6>
                                        <span style="color: rgba(255, 255, 255, 0.6) !important; font-size: 15px;">{{\App\CPU\translate('Don’t miss any updates of our new products and  all the astonishing offers we bring for you.
')}}</span>
                                    </div>
                                    <div class="text-nowrap mb-4 position-relative">
                                        <form action="{{ route('subscription') }}" method="post">
                                            @csrf
                                            <input type="email" name="subscription_email" class="form-control subscribe-border"
                                                placeholder="{{\App\CPU\translate('Your Email Address')}}" required style="padding: 11px;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                            <button class="subscribe-button" type="submit">
                                                {{\App\CPU\translate('subscribe')}}
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                            <div class="d-none col-lg-7">
                                <div class="row d-flex align-items-center mobile-view-center-align  justify-content-center justify-content-md-startr">
                                    <div style="{{Session::get('direction') === "rtl" ? 'margin-right:23px;' : ''}}">
                                        <span class="footer-heder">{{ \App\CPU\translate('Start a conversation')}}</span>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-11 start_address ">
                                        <div class="">
                                            <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="tel: {{$web_config['phone']}}">
                                                <span ><i class="fa fa-phone m-2"></i>{{\App\CPU\Helpers::get_business_settings('company_phone')}} </span>
                                            </a>

                                        </div>
                                        <div>
                                            <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="mailto: {{\App\CPU\Helpers::get_business_settings('company_email')}}">
                                                <span ><i class="fa fa-envelope m-2"></i> {{\App\CPU\Helpers::get_business_settings('company_email')}} </span>
                                            </a>
                                        </div>
                                        <div>
                                            @if(auth('customer')->check())
                                                <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="{{route('account-tickets')}}">
                                                    <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                                </a><br>
                                            @else
                                                <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="{{route('customer.auth.login')}}">
                                                    <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                                </a><br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none col-md-5 ">
                                <div class="row pl-2 d-flex align-items-center mobile-view-center-align justify-content-center justify-content-md-start">
                                    <div>
                                        <span class="font-weight-bold footer-heder">{{ \App\CPU\translate('address')}}</span>
                                    </div>
                                    <div class="flex-grow-1 d-none d-md-block {{Session::get('direction') === "rtl" ? 'mr-3 ' : 'ml-3'}}">

                                    </div>
                                </div>
                                <div class="pl-2">
                                    <span class="__text-14px" style="color: rgba(255, 255, 255, 0.6) !important;"><i class="fa fa-map-marker m-2"></i> {{ \App\CPU\Helpers::get_business_settings('shop_address')}} </span>
                                </div>
                            </div>
                <!-- Grid column -->
                <div class="col-lg-6 footer-web-logo" >
                    <a class="d-none" href="{{route('home')}}">
                        <img class="{{Session::get('direction') === "rtl" ? 'rightalign' : ''}}" src="{{asset("application/storage/app/public/company/")}}/{{ $web_config['footer_logo'] }}"
                             onerror="this.src='{{asset('assets/front-end/img/logo.png')}}'"
                             alt="{{ $web_config['name'] }}"/>
                    </a>
                    @php($ios = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe'))
                    @php($android = \App\CPU\Helpers::get_business_settings('download_app_google_stroe'))

                    @if($ios['status'] || $android['status'])
                        <div class="mt-lg-3 mb-lg-4">
                            <h6 class="footer-heder qr-section-title">
                                {{\App\CPU\translate('download_our_app')}}
                            </h6>
                        </div>
                    @endif

                    <div class="row align-items-center footer-qr-row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <h6 class="qr-section-title" style="font-size:14px!important; font-weight:600!important; color:#FFFFFF!important; margin-bottom: 24px!important;">Scan QR Code</h6>
                            <img class="text-lg-start img-fluid footer-qr-scanner" src="{{asset('assets/front-end/img/qr-white.png')}}" alt="coin">
                        </div>
                        <div class="col-lg-5 col-md-4 col-sm-6 pt-3 pt-sm-0">
                            <div class="store-contents pr-lg-4" >
                                <h6 class="qr-section-title" style="font-size:14px!important; font-weight:600!important; color:#FFFFFF!important; margin-bottom: 24px!important;">Download CG World App</h6>
                                @if($ios['status'])
                                    <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                        <a class="" href="{{ $ios['link'] }}" role="button">
                                            <img class="w-100 img-fluid" src="{{asset("assets/front-end/img/google-play.png")}}"
                                                 alt="">
                                        </a>
                                    </div>
                                @endif

                                @if($android['status'])
                                    <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                        <a href="{{ $android['link'] }}" role="button">
                                            <img class="w-100 img-fluid" src="{{asset("assets/front-end/img/app-store.png")}}" alt="">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
                    </div>

                </div>
                <!-- Footer links -->

        <div class="flex-grow-1 w-100">
            <hr class="start_address_under_line"/>
        </div>

        <!-- Grid row -->
        <div >
            <div class="container">
                <div class="row end-footer footer-end last-footer-content-align" style="color: rgba(255, 255, 255, 0.6) !important;">
                    <div class=" mt-3">
                    <div class="mt-md-3 mt-0 mb-md-0 {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                        @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
                        @if(isset($social_media))
                            @foreach ($social_media as $item)
                                <span class="social-media ">
                                        <a class="social-btn text-white sb-light sb-{{$item->name}} {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2"
                                        target="_blank" href="{{$item->link}}">
                                            <i class="{{$item->icon}}" aria-hidden="true"></i>
                                        </a>
                                    </span>
                            @endforeach
                        @endif
                    </div>
                        <p class="{{Session::get('direction') === "rtl" ? 'text-right ' : 'text-left'}} __text-16px">{{ $web_config['copyright_text'] }}</p>
                    </div>

                    <div class="d-flex __text-14px">
                        <!-- <div class="{{Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'}}" >
                            <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;"
                            href="{{route('terms')}}">{{\App\CPU\translate('terms_&_conditions')}}</a>
                        </div>
                        <div>
                            <a class="widget-list-link" style="color: rgba(255, 255, 255, 0.6) !important;" href="{{route('privacy-policy')}}">
                                {{\App\CPU\translate('privacy_policy')}}
                            </a>
                        </div> -->
                        <div>
                        <div class="d-flex justify-content-end" style="color: rgba(255, 255, 255, 0.6)" ><img class="mr-2" style="width: 20px;"
                         src="{{asset('assets/front-end/img/secure.png')}}"
                         alt="icon"/><span>Secure Payment</span></div>
                         <div class="d-flex mt-2 justify-content-end">
                         <img class="mr-2" style="width: 60px;"
                         src="{{asset('assets/front-end/img/secure-2.png')}}"
                         alt="icon"/>
                         </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
    </footer>
</div>
