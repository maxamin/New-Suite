@extends('frontend.layouts.user')
@section('title')
    {{ __('Schema Logs') }}
@endsection
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;">{{ __('Transcation') }}</h3>
</div>
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-body">
                    <div class="site-datatable">
                        <div class="row table-responsive">
                            <div class="col-xl-12">
                                <table id="dataTable" class="display data-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 100px;">{{ __('Amount') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .dataTables_length {
        display: none;
    }
    
    .dataTables_filter {
        display: none;
    }
</style>

@section('script')
    <script>


        (function ($) {
            "use strict";
            var table = $('#dataTable').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ route('user.transactions') }}",
                columns: [
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                ]
            });


        })(jQuery);

    </script>
@endsection
