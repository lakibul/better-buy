@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Wishlists'))

@section('content')
    <!-- Page Content-->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>
    <div class="container rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">

        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->

            <section class="col-lg-9 col-md-9">
            <div class="wishlist-head">
             <div class="wishlist-head-wrapper d-flex align-items-center">
                <div class="wishlist-icon">
                     <img src="{{asset('assets/front-end/img/wishlist-icon.png')}}" class="img-fluid mr-1" alt="">
                </div>
                 <h3 class="headerTitle my-1 text-center wishlist-header-title">{{\App\CPU\translate('Wishlist')}}</h3>
            </div>
            <hr>
         </div>
                <!-- Item-->
                <div class="row" id="set-wish-list">
                    @include('web-views.partials._wish-list-data',['wishlists'=>$wishlists, 'brand_setting'=>$brand_setting])
                </div>

            </section>
        </div>
    </div>
@endsection
