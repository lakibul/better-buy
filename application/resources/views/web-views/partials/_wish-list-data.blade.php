

@if($wishlists->count()>0)
    @foreach($wishlists as $wishlist)
        @php($product = $wishlist->product_full_info)
        @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
        @if( $wishlist->product_full_info)
{{--            <div class="card __card __card-mobile-340 mb-3">--}}
{{--                <div class="product">--}}
{{--                    <div class="card">--}}
{{--                        <div class="row g-2">--}}
{{--                            <div class="wishlist_product_img col-md-4 col-xl-2 col-lg-3 col-sm-4">--}}
{{--                                <a href="{{route('product',$product->slug)}}" class="d-block h-100">--}}
{{--                                    <img class="__img-full" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"--}}
{{--                                    onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" alt="wishlist"--}}
{{--                                        >--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="wishlist_product_desc align-self-center col-sm-8 col-md-8 col-xl-10 col-lg-9 py-3 px-sm-4">--}}
{{--                                <div class="font-name">--}}
{{--                                    <a href="{{route('product',$product['slug'])}}">{{$product['name']}}</a>--}}
{{--                                </div>--}}
{{--                                @if($brand_setting)--}}
{{--                                <span class="sellerName"> {{\App\CPU\translate('Brand')}} :{{$product->brand?$product->brand['name']:''}} </span>--}}
{{--                                @endif--}}

{{--                                <div class="">--}}
{{--                                    @if($product->discount > 0)--}}
{{--                                    <strike style="color: #E96A6A;" class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'}}">--}}
{{--                                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}--}}
{{--                                    </strike>--}}
{{--                                @endif--}}
{{--                                <span--}}
{{--                                    class="font-weight-bold amount">{{\App\CPU\Helpers::get_price_range($product) }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a href="javascript:" class="wishlist_product_icon">--}}
{{--                                <i class="czi-close-circle" onclick="removeWishlist('{{$product['id']}}')"--}}
{{--                                    style="color: red"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
<div class="col-xl-4 col-sm-6 col-md-6 col-lg-4 col-12 mb-3">
    <div class="product-single-hover">
        @if($product->created_at)
            @if ($product->created_at >= (\Carbon\Carbon::now()->subDays(7)))
            <span class="for-discoutn-value p-1 pl-2 pr-2">
                    {{\App\CPU\translate('new')}}
            </span>
            @endif
        @else
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
        @endif
        <div class="" style="padding-top: 5px;">
            <div class=" inline_product inline_product-custom clickable d-flex justify-content-center">

                <div class="d-flex d-block">
                    <a href="{{route('product',$product->slug)}}" class="d-block">
                        <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                             onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'">
                    </a>
                </div>
            </div>
            <div class="single-product-details">
                <div class="">
                    <a href="{{route('product',$product->slug)}}" style="font-weight: 600;
                    font-size: 16px; ">
                        {{ Str::limit($product['name'], 18) }}
                    </a>
                </div>
                <div class="container px-0">
                    <div class="row">
                        <div class="col-6 product-rating-block">
                            <div class="rating-show justify-content-between text-center">
                            <span class="d-inline-block font-size-sm text-body" style="font-weight: 400;
                font-size: 10px;">
                                @for($inc=0;$inc<5;$inc++) @if($inc<$overallRating[0]) <i
                                    class="sr-star czi-star-filled active"
                                    style="color:{{$web_config['primary_color']}} !important"></i>
                                @else
                                    <i class="sr-star czi-star-filled" style="color:#A3A3A3 !important"></i>
                                @endif
                                @endfor
                            </span>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <img class="mr-2" style="width: 12px;" src="{{asset('assets/front-end/img/loiality-icon.png')}}"
                                 alt="icon" /><span style="font-weight: 600;
                font-size: 14px;">1270</span>

                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <hr />
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="margin: 14px 0;">
            <span class="discount-text">
                    @if ($product->discount_type == 'percent')
                    {{round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))}}%
                @elseif($product->discount_type =='flat')
                    {{\App\CPU\Helpers::currency_converter($product->discount)}}
                @endif
                {{\App\CPU\translate('off')}}
                </span>
                    <span class="current-price">
                        {{\App\CPU\Helpers::currency_converter(
                            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                        )}}
                </span>
                    <span class="old-price">
                @if($product->discount > 0)
                            <strike>
                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                            </strike><br>
                        @endif
                </span>
                </div>
                <div class="text-center pb-0">
                    {{--            @if(Request::is('product/*'))--}}
                    {{--            <a class="btn btn--primary btn-sm" href="{{route('product',$product->slug)}}">--}}
                    {{--                <i class="czi-forward align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>--}}
                    {{--                {{\App\CPU\translate('View')}}--}}
                    {{--            </a>--}}
                    {{--            @else--}}
                    <a class="add-cart-btn" style="color:{{$web_config['primary_color']}};"
                       href="javascript:" onclick="quickView('{{$product->id}}')">
                        <i class="fa fa-shopping-cart align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                        {{\App\CPU\translate('Add')}} {{\App\CPU\translate('to')}}  {{\App\CPU\translate('Cart')}}
                    </a>
                    {{--            @endif--}}
                </div>
            </div>
        </div>
    </div>
</div>
        @else
            <span class="badge badge-danger">{{\App\CPU\translate('item_removed')}}</span>
        @endif
    @endforeach
@else
    <center>
        <h6 class="text-muted">
            {{\App\CPU\translate('No data found')}}.
        </h6>
    </center>
@endif
