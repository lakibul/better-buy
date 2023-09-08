@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('admin log'))

@push('css_or_js')
    <link href="{{ asset('assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="flex-start">
                    <h5 class="card-header-title">{{\App\CPU\translate('admin Logs')}}</h5>
                    <h5 class="card-header-title text-primary mx-1">({{ $logs->total() }})</h5>
                </div>
                <div>
                    <form action="{{url()->current()}}" method="GET">
                        <div class="input-group">
                            <input id="datatableSearch_" type="search" name="search"
                                   class="form-control"
                                   placeholder="{{\App\CPU\translate('Search')}}" aria-label="Search"
                                   value="{{$search??''}}" required autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text"><i class="tio-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    style="width: 100%">
                    <thead class="thead-light">
                    <tr>
                        <th>{{\App\CPU\translate('SL No')}}</th>
                        <th>{{\App\CPU\translate('Activity type')}}</th>
                        <th>{{\App\CPU\translate('user id')}}</th>
                        <th>{{\App\CPU\translate('description')}}</th>
                        <th>{{\App\CPU\translate('note')}}</th>
                        <th>{{\App\CPU\translate('device_id')}}</th>
                        <th>{{\App\CPU\translate('ip_address')}}</th>
                        <th>{{\App\CPU\translate('created_at')}}</th>
                    </tr>
                    </thead>

                    <tbody id="set-rows">
                    @foreach($logs as $key=>$log)
                        <tr>
                            <td>{{$key+=1}}</td>
                            <td>{{$log->activity_type}}</td>
                            <td>{{$log->user_id}}</td>
                            <td>{{$log->description}}</td>
                            <td>{{ $log->note }}</td>
                            <td>{{ $log->device_id }}</td>
                            <td>{{$log->ip_address}}</td>
                            <td>{{ date('d-M-Y H:iA', strtotime($log->created_at)) }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            {!! $logs->links() !!}
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
@endsection
