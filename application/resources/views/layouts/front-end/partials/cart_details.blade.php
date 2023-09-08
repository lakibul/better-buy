<div class="mb-2">
    <span
        style="font-size:24px!important; font-weight:700!important; color:#000000!important;">{{ \App\CPU\translate('shopping_Cart')}}</span>
</div>

@php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))
@php($cart=\App\Model\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id'))

<div class="row g-3">
    <!-- List of items-->
    <section class="col-lg-8">

        @foreach(@$cart as $group_key=>$group)
            <div class="">
                @foreach(@$group as $cart_key=>$cartItem)
                    @if (@$shippingMethod=='inhouse_shipping')

                        @php($admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first())
                        @php($shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise')

                    @else
                        @if (@$cartItem->seller_is == 'admin')
                            @php($admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first())
                            @php($shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise')
                        @else
                            @php($seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first())
                            ;
                            @php($shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise')
                        @endif
                    @endif

                    @if($cart_key==0)
                        <div class="card-header d-none">
                            @if($cartItem->seller_is=='admin')
                                <b>
                                    <span>{{ \App\CPU\translate('shop_name')}} : </span>
                                    <a href="{{route('shopView',['id'=>0])}}">{{\App\CPU\Helpers::get_business_settings('company_name')}}</a>
                                </b>
                            @else
                                <b>
                                    <span>{{ \App\CPU\translate('shop_name')}}:</span>
                                    <a href="{{route('shopView',['id'=>$cartItem->seller_id])}}">
                                        {{\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name}}
                                    </a>
                                </b>
                            @endif
                        </div>
                    @endif
                @endforeach
                <!-- product table start-->
                <div class="table-responsive">
                    <table
                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                        <thead class="thead-light d-none">
                        <tr class="">
                            <th class="font-weight-bold __w-5p">{{\App\CPU\translate('SL#')}}</th>
                            @if ( $shipping_type != 'order_wise')
                                <th class="font-weight-bold __w-30p">{{\App\CPU\translate('product_details')}}</th>
                            @else
                                <th class="font-weight-bold __w-45">{{\App\CPU\translate('product_details')}}</th>
                            @endif
                            <th class="font-weight-bold __w-15p">{{\App\CPU\translate('unit_price')}}</th>
                            <th class="font-weight-bold __w-15p">{{\App\CPU\translate('qty')}}</th>
                            <th class="font-weight-bold __w-15p">{{\App\CPU\translate('price')}}</th>
                            @if ( $shipping_type != 'order_wise')
                                <th class="font-weight-bold __w-15p">{{\App\CPU\translate('shipping_cost')}} </th>
                            @endif
                            <th class="font-weight-bold __w-5p"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @php($physical_product = false)
                        @foreach ($group as $row)
                            @if ($row->product_type == 'physical')
                                @php($physical_product = true)

                            @endif
                        @endforeach
                        @foreach($group as $cart_key=>$cartItem)
                            <tr>
                                <!--start-->
                                <div class="card-product-info">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center text-md-start">
                                            <a href="{{route('product',$cartItem['slug'])}}">
                                                <img class="rounded cart-product-img"
                                                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                                     alt="Product">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <div
                                                class="text-break __line-2  d-flex justify-centent-between flex-column flex-md-row">
                                                <div class="cart-item-name"><a
                                                        href="{{route('product',$cartItem['slug'])}}">{{$cartItem['name']}}</a>
                                                </div>
                                                <span class="cart-shipping-charge mt-2">Shipping Charge <span
                                                        class="ml-1">FREE</span></span>
                                            </div>
                                            <div
                                                class="row cart-price-details align-items-center justify-content-start">
                                                <div
                                                    class="text-accent cart-unit-price col-3 col-md-2">{{\App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount']) }}</div>
                                                @if($cartItem['discount'] > 0)
                                                    <div class="discount-price col-3 col-md-2">
                                                        <strike class="__inline-18 m-sm-0">
                                                            {{\App\CPU\Helpers::currency_converter($cartItem['price'])}}
                                                        </strike>
                                                    </div>
                                                @endif
                                                <div class="col-12 col-md-5">CG|Coins<span
                                                        style="color:#161D25; font-weight:500;"><img
                                                            src="{{asset('assets/front-end/img/loiality-icon.png')}}"
                                                            alt="" class="img-fluid cg-coin mx-1">947.95</span></div>
                                            </div>

                                            <div class="row dropdown-cart-product-quantity custom-wrapper pl-md-3 pl-2">
                                                <div class="d-flex align-items-center col-md-6">
                                                    <label for="">QTY : </label>
                                                    <div class="product-count custom-wrapper" id="cart-qty">
                                                        @php($minimum_order=\App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))
                                                        <button class="product-dlt-btn col-4" onclick="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}', 'minus')">-
                                                        </button>

                                                        <input class="text-center col-4 cart-qty-input product-qty" type="number"
                                                               name="quantity[{{ $cartItem['id'] }}]"
                                                               id="cartQuantity{{$cartItem['id']}}"
                                                               onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}')"
                                                               min="{{ $minimum_order->minimum_order_qty ?? 1 }}"
                                                               value="{{$cartItem['quantity']}}">

                                                        <button class="product-add-btn col-4"  onclick="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}', 'plus')">+
                                                        </button>
                                                    </div>
                                                    {{--                                    <label for="">QTY : </label>--}}
                                                    {{--                                    <div class="ml-2">--}}
                                                    {{--                                        @php($minimum_order=\App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))--}}
                                                    {{--                                        <input class="__cart-input text-center" type="number" name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"--}}
                                                    {{--                                        onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}')" min="{{ $minimum_order->minimum_order_qty ?? 1 }}" value="{{$cartItem['quantity']}}">--}}
                                                    {{--                                    </div>--}}
                                                </div>
                                                <div class="cart-coupon ml-auto">
                                                    <p class="coupon-name">CGD525HEHA</p>
                                                    <p class="coupon-discount">5% Off Coupons</p>
                                                </div>
                                            </div>
                                            <hr class="mt-md-5 mb-md-2 mt-2 mb-1">
                                            <div
                                                class="cart-card-footer d-flex justify-content-between align-items-center">
                                                <div class="sub-total"><span>Subtotal:</span><span
                                                        class="sub-total-amount">
                                        {{ \App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}</span>
                                                </div>
                                                <div class="cart-product-remove">
                                                    <button class="btn btn-link" style="color:#161D25; font-weight:500;"
                                                            onclick="removeFromCart({{ $cartItem['id'] }})"
                                                            type="button">
                                                        <i class="fa fa-trash-o {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"
                                                           aria-hidden="true"></i>
                                                        Remove
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end-->
                                {{--                                <td>{{$cart_key+1}}</td>--}}
                                {{--                                <td>--}}
                                {{--                                    <div class="d-flex">--}}
                                {{--                                        <div class="__w-30p">--}}
                                {{--                                            <a href="{{route('product',$cartItem['slug'])}}">--}}
                                {{--                                                <img class="rounded __img-62"--}}
                                {{--                                                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"--}}
                                {{--                                                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"--}}
                                {{--                                                     alt="Product">--}}
                                {{--                                            </a>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="ml-2 text-break __line-2 __w-70p">--}}
                                {{--                                            <a href="{{route('product',$cartItem['slug'])}}">{{$cartItem['name']}}</a>--}}

                                {{--                                        </div>--}}

                                {{--                                    </div>--}}
                                {{--                                    <div class="d-flex">--}}

                                {{--                                        @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)--}}
                                {{--                                            <div class="text-muted mr-2">--}}
                                {{--                                                    <span class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} __text-12px">--}}
                                {{--                                                       {{$key1}} : {{$variation}}</span>--}}

                                {{--                                            </div>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                                {{--                                <td>--}}
                                {{--                                    <div class=" text-accent">{{ \App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount']) }}</div>--}}
                                {{--                                    @if($cartItem['discount'] > 0)--}}
                                {{--                                        <strike class="__inline-18">--}}
                                {{--                                            {{\App\CPU\Helpers::currency_converter($cartItem['price'])}}--}}
                                {{--                                        </strike>--}}
                                {{--                                    @endif--}}

                                {{--                                </td>--}}
                                {{--                                <td>--}}
                                {{--                                    <div>--}}
                                {{--                                        @php($minimum_order=\App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))--}}
                                {{--                                        <input class="__cart-input" type="number" name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"--}}
                                {{--                                               onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}')" min="{{ $minimum_order->minimum_order_qty ?? 1 }}" value="{{$cartItem['quantity']}}">--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                                {{--                                <td>--}}
                                {{--                                    <div>--}}
                                {{--                                        {{ \App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                                {{--                                <td>--}}
                                {{--                                    @if ( $shipping_type != 'order_wise')--}}
                                {{--                                        {{ \App\CPU\Helpers::currency_converter($cartItem['shipping_cost']) }}--}}
                                {{--                                    @endif--}}
                                {{--                                </td>--}}
                                {{--                                <td>--}}
                                {{--                                    <button class="btn btn-link px-0 text-danger"--}}
                                {{--                                            onclick="removeFromCart({{ $cartItem['id'] }})" type="button"><i--}}
                                {{--                                            class="czi-close-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>--}}
                                {{--                                    </button>--}}
                                {{--                                </td>--}}
                            </tr>

                            @if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise')
                                @php($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())

                                @if(isset($choosen_shipping)==false)
                                    @php($choosen_shipping['shipping_method_id']=0)
                                @endif

                                @php($shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is']))
                                <tr>
                                    <td colspan="4">

                                        @if($cart_key==$group->count()-1)

                                            <!-- choosen shipping method-->

                                            <div class="row">

                                                <div class="col-12">
                                                    <select class="form-control"
                                                            onchange="set_shipping_id(this.value,'{{$cartItem['cart_group_id']}}')">
                                                        <option>{{\App\CPU\translate('choose_shipping_method')}}</option>
                                                        @foreach($shippings as $shipping)
                                                            <option
                                                                value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                                                {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        @endif
                                    </td>
                                    <td colspan="3">
                                        @if($cart_key==$group->count()-1)
                                            <div class="row">
                                                <div class="col-12">
                                            <span>
                                                <b>{{\App\CPU\translate('shipping_cost')}} : </b>
                                            </span>
                                                    {{\App\CPU\Helpers::currency_converter($choosen_shipping['shipping_method_id']!= 0?$choosen_shipping->shipping_cost:0)}}
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--product table end-->

            </div>
        @endforeach

        @if($shippingMethod=='inhouse_shipping')
                <?php
                $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                ?>
            @if ($shipping_type == 'order_wise')
                @php($shippings = \App\CPU\Helpers::get_shipping_methods(1,'admin'))
                @php($choosen_shipping = \App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())

                @if(isset($choosen_shipping)==false)
                    @php($choosen_shipping['shipping_method_id']=0)
                @endif
                <div class="row">
                    <div class="col-12">
                        <select class="form-control" onchange="set_shipping_id(this.value,'all_cart_group')">
                            <option>{{\App\CPU\translate('choose_shipping_method')}}</option>
                            @foreach($shippings as $shipping)
                                <option
                                    value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                    {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endif

        @if( $cart->count() == 0)
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="text-danger text-capitalize">{{\App\CPU\translate('cart_empty')}}</h4>
            </div>
        @endif


        <form method="get">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="phoneLabel" class="form-label input-label">{{\App\CPU\translate('order_note')}}<span
                                class="input-label-secondary">({{\App\CPU\translate('Optional')}})</span></label>
                        <textarea class="form-control w-100" id="order_note"
                                  name="order_note">{{ session('order_note')}}</textarea>
                    </div>
                </div>
            </div>
        </form>


        {{--        <div class="d-flex btn-full-max-sm align-items-center __gap-6px flex-wrap justify-content-between">--}}
        {{--            <a href="{{route('home')}}" class="btn btn--primary">--}}
        {{--                <i class="fa fa-{{Session::get('direction') === "rtl" ? 'forward' : 'backward'}} px-1"></i> {{\App\CPU\translate('continue_shopping')}}--}}
        {{--            </a>--}}
        {{--            <a onclick="checkout()"--}}
        {{--               class="btn btn--primary pull-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">--}}
        {{--                {{\App\CPU\translate('checkout')}}--}}
        {{--                <i class="fa fa-{{Session::get('direction') === "rtl" ? 'backward' : 'forward'}} px-1"></i>--}}
        {{--            </a>--}}
        {{--        </div>--}}
    </section>
    <!-- Sidebar-->
    @include('web-views.partials._order-summary')
    <nav class="navbar checkout-bottom-navbar __rounded-10" id="checkout-bottom-navbar">
        <div class="container py-3">
            <div class="row flex-wrap w-100 justify-content-between align-items-center">
                <div style="color: #222F3E;" class="price-section d-flex d-sm-block w-sm-auto">
                    <img src="{{asset('assets/front-end/img/save-cart.png')}}" alt="cart icon"
                         class="cart-save-img img-fluid">
                    <a href="#" class="save-cart">Save Cart</a>
                </div>
                <div class="btn-section d-flex justify-content-sm-end justify-content-between align-items-center">
                    <a href="{{route('home')}}" class="continue-shopping-btn mr-5">
                        {{\App\CPU\translate('continue_shopping')}}
                    </a>
                    <a onclick="checkout()"
                       class="checkout-btn pull-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                        {{\App\CPU\translate('checkout')}}

                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

@push('script')
    <script>
        function checkOffset() {
            if ($('#checkout-bottom-navbar').offset().top + $('#checkout-bottom-navbar').height()
                >= $('#footer-wrapper').offset().top - 10)
                $('#checkout-bottom-navbar').css('position', 'absolute');
            if ($(document).scrollTop() + window.innerHeight < $('#footer-wrapper').offset().top)
                $('#checkout-bottom-navbar').css('position', 'fixed');
        }

        $(document).scroll(function () {
            checkOffset();
        });
    </script>
    <script>
        cartQuantityInitialize();

        function set_shipping_id(id, cart_group_id) {
            $.get({
                url: '{{url('/')}}/customer/set-shipping-method',
                dataType: 'json',
                data: {
                    id: id,
                    cart_group_id: cart_group_id
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function () {
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
    <script>
        type = "text/javascript" >
            cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        $(document).ready(function () {
            $('.click-img').click(function () {
                var idimg = $(this).attr('id');
                var srcimg = $(this).attr('src');
                $(".show-imag").attr('src', srcimg);
            });
        });

        function checkout() {
            let order_note = $('#order_note').val();
//console.log(order_note);
            $.post({
                url: "{{route('order_note')}}",
                data: {
                    _token: '{{csrf_token()}}',
                    order_note: order_note,

                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function () {
                    location.href = "{{ route('checkout-details') }}";
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

    </script>
@endpush

