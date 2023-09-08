{{--code improved Md. Al imrun Khandakar--}}
<div class="navbar-tool dropdown {{Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'}}"
     style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px">
    <a class="navbar-tool-icon-box dropdown-toggle" href="{{route('shop-cart')}}"> <!--{{route('shop-cart')}} -->
        <span class="navbar-tool-label">
            @php($cart=\App\CPU\CartManager::get_cart())
            {{$cart->count()}}
        </span>
        <i class="navbar-tool-icon czi-cart"></i>
        <p class="nav-tool-title">Cart</p>
    </a>
    <!-- <a class="navbar-tool-text {{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}}" href="{{route('shop-cart')}}"><small>{{\App\CPU\translate('my_cart')}}</small>
        {{\App\CPU\Helpers::currency_converter(\App\CPU\CartManager::cart_total_applied_discount(\App\CPU\CartManager::get_cart()))}}
    </a> -->
    <!-- Cart dropdown-->
    <div class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __w-20rem ">
        <div class="dropdown-cart-header">
            <h2 class="dropdown-cart-heading">Your Cart ( {{$cart->count()}} items )</h2>
        </div>
        <div class="widget widget-cart dropdown-cart-bg">


            @if($cart->count())

                <div class="__h-15rem cart-body-height" data-simplebar data-simplebar-auto-hide="false">

                    @php($sub_total=0)
                    @php($total_tax=0)

                    @foreach($cart as  $cartItem)

                        <div class="widget-cart-item-custom pb-2">

                            <div class="media">
                                <a class="d-block {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                   href="{{route('product',$cartItem['slug'])}}">
                                    <img width="40"
                                         onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                         src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a>
                                    </h6>
                                    @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                        <span class="__text-14px">{{$key}} : {{$variation}}</span>
                                    @endforeach

                                    <div class="widget-product-meta">

                                        <div class="dropdown-cart-price-container">
                                            <div class="dropdown-cart-price-wrapper">
                                                @if(auth('customer')->check())
                                                <div class="dropdown-cart-discount-perc text-nowrap col-3">
                                            <span>

                                                    @if (($cartItem->product->discount_type  == 'percent') )
                                                        {{round($cartItem->product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))}}
                                                        %
                                                    @elseif($cartItem->product->discount_type =='flat' )
                                                        {{\App\CPU\Helpers::currency_converter($cartItem->product->discount)}}
                                                    @endif

                                                {{\App\CPU\translate('off')}}</span>

                                                </div>
                                                @endif
                                                <div class="dropdown-cart-discount-price col-4">
                                        <span
                                            class="text-accent {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                                {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}
                                        </span>
                                                </div>
                                                <div class="dropdown-cart-original-price col-4">
                                                    <span><del>{{\App\CPU\Helpers::currency_converter(($cartItem['price'])*$cartItem['quantity'])}}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        @php($minimum_order=\App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))
                                        <div class="dropdown-cart-product-quantity custom-wrapper">
                                            <label for="">QTY : </label>
                                            <div class="product-count custom-wrapper" id="cart-qty">
                                                <button class="product-dlt-btn col-4"
                                                        onclick="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}', 'minus')">
                                                    -
                                                </button>
                                                <input type="text"
                                                       onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}')"
                                                       value="{{$cartItem['quantity']}}" maxlength="2"
                                                       id="cartQuantity{{$cartItem['id']}}"
                                                       class="text-muted text-center col-4 cart-qty-input product-qty {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                                </input>
                                                <button class="product-add-btn col-4"
                                                        onclick="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{$cartItem['id']}}', 'plus')">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button class="dropdown-cart-product-delete" type="button"
                                        onclick="removeFromCart({{ $cartItem['id'] }})"
                                        aria-label="Remove"><span
                                        aria-hidden="true"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                        <hr>

                        @php($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])
                        @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                    @endforeach
                </div>

                <div class="dropdown-cart-footer pb-2">
                    <div class="row align-items-center pl-3 py-1">
                        <div class="col-1">
                            <div class="dropdown-cart-checkbox">
                                <input type="checkbox" name="" id="">
                            </div>
                        </div>
                        <div class="col-11">
                            <p class="dropdown-cart-payment-menthod"> Pay Via CG Pay <span
                                    class="dropdown-cart-cashback">(30% Cashback)</span></p>
                        </div>

                    </div>
                    <hr>
                    <div class="cart-dropdown-price">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-4 pl-3">
                                <p class="my-1">Shipping:</p>
                            </div>
                            <div class="col-6 text-end pr-3">
                                <p class="shipping-cost m-0">To be calculated</p>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-4 pl-3">
                                <p class="m-0">Total:</p>
                            </div>
                            <div class="col-6 text-end pr-3">
                        <span
                            class="subtotal text-accent font-size-base {{Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'}}">
                             {{\App\CPU\Helpers::currency_converter($sub_total)}}
                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-none py-3">

                        <div
                            class="font-size-sm {{Session::get('direction') === "rtl" ? 'ml-2 float-left' : 'mr-2 float-right'}} py-2 ">
                            <span class="d-none">{{\App\CPU\translate('Subtotal')}} :</span>

                        </div>

                        <a class="d-none btn btn-outline-secondary btn-sm" href="{{route('shop-cart')}}">
                            {{\App\CPU\translate('Expand cart')}}<i
                                class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'}}"></i>
                        </a>
                    </div>
                    <a class="d-block dropdown-cart-shopping text-center" href="#">
                        <p class="my-1">Continue Shopping ></p>
                    </a>
                    <a class="btn btn--primary btn-sm cart-dropdown-checkout-btn mb-2"
                       href="{{route('checkout-details')}}">
                        <i class="d-none czi-card {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} font-size-base align-middle"></i>{{\App\CPU\translate('Checkout')}}
                    </a>
                </div>

            @else
                <div class="widget-cart-item">
                    <h6 class="text-danger text-center m-0"><i
                            class="fa fa-cart-arrow-down"></i> {{\App\CPU\translate('Empty')}} {{\App\CPU\translate('Cart')}}
                    </h6>
                </div>
            @endif
        </div>
    </div>
</div>
{{--code improved Md. Al imrun Khandakar--}}
{{--to do discount--}}

@push('script')
    {{--    <script>--}}
    {{--        const cartQTY= document.querySelectorAll('#cart-qty');--}}

    {{--        for (let i = 0; i < cartQTY.length; i++) {--}}
    {{--            cartQTY[i].addEventListener('click', (e)=>{--}}
    {{--                if(e.target.getAttribute('data-type')==="plus-btn"){--}}
    {{--                    e.target.previousElementSibling.value=(Number(e.target.previousElementSibling.value)+ 1)--}}
    {{--                }--}}
    {{--                if(e.target.getAttribute('data-type')==="minus-btn"){--}}
    {{--                    e.target.nextElementSibling.value=(Number(e.target.previousElementSibling.value)- 1)--}}
    {{--                }--}}
    {{--            })--}}
    {{--        }--}}
    {{--    </script>--}}
@endpush


