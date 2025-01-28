@extends("app.layout.ozo")

@push("page_title") Recharge @endpush

@push('style')
@endpush

@section('content')

<div class="top-nav all transparent">
    <a href="{{ route('my.profile') }}">
        <iconify-icon width="21" icon="eva:arrow-back-outline"></iconify-icon>
    </a>
    <p>Recharge</p>
    <a href="{{route('user.recharge.ledger')}}">Record</a>
</div>

<div class="withdraw">
    <div class="cover">
        <img width="74" src="https://img.icons8.com/?size=100&id=MjAYkOMsbYOO&format=png&color=000000" alt="">
        <p>{{ price(auth()->user()->balance) }}</p>
        <p>Available balance</p>
    </div>

    <div class="form mt-10">
        
        @if($wallet)
        <div>
            <p>Address to Pay</p>
            <a class="withdraw-input -mt-2" href="javascript:void(0);" onclick="copy('{{ $wallet->address }}')">
                <p><small><b>{{ $wallet->address }}</b></small></p>
                <iconify-icon width="21" icon="solar:copy-broken"></iconify-icon>
            </a>
        </div>

        <div>
            <div class="withdraw-input" href="javascript:void(0);">
                <p>Currency</p>
                {{ $wallet->currency }}
            </div>
        </div>
        @endif

        <div>
            <div class="withdraw-input" href="javascript:void(0);">
                <p>Network</p>
                <select id="pay_method">
                    @foreach($methods as $method)
                        <option data-link="{{ route('user.deposit.pay', ['network' => $method->bank_code]) }}" value="{{ $method->bank_code }}" @if($network == $method->bank_code) selected @endif>{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="fee">
        </div>
    </div>

    <div class="notes -mt-4 mb-4">
        <div>
            <p>Recharge Notes</p>
            {!! $setting->recharge_notice !!}
        </div>
    </div>
</div>
@endsection

@section('no_footer') @endsection

@push('script')
<script>
    $("#pay_method").on("change", function() {

        var $link = $(this).find(':selected').data('link');

        // Referesh page
        window.location.replace($link);
    });

    function copy(text){
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copy success');
    }
</script>
@endpush