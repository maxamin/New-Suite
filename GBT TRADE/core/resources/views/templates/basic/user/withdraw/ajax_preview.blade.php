<h5 class="card-title text-center">@lang('Withdraw Via') {{ $withdraw->method->name }}</h5>
<form id="menualWithdraw" action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        @php
            echo $withdraw->method->description;
        @endphp
    </div>
    <div class="row py-2">
        <div class="col-12 mb-2">
            <label for="withdrawPass">Withdraw Password</label>
            <input id="withdrawPass" class="form-control" type="text" name="withdrawPass" placeholder="Enter your Withdraw Pin" required>
        </div>
        <div class="col-12 mb-2">
            <label for="withdraw_wallet">Withdraw Wallet</label>
            <input id="withdraw_wallet" class="form-control" type="text" name="withdraw_wallet" value="{{ auth()->user()->withdraw_wallet }}" placeholder="Setup Witdraw Wallet Address" readonly required>
        </div>
    </div>
    <x-viser-form identifier="id" identifierValue="{{ $withdraw->method->form_id }}" />
    {{-- @if(auth()->user()->ts)
    <div class="form-group">
        <label>@lang('Google Authenticator Code')</label>
        <input type="text" name="authenticator_code" class="form-control form--control" required>
    </div>
    @endif --}}
    <div class="mb-5"></div>
    <div class="align-custom-bottom">
        <button type="submit" class="btn btn-default border-custom w-100 mb-3">@lang('Submit')</button>
    </div>
</form>
