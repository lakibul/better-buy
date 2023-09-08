@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Order List'))


@section('content')


    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>


    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 rtl"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
            <section class="col-lg-9 col-md-9">
                <h2 class="profile-page-heading">{{\App\CPU\translate('order_history')}}</h2>
{{--                <ul class="nav order-history-nav mt-3">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active-link" href="#"></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled-link" href="#"></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled-link" href="#" data-target="#pills-home"></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled-link" href="#"></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <ul class="nav nav-pills mb-2 order-history-nav mt-1" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">To Pay</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">To Ship</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">To Receive</button>
                    </li>
                </ul>

                <div class="my-4 order-history-check">
                    <span style="font-size:16px;font-weight:500;color:#000000;">Show :</span>
                    <select class="ml-2" style="border:1px solid #A3A3A35E;padding:12px 42px 12px 12px;outline:none; background-color: transparent;">
                        <option>Last 5 Orders</option>
                        <option>Last 6 Orders</option>
                        <option>Last 7 Orders</option>
                    </select>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <!---first tab start-->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="margin-top: 22px;">
                        @foreach($orders as $order)
                        <div class="card __card shadow-0 mb-3">
                            <div class="card-body" style="padding:36px;">
                                <!--custom order card start-->
                                <div class="order-history-header row align-items-center">
                                    <div class="col-6 ">
                                        <p class="order-id">Order <span style="color:#77b847;">#{{$order['id']}}</span></p>
                                        <p style="font-size: 14px;font-weight:400; color:#656565;">Placed on {{$order['created_at']}}</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" style="color:#77b847;font-size:16px;font-weight:500;" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
                                        <div class="dropdown-menu" style="min-width: unset !important;" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('account-order-details', ['id'=>$order->id]) }}"
                                               class="dropdown-item" title="{{\App\CPU\translate('View')}}">{{\App\CPU\translate('View')}}
                                            </a>
                                            @if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending')
                                                <a href="javascript:" title="{{\App\CPU\translate('Cancel')}}"
                                                   onclick="route_alert('{{ route('order-cancel',[$order->id]) }}','{{\App\CPU\translate('want_to_cancel_this_order?')}}')"
                                                   class="dropdown-item">
                                                    Delete
                                                </a>
                                            @else
                                                <button class="dropdown-item" title="{{\App\CPU\translate('Cancel')}}" onclick="cancel_message()">
                                                    Delete
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @foreach ($order->details as $key=>$detail)
                                    @php($product=json_decode($detail->product_details,true))
                                    @if($product)
                                        <div class="order-history-details row align-items-center py-3"  onclick="location.href='{{route('product',$product['slug'])}}'">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center">
                                                    <div class="col-3">
                                                        <img class="d-block"  onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                             src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}" style="max-height: 65px; width: 300px; margin: 0 auto;" alt="">
                                                    </div>
                                                    <div class="col-9">
                                                        <a href="{{route('product',[$product['slug']])}}" class="h3 ordered-product-heading mb-0">{{isset($product['name']) ? Str::limit($product['name'],30) : ''}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center">
                                                    <div class="col-6 col-lg-2 mt-3 mt-lg-0 text-lg-center text-start">
                                                        <span class="order-quantity"> QTY: <span style="color:#161D25;">{{$detail->qty}}</span></span>
                                                    </div>
                                                    <div class="col-6 col-lg-4 mt-3 mt-lg-0 text-lg-center text-start d-flex my-2 my-lg-0">
                                                        @if($order['order_status']=='failed' || $order['order_status']=='canceled')
                                                            <span class="badge badge-danger text-capitalize">
                                                    {{\App\CPU\translate($order['order_status'] =='failed' ? 'Failed To Deliver' : $order['order_status'])}}
                                                </span>
                                                        @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')
                                                            <span class="badge badge-success text-capitalize">
                                                    {{\App\CPU\translate($order['order_status']=='processing' ? 'packaging' : $order['order_status'])}}
                                                </span>
                                                        @else
                                                            <span class="badge badge-info text-capitalize">
                                                    {{\App\CPU\translate($order['order_status'])}}
                                                </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 text-lg-end text-start d-flex align-items-center">
                                                        <p class="mb-0" style="font-weight:500; font-size: 14px; color:#000000;">Delivered  on 04 Dec 2022</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!--custom order card end-->
                                <div class="table-responsive d-none">
                                    <table class="table __table text-center">
                                        <thead class="thead-light">
                                        <tr>
                                            <td class="tdBorder">
                                                <div class="py-2"><span
                                                        class="d-block spandHeadO ">{{\App\CPU\translate('Order ID')}}</span></div>
                                            </td>

                                            <td class="tdBorder orderDate">
                                                <div class="py-2"><span
                                                        class="d-block spandHeadO">{{\App\CPU\translate('Order')}} {{\App\CPU\translate('Date')}}</span>
                                                </div>
                                            </td>
                                            <td class="tdBorder">
                                                <div class="py-2"><span
                                                        class="d-block spandHeadO"> {{\App\CPU\translate('Status')}}</span></div>
                                            </td>
                                            <td class="tdBorder">
                                                <div class="py-2"><span
                                                        class="d-block spandHeadO"> {{\App\CPU\translate('Total')}}</span></div>
                                            </td>
                                            <td class="tdBorder">
                                                <div class="py-2"><span
                                                        class="d-block spandHeadO"> {{\App\CPU\translate('action')}}</span></div>
                                            </td>
                                        </tr>
                                        </thead>
{{--                                        <tbody>--}}
{{--                                        @foreach($orders as $order)--}}
{{--                                            <tr>--}}
{{--                                                <td class="bodytr font-weight-bold">--}}
{{--                                                    {{\App\CPU\translate('ID')}}: {{$order['id']}}--}}
{{--                                                </td>--}}
{{--                                                <td class="bodytr orderDate"><span class="">{{$order['created_at']}}</span></td>--}}
{{--                                                <td class="bodytr">--}}
{{--                                                    @if($order['order_status']=='failed' || $order['order_status']=='canceled')--}}
{{--                                                        <span class="badge badge-danger text-capitalize">--}}
{{--                                                    {{\App\CPU\translate($order['order_status'] =='failed' ? 'Failed To Deliver' : $order['order_status'])}}--}}
{{--                                                </span>--}}
{{--                                                    @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')--}}
{{--                                                        <span class="badge badge-success text-capitalize">--}}
{{--                                                    {{\App\CPU\translate($order['order_status']=='processing' ? 'packaging' : $order['order_status'])}}--}}
{{--                                                </span>--}}
{{--                                                    @else--}}
{{--                                                        <span class="badge badge-info text-capitalize">--}}
{{--                                                    {{\App\CPU\translate($order['order_status'])}}--}}
{{--                                                </span>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                <td class="bodytr">--}}
{{--                                                    {{\App\CPU\Helpers::currency_converter($order['order_amount'])}}--}}
{{--                                                </td>--}}
{{--                                                <td class="bodytr">--}}
{{--                                                    <div class="__btn-grp-sm flex-nowrap">--}}
{{--                                                        <a href="{{ route('account-order-details', ['id'=>$order->id]) }}"--}}
{{--                                                           class="btn btn--primary __action-btn" title="{{\App\CPU\translate('View')}}">--}}
{{--                                                            <i class="fa fa-eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                        @if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending')--}}
{{--                                                            <a href="javascript:" title="{{\App\CPU\translate('Cancel')}}"--}}
{{--                                                               onclick="route_alert('{{ route('order-cancel',[$order->id]) }}','{{\App\CPU\translate('want_to_cancel_this_order?')}}')"--}}
{{--                                                               class="btn btn-danger __action-btn">--}}
{{--                                                                <i class="fa fa-trash"></i>--}}
{{--                                                            </a>--}}
{{--                                                        @else--}}
{{--                                                            <button class="btn btn-danger __action-btn" title="{{\App\CPU\translate('Cancel')}}" onclick="cancel_message()">--}}
{{--                                                                <i class="fa fa-trash"></i>--}}
{{--                                                            </button>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}


                                    </table>
                                    @if($orders->count()==0)
                                        <center class="mb-2 mt-3">{{\App\CPU\translate('no_order_found')}}</center>
                                    @endif

                                    <div class="card-footer border-0">
                                        {{$orders->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($orders->count()==0)
                                <center class="mb-2 mt-3">{{\App\CPU\translate('no_order_found')}}</center>
                            @endif
                    </div>

                    <!---first tab end-->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>



            </section>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function cancel_message() {
            toastr.info('{{\App\CPU\translate('order_can_be_canceled_only_when_pending.')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endpush
