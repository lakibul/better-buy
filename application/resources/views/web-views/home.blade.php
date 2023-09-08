@extends('layouts.front-end.app')

@section('title', $web_config['name'].' '.\App\CPU\translate('Online Shopping').' | '.$web_config['name'].' '.\App\CPU\translate(' Ecommerce'))

@push('css_or_js')
    <meta property="og:image" content="{{asset('application/storage/app/public/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about'],0,100) !!}">

    <meta property="twitter:card" content="{{asset('application/storage/app/public/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about'],0,100) !!}">

    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/home.css"/>

    <style>
        .cz-countdown-days {
            border: .5px solid{{$web_config['primary_color']}};
        }

        .btn-scroll-top {
            background:  {{$web_config['primary_color']}};
        }

        .__best-selling:hover .ptr,
        .flash_deal_product:hover .flash-product-title {
            color:  {{$web_config['primary_color']}};
        }

        .cz-countdown-hours {
            border: .5px solid{{$web_config['primary_color']}};
        }

        .cz-countdown-minutes {
            border: .5px solid{{$web_config['primary_color']}};
        }

        .cz-countdown-seconds {
            border: .5px solid{{$web_config['primary_color']}};
        }

        .flash_deal_product_details .flash-product-price {
            color: {{$web_config['primary_color']}};
        }

        .featured_deal_left {
            background: {{$web_config['primary_color']}} 0% 0% no-repeat padding-box;
        }

        .category_div:hover {
            color: {{$web_config['secondary_color']}};
        }

        .deal_of_the_day {
            background: {{$web_config['secondary_color']}};
        }

        .best-selleing-image {
            background:{{$web_config['primary_color']}}10;
        }
        .top-rated-image{
            background:{{$web_config['primary_color']}}10;
        }
        @media (max-width: 800px) {
            .categories-view-all {
            {{session('direction') === "rtl" ? 'margin-left: 10px;' : 'margin-right: 6px;'}}
}
            .categories-title {
            {{Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 6px;'}}
}
            .seller-list-title{
            {{Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 10px;'}}
}
            .seller-list-view-all {
            {{Session::get('direction') === "rtl" ? 'margin-left: 20px;' : 'margin-right: 10px;'}}
}
            .category-product-view-title {
            {{Session::get('direction') === "rtl" ? 'margin-right: 16px;' : 'margin-left: -8px;'}}
}
            .category-product-view-all {
            {{Session::get('direction') === "rtl" ? 'margin-left: -7px;' : 'margin-right: 5px;'}}
}
        }
        @media(min-width:801px){
            .categories-view-all {
            {{session('direction') === "rtl" ? 'margin-left: 30px;' : 'margin-right: 27px;'}}
}
            .categories-title {
            {{Session::get('direction') === "rtl" ? 'margin-right: 25px;' : 'margin-left: 25px;'}}
}
            .seller-list-title{
            {{Session::get('direction') === "rtl" ? 'margin-right: 6px;' : 'margin-left: 10px;'}}
}
            .seller-list-view-all {
            {{Session::get('direction') === "rtl" ? 'margin-left: 12px;' : 'margin-right: 10px;'}}
}
            .seller-card {
            {{Session::get('direction') === "rtl" ? 'padding-left:0px !important;' : 'padding-right:0px !important;'}}
}
            .category-product-view-title {
            {{Session::get('direction') === "rtl" ? 'margin-right: 10px;' : 'margin-left: -12px;'}}
}
            .category-product-view-all {
            {{Session::get('direction') === "rtl" ? 'margin-left: -20px;' : 'margin-right: 0px;'}}
}
        }
        .countdown-card{
            background:{{$web_config['primary_color']}}10;

        }
        .flash-deal-text{
            color: {{$web_config['primary_color']}};
        }
        .countdown-background{
            background: {{$web_config['primary_color']}};
        }

        .czi-arrow-left{
            color: {{$web_config['primary_color']}};
            background: {{$web_config['primary_color']}}10;
        }
        .czi-arrow-right{
            color: {{$web_config['primary_color']}};
            background: {{$web_config['primary_color']}}10;
        }
        .flash-deals-background-image{
            background: {{$web_config['primary_color']}}10;
        }
        .view-all-text{
            color:{{$web_config['secondary_color']}} !important;
        }
        .feature-product .czi-arrow-left{
            color: {{$web_config['primary_color']}};
            background: {{$web_config['primary_color']}}10
        }

        .feature-product .czi-arrow-right{
            color: {{$web_config['primary_color']}};
            background: {{$web_config['primary_color']}}10;
            font-size: 12px;
        }
        /*  */
    </style>

    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/owl.theme.default.min.css"/>
@endpush

@section('content')
    <div class="__inline-61">
        @php($decimal_point_settings = !empty(\App\CPU\Helpers::get_business_settings('decimal_point_settings')) ? \App\CPU\Helpers::get_business_settings('decimal_point_settings') : 0)
        <!-- Logout (Banners + Slider)-->
        @if (!Auth::guard('customer')->check())
            <section class="bg-white mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @include('web-views.partials._home-top-slider-non-auth')
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (!Auth::guard('customer')->check())
            <section class="bg-transparent my-3 my-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
{{--                            <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/reward-banner.png')}}" alt="img" style="height: 280px; width: 300px">--}}
                            <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/reward.jpg')}}" alt="img" style="height: 320px; width: 400px">
                        </div>
                        <div class="col-md-7">
                            <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/loyalty_program.jpg')}}" alt="img" style="height: 320px; width: 800px">
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (Auth::guard('customer')->check())
            <section class="bg-transparent mb-3 mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-12 mb-2">
                                    <div class="card widget-status-card h-100">
                                        <div class="widget-status-card-wrapper">
                                            <div class="location-card" id="location-content">
                                                <div class="d-flex">
                                                    <img src="{{asset('assets/front-end/img/cloud.png')}}" alt="Cloud">
                                                    <p><span id="temp">24</span>&#176 c</p>
                                                </div>
                                                <p class="ml-0 text-uppercase">Kathmandu</p>
                                            </div>
                                            <div class="widget-status-inner">
                                                <img class="widget-status-logo" src="{{asset('assets/front-end/img/logo-white.png')}}" alt="CG Digital">
                                                <div class="widget-status-info mt-3">
                                                    <h1>Welcome</h1>
                                                    <h1 class="user-name">{{auth('customer')->user()->f_name}}</h1>
                                                    <div class="widget-status-info-inner justify-content-between d-flex">
                                                        <div class="d-flex align-items-end">
                                                            <div class="d-flex widget-status-info-balance">
                                                                <img src="{{asset('assets/front-end/img/Rupee-Sign.png')}}" alt="Rupee">
                                                                <p class="">show Balance</p>
                                                            </div>
                                                            <div class="d-flex widget-status-info-balance">
                                                                <img src="{{asset('assets/front-end/img/Rupee-Sign.png')}}" alt="Rupee">
                                                                <p class="text-decoration-none"><span style="font-weight: 700">CG</span> | Coins: <span>12</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="widget-status-info-Qr">
                                                            <p>MY QR CODE</p>
                                                            <!-- Button trigger modal -->
                                                            <div type="button" data-toggle="modal" data-target="#exampleModal">
                                                                <img src="{{asset('assets/front-end/img/qr-icon.png')}}" alt="qr-icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-4">
                                                <img class="d-block" src="{{asset('assets/front-end/img/qr-black.png')}}" style="width: 300px; margin: 0 auto;" alt="QR">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 mb-2">
                                    <div class="profile-level-card h-100">
                                        <div class="d-flex justify-content-between">
                                            <p class="level-name">Level 1</p>
                                            <p class="next-level-text">46 points to next level</p>
                                        </div>
                                        <div class="level-progress-outer">
                                            <div class="start-level">1</div>
{{--                                            Progress Width --}}
                                            <div class="level-progress-bar d-flex justify-content-end" style="width: 50%;">
                                                <img class="d-block" src="{{asset('assets/front-end/img/coin-black.png')}}" style="width: 15px; height: 15px;" alt="coin">
                                                <p>4/<span style="color:#747576;">50</span></p>
                                            </div>
                                            <div class="end-level">2</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div style="width: 35%;">
                                                <div id="level-chart">
                                                </div>
                                            </div>
                                            <div style="width: 60%;">
                                                <h5 class="level-profile-title">Complete Your Profile</h5>
                                                <div class="level-requirement-list active d-flex justify-content-between">
                                                    <div class="name-block d-flex"><p class="list-number">01</p> <p class="list-name">Verify Email</p></div>
                                                    <div class="point-block d-flex"><p class="point">4 PTS</p><p class="point-checked"><i class="fa fa-check"></i></p></div>
                                                </div>
                                                <div class="level-requirement-list d-flex justify-content-between">
                                                    <div class="name-block d-flex"><p class="list-number">02</p> <p class="list-name">Complete KYC</p></div>
                                                    <div class="point-block d-flex"><p class="point">20 pts</p><p class="point-checked"><i class="fa fa-check"></i></p></div>
                                                </div>
                                                <div class="level-requirement-list d-flex justify-content-between">
                                                    <div class="name-block d-flex"><p class="list-number">03</p> <p class="list-name">Complete first purchase</p></div>
                                                    <div class="point-block d-flex"><p class="point">10 pts</p><p class="point-checked"><i class="fa fa-check"></i></p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 mb-2">
                                    <div class="hot-deals-card h-100">
                                            <img class="d-block w-100 h-100" src="{{asset('assets/front-end/img/hot-deals-banner.png')}}" style="width: 15px; height: 15px;" alt="coin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- Hero (Banners + Slider)-->
        @if (Auth::guard('customer')->check())
        <section class="bg-transparent mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col-12">
                        @include('web-views.partials._home-top-slider')
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{--flash deal--}}
        @php($flash_deals=\App\Model\FlashDeal::with(['products'=>function($query){
                    $query->with('product')->whereHas('product',function($q){
                        $q->active();
                    });
                }])->where(['status'=>1])->where(['deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())

        @if (isset($flash_deals))
            <section class="overflow-hidden">
                <div class="container">
                    <div class="flash-deal-view-all-web row d-none d-lg-flex justify-content-{{Session::get('direction') === "rtl" ? 'start' : 'end'}}" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
                        @if (count($flash_deals->products)>0)
                            <a class="text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                                {{ \App\CPU\translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'}}"></i>
                            </a>
                        @endif
                    </div>
                    <div class="row d-flex {{Session::get('direction') === "rtl" ? 'flex-row-reverse' : 'flex-row'}}">


                        <div class="col-xl-3 col-lg-4 mt-2 countdown-card" >
                            <div class="m-2">
                                <div class="flash-deal-text">
                                    <span>{{ \App\CPU\translate('flash deal')}}</span>
                                </div>
                                <div class="text-center text-white">
                                    <div class="countdown-background">
                                <span class="cz-countdown d-flex justify-content-center align-items-center"
                                      data-countdown="{{isset($flash_deals)?date('m/d/Y',strtotime($flash_deals['end_date'])):''}} 11:59:00 PM">
                                    <span class="cz-countdown-days">
                                        <span class="cz-countdown-value"></span>
                                        <span>{{ \App\CPU\translate('day')}}</span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-hours">
                                        <span class="cz-countdown-value"></span>
                                        <span>{{ \App\CPU\translate('hrs')}}</span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-minutes">
                                        <span class="cz-countdown-value"></span>
                                        <span>{{ \App\CPU\translate('min')}}</span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-seconds">
                                        <span class="cz-countdown-value"></span>
                                        <span>{{ \App\CPU\translate('sec')}}</span>
                                    </span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flash-deal-view-all-mobile col-lg-12 d-block d-xl-none" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
                        </div>
                        <div class="col-xl-9 col-lg-8 {{Session::get('direction') === "rtl" ? 'pr-md-4' : 'pl-md-4'}}">
                            <div class="d-lg-none {{Session::get('direction') === "rtl" ? 'text-left' : 'text-right'}}">
                                <a class="mt-2 text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                                    {{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'}}"></i>
                                </a>
                            </div>
                            <div class="carousel-wrap">
                                <div class="owl-carousel owl-theme mt-2" id="flash-deal-slider">
                                    @foreach($flash_deals->products as $key=>$deal)
                                        @if( $deal->product)
                                            @include('web-views.partials._product-card-1',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings])
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{--brands--}}
        @if (!Auth::guard('customer')->check())
            <section class="bg-white pb-3 mb-3 mb-lg-5">
                <section class="home-bannder-wrapper">
                    <div class="container mb-2 px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-wrap p-1">
                                    <div class="owl-carousel owl-theme " id="home-banner">
                                        <div class="w-100">
                                            <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/home-banner-1.jpg')}}" alt="Banner">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        @endif

        {{--brands--}}

        @if (Auth::guard('customer')->check())
            <section class="home-bannder-wrapper">
                <div class="container mb-2 px-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-wrap p-1">
                                <div class="owl-carousel owl-theme " id="home-banner">
                                    <div class="w-100">
                                        <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/home-banner-1.png')}}" alt="Banner">
                                    </div>
                                    <div class="w-100">
                                        <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset('assets/front-end/img/home-banner-1.png')}}" alt="Banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif



        <!-- Products grid (featured products)-->
        <!-- @if ($featured_products->count() > 0 )
            <div class="container mb-4">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="feature-product-title">
                            {{ \App\CPU\translate('featured_products')}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="feature-product">
                            <div class="carousel-wrap p-1">
                                <div class="owl-carousel owl-theme " id="featured_products_list">
                                    @foreach($featured_products as $product)
                                        <div>
                                            @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif -->

        {{--featured deal--}}
        @php($featured_deals=\App\Model\FlashDeal::with(['products'=>function($query_one){
            $query_one->with('product.reviews')->whereHas('product',function($query_two){
                $query_two->active();
            });
        }])
        ->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))
        ->where(['status'=>1])->where(['deal_type'=>'feature_deal'])
        ->first())

        @if(isset($featured_deals))
            <section class="featured_deal rtl">
                <div class="container">
                    <div class="row __featured-deal-wrap" style="background: {{$web_config['primary_color']}};">
                        <div class="col-12 pb-2" >
                            @if (count($featured_deals->products)>0)
                                <div class="{{Session::get('direction') === "rtl" ? 'text-left ml-lg-3' : 'text-right mr-lg-3'}}">
                                    <a class="text-capitalize text-white" href="{{route('products',['data_from'=>'featured_deal'])}}">
                                        {{ \App\CPU\translate('view_all')}}
                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'}} text-white"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="m-lg-4 mb-4">
                                <span class="featured_deal_title __pt-12">{{ \App\CPU\translate('featured_deal')}}</span>
                                <br>
                                <span class="text-white text-left">{{ \App\CPU\translate('See the latest deals and exciting new offers ')}}!</span>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 d-flex align-items-center justify-content-center {{Session::get('direction') === "rtl" ? 'pl-md-4' : 'pr-md-4'}}">
                            <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                                @foreach($featured_deals->products as $key=>$product)
                                    @include('web-views.partials._feature-deal-product',['product'=>$product->product, 'decimal_point_settings'=>$decimal_point_settings])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{--deal of the day--}}
        <div class="container rtl">
            <div class="row pt-2 mt-0 mb-4 pb-2">
                {{-- Deal of the day/Recommended Product --}}
                {{-- Latest products --}}
                <div class="col-xl-12 col-md-12 mt-2">
                    <div class="latest-product-margin">
                        <div class="d-flex">
                            <div class="text-center">
                                <span class="for-feature-title __text-22px font-bold text-center section-header-title pr-2">{{ \App\CPU\translate('Explore_All_TV_Categories  ')}}</span>
                            </div>
                            <div class="mr-1 ml-2">
                                <a class="text-capitalize view-all-text mt-2"
                                   href="{{route('products',['data_from'=>'latest'])}}">
                                    {{ \App\CPU\translate('view_all')}}
                                </a>
                            </div>
                        </div>

                        <div class="row mt-0 g-3">
                            @foreach($latest_products as $product)
                                <div class="col-xl-3 col-sm-6 col-md-6 col-lg-4 col-12">
                                    <div>
                                        @include('web-views.partials._single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @php($main_section_banner = \App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->latest()->first())
        @if (isset($main_section_banner))
            <div class="container rtl mb-3">
                <div class="row" >
                    <div class="col-12 pl-0 pr-0">
                        <a href="{{$main_section_banner->url}}"
                           class="cursor-pointer">
                            <img class="d-block footer_banner_img __inline-63" onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                 src="{{asset('application/storage/app/public/banner')}}/{{$main_section_banner['photo']}}">
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
        {{--categries--}}
        <div class="container rtl">
            <div class="row">
                @if ($business_mode == 'multi')
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap">
                            <div class="__text-20px section-header-title pr-2">
                                <span class="font-bold">{{ \App\CPU\translate('Lets_Get_Warm_This_Winter')}}</span>
                            </div>
                            <div class="categories-view-all ml-2">
                                <a class="text-capitalize categories-view-all-text mt-1"
                                   href="{{route('categories')}}">{{ \App\CPU\translate(' Browse_through_the_categories_for_winter_products')}}
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap mt-3 justify-content-between">
                            @foreach($categories as $key=>$category)

                                @if ($key<6)
                                    <div class="text-center __cate-item category-card overflow-hidden mb-2">
                                        <a class="w-100" href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                            <div class="category-card-img-outer w-100">
                                                <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                     src="{{asset("application/storage/app/public/category/$category->icon")}}"
                                                     alt="{{$category->name}}">
                                            </div>
                                            <p class="text-center category-card-text mt-1">{{Str::limit($category->name, 12)}}</p>
                                        </a>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="section-header-title pr-2" style="{{Session::get('direction') === "rtl" ? 'margin-right: 20px;' : 'margin-left: 22px;'}}">
                                        <span class="font-semibold">{{ \App\CPU\translate('categories')}}</span>
                                    </div>
                                    <div style="{{Session::get('direction') === "rtl" ? 'margin-left: 15px;' : 'margin-right: 13px;'}}">
                                        <a class="text-capitalize view-all-text mt-2"
                                           href="{{route('categories')}}">{{ \App\CPU\translate('view_all')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    @foreach($categories as $key=>$category)
                                        @if ($key<11)
                                            <div class="text-center __m-5px __cate-item">
                                                <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                                    <div class="__img">
                                                        <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                             src="{{asset("application/storage/app/public/category/$category->icon")}}"
                                                             alt="{{$category->name}}">
                                                        <p class="text-center small mt-1">{{Str::limit($category->name, 12)}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- top sellers -->

                @if ($business_mode == 'multi')
                    @if(count($top_sellers) > 0)
                        <div class="col-md-6 mt-2 mt-md-0 d-none seller-card" >
                            <div class="card __shadow h-100">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="seller-list-title section-header-title pr-2">
                                            <span class="font-semibold">{{ \App\CPU\translate('sellers')}}</span>
                                        </div>
                                        <div class="seller-list-view-all">
                                            <a class="text-capitalize view-all-text mt-2"
                                               href="{{route('sellers')}}">{{ \App\CPU\translate('view_all')}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        @foreach($top_sellers as $key=>$seller)
                                            @if ($key<10)

                                                @if($seller->shop)
                                                    <div class="__m-5px __cate-item category-card">
                                                        <a href="{{route('shopView',['id'=>$seller['id']])}}">
                                                            <div class="__img circle">
                                                                <img onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                                     src="{{asset("application/storage/app/public/shop")}}/{{$seller->shop->image}}">
                                                            </div>
                                                            <p class="text-center small mt-2">{{Str::limit($seller->shop->name, 14)}}</p>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>


        <!-- <div class="container rtl mt-4">
            <div class="arrival-title">
                <div>
                    <img  src="{{asset("assets/front-end/png/new-arrivals.png")}}" alt="">

                </div>
                <div class="pl-2">
                    {{ \App\CPU\translate('ARRIVALS')}}
                </div>
            </div>
        </div> -->
        <!--<div class="container rtl mb-3 overflow-hidden">
            <div class="py-2">
                <div class="new_arrival_product">
                    <div class="carousel-wrap" >
                        <div class="owl-carousel owl-theme" id="new-arrivals-product">
                            @foreach($latest_products as $key=>$product)

                                @include('web-views.partials._product-card-1',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="container rtl">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card card __shadow h-100">
                        <div class="card-body p-xl-35">
                            <div class="row d-flex justify-content-between mx-1 mb-3">
                                <div class="section-header-title pr-2">
                                    <img class="size-30"  src="{{asset("assets/front-end/png/best sellings.png")}}"
                                         alt="">
                                    <span class="font-bold pl-1">{{ \App\CPU\translate('best sellings')}}</span>
                                </div>
                                <div>
                                    <a class="text-capitalize view-all-text mt-2"
                                       href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                    </a>
                                </div>
                            </div>
                            <div>
                                @foreach($bestSellProduct as $key=>$bestSell)
                                    @if($bestSell->product && $key<3)
                                        <a class="__best-selling" href="{{route('product',$bestSell->product->slug)}}">
                                            @if($bestSell->product->discount > 0)
                                                <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                                        @if ($bestSell->product->discount_type == 'percent')
                                                            {{round($bestSell->product->discount)}}%
                                                        @elseif($bestSell->product->discount_type =='flat')
                                                            {{\App\CPU\Helpers::currency_converter($bestSell->product->discount)}}
                                                        @endif {{\App\CPU\translate('off')}}
                                                    </span>
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                            <div class="d-flex flex-wrap p-2">
                                                <div class="best-selleing-image">
                                                    <img class="rounded" onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$bestSell->product['thumbnail']}}" alt="Product"/>
                                                </div>
                                                <div class="best-selling-details">
                                                    <h6 class="widget-product-title">
                                                    <span class="ptr">
                                                        {{\Illuminate\Support\Str::limit($bestSell->product['name'],100)}}
                                                    </span>
                                                    </h6>
                                                    @php($bestSell_overallRating = \App\CPU\ProductManager::get_overall_rating($bestSell->product['reviews']))
                                                    <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        @for($inc=0;$inc<5;$inc++)
                                                            @if($inc<$bestSell_overallRating[0])
                                                                <i class="p-0 sr-star czi-star-filled active"></i>
                                                            @else
                                                                <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                            @endif
                                                        @endfor
                                                        <label class="badge-style">( {{count($bestSell->product->reviews)}} )</label>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        @if($bestSell->product->discount > 0)
                                                            <strike class="__color-E96A6A __text-12px">
                                                                {{\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)}}
                                                            </strike>
                                                        @endif
                                                    </div>
                                                    <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        {{\App\CPU\Helpers::currency_converter(
                                                        $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                                        )}}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <div class="card card __shadow h-100">
                        <div class="card-body p-xl-35">
                            <div class="row d-flex justify-content-between mx-1 mb-3">
                                <div class="section-header-title pr-2">
                                    <img class="size-30"  src="{{asset("assets/front-end/png/top-rated.png")}}"
                                         alt="">
                                    <span class="font-bold pl-1">{{ \App\CPU\translate('top rated')}}</span>
                                </div>
                                <div>
                                    <a class="text-capitalize view-all-text mt-2"
                                       href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                    </a>
                                </div>
                            </div>
                            <div>
                                @foreach($topRated as $key=>$top)
                                    @if($top->product && $key<3)
                                        <a class="__best-selling" href="{{route('product',$top->product->slug)}}">
                                            @if($top->product->discount > 0)
                                                <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                                        @if ($top->product->discount_type == 'percent')
                                                            {{round($top->product->discount)}}%
                                                        @elseif($top->product->discount_type =='flat')
                                                            {{\App\CPU\Helpers::currency_converter($top->product->discount)}}
                                                        @endif {{\App\CPU\translate('off')}}
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="d-flex flex-wrap p-2">
                                                <div class="top-rated-image">
                                                    <img class="rounded" onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$top->product['thumbnail']}}" alt="Product"/>
                                                </div>
                                                <div class="top-rated-details" >
                                                    <h6 class="widget-product-title">
                                                    <span class="ptr">
                                                        {{\Illuminate\Support\Str::limit($top->product['name'],100)}}
                                                    </span>
                                                    </h6>
                                                    @php($top_overallRating = \App\CPU\ProductManager::get_overall_rating($top->product['reviews']))
                                                    <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        @for($inc=0;$inc<5;$inc++)
                                                            @if($inc<$top_overallRating[0])
                                                                <i class="p-0 sr-star czi-star-filled active"></i>
                                                            @else
                                                                <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                            @endif
                                                        @endfor
                                                        <label class="badge-style">( {{count($top->product->reviews)}} )</label>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        @if($top->product->discount > 0)
                                                            <strike class="__text-12px __color-E96A6A">
                                                                {{\App\CPU\Helpers::currency_converter($top->product->unit_price)}}
                                                            </strike>
                                                        @endif
                                                    </div>
                                                    <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        {{\App\CPU\Helpers::currency_converter(
                                                        $top->product->unit_price-(\App\CPU\Helpers::get_product_discount($top->product,$top->product->unit_price))
                                                        )}}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        {{-- Banner  --}}
        <div class="container rtl py-4 ">
            <div class="row g-3">
                @foreach(\App\Model\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','desc')->take(2)->get() as $banner)
                    <div class="col-md-6">
                        <a href="{{$banner->url}}" class="d-block">
                            <img class="footer_banner_img"
                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                 src="{{asset('application/storage/app/public/banner')}}/{{$banner['photo']}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Categorized product --}}
        @foreach($home_categories as $category)
            <section class="container rtl pb-4">
                <!-- Heading-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap __gap-6px d-flex">
                            <div class="section-header-title pr-2" >
                        <span class="for-feature-title {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}} font-bold __text-20px text-uppercase"
                              style="{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                                {{Str::limit($category['name'],18)}}
                        </span>
                            </div>
                            <div class="category-product-view-all" >
                                <a class="text-capitalize view-all-text mt-1"
                                   href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                </a>

                            </div>
                        </div>

                        <div class="row mt-2 justify-content-between g-3">
                            <div class="col-md-12 col-12 ">
                                <div class="row g-3" >
                                    @foreach($category['products'] as $key=>$product)
                                        @if ($key<4)
                                            <div class="col-xl-3 col-sm-6 col-md-6 col-lg-4 col-12">
                                                @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        <!--shopping event start-->
        <section class="home-shopping-event mt-3">
            <div class="container">
                <div class="row  position-relative">
                    <div class=" event-bg" style="background-image:url('{{asset('assets/front-end/img/lg-event.png')}}')">
                        <div class="row">
                            <div class="col-lg-3 position-relative">
                                <div class="h-100 w-100 position-absolute" style="top: 0; left: 0; z-index: 5">
                                    <img src="{{asset('assets/front-end/img/sun-white.png')}}" alt="canvas" style="width: 50px; position: absolute; top: 190px; right: 60px;">
                                    <img src="{{asset('assets/front-end/img/sun-deam.png')}}" alt="canvas" style="width: 50px; position: absolute; top: 10px; right: 20px;">
                                    <img src="{{asset('assets/front-end/img/gem-white.png')}}" alt="canvas"  style="width: 25px; position: absolute; top: 100px; right: 30px;">
                                    <img src="{{asset('assets/front-end/img/gem-white.png')}}" alt="canvas" style="width: 20px; position: absolute; top: 80px; right: 150px;">
                                </div>
                                <div class="banner-left h-100 position-relative" style="z-index: 5">
                                    <div class="align-items-center d-flex d-lg-block justify-content-center justify-content-lg-start">
                                        <div class="lg-event-logo align-content-center">
                                            <picture>
                                                <img src="{{asset('assets/front-end/img/lg-event-logo.png')}}" alt="">
                                            </picture>
                                        </div>
                                        <h2 class="event-heading mb-0 mb-lg-2">Life's Good Event</h2>
                                    </div>
                                    <ul class="event-key-points">
                                        <li>Flat <span>25% off</span></li>
                                        <li>Special Voucher available</li>
                                    </ul>
                                    <button>View All Products</button>
                                    <div class="banner-img d-none d-lg-block">
                                        <picture>
                                            <img src="{{asset('assets/front-end/img/eventImg.png')}}" alt="">
                                        </picture>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="right-section event-right-section row">
                                    <div class="owl-carousel owl-theme py-5" id="shopping-event-slider">
                                        @foreach($latest_products as $product)
                                            <div class="w-100">
                                                <div>
                                                    @include('web-views.partials._single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </section>

        {{--delivery type --}}

        <div class="container d-none rtl pb-4 pt-3">
            <div class="shipping-policy-web">
                <div class="row g-3">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system" >
                            <div class="text-center">
                                <img class="size-60" src="{{asset("assets/front-end/png/delivery.png")}}"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    {{ \App\CPU\translate('Fast Delivery all accross the country')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="{{asset("assets/front-end/png/Payment.png")}}"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    {{ \App\CPU\translate('Safe Payment')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="{{asset("assets/front-end/png/money.png")}}"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    {{ \App\CPU\translate('7 Days Return Policy')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="{{asset("assets/front-end/png/Genuine.png")}}"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    {{ \App\CPU\translate('100% Authentic Products')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    {{-- Owl Carousel --}}
    <script src="{{asset('assets/front-end')}}/js/owl.carousel.min.js"></script>

    <script>

    </script>

    <script>
        var options = {
            chart: {
                height: 170,
                type: "radialBar"
            },

            series: [67],

            plotOptions: {
                radialBar: {
                    track: {
                        background: '#D6E9FF'
                    },
                    hollow: {
                        margin: 5,
                        size: "50%"
                    },
                    dataLabels: {
                        showOn: "always",
                        name: {
                            offsetY: -10,
                            show: false,
                            color: "#888",
                            fontSize: "13px"
                        },
                        value: {
                            offsetY: 2,
                            color: "#222F3E",
                            fontSize: "15px",
                            fontWeight: 700,
                            show: true,
                        },

                    },
                },
            },
            fill: {
                type: 'solid',
                colors: ['#94C5FF',]
            },

            stroke: {
                lineCap: "round",
                color: "#D6E9FF",
            },
            labels: ['<i class="fas fa-chart-pie"></i>']
        };

        var chart = new ApexCharts(document.querySelector("#level-chart"), options);

        chart.render();
    </script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 20,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 2
                }
            }
        })

        $('#new-arrivals-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}'></i>", "<i class='czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('#home-banner').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 0,
            nav: false,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 1
                },
                //Large
                992: {
                    items: 1
                },
                //Extra large
                1200: {
                    items: 1
                },
                //Extra extra large
                1400: {
                    items: 1
                }
            }
        });
    </script>
    <script>
        $('#shopping-event-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 20,
            nav: true,
            navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $('#highlights-banner-first').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $('#highlights-banner-sec').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $('#featured_products_list').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 3
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
    </script>
    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '{{session('direction')}}': true,
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 3
                },
                360: {
                    items: 4
                },
                375: {
                    items: 4
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 9
                },
                //Extra extra large
                1400: {
                    items: 10
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>
@endpush