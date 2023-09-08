@php($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings'))
@foreach($products as $product)
    @if(!empty($product['product_id']))
        @php($product=$product->product)
    @endif
    <div class=" {{Request::is('products*')?'col-xl-4 col-sm-6 col-md-6 col-lg-4 col-12':'col-xl-3 col-sm-6 col-md-6 col-lg-4 col-12'}} {{Request::is('shopView*')?'col-xl-4 col-sm-6 col-md-6 col-lg-4 col-12':''}} mb-2 p-2">
        @if(!empty($product))
            @include('web-views.partials._filter-single-product',['p'=>$product,'decimal_point_settings'=>$decimal_point_settings])
        @endif
    </div>
@endforeach

<div class="col-12">
    <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation"
         id="paginator-ajax">
        {!! $products->links() !!}
    </nav>
</div>
