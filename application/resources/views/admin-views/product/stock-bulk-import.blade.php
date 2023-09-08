@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Product Stock Bulk Import'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-1 text-capitalize d-flex gap-2">
                <img src="{{asset('assets/back-end/img/bulk-import.png')}}" alt="">
                {{\App\CPU\translate('bulk_Import')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <div class="col-12 my-2">
                <div class="card card-body">
                    <h1 class="display-5">{{\App\CPU\translate('Instructions')}} : </h1>
                    <p> 1. {{\App\CPU\translate('Download the format file and fill it with proper data.')}}</p>
                    <p> 2. {{\App\CPU\translate('You can download the example file to understand how the data must be filled.')}}</p>
                    <p> 3. {{\App\CPU\translate('Sku_code is required.')}}</p>
                    <p> 4. {{\App\CPU\translate('If you give variant sku and variant stock no need to fill current stock column')}}</p>
                    <p> 5. {{\App\CPU\translate('If Product has no variant Total stock is required')}}</p>
                    <p> 6. {{\App\CPU\translate('total stock will update according to your input ')}}</p>
                    <p> 7. {{\App\CPU\translate('Once you have downloaded and filled the format file, upload it in the form below and submit.')}}</p>
                </div>
            </div>
            @if(session()->get('status'))
                <div class="col-12 my-2">
                    <div class="card card-body">

                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>{{\App\CPU\translate('Product Sku')}}</th>
                                <th>{{\App\CPU\translate('Status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session()->get('status') as $item)
                                <tr>
                                    <td>{{$item['code']}}</td>
                                    <td>{{$item['status']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="col-md-12 mt-2">
                <form class="product-form" action="{{route('admin.product.stock-bulk-import')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card rest-part">
                        <div class="px-3 py-4 d-flex flex-wrap align-items-center gap-10 justify-content-center">
                            <h4 class="mb-0">{{\App\CPU\translate("Don`t_have_the_template_?")}}</h4>
                            <a href="{{asset('assets/product_stock_bulk_format.xlsx')}}" download=""
                               class="btn-link text-capitalize fz-16 font-weight-medium">{{\App\CPU\translate('download_here')}}
                            </a>
                            <h4 class="mb-0">{{\App\CPU\translate("download_product_stock_list")}}</h4>
                            <a class="btn-link text-capitalize fz-16 font-weight-medium" href="{{route('admin.product.stock-export-excel')}}">{{\App\CPU\translate('download_here')}}</a>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <div class="upload-file">
                                            <input type="file" name="stock_products_file" accept=".xlsx, .xls" class="upload-file__input">
                                            <div class="upload-file__img_drag upload-file__img">
                                                <img src="{{asset('assets/back-end/img/drag-upload-file.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-10 align-items-center justify-content-end">
                                <button type="reset" class="btn btn-secondary px-4" onclick="resetImg();">{{\App\CPU\translate('reset')}}</button>
                                <button type="submit" class="btn btn--primary px-4">{{\App\CPU\translate('Submit')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // File Upload
        "use strict";

        $('.upload-file__input').on('change', function () {
            $(this).siblings('.upload-file__img').find('img').attr({
                'src': '{{asset('assets/back-end/img/excel.png')}}',
                'width': 80
            });
        });

        function resetImg() {
            $('.upload-file__img img').attr({
                'src': '{{asset('assets/back-end/img/drag-upload-file.png')}}',
                'width': 'auto'
            });
        }
    </script>

@endpush
