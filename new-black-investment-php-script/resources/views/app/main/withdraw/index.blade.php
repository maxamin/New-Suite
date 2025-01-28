@extends("app.layout.ozo")

@push("page_title") Withdraw @endpush

@push('style')
@endpush

@section('content')

@php
    $accountNumber = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->bank_account : 'No Account';
    $bankName = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->bank_name : '';
@endphp
<div class="top-nav all transparent">
    <a href="{{ route('my.profile') }}">
        <iconify-icon width="21" icon="eva:arrow-back-outline"></iconify-icon>
    </a>
    <p>Withdraw</p>
    <a href="{{ route('user.withdraw.ledger') }}">Record</a>
</div>

<form action="{{route('user.withdraw.request')}}" method="post" autocomplete="off">
    @csrf

    <div class="withdraw">
        <div class="cover">
            <img width="74" src="https://img.icons8.com/?size=100&id=MjAYkOMsbYOO&format=png&color=000000" alt="">
            <p>{{ price(auth()->user()->income) }}</p>
            <p>Available withdraw amount</p>
        </div>

        <div class="form">
            <div>
                <p>Withdraw Method</p>
                <a class="withdraw-input -mt-2" href="javascript:void(0);">
                    <p>{{ $bankName }} - Ending with <b>{{ substr($accountNumber, -5) }}</b></p>
                    <iconify-icon width="21" icon="mynaui:arrow-right"></iconify-icon>
                </a>
            </div>

            <div>
                <div class="withdraw-input" href="javascript:void(0);">
                    <p>Withdraw Amount</p>
                    <input type="number" name="amount" placeholder="Enter Amount">
                </div>
            </div>

            <div>
                <div class="withdraw-input" href="javascript:void(0);">
                    <p>Login Password</p>
                    <input type="password" name="password" placeholder="Enter password">
                </div>
            </div>
            
            <div class="fee">
                <p>Handling fee</p>
                <p>{{ $method->withdraw_charge }}%</p>
            </div>

            <button type="submit" class="btn-submit">Withdraw</button>
        </div>

        <div class="notes -mt-4 mb-4">
            <div>
                <p>Withdraw Notes</p>
                {!! $setting->withdraw_notice !!}
            </div>
        </div>
    </div>
</form>
@endsection

@section('no_footer') @endsection

@push('script')
@endpush