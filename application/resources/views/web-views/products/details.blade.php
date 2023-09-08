@extends('layouts.front-end.app')

@section('title',$product['name'])

@push('css_or_js')
    <meta name="description" content="{{$product->slug}}">
    <meta name="keywords" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    @if($product->added_by == 'seller')
        <meta name="author" content="{{ $product->seller->shop?$product->seller->shop->name:$product->seller->f_name}}">
    @elseif($product->added_by=='admin')
        <meta name="author" content="{{$web_config['name']->value}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/owl.carousel.min.css"/>
    <!-- Viewport-->

    @if($product['meta_image']!=null)
        <meta property="og:image"
              content="{{asset("application/storage/app/public/product/meta")}}/{{$product->meta_image}}"/>
        <meta property="twitter:card"
              content="{{asset("application/storage/app/public/product/meta")}}/{{$product->meta_image}}"/>
    @else
        <meta property="og:image"
              content="{{asset("application/storage/app/public/product/thumbnail")}}/{{$product->thumbnail}}"/>
        <meta property="twitter:card"
              content="{{asset("application/storage/app/public/product/thumbnail/")}}/{{$product->thumbnail}}"/>
    @endif

    @if($product['meta_title']!=null)
        <meta property="og:title" content="{{$product->meta_title}}"/>
        <meta property="twitter:title" content="{{$product->meta_title}}"/>
    @else
        <meta property="og:title" content="{{$product->name}}"/>
        <meta property="twitter:title" content="{{$product->name}}"/>
    @endif
    <meta property="og:url" content="{{route('product',[$product->slug])}}">

    @if($product['meta_description']!=null)
        <meta property="twitter:description" content="{!! $product['meta_description'] !!}">
        <meta property="og:description" content="{!! $product['meta_description'] !!}">
    @else
        <meta property="og:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
        <meta property="twitter:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    @endif
    <meta property="twitter:url" content="{{route('product',[$product->slug])}}">

    <link rel="stylesheet" href="{{asset('assets/front-end/css/product-details.css')}}"/>
    <style>
        .btn-number:hover {
            color: {{$web_config['secondary_color']}};

        }

        .for-total-price {
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: -30%;
        }

        .feature_header span {
            padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 15px;
        }

        .flash-deals-background-image {
            background: {{$web_config['primary_color']}}10;
        }

        @media (max-width: 768px) {
            .for-total-price {
                padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 30%;
            }

            .product-quantity {
                padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 4%;
            }

            .for-margin-bnt-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 7px;
            }

        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 3px;
            }

            .for-discount {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -7%;
            }

            .product-quantity {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -5%;
            }

            .for-total-price {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: -20%;
            }

            .view-btn-div {
                float: {{Session::get('direction') === "rtl" ? 'left' : 'right'}};
            }

            .for-discount {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 7%;
            }

            .for-mobile-capacity {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 7%;
            }
        }
    </style>
    <style>
        thead {
            background: {{$web_config['primary_color']}}                                              !important;
        }
    </style>
@endpush

@section('content')
    <?php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    $decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings');
    ?>
    <div class="__inline-23">
        <!-- Page Content-->
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item">Audio & Video</li>
                    <li class="breadcrumb-item">LED TV</li>
                    <li class="breadcrumb-item active" aria-current="page">Meridia 75" 4K UHD Smart TV</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-2 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <!-- General info tab-->
            <div class="row {{Session::get('direction') === "rtl" ? '__dir-rtl' : ''}}">
                <!-- Product gallery-->
                <div class="col-lg-12 col-12">
                    <div class="card p-2 p-md-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="cz-product-gallery">
                                    <div class="cz-preview">
                                        @if($product->images!=null)
                                            @foreach (json_decode($product->images) as $key => $photo)
                                                <div
                                                    class="cz-preview-item d-flex align-items-center justify-content-center {{$key==0?'active':''}}"
                                                    id="image{{$key}}">
                                                    <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                         onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                         src="{{asset("application/storage/app/public/product/$photo")}}"
                                                         data-zoom="{{asset("application/storage/app/public/product/$photo")}}"
                                                         alt="Product image" width="">
                                                    <div class="cz-image-zoom-pane"></div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="cz">
                                        <div class="table-responsive __max-h-515px" data-simplebar>
                                            <div class="d-flex">
                                                @if($product->images!=null)
                                                    @foreach (json_decode($product->images) as $key => $photo)
                                                        <div class="cz-thumblist">
                                                            <a class="cz-thumblist-item  {{$key==0?'active':''}} d-flex align-items-center justify-content-center "
                                                               href="#image{{$key}}">
                                                                <img
                                                                    onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                                    src="{{asset("application/storage/app/public/product/$photo")}}"
                                                                    alt="Product thumb">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-8 col-md-8 col-12 mt-md-0 mt-sm-3"
                                 style="direction: {{ Session::get('direction') }}">
                                <div class="details __h-100 py-0">
                                    <span class="mb-2 __inline-24 product-details-header">{{$product->name}}</span>
                                    <div class="d-flex flex-wrap align-items-center mb-2 pro"
                                         style="margin-top:6px!important;">
                                        @if($product->added_by == 'admin')
                                            <span
                                                class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 pr-md-2 pr-sm-1' : 'mr-md-2 mr-1 pr-md-2 pr-sm-1'}}"
                                                style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Sold By: <a
                                                    class="" href="{{ route('shopView',[0]) }}" style="text-decoration: underline; font-weight: 400;
font-size: 14px!important;color: #77b847!important;">{{$web_config['name']->value}}</a></span>
                                            <span class="__inline-25"></span>
                                            <span
                                                class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}}"
                                                style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Model:  <span
                                                    class="" style="font-weight: 400;
font-size: 14px;color: rgba(0, 0, 0, 0.5);">CGMR75E1.V2</span> </span>
                                            <span class="__inline-25">    </span>
                                            <span
                                                class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}} text-capitalize"
                                                style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Brand:  <span
                                                    class="" style="font-weight: 400;
font-size: 14px;color: rgba(0, 0, 0, 0.5);">{{$product->brand->name}}</span>  </span>
                                        @elseif($product->added_by == 'seller')
                                            @if(isset($product->seller->shop))
                                                <span
                                                    class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 pr-md-2 pr-sm-1' : 'mr-md-2 mr-1 pr-md-2 pr-sm-1'}}"
                                                    style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Sold By: <a
                                                        class="" href="{{ route('shopView',[$product->seller->id]) }}" style="text-decoration: underline; font-weight: 400;
font-size: 14px!important;color: #77b847!important;">{{$product->seller->shop->name}}</a></span>
                                                <span class="__inline-25"></span>
                                                <span
                                                    class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}}"
                                                    style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Model:  <span
                                                        class="" style="font-weight: 400;
font-size: 14px;color: rgba(0, 0, 0, 0.5);">CGMR75E1.V2</span> </span>
                                                <span class="__inline-25">    </span>
                                                <span
                                                    class="font-regular font-for-tab d-inline-block font-size-sm align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}} text-capitalize"
                                                    style="font-size:14px!important; font-weight:600!important;color:#000000!important;">Brand:  <span
                                                        class="" style="font-weight: 400;
font-size: 14px;color: rgba(0, 0, 0, 0.5);">{{$product->brand->name}}</span>  </span>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="d-flex" style="margin-top:16px!important;">
                                        <h5 class="mb-0 mr-3"
                                            style="font-weight: 600;font-size: 20px;color: #161D25;">{{\App\CPU\Helpers::get_price_range($product) }}</h5>
                                        @if($product->discount > 0)
                                            <strike
                                                style="font-weight: 400;font-size: 18px;color: #656565; line-height: 26px;"
                                                class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'}}">
                                                {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                            </strike>
                                            <div><span class="discount-text">
                                                    @if($product->discount_type == 'percent')
                                                        {{$product->discount}} % OFF
                                                    @else
                                                        {{\App\CPU\Helpers::set_symbol($product->discount)}} OFF
                                                    @endif

                                            </span></div>
                                        @endif
                                    </div>
                                    <p class="mb-0" style="font-weight: 500;font-size: 14px;color: #77b847;">(Incl. all
                                        Taxes)</p>

                                    <div class="d-flex flex-wrap align-items-center mb-2 pro"
                                         style="margin-top: 14px!important;">
                                        <div class="star-rating mt-0"
                                             style="{{Session::get('direction') === "rtl" ? 'margin-left: 25px;' : 'margin-right: 10px;'}}">
                                            @for($inc=0;$inc<5;$inc++)
                                                @if($inc<$overallRating[0])
                                                    <i class="sr-star czi-star-filled active"></i>
                                                @else
                                                    <i class="sr-star czi-star-filled"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span
                                            class="d-inline-block  align-middle mt-1 {{Session::get('direction') === "rtl" ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2'}}"
                                            style="font-weight: 400;font-size: 14px;color: #161D25;text-decoration: underline">({{$overallRating[0]}} Ratings & {{$overallRating[1]}} Reviews)</span>
                                        <span class="__inline-25"></span>
                                        <span
                                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}}"><div
                                                class="d-flex align-items-center">
                                                <img class="mr-2" src="{{asset('assets/front-end/img/Coins.png')}}"
                                                     alt="Coins" style="width: 20px">
                                                <span
                                                    style="font-weight: 400;font-size: 14px; color:#161D25!important;">CG|Coins: </span>
                                                <span
                                                    style="font-weight: 600;color: #77b847;font-size: 16px;"> 947.95</span>
                                    </div>
                                    </span>
                                    </div>
                                    {{--                                    <div class="d-flex flex-wrap align-items-center mb-2 pro">--}}
                                    {{--                                    <span--}}
                                    {{--                                        class="d-inline-block  align-middle mt-1 {{Session::get('direction') === "rtl" ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2'}} __color-FE961C">{{$overallRating[0]}}</span>--}}
                                    {{--                                        <div class="star-rating"--}}
                                    {{--                                             style="{{Session::get('direction') === "rtl" ? 'margin-left: 25px;' : 'margin-right: 25px;'}}">--}}
                                    {{--                                            @for($inc=0;$inc<5;$inc++)--}}
                                    {{--                                                @if($inc<$overallRating[0])--}}
                                    {{--                                                    <i class="sr-star czi-star-filled active"></i>--}}
                                    {{--                                                @else--}}
                                    {{--                                                    <i class="sr-star czi-star"></i>--}}
                                    {{--                                                @endif--}}
                                    {{--                                            @endfor--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <span--}}
                                    {{--                                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}}">{{$overallRating[1]}} {{\App\CPU\translate('Reviews')}}</span>--}}
                                    {{--                                        <span class="__inline-25"></span>--}}
                                    {{--                                        <span--}}
                                    {{--                                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}}">{{$countOrder}} {{\App\CPU\translate('orders')}}   </span>--}}
                                    {{--                                        <span class="__inline-25">    </span>--}}
                                    {{--                                        <span--}}
                                    {{--                                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'}} text-capitalize">  {{$countWishlist}} {{\App\CPU\translate('wish_listed')}} </span>--}}

                                    {{--                                    </div>--}}
                                    {{--                                    <div class="mb-3">--}}
                                    {{--                                        @if($product->discount > 0)--}}
                                    {{--                                            <strike style="color: #E96A6A;"--}}
                                    {{--                                                    class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'}}">--}}
                                    {{--                                                {{\App\CPU\Helpers::currency_converter($product->unit_price)}}--}}
                                    {{--                                            </strike>--}}
                                    {{--                                        @endif--}}
                                    {{--                                        <span class="h3 font-weight-normal text-accent ">--}}
                                    {{--                                        {{\App\CPU\Helpers::get_price_range($product) }}--}}
                                    {{--                                    </span>--}}
                                    {{--                                        <span--}}
                                    {{--                                            class="{{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}} __text-12px font-regular">--}}
                                    {{--                                        (<span>{{\App\CPU\translate('tax')}} : </span>--}}
                                    {{--                                        <span id="set-tax-amount"></span>)--}}
                                    {{--                                    </span>--}}
                                    {{--                                    </div>--}}


                                    <form id="add-to-cart-form" class="mb-2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div
                                            class="position-relative {{Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'}}"
                                            style="margin-bottom:38px!important; margin-top: 14px!important;">
                                            @if (count(json_decode($product->colors)) > 0)
                                                <div class="d-flex align-items-center flex-start">
                                                    <div
                                                        class="product-description-label mt-0 text-body">{{\App\CPU\translate('color')}}
                                                        :
                                                    </div>
                                                    <div>
                                                        <ul class="list-inline checkbox-color mb-0 flex-start {{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}}"
                                                            style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;">
                                                            @foreach (json_decode($product->colors) as $key => $color)
                                                                <div>
                                                                    <li>
                                                                        <input type="radio"
                                                                               id="{{ $product->id }}-color-{{ $key }}"
                                                                               name="color" value="{{ $color }}"
                                                                               @if($key == 0) checked @endif>
                                                                        <label style="background: {{ $color }};"
                                                                               for="{{ $product->id }}-color-{{ $key }}"
                                                                               data-toggle="tooltip">
                                                                            <span class="outline"></span></label>
                                                                    </li>
                                                                </div>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                $qty = 0;
                                                if(!empty($product->variation)){
                                                foreach (json_decode($product->variation) as $key => $variation) {
                                                        $qty += $variation->qty;
                                                    }
                                                }
                                            @endphp
                                        </div>
                                        @foreach (json_decode($product->choice_options) as $key => $choice)
                                            <div class="row flex-start mx-0">
                                                <div
                                                    class="product-description-label text-body mt-2 {{Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'}}">{{ $choice->title }}
                                                    :
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start row"
                                                        style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;">
                                                        @foreach ($choice->options as $key => $option)
                                                            <div>
                                                                <li class="for-mobile-capacity">
                                                                    <input type="radio"
                                                                           id="{{ $choice->name }}-{{ $option }}"
                                                                           name="{{ $choice->name }}"
                                                                           value="{{ $option }}"
                                                                           @if($key == 0) checked @endif >
                                                                    <label class="__text-12px"
                                                                           for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                                </li>
                                                            </div>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="details-coupon-wrapper py-2" style="margin-bottom: 36px!important;">
                                            <h5 class="details-coupon-title" style="margin-bottom: 12px!important;">
                                                Available Offers</h5>
                                            <div class="carousel-wrap">
                                                <div class="details-coupon-outer owl-carousel owl-theme"
                                                     id="details-coupon-sec">
                                                    <div class="coupon-card-wrapper" style="background: #89A2B7;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pr-2"
                                                                 style="color: #FFFFFF; border-right: 1px dashed #ffffff;">
                                                                <p class="mb-0 coupon-code">CGD525HEHA</p>
                                                                <p class="mb-0 coupon-discount">5% Off</p>
                                                            </div>
                                                            <button class="coupon-get-btn ml-2">Get</button>
                                                        </div>
                                                    </div>
                                                    <div class="coupon-card-wrapper" style="background:#AF6E81;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pr-2"
                                                                 style="color: #FFFFFF; border-right: 1px dashed #ffffff;">
                                                                <p class="mb-0 coupon-code">CGD525HEHA</p>
                                                                <p class="mb-0 coupon-discount">5% Off</p>
                                                            </div>
                                                            <button class="coupon-get-btn ml-2">Get</button>
                                                        </div>
                                                    </div>
                                                    <div class="coupon-card-wrapper" style="background: #89A2B7;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pr-2"
                                                                 style="color: #FFFFFF; border-right: 1px dashed #ffffff;">
                                                                <p class="mb-0 coupon-code">CGD525HEHA</p>
                                                                <p class="mb-0 coupon-discount">5% Off</p>
                                                            </div>
                                                            <button class="coupon-get-btn ml-2">Get</button>
                                                        </div>
                                                    </div>
                                                    <div class="coupon-card-wrapper" style="background: #AF6E81;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pr-2"
                                                                 style="color: #FFFFFF; border-right: 1px dashed #ffffff;">
                                                                <p class="mb-0 coupon-code">CGD525HEHA</p>
                                                                <p class="mb-0 coupon-discount">5% Off</p>
                                                            </div>
                                                            <button class="coupon-get-btn ml-2">Get</button>
                                                        </div>
                                                    </div>
                                                    <div class="coupon-card-wrapper" style="background: #AF6E81;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pr-2"
                                                                 style="color: #FFFFFF; border-right: 1px dashed #ffffff;">
                                                                <p class="mb-0 coupon-code">CGD525HEHA</p>
                                                                <p class="mb-0 coupon-discount">5% Off</p>
                                                            </div>
                                                            <button class="coupon-get-btn ml-2">Get</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Quantity + Add to cart -->
                                        <div class="d-flex flex-wrap mt-3">
                                            <div
                                                class="product-quantity">
                                                <div class="mr-2 h-100 mb-2">
                                                    <div
                                                        class="position-relative"
                                                        style="color: {{$web_config['primary_color']}}; width: 120px">
                                                    <span class="input-group-btn position-absolute"
                                                          style="z-index: 2; left: 0">
                                                        <button class="btn btn-number __p-10" type="button"
                                                                data-type="minus" data-field="quantity"
                                                                style="color: {{$web_config['primary_color']}}; font-size: 30px;padding: 5px;line-height: 1;">
                                                            -
                                                        </button>
                                                    </span>
                                                        <input type="text" name="quantity"
                                                               style="z-index: 1;color: {{$web_config['primary_color']}}; font-weight: 700; font-size: 15px; "
                                                               class="form-control px-4 text-center cart-qty-field position-absolute w-100"
                                                               placeholder="1"
                                                               value="{{ $product->minimum_order_qty ?? 1 }}"
                                                               product-type="{{ $product->product_type }}"
                                                               min="{{ $product->minimum_order_qty ?? 1 }}"
                                                               max="100">
                                                        <span class="input-group-btn position-absolute"
                                                              style="z-index: 2; right: 0">
                                                        <button class="btn btn-number __p-10" type="button"
                                                                product-type="{{ $product->product_type }}"
                                                                data-type="plus"
                                                                data-field="quantity"
                                                                style="color: {{$web_config['primary_color']}};font-size: 25px;padding: 5px;line-height: 1;">
                                                        +
                                                        </button>
                                                    </span>
                                                    </div>
                                                </div>
                                                {{--                                                    <div id="chosen_price_div d-none">--}}
                                                {{--                                                        <div--}}
                                                {{--                                                            class="d-flex justify-content-center align-items-center {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">--}}
                                                {{--                                                            <div class="product-description-label">--}}
                                                {{--                                                                <strong>{{\App\CPU\translate('total_price')}}</strong> :--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                            &nbsp; <strong id="chosen_price"></strong>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                            </div>
                                            <div class="mb-2">
                                                <button
                                                    class="mr-2 element-center details-add-cart btn-gap-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                                    onclick="addToCart()" type="button">
                                                    <span
                                                        class="string-limit">{{\App\CPU\translate('add_to_cart')}}</span>
                                                </button>
                                            </div>
                                            <div class="mb-2">
                                                <button type="button" onclick="addWishlist('{{$product['id']}}')"
                                                        class="btn details-wishlist-btn">
                                                    <i class="fa fa-heart-o "
                                                       aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <span class="details-devider ">    </span>
                                            <button type="button" class="btn details-share-btn px-2 mb-2">
                                                <i class="fa fa-share-alt"
                                                   aria-hidden="true"></i>CG|Chat
                                            </button>
                                        </div>
                                        <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                            <div class="col-12">
                                                @if(($product['product_type'] == 'physical') && ($product['current_stock']<=0))
                                                    <h5 class="mt-3 text-danger">{{\App\CPU\translate('out_of_stock')}}</h5>
                                                @endif
                                            </div>
                                        </div>
                                        <button style="margin:24px 0 26px!important;"
                                                class="btn details-buy-btn btn-gap-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                                onclick="buy_now()" type="button">
                                            <span class="string-limit">{{\App\CPU\translate('buy_now')}}</span>
                                        </button>
                                    </form>

                                    <div class="d-flex align-items-center mt-3">
                                        <p class="mb-0 mr-2" style="font-weight: 600;font-size: 16px;">Secure
                                            Payment</p><img style="width: 12px; height: 14px;"
                                                            src="{{asset('assets/front-end/img/secure.png')}}"
                                                            alt="secure">
                                    </div>

                                    <div class="d-flex align-items-center mt-2 mb-3">
                                        <img class="mr-2" style="width: 20px; height: 20px;"
                                             src="{{asset('assets/front-end/img/wallet-vector-icon.png')}}"
                                             alt="secure">
                                        <p class="mb-0"
                                           style="font-weight: 400;font-size: 14px;color: rgba(22, 29, 37, 0.5);">
                                            Multiple Payment Options</p>
                                    </div>

                                    <p class="mb-2 mr-2"
                                       style="font-weight: 600;font-size: 16px;">{{\App\CPU\translate('Customer_Service_Guarantee')}}</p>
                                    <div class="d-flex flex-wrap">
                                        <div class="d-flex align-items-center mb-2 mr-3">
                                            <img class="mr-2" style="width: 14px; height: 14px;"
                                                 src="{{asset('assets/front-end/img/doa-guarantee.png')}}" alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 14px;color: rgba(22, 29, 37, 0.5);">
                                                DOA Guarantee</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2 mr-3">
                                            <img class="mr-2" style="width: 14px; height: 14px;"
                                                 src="{{asset('assets/front-end/img/CircleWavyCheck.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 14px;color: rgba(22, 29, 37, 0.5);">
                                                Missing/Wrong Items Guarantee</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2 mr-3">
                                            <img class="mr-2" style="width: 14px; height: 14px;"
                                                 src="{{asset('assets/front-end/img/quality-guarantee.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 14px;color: rgba(22, 29, 37, 0.5);">
                                                Quality Guarantee</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2 mr-3">
                                            <img class="mr-2" style="width: 14px; height: 14px;"
                                                 src="{{asset('assets/front-end/img/KeyReturn.png')}}" alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 14px;color: rgba(22, 29, 37, 0.5);">No
                                                Reason Returns</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="d-flex mr-3 mb-2" style="align-items: flex-start">
                                            <img class="mr-2"
                                                 style="width: 15px; height: 15px;"
                                                 src="{{asset('assets/front-end/img/store-icon.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 12px;color: #77b847; text-decoration: underline">
                                                No
                                                Store Consultation</p></a>
                                        <a href="#" class="d-flex mr-3 mb-2" style="align-items: flex-start">
                                            <img class="mr-2"
                                                 style="width: 15px; height: 15px;"
                                                 src="{{asset('assets/front-end/img/consultation.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 12px;color: #77b847; text-decoration: underline">
                                                No
                                                Product Enquiry</p></a>
                                        <a href="#" class="d-flex mr-3 mb-2" style="align-items: flex-start">
                                            <img class="mr-2"
                                                 style="width: 15px; height: 15px;"
                                                 src="{{asset('assets/front-end/img/preebook.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 12px;color: #77b847; text-decoration: underline">
                                                No
                                                Prebook Order</p></a>
                                        <a href="#" class="d-flex mr-3 mb-2" style="align-items: flex-start">
                                            <img class="mr-2"
                                                 style="width: 15px; height: 15px;"
                                                 src="{{asset('assets/front-end/img/emi.png')}}"
                                                 alt="secure">
                                            <p class="mb-0"
                                               style="font-weight: 400;font-size: 12px;color: #77b847; text-decoration: underline">
                                                No
                                                Calculate EMI</p></a>
                                    </div>

                                    <div style="text-align:{{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                         class="sharethis-inline-share-buttons d-none"></div>

                                    <div class="ml-auto" style="width: fit-content;">
                                        <p class="mb-0" style="font-weight: 400;font-size: 13px;">Share to</p>
                                        <div class="d-flex">
                                            <a href="#" class="mr-2">
                                                <img style="width: 20px"
                                                     src="{{asset('assets/front-end/img/logos_facebook.png')}}"
                                                     alt="share link">
                                            </a>
                                            <a href="#" class="mr-2">
                                                <img style="width: 20px"
                                                     src="{{asset('assets/front-end/img/logos_messenger.png')}}"
                                                     alt="share link">
                                            </a>
                                            <a href="#" class="mr-2">
                                                <img style="width: 20px"
                                                     src="{{asset('assets/front-end/img/logos_twitter.png')}}"
                                                     alt="share link">
                                            </a>
                                            <a href="#" class="mr-2">
                                                <img style="width: 20px"
                                                     src="{{asset('assets/front-end/img/link-icon.png')}}"
                                                     alt="share link">
                                            </a>
                                            <a href="#" class="mr-2">
                                                <img style="width: 20px"
                                                     src="{{asset('assets/front-end/img/mail-icon.png')}}"
                                                     alt="share link">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 rtl col-12"
                             style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12">
                                        <div class=" mt-1">
                                            <!-- Tabs-->
                                            <ul class="nav custom-nav-tabs nav-tabs d-flex __mt-35" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link __inline-27 active " href="#overview"
                                                       data-toggle="tab" role="tab">
                                                        {{\App\CPU\translate('Product_Details')}}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#specification"
                                                       data-toggle="tab"
                                                       role="tab">
                                                        {{\App\CPU\translate('Product_Specification')}}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#warranty" data-toggle="tab"
                                                       role="tab">
                                                        {{\App\CPU\translate('Product_Warranty')}}
                                                    </a>
                                                </li>

                                            </ul>
                                            <div class="flex-grow-1 mx-3">
                                                <hr>
                                            </div>
                                            <div
                                                class="px-4 pb-3 mb-3 mr-0 mr-md-2">
                                                <div class="tab-content">
                                                    <!-- Tech specs tab-->
                                                    <div class="tab-pane fade show active" id="overview"
                                                         role="tabpanel">
                                                        <div class="row specification">
                                                            @if($product->video_url!=null)
                                                                <div class="col-12 mb-4">
                                                                    <iframe width="420" height="315"
                                                                            src="{{$product->video_url}}">
                                                                    </iframe>
                                                                </div>
                                                            @endif

                                                            <div class="col-lg-12 col-md-12 overflow-scroll"
                                                                 style="color:#161D25!important; font-weight:400!important; font-size: 16px!important;">
                                                                {!! $product['details'] !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Product_Specification tab-->
                                                    <div class="tab-pane fade" id="specification" role="tabpanel">
                                                        <table class="table  table-sm table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Model</th>
                                                                <td>CGMR75E1.V2</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Brand</th>
                                                                <td>Mini Doll Beautiful Dressed With Key Ring, Cell
                                                                    Phone Charm
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Display Size</th>
                                                                <td>19.05 x 6.35 x 2.54 CM/ 7.5 x 2.5 x 1 Inch</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- Product_Warranty tab-->
                                                    <div class="tab-pane fade" id="warranty" role="tabpanel">
                                                        <table class="table table-sm table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Warranty</th>
                                                                <td>24 months</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php($reviews_of_product = App\Model\Review::where('product_id',$product->id)->paginate(2))
                    <div class="mt-4 rtl col-12 mb-3">
                        <div class="card p-4">
                            <h5 style="font-weight:500!important;font-size: 20px !important; color:#161D25!important; padding:23px!important;">
                                Ratings & Reviews</h5>
                            <div class="flex-grow-1">
                                <hr>
                            </div>
                            <div class="row pt-2 pb-3">
                                <div class="col-lg-3 col-md-6 mb-3 px-3 details-rating-count">
                                    <div
                                        class=" row d-flex justify-content-center align-items-center">
                                        <div
                                            class="col-12 d-flex align-items-center">
                                            <h2 class="overall_review overall_review-custom mb-2 __inline-28">
                                                {{$overallRating[1]}}<span>Out of 5</span>
                                            </h2>
                                        </div>
                                        <div
                                            class="col-12 d-flex align-items-center star-rating star-rating-custom"
                                            style="margin:18px 0 44px!important;">
                                            @if (round($overallRating[0])==5)
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="czi-star-filled active font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                            @endif
                                            @if (round($overallRating[0])==4)
                                                @for ($i = 0; $i < 4; $i++)
                                                    <i class="czi-star-filled active font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                                <i class="czi-star-filled font-size-sm text-muted {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                            @endif
                                            @if (round($overallRating[0])==3)
                                                @for ($i = 0; $i < 3; $i++)
                                                    <i class="czi-star-filled active font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                                @for ($j = 0; $j < 2; $j++)
                                                    <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                            @endif
                                            @if (round($overallRating[0])==2)
                                                @for ($i = 0; $i < 2; $i++)
                                                    <i class="czi-star-filled active font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                                @for ($j = 0; $j < 3; $j++)
                                                    <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                            @endif
                                            @if (round($overallRating[0])==1)
                                                @for ($i = 0; $i < 4; $i++)
                                                    <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                                <i class="czi-star-filled active font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                            @endif
                                            @if (round($overallRating[0])==0)
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="czi-star-filled font-size-sm text-muted {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                            @endif
                                        </div>

                                        <div
                                            class="col-12 d-flex align-items-center mt-2">
                                            <a href="#"
                                               style="font-weight: 500!important;font-size: 16px!important;line-height: 21px!important;color: #77b847!important;">See
                                                all {{$reviews_of_product->total()}} reviews</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 mb-3 pt-sm-3 pt-md-0 px-5 details-rating-progress">
                                    <div class="d-flex align-items-center mb-2 font-size-sm">
                                        <div
                                            class="pr-3"><span
                                                class="d-inline-block align-middle text-body rating-type-name">{{\App\CPU\translate('5_Star')}}</span>
                                        </div>
                                        <div class="w-0 flex-grow">
                                            <div class="progress text-body __h-9px">
                                                <div class="progress-bar " role="progressbar"
                                                     style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[0] != 0) ? ($rating[0] / $overallRating[1]) * 100 : (0); ?>%;"
                                                     aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-body">
                                                                    <span
                                                                        class=" {{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}} ">
                                                                        {{$rating[0]}}
                                                                    </span>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex align-items-center mb-2 text-body font-size-sm">
                                        <div
                                            class="pr-3"><span
                                                class="d-inline-block align-middle rating-type-name">{{\App\CPU\translate('4_Star')}}</span>
                                        </div>
                                        <div class="w-0 flex-grow">
                                            <div class="progress __h-9px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[1] != 0) ? ($rating[1] / $overallRating[1]) * 100 : (0); ?>%; background-color: #a7e453;"
                                                     aria-valuenow="27" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                                                    <span
                                                                        class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                                                            {{$rating[1]}}
                                                                    </span>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex align-items-center mb-2 text-body font-size-sm">
                                        <div
                                            class="pr-3"><span
                                                class="d-inline-block align-middle rating-type-name">{{\App\CPU\translate('3_Star')}}</span>
                                        </div>
                                        <div class="w-0 flex-grow">
                                            <div class="progress __h-9px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[2] != 0) ? ($rating[2] / $overallRating[1]) * 100 : (0); ?>%; background-color: #ffda75;"
                                                     aria-valuenow="17" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                                                    <span
                                                                        class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                                                        {{$rating[2]}}
                                                                    </span>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex align-items-center mb-2 text-body font-size-sm">
                                        <div
                                            class="pr-3"><span
                                                class="d-inline-block align-middle rating-type-name">{{\App\CPU\translate('2_Star')}}</span>
                                        </div>
                                        <div class="w-0 flex-grow">
                                            <div class="progress __h-9px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[3] != 0) ? ($rating[3] / $overallRating[1]) * 100 : (0); ?>%; background-color: #fea569;"
                                                     aria-valuenow="9" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                                                    <span
                                                                        class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                                                        {{$rating[3]}}
                                                                    </span>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex align-items-center text-body font-size-sm">
                                        <div
                                            class="pr-3"><span
                                                class="d-inline-block align-middle rating-type-name">{{\App\CPU\translate('1_Star')}}</span>
                                        </div>
                                        <div class="w-0 flex-grow">
                                            <div class="progress __h-9px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="background-color: {{$web_config['primary_color']}} !important;backbround-color:{{$web_config['primary_color']}};width: <?php echo $widthRating = ($rating[4] != 0) ? ($rating[4] / $overallRating[1]) * 100 : (0); ?>%;"
                                                     aria-valuenow="4" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                                                    <span
                                                                        class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                                                            {{$rating[4]}}
                                                                    </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col md 12 mb-3 text-center d-flex align-items-center">
                                    <div style="padding-left: 60px!important;">
                                        <button class="btn btn--primary mb-2"
                                                style="border-radius: 10px; font-weight:700!important; font-size:16px!important; color:#ffffff!important; padding:7px 43px">
                                            Write a Review
                                        </button>
                                        <p style="font-weight: 400!important;font-size: 14px!important;line-height: 18px;color: #656565!important;">
                                            Help other customers make their decision</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-12">
                                    <h5 style="padding:24px!important; color:#161D25!important; font-weight:600!important; font-size:20px!important;">
                                        Customer Reviews ({{$reviews_of_product->total()}})</h5>
                                    <div class="flex-grow-1">
                                        <hr>
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mb-3">
                                        <span style="font-weight: 500;font-size: 16px;color: #000000;">Sort By</span>
                                        <button type="button" class="btn ml-4"
                                                style="border-radius: 20px!important; border: 2px solid #77b847!important; color:#77b847!important; font-size: 14px!important; font-weight: 500!important; padding: 9px 44px!important">
                                            Newest First
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12" id="product-review-list">
                                    @foreach($reviews_of_product as $productReview)
                                        @include('web-views.partials.product-reviews',['productReviews'=>$reviews_of_product])
                                    @endforeach
                                    @if(count($product->reviews)==0)
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-center m-0">{{\App\CPU\translate('product_review_not_available')}}</h6>
                                            </div>
                                        </div>
                                    @endif
                                    {{----}}
                                </div>
                                @if(count($product->reviews) > 2)
                                    <div class="col-12">
                                        <div
                                            class="card-footer d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-outline-primary ml-3"
                                                    style="border-radius: 20px; border: 2px solid #77b847; font-weight: 500;">
                                                Newest First
                                            </button>

                                            <button class="btn btn-outline-primary"
                                                    style="border-radius: 20px; border: 2px solid #77b847; font-weight: 500;"
                                                    onclick="load_review()">{{\App\CPU\translate('view more')}}</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 d-none">
                    <div class="product-details-shipping-details">
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img
                                    class="{{Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'}} __img-20"
                                    src="{{asset("assets/front-end/png/Payment.png")}}"
                                    alt="">
                                <span>{{\App\CPU\translate('Safe Payment')}}</span>
                            </div>
                        </div>
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img
                                    class="{{Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'}} __img-20"
                                    src="{{asset("assets/front-end/png/money.png")}}"
                                    alt="">
                                <span>{{ \App\CPU\translate('7 Days Return Policy')}}</span>
                            </div>
                        </div>
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img
                                    class="{{Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'}} __img-20"
                                    src="{{asset("assets/front-end/png/Genuine.png")}}"
                                    alt="">
                                <span>{{ \App\CPU\translate('100% Authentic Products')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="__inline-31">
                        {{--seller section--}}
                        @if($product->added_by=='seller')
                            @if(isset($product->seller->shop))
                                <div class="row">
                                    <div class="col-12 position-relative">
                                        <div class="d-flex __seller-author align-items-center">
                                            <div>
                                                <img class="__img-60 img-circle"
                                                     src="{{asset('application/storage/app/public/shop')}}/{{$product->seller->shop->image}}"
                                                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                     alt="">
                                            </div>
                                            <div
                                                class="{{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}} w-0 flex-grow">
                                                <h6>
                                                    {{$product->seller->shop->name}}
                                                </h6>
                                                <span>{{\App\CPU\translate('Seller_info')}}</span>
                                            </div>
                                        </div>
                                        @if (auth('customer')->id() == '')
                                            <a href="{{route('customer.auth.login')}}">
                                                <div class="__chat-seller-btn"
                                                     style="color:{{$web_config['primary_color']}};">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.25 0.875C12.4821 0.875 12.7046 0.967187 12.8687 1.13128C13.0328 1.29538 13.125 1.51794 13.125 1.75V8.75C13.125 8.98206 13.0328 9.20462 12.8687 9.36872C12.7046 9.53281 12.4821 9.625 12.25 9.625H3.86225C3.39816 9.6251 2.95311 9.80954 2.625 10.1378L0.875 11.8878V1.75C0.875 1.51794 0.967187 1.29538 1.13128 1.13128C1.29538 0.967187 1.51794 0.875 1.75 0.875H12.25ZM1.75 0C1.28587 0 0.840752 0.184374 0.512563 0.512563C0.184374 0.840752 0 1.28587 0 1.75L0 12.9439C1.8388e-05 13.0304 0.0257185 13.1151 0.0738476 13.187C0.121977 13.259 0.190371 13.315 0.270374 13.3481C0.350378 13.3812 0.438393 13.3898 0.523282 13.3728C0.60817 13.3558 0.686114 13.314 0.74725 13.2528L3.24362 10.7564C3.40768 10.5923 3.6302 10.5 3.86225 10.5H12.25C12.7141 10.5 13.1592 10.3156 13.4874 9.98744C13.8156 9.65925 14 9.21413 14 8.75V1.75C14 1.28587 13.8156 0.840752 13.4874 0.512563C13.1592 0.184374 12.7141 0 12.25 0L1.75 0Z"
                                                            fill="{{$web_config['primary_color']}}"/>
                                                        <path
                                                            d="M4.375 5.25C4.375 5.48206 4.28281 5.70462 4.11872 5.86872C3.95462 6.03281 3.73206 6.125 3.5 6.125C3.26794 6.125 3.04538 6.03281 2.88128 5.86872C2.71719 5.70462 2.625 5.48206 2.625 5.25C2.625 5.01794 2.71719 4.79538 2.88128 4.63128C3.04538 4.46719 3.26794 4.375 3.5 4.375C3.73206 4.375 3.95462 4.46719 4.11872 4.63128C4.28281 4.79538 4.375 5.01794 4.375 5.25ZM7.875 5.25C7.875 5.48206 7.78281 5.70462 7.61872 5.86872C7.45462 6.03281 7.23206 6.125 7 6.125C6.76794 6.125 6.54538 6.03281 6.38128 5.86872C6.21719 5.70462 6.125 5.48206 6.125 5.25C6.125 5.01794 6.21719 4.79538 6.38128 4.63128C6.54538 4.46719 6.76794 4.375 7 4.375C7.23206 4.375 7.45462 4.46719 7.61872 4.63128C7.78281 4.79538 7.875 5.01794 7.875 5.25ZM11.375 5.25C11.375 5.48206 11.2828 5.70462 11.1187 5.86872C10.9546 6.03281 10.7321 6.125 10.5 6.125C10.2679 6.125 10.0454 6.03281 9.88128 5.86872C9.71719 5.70462 9.625 5.48206 9.625 5.25C9.625 5.01794 9.71719 4.79538 9.88128 4.63128C10.0454 4.46719 10.2679 4.375 10.5 4.375C10.7321 4.375 10.9546 4.46719 11.1187 4.63128C11.2828 4.79538 11.375 5.01794 11.375 5.25Z"
                                                            fill="{{$web_config['primary_color']}}"/>
                                                    </svg>
                                                    <span>{{\App\CPU\translate('chat')}}</span>
                                                </div>
                                            </a>
                                        @else
                                            <div class="__chat-seller-btn cursor-pointer" id="contact-seller"
                                                 style="color:{{$web_config['primary_color']}};">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.25 0.875C12.4821 0.875 12.7046 0.967187 12.8687 1.13128C13.0328 1.29538 13.125 1.51794 13.125 1.75V8.75C13.125 8.98206 13.0328 9.20462 12.8687 9.36872C12.7046 9.53281 12.4821 9.625 12.25 9.625H3.86225C3.39816 9.6251 2.95311 9.80954 2.625 10.1378L0.875 11.8878V1.75C0.875 1.51794 0.967187 1.29538 1.13128 1.13128C1.29538 0.967187 1.51794 0.875 1.75 0.875H12.25ZM1.75 0C1.28587 0 0.840752 0.184374 0.512563 0.512563C0.184374 0.840752 0 1.28587 0 1.75L0 12.9439C1.8388e-05 13.0304 0.0257185 13.1151 0.0738476 13.187C0.121977 13.259 0.190371 13.315 0.270374 13.3481C0.350378 13.3812 0.438393 13.3898 0.523282 13.3728C0.60817 13.3558 0.686114 13.314 0.74725 13.2528L3.24362 10.7564C3.40768 10.5923 3.6302 10.5 3.86225 10.5H12.25C12.7141 10.5 13.1592 10.3156 13.4874 9.98744C13.8156 9.65925 14 9.21413 14 8.75V1.75C14 1.28587 13.8156 0.840752 13.4874 0.512563C13.1592 0.184374 12.7141 0 12.25 0L1.75 0Z"
                                                        fill="{{$web_config['primary_color']}}"/>
                                                    <path
                                                        d="M4.375 5.25C4.375 5.48206 4.28281 5.70462 4.11872 5.86872C3.95462 6.03281 3.73206 6.125 3.5 6.125C3.26794 6.125 3.04538 6.03281 2.88128 5.86872C2.71719 5.70462 2.625 5.48206 2.625 5.25C2.625 5.01794 2.71719 4.79538 2.88128 4.63128C3.04538 4.46719 3.26794 4.375 3.5 4.375C3.73206 4.375 3.95462 4.46719 4.11872 4.63128C4.28281 4.79538 4.375 5.01794 4.375 5.25ZM7.875 5.25C7.875 5.48206 7.78281 5.70462 7.61872 5.86872C7.45462 6.03281 7.23206 6.125 7 6.125C6.76794 6.125 6.54538 6.03281 6.38128 5.86872C6.21719 5.70462 6.125 5.48206 6.125 5.25C6.125 5.01794 6.21719 4.79538 6.38128 4.63128C6.54538 4.46719 6.76794 4.375 7 4.375C7.23206 4.375 7.45462 4.46719 7.61872 4.63128C7.78281 4.79538 7.875 5.01794 7.875 5.25ZM11.375 5.25C11.375 5.48206 11.2828 5.70462 11.1187 5.86872C10.9546 6.03281 10.7321 6.125 10.5 6.125C10.2679 6.125 10.0454 6.03281 9.88128 5.86872C9.71719 5.70462 9.625 5.48206 9.625 5.25C9.625 5.01794 9.71719 4.79538 9.88128 4.63128C10.0454 4.46719 10.2679 4.375 10.5 4.375C10.7321 4.375 10.9546 4.46719 11.1187 4.63128C11.2828 4.79538 11.375 5.01794 11.375 5.25Z"
                                                        fill="{{$web_config['primary_color']}}"/>
                                                </svg>
                                                <span>{{\App\CPU\translate('chat')}}</span>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-12 msg-option mt-2" id="msg-option">

                                        <form action="">
                                            <input type="text" class="seller_id" hidden
                                                   seller-id="{{$product->seller->id }}">
                                            <textarea shop-id="{{$product->seller->shop->id}}"
                                                      class="chatInputBox form-control"
                                                      id="chatInputBox" rows="5"> </textarea>

                                            <div class="d-flex mt-2 __gap-15">
                                                <button class="btn btn-secondary text-white d-block w-47"
                                                        id="cancelBtn">{{\App\CPU\translate('cancel')}}
                                                </button>
                                                <button class="btn btn-success text-white d-block w-47"
                                                        id="sendBtn">{{\App\CPU\translate('send')}}</button>
                                            </div>

                                        </form>

                                    </div>

                                    @php($products_for_review = App\Model\Product::where('added_by',$product->added_by)->where('user_id',$product->user_id)->withCount('reviews')->get())

                                        <?php
                                        $total_reviews = 0;
                                        foreach ($products_for_review as $item) {
                                            $total_reviews += count($item->reviews);
                                        }
                                        ?>
                                    <div class="col-12 mt-2">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-6 ">
                                                <div
                                                    class="d-flex justify-content-center align-items-center rounded __h-79px"
                                                    style="background:{{$web_config['primary_color']}}10;">
                                                    <div class="text-center">
                                                        <span style="color: {{$web_config['primary_color']}};font-weight: 700;
                                                        font-size: 26px;">
                                                        {{$total_reviews}}
                                                        </span><br>
                                                        <span class="__text-12px">
                                                            {{\App\CPU\translate('reviews')}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div
                                                    class="d-flex justify-content-center align-items-center rounded __h-79px"
                                                    style="background:{{$web_config['primary_color']}}10;">
                                                    <div class="text-center">
                                                        <span style="color: {{$web_config['primary_color']}};font-weight: 700;
                                                        font-size: 26px;">
                                                            {{$products_for_review->count()}}
                                                        </span><br>
                                                        <span class="__text-12px">
                                                            {{\App\CPU\translate('products')}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div>
                                            <a href="{{ route('shopView',[$product->seller->id]) }}"
                                               class="w-100 d-block text-center">
                                                <button class="btn w-100 d-block text-center"
                                                        style="background: {{$web_config['primary_color']}};color:#ffffff">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                    {{\App\CPU\translate('Visit Store')}}
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="row d-flex justify-content-between">
                                <div class="col-9 ">
                                    <div class="row d-flex ">
                                        <div>
                                            <img class="__inline-32"
                                                 src="{{asset("application/storage/app/public/company")}}/{{$web_config['fav_icon']->value}}"
                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                 alt="">
                                        </div>
                                        <div class="{{Session::get('direction') === "rtl" ? 'right' : 'ml-3'}}">
                                            <span class="font-bold __text-16px">
                                                {{$web_config['name']->value}}
                                            </span><br>
                                        </div>
                                    </div>

                                </div>

                                @php($products_for_review = App\Model\Product::where('added_by','admin')->where('user_id',$product->user_id)->withCount('reviews')->get())

                                    <?php
                                    $total_reviews = 0;
                                    foreach ($products_for_review as $item) {
                                        $total_reviews += count($item->reviews);
                                    }
                                    ?>
                                <div class="col-12 mt-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-6 ">
                                            <div
                                                class="d-flex justify-content-center align-items-center rounded __h-79px"
                                                style="background:{{$web_config['primary_color']}}10;">
                                                <div class="text-center">
                                                    <span class="font-bold __text-26px"
                                                          style="color: {{$web_config['primary_color']}};">
                                                        {{$total_reviews}}
                                                    </span><br>
                                                    <span class="__text-12px">
                                                        {{\App\CPU\translate('reviews')}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div
                                                class="d-flex justify-content-center align-items-center rounded __h-79px"
                                                style="background:{{$web_config['primary_color']}}10;">
                                                <div class="text-center">
                                                    <span class="font-bold __text-26px"
                                                          style="color: {{$web_config['primary_color']}};">
                                                        {{$products_for_review->count()}}
                                                    </span><br>
                                                    <span class="__text-12px">
                                                        {{\App\CPU\translate('products')}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <a href="{{ route('shopView',[0]) }}" class="text-center d-block w-100">
                                            <button class="btn text-center d-block w-100"
                                                    style="background: {{$web_config['primary_color']}};color:#ffffff">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                {{\App\CPU\translate('Visit Store')}}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @php($more_product_from_seller = App\Model\Product::active()->where('added_by',$product->added_by)->where('user_id',$product->user_id)->latest()->take(5)->get())
                    <div class="px-3 py-3">
                        <div class="row d-flex justify-content-center">
                            <span class="text-center __text-16px font-bold">
                                {{ \App\CPU\translate('More From The Store')}}
                            </span>
                        </div>
                    </div>
                    <div>

                        @foreach($more_product_from_seller as $item)

                            @include('web-views.partials.seller-products-product-details',['product'=>$item,'decimal_point_settings'=>$decimal_point_settings])

                        @endforeach

                    </div>
                </div>


            </div>
        </div>

        <!-- Product carousel (You may also like)-->
        <div class="container  mb-3 rtl"
             style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <div class="d-flex mt-2">
                <div class="text-center"
                     style="{{Session::get('direction') === "rtl" ? 'margin-right: 5px;' : 'margin-left: 5px;'}}">
                    <span
                        class="for-feature-title __text-22px font-bold text-center section-header-title pr-2">{{ \App\CPU\translate('related_products')}}</span>
                </div>

                <div class="mr-1 ml-2">
                    @php($category=json_decode($product['category_ids']))
                    <a class="text-capitalize view-all-text mt-2"
                       style="color:{{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'margin-left:10px;' : 'margin-right: 8px;'}}"
                       href="{{route('products',['id'=> $category[0]->id,'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 ' : 'right ml-1 mr-n1'}}"></i>
                    </a>
                </div>
            </div>
            <!-- Grid-->

            <!-- Product-->
            <div class="row mt-4">
                @if (count($relatedProducts)>0)
                    @foreach($relatedProducts as $key => $relatedProduct)
                        <div class="col-xl-3 col-sm-6 col-md-6 col-lg-4 col-12">
                            @include('web-views.partials._single-product',['product'=>$relatedProduct,'decimal_point_settings'=>$decimal_point_settings])
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>{{\App\CPU\translate('similar')}} {{\App\CPU\translate('product_not_available')}}</h6>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image"
             aria-hidden="true" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body flex justify-content-center">
                        <button class="btn btn-default __inline-33"
                                style="{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -7px;"
                                data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <img class="element-center" id="attachment-view" src="">
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
        console.log('hi')
        $('#details-coupon-sec').owlCarousel({
            loop: true,
            autoplay: true,
            autoWidth: true,
            margin: 20,
            nav: false,
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

    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }
    </script>
    <script>
        $(document).ready(function () {
            load_review();
        });
        let load_review_count = 1;

        function load_review() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: '{{route('review-list-product')}}',
                data: {
                    product_id: {{$product->id}},
                    offset: load_review_count
                },
                success: function (data) {
                    $('#product-review-list').append(data.productReview)
                    if (data.not_empty == 0 && load_review_count > 2) {
                        toastr.info('{{\App\CPU\translate('no more review remain to load')}}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        console.log('iff');
                    }
                }
            });
            load_review_count++
        }
    </script>

    {{-- Messaging with shop seller --}}
    <script>
        $('#contact-seller').on('click', function (e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({'height': '276px'});
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function (e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '{{route('messages_store')}}',
                    data: data,
                    success: function (respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({'height': '125px'});
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function (e) {
            e.preventDefault();
            $('#seller_details').animate({'height': '114px'});
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
            async="async"></script>
@endpush
