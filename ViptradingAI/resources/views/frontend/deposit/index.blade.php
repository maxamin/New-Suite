@extends('frontend.layouts.user')
@section('title')
    {{ __('Deposit Now') }}
@endsection
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;">{{ __('Usdt TRC-20 Deposit') }}</h3>
</div>
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-body">
                    <div class="progress-steps">
                        <div class="single-step {{ $isStepOne }}">
                            <div class="number">{{ __('01') }}</div>
                            <div class="content">
                                <h4>{{ __('Deposit Amount') }}</h4>
                                <p>{{ __('Enter your deposit details') }}</p>
                            </div>
                        </div>
                        <div class="single-step {{ $isStepTwo }}">
                            <div class="number">{{ __('02') }}</div>
                            <div class="content">
                                <h4>{{ __('Success') }}</h4>
                                <p>{{  $notify['card-header'] ??  __('Success Your Deposit') }}</p>
                            </div>
                        </div>
                    </div>
                    @yield('deposit_content')
                </div>
            </div>
        </div>
    </div>
@endsection
