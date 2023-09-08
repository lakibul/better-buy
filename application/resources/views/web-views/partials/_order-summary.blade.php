<style>
    .cart_title {
        font-weight: 400 !important;
        font-size: 16px;
    }

    .cart_value {
        font-weight: 600 !important;
        font-size: 16px;
    }

    .cart_total_value {
        font-weight: 700 !important;
        font-size: 25px !important;
        color: {{$web_config['primary_color']}}       !important;
    }
</style>

<aside class="col-lg-4 pt-4 pt-lg-2">
    <div class="__cart-total">
        <div class="cart_total">

            @if(isset($is_payment_checkout))
                <div class="w-100 order-summery-cart-list">


                    <div class="d-flex align-items-center order-summery-title"><span><i class="fa fa-check"></i></span>
                        <h5 class="mb-0">Order Summary</h5></div>
                    <div class="w-100 order-summery-list-wrapper">
                        @php($cart=\App\CPU\CartManager::get_cart())
                        @if($cart->count() > 0)
                            @foreach($cart as $key => $cartItem)
                                <div class="d-flex align-items-center border-bottom py-2">
                                    @php($product=\App\Model\Product::select('images')->find($cartItem['product_id']))
                                        <img class="order-summery-list-main-img mr-2"
                                             onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                             src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                             alt="Product image">
                                    <div class="order-summery-list-info">
                                        <p class="mb-1"
                                           style="font-weight: 500;font-size: 14px;color: #161D25;">{{Str::limit($cartItem['name'], 35)}}</p>
                                        <div class="d-flex">
                                            <p class="mb-1" style="font-weight: 500;font-size: 14px;color: #161D25;">
                                                <span>{{$cartItem['quantity']}}</span><i
                                                    class="fa fa-close px-2"></i><span>{{\App\CPU\Helpers::set_symbol($cartItem['price'])}}</span>
                                            </p>
                                            <span class="px-2 position-relative"
                                                  style="color: #D9D9D9;top: -2px;">|</span>
                                            <p class="mb-1" style="font-weight: 500;font-size: 14px;color: #161D25;">
                                                <img
                                                    style="width: 13px; margin-right: 5px"
                                                    src="{{asset('assets/front-end/img/loiality-icon.png')}}"
                                                    alt="Loiality point">980</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif

            @php($sub_total=0)
            @php($total_tax=0)
            @php($total_shipping_cost=0)
            @php($total_discount_on_product=0)
            @php($cart=\App\CPU\CartManager::get_cart())
            @php($shipping_cost=\App\CPU\CartManager::get_shipping_cost())
            @if($cart->count() > 0)
                @foreach($cart as $key => $cartItem)
                    @php($sub_total+=$cartItem['price']*$cartItem['quantity'])
                    @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                    @php($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity'])
                @endforeach
                @php($total_shipping_cost=$shipping_cost)
            @else
                <span>{{\App\CPU\translate('empty_cart')}}</span>
            @endif
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('sub_total')}}</span>
                <span class="cart-order-value">
                    {{\App\CPU\Helpers::currency_converter($sub_total)}}
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('tax')}}</span>
                <span class="cart-order-value">
                    {{\App\CPU\Helpers::currency_converter($total_tax)}}
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('shipping_charge')}}</span>
                <span class="cart-order-value" style="color:#77b847; font-weight:500; font-size:16px">
                    {{\App\CPU\Helpers::currency_converter($total_shipping_cost)}}
                </span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('product_discount')}}(s)</span>
                <span class="cart-order-value">
                    - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('coupon_discount')}}(s)</span>
                <span class="cart-order-value">
                    - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="cart_title cart-order-title">{{\App\CPU\translate('redeem_amount')}}(s)</span>
                <span class="cart-order-value">
                    - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}
                </span>
            </div>
            <p style="color:#77b847; font-size:14px; font-weight:400;">You will get<span class="mr-1"><img
                        src="{{asset('assets/front-end/img/loiality-icon.png')}}" alt="" class="img-fluid cg-coin mx-1">568</span>with
                this Purchase</p>
            <!-- @if(session()->has('coupon_discount'))
                <div class="d-flex justify-content-between">
                    <span class="cart_title cart-order-title">{{\App\CPU\translate('coupon_discount')}}(s)</span>
                    <span class="cart_value" id="coupon-discount-amount">
                        - {{session()->has('coupon_discount')?\App\CPU\Helpers::currency_converter(session('coupon_discount')):0}}
                </span>
            </div>
@php($coupon_dis=session('coupon_discount'))
            @else
                <div class="pt-2">
                    <form class="needs-validation" action="javascript:" method="post" novalidate id="coupon-code-ajax">
                        <div class="form-group">
                            <input class="form-control input_code" type="text" name="code" placeholder="{{\App\CPU\translate('Coupon code')}}"
                                required>
                            <div class="invalid-feedback">{{\App\CPU\translate('please_provide_coupon_code')}}</div>
                        </div>
                        <button class="btn btn--primary btn-block" type="button" onclick="couponCode()">{{\App\CPU\translate('apply_code')}}
                </button>
            </form>
        </div> -->
                @php($coupon_dis=0)
            @endif
            <hr class="mt-2 mb-2">
            <div class="d-flex justify-content-between">
                <span class="cart_title">{{\App\CPU\translate('total')}}</span>
                <span class="cart_value" style="color:#77b847;">
                {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product)}}
                </span>
            </div>

            {{-- <div class="d-flex justify-content-center">
                <span class="cart_total_value mt-2">
                    {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product)}}
                </span>
            </div> --}}
        </div>
        <div class="container mt-2 d-none">
            <div class="row p-0">
                <div class="col-md-3 p-0 text-center mobile-padding">
                    <img class="order-summery-footer-image" src="{{asset("assets/front-end/png/delivery.png")}}" alt="">
                    <div class="deal-title">3 {{\App\CPU\translate('days_free_delivery')}} </div>
                </div>

                <div class="col-md-3 p-0 text-center">
                    <img class="order-summery-footer-image" src="{{asset("assets/front-end/png/money.png")}}" alt="">
                    <div class="deal-title">{{\App\CPU\translate('money_back_guarantee')}}</div>
                </div>
                <div class="col-md-3 p-0 text-center">
                    <img class="order-summery-footer-image" src="{{asset("assets/front-end/png/Genuine.png")}}" alt="">
                    <div class="deal-title">
                        100% {{\App\CPU\translate('genuine')}} {{\App\CPU\translate('product')}}</div>
                </div>
                <div class="col-md-3 p-0 text-center">
                    <img class="order-summery-footer-image" src="{{asset("assets/front-end/png/Payment.png")}}" alt="">
                    <div class="deal-title">{{\App\CPU\translate('authentic_payment')}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-coupon-sec">

        <div class="coupon-header d-flex align-items-center justify-content-between">
            <div class="coupon-heading d-flex align-items-center">
                <img src="{{asset('assets/front-end/img/coupon-icon.png')}}" alt="" class="img-fluid">
                <span class="ml-2">Check for Coupons</span>
            </div>
            <div class="offer-modal-launcher">
                <!-- Button trigger modal -->
                <button type="button" class="launch-coupon-btn" data-toggle="modal" data-target="#coupon-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        @if(session()->has('coupon_discount'))
            <div class="d-flex justify-content-between">
                <span class="cart_title">{{\App\CPU\translate('coupon_discount')}}(s)</span>
                <span class="cart_value" id="coupon-discount-amount">
                        - {{session()->has('coupon_discount')?\App\CPU\Helpers::currency_converter(session('coupon_discount')):0}}
                    </span>
            </div>
            @php($coupon_dis=session('coupon_discount'))
        @else
            <div class="pt-2">
                <div class="coupon-code-input">
                    <form class="needs-validation" action="javascript:" method="post" novalidate id="coupon-code-ajax">
                        <input type="text" placeholder="Enter Coupon Code">
                        <button type="button" onclick="couponCode()">{{\App\CPU\translate('apply')}}</button>
                    </form>
                </div>

                <div class="invalid-feedback">{{\App\CPU\translate('please_provide_coupon_code')}}</div>

            </div>
            <!--  @php($coupon_dis=0)
        @endif
        <hr class="mt-2 mb-2">
        <div class="d-flex justify-content-between">
            <span class="cart_title">{{\App\CPU\translate('total')}}</span>
                <span class="cart_value">
                {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product)}}
        </span>
    </div>-->

        <hr>
        <div class="current-cg-coins">
            <h3>Current CG|Coins:</h3>
            <div class="d-flex justify-content-between align-items-center">
                <span class="cg-coin-point"><img src="{{asset('assets/front-end/img/loiality-icon.png')}}" alt=""
                                                 class="img-fluid cg-coin mr-2">200</span>
                <a href="" class="redeem-btn">Redeem</a></div>
        </div>
    </div>
    <!--offer modal start-->


    <!-- Modal -->
    <div class="modal fade" id="coupon-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 653px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none; padding:10px 20px;">
                    <h5 class="modal-title" id="exampleModalLabel">Offers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding:5px 20px;">
                    <div class="coupon-input">
                        <div class="d-flex justify-content-between align-items-center"><input type="text">
                            <button class="coupon-input-btn">Remove</button>
                        </div>
                        <p>Availability of the coupon in the list depends on the items added on the cart.</p>
                    </div>

                    <div class="coupon-details-card" style="padding:15px 0;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="coupon-code-label">
                                    <span>HBVYGC70</span>
                                </div>
                                <p class="coupon-save">You Save <span
                                        class="coupon-amont coupon-modal-bold-text">₹300</span></p>
                            </div>
                            <button class="coupon-appply-btn"><span class="check-icon-bg"><i class="fa fa-check"
                                                                                             aria-hidden="true"></i></span>Applied
                            </button>
                        </div>
                        <p class="coupon-text">Get 15% instant discount on purchase above Rs.500 | Valid on AU Small
                            Finance Bank Limited Debit & Credit Cards.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="coupon-validitiy my-0">Valid till:<span
                                    class="coupon-date coupon-modal-bold-text">31 Mar 2023</span></p>
                            <p class="coupon-max-discount my-0">Max Discount:<span
                                    class="coupon-amount coupon-modal-bold-text">₹300</span></p>
                        </div>
                    </div>
                    <div class="coupon-details-card" style="padding:15px 0;">
                        <div class="coupon-code-label">
                            <span>HBVYGC70</span>
                        </div>
                        <p class="coupon-save">You Save <span class="coupon-amont coupon-modal-bold-text">₹300</span>
                        </p>
                        <p class="coupon-text">Get 15% instant discount on purchase above Rs.500 | Valid on AU Small
                            Finance Bank Limited Debit & Credit Cards.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="coupon-validitiy my-0">Valid till:<span
                                    class="coupon-date coupon-modal-bold-text">31 Mar 2023</span></p>
                            <p class="coupon-max-discount my-0">Max Discount:<span
                                    class="coupon-amount coupon-modal-bold-text">₹300</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--offer modal end-->
</aside>
