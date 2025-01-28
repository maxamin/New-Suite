@extends("app.layout.ozo")

@push("page_title") Bind Address @endpush

@push('style')
@endpush

@php
    $accountNumber = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->bank_account : '';
    $bankCode = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->bank_code : '';
    $swiftCode = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->ifsc : '';
    $default = (auth()->user()->bankAccount) ? auth()->user()->bankAccount->is_default : false;
@endphp

@section('content')
<form action="{{ route('setup.gateway.submit') }}" method="post" autocomplete="off">
        @csrf
    @include("app.layout.ozo_header_nav")

    <div class="auth">        
        <div class="form">

            <label class="form-control" for="network">
                <p>Network Type</p>
                <div>
                    <select name="network" class="form-control" required>
                        @foreach($bank_list as $bank)
                            <option value="{{ $bank['bank_code'] }}" @if($bankCode == $bank['bank_code']) selected @endif >{{ $bank['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
            
            <label class="form-control" for="address">
                <p>Address</p>
                <div>
                    <input placeholder="Enter your valid address for selected network" type="text" name="address" value="{{ $accountNumber }}">

                </div>
            </label>

            <label class="form-control" for="memo">
                <p>Memo (Optional)</p>
                <div>
                    <input placeholder="Please enter (For TON network, required only)" type="text" name="memo" value="{{ $swiftCode }}">
                </div>
            </label>

            <div class="as-default">
                <p>Set As Default</p>
                <label class="toggle">
                    <input type="checkbox" name="is_default" class="sr-only peer" @if($default) checked @endif>
                    <div class="peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-transparent dark:peer-focus:ring-blue-800 peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white  peer-checked:bg-brand"></div>
                </label>
            </div>

            <button type="submit" class="btn-submit">Change</button>
        </div>
    </div>
</form>
@endsection

@push('script')
@endpush