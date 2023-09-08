@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Coupon Add'))

@push('css_or_js')
    <link href="{{asset('assets/back-end')}}/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{asset('assets/back-end/img/coupon_setup.png')}}" alt="">
                {{\App\CPU\translate('coupon_setup')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.coupon.store-coupon')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('coupon_type')}}</label>
                                    <select class="form-control" name="coupon_type" required>
                                        <option disabled selected>{{\App\CPU\translate('Select Coupon Type')}}</option>
                                        {{--<option value="delivery_charge_free">Delivery Charge Free</option>--}}
                                        <option value="discount_on_purchase">{{\App\CPU\translate('Discount_on_Purchase')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('coupon_title')}}</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title"
                                           placeholder="{{\App\CPU\translate('Title')}}" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="name" class="title-color font-weight-medium text-capitalize">{{\App\CPU\translate('coupon_code')}}</label>
                                        <a href="javascript:void(0)" class="float-right c1 fz-12" onclick="generateCode()">{{\App\CPU\translate('generate_code')}}</a>
                                    </div>
                                    <input type="text" name="code" value=""
                                           class="form-control" id="code"
                                           placeholder="{{\App\CPU\translate('Ex: EID100')}}" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label
                                        for="exampleFormControlInput1" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('limit')}} {{\App\CPU\translate('for')}} {{\App\CPU\translate('same')}} {{\App\CPU\translate('user')}}</label>
                                    <input type="number" name="limit" value="{{ old('limit') }}" min="0" id="coupon_limit" class="form-control"
                                           placeholder="{{\App\CPU\translate('EX')}}: {{\App\CPU\translate('10')}}">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('discount_type')}}</label>
                                    <select id="discount_type" class="form-control w-100" name="discount_type"
                                            onchange="checkDiscountType(this.value)">
                                        <option value="amount">{{\App\CPU\translate('Amount')}}</option>
                                        <option value="percentage">{{\App\CPU\translate('percentage (%)')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('Discount_Amount')}}</label>
                                    <input type="number" min="1" max="1000000" name="discount" value="{{ old('discount') }}" class="form-control"
                                           id="discount"
                                           placeholder="{{\App\CPU\translate('Ex: 500')}}" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('minimum_purchase ($)')}}</label>
                                    <input type="number" min="1" max="1000000" name="min_purchase" value="{{ old('min_purchase') }}" class="form-control"
                                        id="minimum purchase"
                                        placeholder="{{\App\CPU\translate('Ex: 100')}}" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group" id="max-discount">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('maximum_discount ($)')}}</label>
                                    <input type="number" min="1" max="1000000" name="max_discount" value="{{ old('max_discount') }}"
                                        class="form-control" id="maximum discount"
                                        placeholder="{{\App\CPU\translate('Ex: 5000')}}" >
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('start_date')}}</label>
                                    <input id="start_date" type="date" name="start_date" value="{{ old('start_date') }}" class="form-control"
                                        placeholder="{{\App\CPU\translate('start date')}}" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex">{{\App\CPU\translate('expire_date')}}</label>
                                    <input id="expire_date" type="date" name="expire_date" value="{{ old('expire_date') }}" class="form-control"
                                        placeholder="{{\App\CPU\translate('expire date')}}" required>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end flex-wrap gap-10">
                                <button type="reset" class="btn btn-secondary px-4">{{\App\CPU\translate('reset')}}</button>
                                <button type="submit" class="btn btn--primary px-4">{{\App\CPU\translate('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="mb-0 text-capitalize d-flex gap-2">
                                    {{\App\CPU\translate('coupon_list')}}
                                    <span class="badge badge-soft-dark radius-50 fz-12 ml-1">{{ $cou->total() }}</span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="{{\App\CPU\translate('Search by Title or Code or Discount Type')}}"
                                               value="{{ $search }}" aria-label="Search orders" required>
                                        <button type="submit" class="btn btn--primary">{{\App\CPU\translate('search')}}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table {{ Session::get('direction') === 'rtl' ? 'text-right' : 'text-left' }}">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th>{{\App\CPU\translate('SL')}}</th>
                                <th>{{\App\CPU\translate('coupon')}}</th>
                                <th>{{\App\CPU\translate('coupon_type')}}</th>
                                <th>{{\App\CPU\translate('Duration')}}</th>
                                <th>{{\App\CPU\translate('user_limit')}}</th>
                                <th>{{\App\CPU\translate('Discount')}}</th>
                                <th>{{\App\CPU\translate('discount_type')}}</th>
                                <th>{{\App\CPU\translate('minimum_purchase')}}</th>
                                <th>{{\App\CPU\translate('maximum_discount')}}</th>
                                <th>{{\App\CPU\translate('Status')}}</th>
                                <th class="text-center">{{\App\CPU\translate('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cou as $k=>$c)
                                <tr>
                                    <td >{{$cou->firstItem() + $k}}</td>
                                    <td>
                                        <div>{{substr($c['title'],0,20)}}</div>
                                        <strong>code: {{$c['code']}}</strong>
                                    </td>
                                    <td class="text-capitalize">{{str_replace('_',' ',$c['coupon_type'])}}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span>{{date('d M, y',strtotime($c['start_date']))}} - </span>
                                            <span>{{date('d M, y',strtotime($c['expire_date']))}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{\App\CPU\translate('Limit')}}: <strong>{{ $c['limit'] }},</strong></span>
                                        <span class="ml-1">{{\App\CPU\translate('Used')}}: <strong>{{ $c['order_count'] }}</strong></span>
                                    </td>
                                    <td>{{$c['discount_type']=='amount'?\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($c['discount'])):$c['discount']}}</td>
                                    <td><span class="text-capitalize">{{$c['discount_type']}}</span></td>
                                    <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($c['min_purchase']))}}</td>
                                    <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($c['max_discount']))}}</td>
                                    <td>
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher_input"
                                                    onclick="location.href='{{route('admin.coupon.status',[$c['id'],$c->status?0:1])}}'"
                                                    class="toggle-switch-input" {{$c->status?'checked':''}}>
                                            <span class="switcher_control"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <a class="btn btn-outline--primary btn-sm edit"
                                            href="{{route('admin.coupon.update',[$c['id']])}}"
                                            title="{{ \App\CPU\translate('Edit')}}"
                                            >
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete"
                                                href="javascript:"
                                                onclick="form_alert('coupon-{{$c['id']}}','Want to delete this coupon ?')"
                                                title="{{\App\CPU\translate('delete')}}"
                                                >
                                                <i class="tio-delete"></i>
                                            </a>
                                            <form action="{{route('admin.coupon.delete',[$c['id']])}}"
                                                method="post" id="coupon-{{$c['id']}}">
                                                @csrf @method('delete')
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            {{$cou->links()}}
                        </div>
                    </div>

                    @if(count($cou)==0)
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="{{asset('assets/back-end')}}/svg/illustrations/sorry.svg"
                                 alt="Image Description">
                            <p class="mb-0">{{\App\CPU\translate('No data to show')}}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>

    $(document).ready(function() {
            generateCode();

            let discount_type = $('#discount_type').val();
            if (discount_type == 'amount') {
                $('#max-discount').hide()
            } else if (discount_type == 'percentage') {
                $('#max-discount').show()
            }

            $('#start_date').attr('min',(new Date()).toISOString().split('T')[0]);
            $('#expire_date').attr('min',(new Date()).toISOString().split('T')[0]);
        });

        $("#start_date").on("change", function () {
            $('#expire_date').attr('min',$(this).val());
        });

        $("#expire_date").on("change", function () {
            $('#start_date').attr('max',$(this).val());
        });

        function checkDiscountType(val) {
            if (val == 'amount') {
                $('#max-discount').hide()
            } else if (val == 'percentage') {
                $('#max-discount').show()
            }
        }

        function  generateCode(){
            let code = Math.random().toString(36).substring(2,12);
            $('#code').val(code)
        }


</script>

    <script src="{{asset('assets/back-end')}}/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <!-- Page level plugins -->
    <script src="{{asset('assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/back-end')}}/js/demo/datatables-demo.js"></script>

<script>
    $('#discount_type').on('change', function (){
        let type = $('#discount_type').val();
        if(type === 'amount'){
            $('#discount').attr('placeholder', 'Ex: 500');
        }else if(type === 'percentage'){
            $('#discount').attr('placeholder', 'Ex: 10%');
        }
    });
</script>
@endpush
