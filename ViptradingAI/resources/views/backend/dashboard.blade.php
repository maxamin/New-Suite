@php use App\Enums\InvestStatus; @endphp
@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ setting('site_title', 'global') }} {{ __('Dashboard') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                @canany(['deposit-action','withdraw-action','kyc-action',])
                    @if($data['withdraw_count'] || $data['kyc_count'] || $data['deposit_count'])
                        <div class="col-xl-12">
                            <div class="admin-latest-announcements">
                                <div class="content"><i
                                        icon-name="zap"></i>{{ __("Explore what's important to review first") }}</div>
                                <div class="content">
                                    @can('withdraw-action')
                                        @if($data['withdraw_count'])
                                            <a href="{{ route('admin.withdraw.pending') }}" class="site-btn-xs red-btn"><i
                                                    icon-name="loader"
                                                    class="spining-icon"></i>{{ __('Withdraw Requests') }}
                                                ({{ $data['withdraw_count'] }})</a>
                                        @endif
                                    @endcan

                                    @can('kyc-action')
                                        @if($data['kyc_count'])
                                            <a href="{{ route('admin.kyc.pending') }}" class="site-btn-xs green-btn"><i
                                                    icon-name="loader" class="spining-icon"></i>{{ __('KYC Requests') }}
                                                ({{ $data['kyc_count'] }})</a>
                                        @endif
                                    @endcan

                                    @can('deposit-action')
                                        @if($data['deposit_count'])
                                            <a href="{{ route('admin.deposit.manual.pending') }}"
                                               class="site-btn-xs primary-btn"><i icon-name="loader"
                                                                                  class="spining-icon"></i>{{ __('Deposit Requests') }}
                                                ({{ $data['deposit_count'] }})</a>
                                        @endif
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
            @endcanany

            @include('backend.include.__data_card')
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Weekly Deposit') }}</h3>
                                <div class="card-header-links">
                                    <h3 class="title-small">{{ $data['date_range']}}</h3>
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="depositChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Weekly Investment') }}</h3>
                                <div class="card-header-links">
                                    <h3 class="title-small">{{ $data['date_range']}}</h3>
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="investChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Latest Registered User') }}</h3>
                        </div>
                        <div class="site-card-body table-responsive">
                            <div class="site-datatable">
                                <table class="data-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Avatar') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Balance') }}</th>
                                        <th>{{ __('Profit') }}</th>
                                        <th>{{ __('KYC') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latest_user'] as $user)
                                        <tr>
                                            <td>
                                                @if(null != $user->avatar)
                                                    <img class="avatar" src="{{ asset($user->avatar)}}" alt=""
                                                         height="40" width="40">
                                                @else
                                                    <span
                                                        class="avatar-text">{{ $user->first_name[0] }}{{ $user->last_name[0] }}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.user.edit',$user->id) }}"
                                                   class="link">{{ safe($user->username) }}</a></td>
                                            <td>
                                                <strong>{{ safe($user->email) }}</strong>
                                            </td>
                                            <td><strong>{{ $currencySymbol . $user->balance }}</strong></td>
                                            <td><strong>{{ $currencySymbol . $user->total_profit }}</strong></td>
                                            <td>
                                                @if($user->kyc == 1)
                                                    <div class="site-badge success">{{ __('Verified') }}</div>
                                                @else
                                                    <div class="site-badge pending">{{ __('Unverified') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->status == 1)
                                                    <div class="site-badge success">{{ __('Active') }}</div>
                                                @else
                                                    <div class="site-badge danger">{{ __('DeActivated') }}</div>
                                                @endif
                                            </td>
                                            <td>

                                                <a href="{{route('admin.user.edit',$user->id)}}"
                                                   class="round-icon-btn primary-btn" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Edit User"><i icon-name="edit-3"></i></a>
                                                <span type="button"
                                                      data-id="{{$user->id}}"
                                                      data-name="{{ $user->first_name.' '. $user->last_name }}"
                                                      class="send-mail"
                                                ><button class="round-icon-btn red-btn" data-bs-toggle="tooltip"
                                                         title="" data-bs-original-title="Send Email"><i
                                                            icon-name="mail"></i></button></span>

                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="centered">
                                        <td colspan="7">
                                            @if($data['latest_user']->isEmpty())
                                                {{ __('No Data Found') }}
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            

            

        </div>
    </div>


    <!-- Modal for Send Email -->
    @include('backend.user.include.__mail_send')
    <!-- Modal for Send Email-->

@endsection
@section('script')
    <script>
        (function ($) {
            'use strict';

            //deposit chart
            var deposit = @json($data['last7days_deposit']);

            var deposit_label = Object.keys(deposit);
            var deposit_data = Object.values(deposit);

            // Bar Chart
            var data = {
                labels: deposit_label,
                datasets: [{
                    label: 'Weekly Deposit',
                    data: deposit_data,
                    backgroundColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderWidth: 0,
                    borderRadius: 3,
                    barPercentage: 0.3,
                    hoverBackgroundColor: '#5e3fc9',
                }]
            };
            // render init block
            new Chart(
                document.getElementById('depositChart'),
                {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            );


            //investment chart

            var invest = @json($data['last7days_invest']);

            var invest_label = Object.keys(invest);
            var invest_data = Object.values(invest);

            // Bar Chart
            var data = {
                labels: invest_label,
                datasets: [{
                    label: 'Weekly Investment',
                    data: invest_data,
                    backgroundColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderWidth: 0,
                    borderRadius: 3,
                    barPercentage: 0.3,
                    hoverBackgroundColor: '#5e3fc9',
                }]
            };
            // render init block
            new Chart(
                document.getElementById('investChart'),
                {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            );

            //send mail modal form open
            $('.send-mail').on('click', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name').html(name);
                $('#userId').val(id);
                $('#sendEmail').modal('toggle')
            })

        })(jQuery);
    </script>
@endsection
