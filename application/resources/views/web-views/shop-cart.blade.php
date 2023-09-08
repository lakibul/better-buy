@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Shopping Cart'))

@push('css_or_js')
    <meta property="og:image" content="{{asset('application/storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="{{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('application/storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="{{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">
    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/shop-cart.css"/>
@endpush

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Cart</li>
            </ol>
        </nav>
    </div>
    <div class="container pb-5 mb-2 rtl position-relative" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}; padding-bottom: 100px!important;" id="cart-summary">
        @include('layouts.front-end.partials.cart_details')
    </div>
@endsection

@push('script')
    <script>
        cartQuantityInitialize();
    </script>
@endpush
