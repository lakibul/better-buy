@php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    $productReviews = \App\CPU\ProductManager::get_product_review($product->id);
@endphp

<style>
    .product-title2 {
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
        font-size: 22px !important;
        color: #000000 !important;
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
        line-height: 1.2em;
    }

    .cz-product-gallery {
        display: block;
    }

    .cz-preview {
        width: 100%;
        margin-top: 0;
        margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;
        max-height: 100% !important;
    }

    .cz-preview-item > img {
        width: 80%;
    }

    .details {
        border: 1px solid #E2F0FF;
        border-radius: 3px;
        padding: 16px;
    }

    img, figure {
        max-width: 100%;
        vertical-align: middle;
    }

    .cz-thumblist-item {
        display: block;
        position: relative;
        width: 64px;
        height: 64px;
        margin: .625rem;
        transition: border-color 0.2s ease-in-out;
        border: 1px solid #E2F0FF;
        border-radius: .3125rem;
        text-decoration: none !important;
        overflow: hidden;
    }

    .for-hover-bg {
        font-size: 18px;
        height: 45px;
    }

    .cz-thumblist-item > img {
        display: block;
        width: 80%;
        transition: opacity .2s ease-in-out;
        max-height: 58px;
        opacity: .6;
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .cz-preview-item > img {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .cz-thumblist {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;
            padding-top: 1rem;
            padding-right: 22px;
            padding-bottom: 10px;
        }

        .cz-thumblist-item {
            margin: 0px;
        }

        .cz-thumblist {
            padding-top: 8px !important;
        }

        .cz-preview-item > img {
            width: 100%;
        }
    }
</style>

<div class="modal-header rtl">
    <div>
        <h4 class="modal-title product-title">
            <a class="product-title2" href="{{route('product',$product->slug)}}" data-toggle="tooltip"
               data-placement="right"
               title="Go to product page">{{$product['name']}}
                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-2' : 'right ml-2'}} font-size-lg"
                   style="margin-right: 0px !important;"></i>
            </a>
        </h4>
    </div>
    <div>
        <button class="close call-when-done" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="modal-body rtl">
    <div class="row g-3">
        <div class="col-lg-5 col-md-5">
            <div class="cz-product-gallery">
                <div class="cz-preview">
                    @if($product->images!=null && json_decode($product->images)>0)
                        @foreach (json_decode($product->images) as $key => $photo)
                            <div
                                class="cz-preview-item d-flex align-items-center justify-content-center  {{$key==0?'active':''}}">
                                <img class="show-imag img-responsive" style="max-height: 500px!important;"
                                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                     src="{{asset("application/storage/app/public/product/$photo")}}"
                                     alt="Product image" width="">
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="table-responsive" style="max-height: 515px;">
                    <div class="d-flex">
                        @if($product->images!=null && json_decode($product->images)>0)
                            @foreach (json_decode($product->images) as $key => $photo)
                                <div class="cz-thumblist">
                                    <a href="javascript:"
                                       class=" cz-thumblist-item d-flex align-items-center justify-content-center">
                                        <img class="click-img"
                                             src="{{asset("application/storage/app/public/product/$photo")}}"
                                             onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                             alt="Product thumb">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Product details-->
        <div class="col-lg-7 col-md-7">
            <div class="details __h-100">
                <a href="{{route('product',$product->slug)}}"
                   class="mb-2 __inline-24 product-details-header">{{$product->name}}</a>
                <div class="d-flex flex-wrap align-items-center mb-2 pro" style="margin-top:0px!important;">
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
                                                {{$product->discount}}
                                            </span></div>
                    @endif
                </div>
                <p class="mb-0" style="font-weight: 500;font-size: 14px;color: #77b847;">(Incl. all
                    Taxes)</p>

                <div class="d-flex flex-wrap align-items-center mb-2 pro" style="margin-top: 14px!important;">
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

                <form id="add-to-cart-form" class="mb-2">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="position-relative {{Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'}} mb-3">
                        @if (count(json_decode($product->colors)) > 0)
                            <div class="flex-start">
                                <div class="product-description-label mt-1">
                                    {{\App\CPU\translate('color')}}:
                                </div>
                                <div class="__pl-15">
                                    <ul class="flex-start checkbox-color mb-0 p-0" style="list-style: none;">
                                        @foreach (json_decode($product->colors) as $key => $color)
                                            <li>
                                                <input type="radio"
                                                       id="{{ $product->id }}-color-{{ $key }}"
                                                       name="color" value="{{ $color }}"
                                                       @if($key == 0) checked @endif>
                                                <label style="background: {{ $color }};"
                                                       for="{{ $product->id }}-color-{{ $key }}"
                                                       data-toggle="tooltip">
                                                    <span class="outline" style="border-color: {{ $color }}"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @php
                            $qty = 0;
                            foreach (json_decode($product->variation) as $key => $variation) {
                                $qty += $variation->qty;
                            }
                        @endphp

                    </div>
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                        <div class="flex-start">
                            <div class="product-description-label mt-1">
                                {{ $choice->title }}:
                            </div>
                            <div>
                                <ul class=" checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                    @foreach ($choice->options as $key => $option)
                                        <span>
                                            <input type="radio"
                                                   id="{{ $choice->name }}-{{ $option }}"
                                                   name="{{ $choice->name }}" value="{{ $option }}"
                                                   @if($key == 0) checked @endif>
                                            <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                        </span>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    <!-- Quantity + Add to cart -->
                    <div class="d-flex __gap-6 mt-0">
                        <div class="product-description-label mt-2 mr-2">{{\App\CPU\translate('Quantity')}}:</div>
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3"
                                 style="width: 160px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number" type="button"
                                            data-type="minus" data-field="quantity"
                                            disabled="disabled" style="padding: 10px">
                                        -
                                    </button>
                                </span>
                                <input type="text" name="quantity"
                                       class="form-control input-number text-center cart-qty-field"
                                       placeholder="1" value="{{ $product->minimum_order_qty ?? 1 }}"
                                       product-type="{{ $product->product_type }}"
                                       min="{{ $product->minimum_order_qty ?? 1 }}" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number" product-type="{{ $product->product_type }}"
                                            type="button" data-type="plus"
                                            data-field="quantity" style="padding: 10px">
                                        +
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap mt-3 __gap-15" id="chosen_price_div">
                        <div>
                            <div class="product-description-label">{{\App\CPU\translate('Total Price')}}:</div>
                        </div>
                        <div>
                            <div class="product-price">
                                <strong id="chosen_price"></strong>
                            </div>
                        </div>
                        <div class="col-12">
                            @if(($product['product_type'] == 'physical') && ($product['current_stock']<=0))
                                <h5 class="mt-3" style="color: red">{{\App\CPU\translate('out_of_stock')}}</h5>
                            @endif
                        </div>
                    </div>
                    {{--to do--}}
                    <div class="__btn-grp mt-2">
                        <button class="btn quick-view-buy-btn" onclick="buy_now()" type="button">
                            {{\App\CPU\translate('buy_now')}}
                        </button>
                        <button class="btn details-add-cart string-limit" onclick="addToCart()" type="button">
                            {{\App\CPU\translate('add_to_cart')}}
                        </button>
                        <button type="button" onclick="addWishlist('{{$product['id']}}')"
                                class="btn details-wishlist-btn">
                            <i class="fa fa-heart-o "
                               aria-hidden="true"></i>
                        </button>
                        {{--                        <button type="button" onclick="addWishlist('{{$product['id']}}')" class="text-danger btn string-limit">--}}
                        {{--                            <i class="fa fa-heart-o mr-2"--}}
                        {{--                               aria-hidden="true"></i>--}}
                        {{--                            <span class="countWishlist-{{$product['id']}}">{{$countWishlist}}</span>--}}
                        {{--                        </button>--}}
                    </div>
                </form>
                <!-- Product panels-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
</script>
