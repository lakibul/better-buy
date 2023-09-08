@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Complete'))

@push('css_or_js')
    <style>

        .spanTr {
            color: {{$web_config['primary_color']}};
        }

        .amount {
            color: {{$web_config['primary_color']}};
        }

        @media (max-width: 600px) {
            .orderId {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 91px;
            }
        }
        /*  */
    </style>
@endpush

@section('content')
<section class="order-complete-page">
    <div class="container mt-5 mb-5 rtl __inline-53"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-5 col-lg-5">
                <div class="order-success-img">
                    <picture>
                        <img src="{{asset('assets/front-end/img/order-success.png')}}" alt="" class="img-fluid">
                    </picture>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="card custom-card">
                    @if(auth('customer')->check())

                        <div class="order-success-right text-center">
                            <h2 class="font-black __text-20px order-tnx-msg">{{\App\CPU\translate('Thank_you_for_your_Shopping!')}}!</h2>
                            <div class="mx-auto order-success-icon">
                            <picture>
                                <img src="{{asset('assets/front-end/img/order-success-icon.png')}}" alt="" class="img-fluid">
                            </picture>
                            </div>
                            <span class="font-weight-bold d-block mt-4 __text-17px customer-name">{{\App\CPU\translate('Hello')}}, {{auth('customer')->user()->f_name}}</span>
                            <span class="order-success-msg">{{\App\CPU\translate('Your order was successfully completed')}}</span>
                            <p class="cg-coin-text">You have earned CG|Coins <span class="cg-coin-icon"><picture><img src="{{asset('assets/front-end/img/loiality-icon.png')}}" alt="" class="img-fluid"></picture><span class="customer-cg-point"> 568 </span> with this purchase</p>
                            <p class="tracking-id-container mb-0"><span class="order-details-label">Tracking ID : </span> <span class="tracking-id order-details-value">1866 67656756</span></p>
                            <p class="delivery-date-container mb-0"> <span class="order-details-label">Estimated Date of Delivery : </span><span class="delivery-date order-details-value">2 Jan, 2023</span></p>
                            <p class="mb-0"><a href="#" class="tc">Terms & Conditions</a></p>
                            <button class="home-page-btn">Continue To Homepage</button>
                        </div>

                        <!-- <div class=" p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-black __text-20px">{{\App\CPU\translate('Thank_you_for_your_Shopping!')}}
                                        !</h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <center>
                                        <i class="fa fa-check-circle __text-100px __color-0f9d58"></i>
                                    </center>
                                </div>
                            </div>

                            <span class="font-weight-bold d-block mt-4 __text-17px">{{\App\CPU\translate('Hello')}}, {{auth('customer')->user()->f_name}}</span>
                            <span>{{\App\CPU\translate('You order has been confirmed and will be shipped according to the method you selected!')}}</span>

                            <div class="row mt-4">
                                <div class="col-6">
                                    <a href="{{route('home')}}" class="btn btn--primary">
                                        {{\App\CPU\translate('go_to_shopping')}}
                                    </a>
                                </div>

                                <div class="col-6">
                                    <a href="{{route('account-oder')}}"
                                       class="btn btn-secondary pull-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        {{\App\CPU\translate('check_orders')}}
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')

@endpush
