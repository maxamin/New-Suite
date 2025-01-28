@extends('frontend.layouts.user')
@section('title')
    {{ __('Withdraw Account') }}
@endsection
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;">{{ __('Withdraw Adress') }}</h3>
</div>

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Withdraw Account') }}</h3>
                    <div class="card-header-links">
                        <a href="{{ route('user.withdraw.account.create') }}"
                           class="card-header-link">{{ __('Add New') }}</a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="site-transactions">
                        @foreach($accounts as $account)
                            <div class="single">
                                <div class="left">
                                    <div style="width:50px;">
                                        <i icon-name="clipboard-check"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">{{$account->method_name}}</div>
                                        <div class="date">{{ $account->method->currency .' '. __('Account') }} </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div>
                                        <a href="{{ route('user.withdraw.account.edit',$account->id) }}"><i icon-name="edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
