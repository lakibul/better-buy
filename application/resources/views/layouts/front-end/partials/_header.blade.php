<style>
    .for-count-value {
    {{--        color: {{$web_config['primary_color']}};--}}



    }

    .count-value {
    {{--        color: {{$web_config['primary_color']}};--}}



    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: transparent !important;
        }

    }

    @media (max-width: 767px) {
        .search_button .input-group-text i {
            color: {{$web_config['primary_color']}}                                  !important;
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            padding- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1.95rem;
        }

        .mega-nav1 {
            color: {{$web_config['primary_color']}}                                  !important;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                                  !important;
        }
    }

    @media (max-width: 471px) {
        .mega-nav1 {
            color: {{$web_config['primary_color']}}                                  !important;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}     !important;
        }
    }
</style>
@php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status']==1)
    <div class="text-center position-relative px-4 py-1" id="anouncement"
         style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
        <span>{{ $announcement['announcement'] }} </span>
        <span class="__close-anouncement" onclick="myFunction()">X</span>
    </div>
@endif


<header class="box-shadow-sm rtl __inline-10" style="box-shadow: 0px 2px 8px #BACBDB !important; z-index: 99; position: relative;">
    <!-- Topbar-->
    <div class="topbar topbar-custom d-none d-sm-block">
        <div class="container">
            <div class="d-flex w-100 topbar-outer justify-content-end">
                <div class="{{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}} mx-3 text-nowrap">
                    <a class="topbar-link" href="tel:{{$web_config['phone']}}" data-toggle="tooltip"
                       data-placement="top" title={{$web_config['phone']}}>
                        <i class="fa fa-phone"></i> Customer Care
                    </a>
                </div>
                <div class="text-nowrap mx-3">
                    <a class="topbar-link d-inline-block" href="tel:{{$web_config['phone']}}">
                        <i class="fa fa-map-marker"></i> Track Your Order
                    </a>
                </div>
                <div class="mx-3 text-nowrap">
                    <a class="topbar-link d-inline-block dropdown-toggle" href="tel:{{$web_config['phone']}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell-o"></i> Notification
                    </a>
                    <div class="dropdown-menu notification-dropdown" aria-labelledby="dropdownMenuButton">
                        <div class="notification-dropdown-triangle"></div>
                        <a class="dropdown-item notification-dropdown-item d-block" href="#">
                            <div class="container">
                                <div class="notification-card row justify-content-between">
                                    <div class="col-10">
                                        <h6 class="notification-msg">Your order has been successfully delivered.</h6>
                                        <p class="notification-time">Jul 23, 2023 at 9:40 PM</p>
                                    </div>
                                    <div class="col-1">
                                        <img class="d-block" src="{{asset('assets/front-end/img/chat-icon.png')}}" style="width: 20px;" alt="">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <hr>
                        <a class="dropdown-item notification-dropdown-item d-block" href="#">
                            <div class="container">
                                <div class="notification-card row justify-content-between">
                                    <div class="col-10">
                                        <h6 class="notification-msg">Your order has been successfully delivered.</h6>
                                        <p class="notification-time">Jul 23, 2023 at 9:40 PM</p>
                                    </div>
                                    <div class="col-1">
                                        <img class="d-block" src="{{asset('assets/front-end/img/chat-icon.png')}}" style="width: 20px;" alt="">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-sticky bg-light mobile-head">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-none d-sm-block {{Session::get('direction') === "rtl" ? 'mr-3' : 'mr-3'}} flex-shrink-0 __min-w-7rem"
                   href="{{route('home')}}">
                    <img class="__inline-10 header-logo"
                         src="{{asset("application/storage/app/public/company")."/".$web_config['web_logo']}}"
                         onerror="this.src='{{asset('assets/front-end/img/logo.png')}}'"
                         alt="{{$web_config['name']}}"/>
                </a>
                <a class="navbar-brand d-sm-none {{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}}"
                   href="{{route('home')}}">
                    <img class="mobile-logo-img __inline-12"
                         src="{{asset("application/storage/app/public/company")."/".$web_config['mob_logo']}}"
                         onerror="this.src='{{asset('assets/front-end/img/logo.png')}}'"
                         alt="{{$web_config['name']}}"/>
                </a>
                <!-- Search-->
                <div class="input-group-overlay d-none d-lg-block mx-4"
                     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                    <form action="{{route('products')}}" type="submit" class="search_form">
                        <input class="form-control appended-form-control search-bar-input"
                               style="border-radius: 20px !important;" type="text"
                               autocomplete="off"
                               placeholder="{{\App\CPU\translate('Search here ...')}}"
                               name="name">
                        <button class="input-group-append-overlay search_button" type="submit"
                                style="background-color: transparent; border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 20px 20px 0px; left: unset; right: 0'}};top:0">
                                <span class="input-group-text __text-20px" style="color: #9D9FA1;">
                                    <i class="czi-search"></i>
                                </span>
                        </button>
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <diV class="card search-card __inline-13">
                            <div class="card-body search-result-box __h-400px overflow-x-hidden overflow-y-auto"></div>
                        </diV>
                    </form>
                </div>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">{{\App\CPU\translate('Expand Menu')}}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon czi-menu open-icon"></i>
                            <i class="navbar-tool-icon czi-close close-icon"></i>
                        </div>
                    </a>
                    <div class="navbar-tool dropdown {{Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'}}">
                        <a class="navbar-tool-icon-box dropdown-toggle" href="{{route('wishlists')}}">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist">{{session()->has('wish_list')?count(session('wish_list')):0}}</span>
                           </span>
                            <i class="navbar-tool-icon czi-heart"></i>
                            <p class="nav-tool-title">Wishlist</p>
                        </a>
                    </div>
                    @if(auth('customer')->check())
                        <div class="dropdown">
                            <a class="navbar-tool ml-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <img
                                            src="{{asset('application/storage/app/public/profile/'.auth('customer')->user()->image)}}"
                                            onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                            class="img-profile rounded-circle __inline-14">
                                    </div>
                                </div>
                                <!-- <div class="navbar-tool-text">
                                    <small>{{\App\CPU\translate('hello')}}, {{auth('customer')->user()->f_name}}</small>
                                    {{\App\CPU\translate('dashboard')}}
                                </div> -->
                            </a>
                            <div class="dropdown-menu" style="min-width: 157px !important;" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('user-account')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/account-icon.png')}}" alt="icon"><span>{{ \App\CPU\translate('my_Account')}}</span></div></a>
                                <a class="dropdown-item"
                                   href="{{route('account-oder')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/order-icon.png')}} " alt="icon"><span>{{ \App\CPU\translate('Order_History')}}</span></div> </a>

                                <a class="dropdown-item"
                                   href="{{route('wishlists')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/wishlist-icon.png')}} " alt="icon"><span>{{ \App\CPU\translate('My_Wishlist')}}</span></div></a>
                                <a class="dropdown-item"
                                   href="{{route('customer.auth.logout')}}"><div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/logout-icon.png')}} " alt="icon"><span>{{ \App\CPU\translate('logout')}}</span></div></a>
                            </div>
                        </div>
                    @else
                        <div class="dropdown">
                            <a class="navbar-tool {{Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'}}"
                               type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box">
                                    <div class="navbar-tool-icon-box">
                                        <img class="navbar-tool-usericon"
                                             src="{{asset('assets/front-end/img/user-icon.png')}}" alt="User">
                                        <p class="nav-tool-title">Account</p>
                                    </div>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu mt-2 __auth-dropdown dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                                aria-labelledby="dropdownMenuButton"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}; min-width: 157px !important;">
                                <button class="login-register-btn" data-toggle="modal" data-target="#reg-modal" id="btn-login-register">Login/Register</button>
                                <a class="dropdown-item"
                                   href="{{route('user-account')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/account-icon.png')}}" alt="icon"><span>{{ \App\CPU\translate('my_Account')}}</span></div></a>
                                <a class="dropdown-item"
                                   href="{{route('account-oder')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/order-icon.png')}} " alt="icon"><span>{{ \App\CPU\translate('Order_History')}}</span></div> </a>

                                <a class="dropdown-item"
                                   href="{{route('wishlists')}}"> <div><img style="width: 20px; height: 20px; margin-right: 10px;" src="{{asset('assets/front-end/img/wishlist-icon.png')}} " alt="icon"><span>{{ \App\CPU\translate('My_Wishlist')}}</span></div></a>

{{--                                <a class="dropdown-item" href="{{route('customer.auth.login')}}">--}}
{{--                                    <i class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}}"></i> {{\App\CPU\translate('sign_in')}}--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="{{route('customer.auth.sign-up')}}">--}}
{{--                                    <i class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}}"></i>{{\App\CPU\translate('sign_up')}}--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    @endif
                    <div id="cart_items">
                        @include('layouts.front-end.partials.cart')
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-stuck-menu">
            <div class="container px-10px">
                <div class="collapse navbar-collapse position-relative" id="navbarCollapse"
                     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}; ">

                    <!-- Search-->
                    <div class="input-group-overlay d-lg-none my-3">
                        <form action="{{route('products')}}" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                   autocomplete="off"
                                   placeholder="{{\App\CPU\translate('search')}}" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                    style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                            <span class="input-group-text __text-20px">
                                <i class="czi-search text-white"></i>
                            </span>
                            </button>
                            <diV class="card search-card __inline-13">
                                <div class="card-body search-result-box" id=""
                                     style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div>

                    @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
                    <ul class="navbar-nav navbar-nav-custom mega-nav mega-nav-custom pr-2 pl-2 position-static {{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}} d-none d-xl-block __mega-nav">
                        <li class="nav-item dropdown header-mega-btn position-static">
                            <a class="nav-link nav-link-custom dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                               data-toggle="dropdown" aria-expanded="false"
                               href="#" data-toggle="dropdown" style="{{request()->is('/')?'pointer-events: none':''}}">
                                <i class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'}}"></i>
                                <span
                                    style="margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 30px !important;margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 30px">
                                    {{ \App\CPU\translate('categories')}}
                                </span>
                            </a>
                            @if(request()->is('/false'))
                                <ul class="dropdown-menu w-100"
                                    style="{{Session::get('direction') === "rtl" ? 'margin-right: 1px!important;text-align: right;' : 'margin-left: -0px!important;text-align: left;'}}padding-bottom: 0px!important;">
                                    @foreach($categories as $key=>$category)
                                        @if($key<8)
                                            <li class="dropdown">
                                                <a class="dropdown-item flex-between"
                                                   <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'" ?> href="javascript:"
                                                   onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                                                    <div class="d-flex">
                                                        <img
                                                            src="{{asset("application/storage/app/public/category/$category->icon")}}"
                                                            onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                            class="__img-18">
                                                        <span
                                                            class="w-0 flex-grow-1 {{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>
                                                    </div>
                                                    @if ($category->childes->count() > 0)
                                                        <div>
                                                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __inline-15"></i>
                                                        </div>
                                                    @endif
                                                </a>
                                                @if($category->childes->count()>0)
                                                    <ul class="dropdown-menu"
                                                        style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                        @foreach($category['childes'] as $subCategory)
                                                            <li class="dropdown">
                                                                <a class="dropdown-item flex-between"
                                                                   <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'" ?> href="javascript:"
                                                                   onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                                                    <div>
                                                                        <span
                                                                            class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                                                    </div>
                                                                    @if ($subCategory->childes->count() > 0)
                                                                        <div>
                                                                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __inline-15"></i>
                                                                        </div>
                                                                    @endif
                                                                </a>
                                                                @if($subCategory->childes->count()>0)
                                                                    <ul class="dropdown-menu __r-100"
                                                                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                                        @foreach($subCategory['childes'] as $subSubCategory)
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="dropdown">
                                        <a class="dropdown-item text-capitalize text-center"
                                           href="{{route('categories')}}"
                                           style="color: {{$web_config['primary_color']}} !important;">
                                            {{\App\CPU\translate('view_more')}}

                                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __inline-15"></i>
                                        </a>
                                    </li>

                                </ul>
                            @else
                                <ul class="dropdown-menu w-100"
                                    style="margin-left: 0!important; right: 0; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    <div class="">
                                        <div class="row">

                                            <div class="col-md-3 pr-0 main-category">
                                                @foreach($categories as $key => $category)
                                                    <li class="main-category-navlink">
                                                        <a class="{{$key == 0 ? '': 'collapsed'}}"
                                                           @if(!count($category['childes']??[]))
                                                               href="javascript:"
                                                           onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'"
                                                           @else
                                                               href="#"
                                                           @endif
                                                           type="button" data-toggle="collapse"
                                                           data-target="#collapse{{$key}}" aria-expanded="true"
                                                           aria-controls="collapse{{$key}}">
                                                            {{$category['name']}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </div>
                                            <div class="col-md-9 px-5 py-3" >
                                                <div class="accordion" id="accordionExample">
                                                    <div class="">
                                                        @foreach($categories as $key => $category)
                                                            <div id="collapse{{$key}}" class="collapse {{$key == 0 ? ' show': ''}}"
                                                                 aria-labelledby="heading{{$key}}"
                                                                 data-parent="#accordionExample">
                                                                <div class="row">

                                                                    @foreach($category['childes'] as $subCategory)
                                                                        <div class="col-md-4">
                                                                            <a href="javascript:"
                                                                               onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'"
                                                                               class="submenu-heading">{{$subCategory['name']}}</a>
                                                                            @foreach($subCategory['childes'] as $subSubCategory)
                                                                                <li class="submenu-link">
                                                                                    <a href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </div>

                                                                        {{--                                                                <div class="col-md-4">--}}
                                                                        {{--                                                                    <p class="submenu-heading">LED TV</p>--}}
                                                                        {{--                                                                    <li class="submenu-link">--}}
                                                                        {{--                                                                        <a href="#">OLED TV</a>--}}
                                                                        {{--                                                                    </li>--}}
                                                                        {{--                                                                </div>--}}
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </ul>
                            @endif
                        </li>
                    </ul>

                    <ul class="navbar-nav mega-nav-custom pr-0 pl-2 d-block d-xl-none"><!--mobile-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                               href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                <span
                                    style="margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 20px !important;">{{ \App\CPU\translate('categories')}}</span>
                            </a>
                            <ul class="dropdown-menu __dropdown-menu-2"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach($categories as $category)
                                    <li class="dropdown">

                                        <a <?php if ($category->childes->count() > 0) echo "" ?>
                                           href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                            <img
                                                src="{{asset("application/storage/app/public/category/$category->icon")}}"
                                                onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                class="__img-18 ">
                                            <span
                                                class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>

                                        </a>
                                        @if ($category->childes->count() > 0)
                                            <a data-toggle='dropdown __ml-50px d-none'>
                                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __inline-16 d-none"></i>
                                            </a>
                                        @endif

                                        @if($category->childes->count()>0)
                                            <ul class="dropdown-menu"
                                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                @foreach($category['childes'] as $subCategory)
                                                    <li class="dropdown">
                                                        <a href="{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}">
                                                            <span
                                                                class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                                        </a>

                                                        @if($subCategory->childes->count()>0)
                                                            <a style="font-family:  sans-serif !important;font-size: 1rem;
                                                            font-weight: 300;line-height: 1.5;margin-left:50px;"
                                                               data-toggle='dropdown'>
                                                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __inline-16"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                @foreach($subCategory['childes'] as $subSubCategory)
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav navbar-nav-custom navbar-nav-primary-custom pl-2"
                        style="{{Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''}}">
                        <li class="nav-item dropdown d-flex {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('home')}}"> <img class="nav-icon-custom"
                                                                               src="{{asset('assets/front-end/img/home-icon.png')}}"
                                                                               alt="icon">{{ \App\CPU\translate('Home')}}
                            </a>
                        </li>
                        @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                        @if ($business_mode == 'multi')
                        <li class="nav-item dropdown d-flex {{request()->is('shop')?'active':''}}">
                            <a class="nav-link" href="{{route('shop')}}"> <img class="nav-icon-custom"
                                                                               src="{{asset('assets/front-end/img/shop.png')}}"
                                                                               alt="icon">{{ \App\CPU\translate('Shop')}}
                            </a>
                        </li>
                        @endif
                        @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count())
                        @if ($discount_product>0)
                            <li class="nav-item dropdown d-flex {{request()->is('products',['data_from'=>'discounted','page'=>1])?'active':''}}">
                                <a class="nav-link" href="{{route('products',['data_from'=>'discounted','page'=>1])}}">
                                    <img class="nav-icon-custom"
                                         src="{{asset('assets/front-end/img/hot-deal.png')}}"
                                         alt="icon">{{ \App\CPU\translate('Hot_Deals!')}}
                                </a>
                            </li>
                        @endif
                        @if(\App\Model\BusinessSetting::where(['type'=>'product_brand'])->first()->value)
                            <li class="nav-item dropdown d-flex {{request()->is('brands')?'active':''}}">
                                <a class="nav-link" href="{{route('brands')}}"> <img class="nav-icon-custom"
                                                                                     src="{{asset('assets/front-end/img/badge.png')}}"
                                                                                     alt="icon">{{ \App\CPU\translate('Top_Brands')}}
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown d-flex {{request()->is('/earn-coin')?'active':''}}">
                            <a class="nav-link" href="{{route('home')}}"> <img class="nav-icon-custom"
                                                                               src="{{asset('assets/front-end/img/loiality-icon.png')}}"
                                                                               alt="icon">{{ \App\CPU\translate('Earn_coins')}}
                            </a>
                        </li>

                        {{--                        @if(\App\Model\BusinessSetting::where(['type'=>'product_brand'])->first()->value)--}}
                        {{--                            <li class="nav-item dropdown ">--}}
                        {{--                                <a class="nav-link dropdown-toggle" href="#"--}}
                        {{--                                   data-toggle="dropdown">{{ \App\CPU\translate('brand') }}</a>--}}
                        {{--                                <ul class="dropdown-menu __dropdown-menu-sizing dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} scroll-bar"--}}
                        {{--                                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">--}}
                        {{--                                    @foreach(\App\CPU\BrandManager::get_active_brands() as $brand)--}}
                        {{--                                        <li class="__inline-17">--}}
                        {{--                                            <div>--}}
                        {{--                                                <a class="dropdown-item"--}}
                        {{--                                                   href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">--}}
                        {{--                                                    {{$brand['name']}}--}}
                        {{--                                                </a>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="align-baseline">--}}
                        {{--                                                @if($brand['brand_products_count'] > 0 )--}}
                        {{--                                                    <span class="count-value px-2">( {{ $brand['brand_products_count'] }} )</span>--}}
                        {{--                                                @endif--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                    <li class="__inline-17">--}}
                        {{--                                        <div>--}}
                        {{--                                            <a class="dropdown-item" href="{{route('brands')}}"--}}
                        {{--                                               style="color: {{$web_config['primary_color']}} !important;">--}}
                        {{--                                                {{ \App\CPU\translate('View_more') }}--}}
                        {{--                                            </a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}
                        {{--                        @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count())--}}
                        {{--                        @if ($discount_product>0)--}}
                        {{--                            <li class="nav-item dropdown {{request()->is('/discounted-products')?'active':''}}">--}}
                        {{--                                <a class="nav-link text-capitalize"--}}
                        {{--                                   href="{{route('products',['data_from'=>'discounted','page'=>1])}}">{{ \App\CPU\translate('discounted_products')}}</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}

                        @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                        @if ($business_mode == 'multi')
                            <li class="nav-item dropdown d-none {{request()->is('/sellers')?'active':''}}">
                                <a class="nav-link" href="{{route('sellers')}}">{{ \App\CPU\translate('Sellers')}}</a>
                            </li>

                            @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                            @if($seller_registration)
                                <li class="nav-item ml-lg-auto mb-2 mb-lg-0 ">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle seller-service-btn" type="button"
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        >
                                            {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('zone')}}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-seller __dropdown-menu-3"
                                             aria-labelledby="dropdownMenuButton"
                                             style="min-width: 100% !important; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                            <a class="dropdown-item" href="{{route('shop.apply')}}">
                                                {{ \App\CPU\translate('Become a')}} {{ \App\CPU\translate('Seller')}}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                                {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('login')}}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
@push('script')
    <script>
        function myFunction() {
            $('#anouncement').slideUp(300)
        }
    </script>
@endpush
