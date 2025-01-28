@extends("app.layout.ozo")

@push("page_title") My Account @endpush

@push('style')
@endpush

@section('content')
<div class="mine">

    <div class="title">
        <div>
            <p>Profile</p>
            <p>User ID: {{ auth()->user()->phone }}</p>
        </div>
        <div>
            <img src="{{ asset(themes('img/logo.jpeg')) }}" alt="">
        </div>
    </div>

    <div class="card" style="background-image: url('{{ asset(themes('img/1.svg')) }}');">
        <div>
            <div>
                <p>{{ price($total_invest) }}</p>
                <p>Funding</p>
            </div>
            <div>
                <p onclick="window.location='{{ route('user.vip') }}';">{{ auth()->user()->vip->name }}</p>
            </div>
        </div>

        <div>
            <div>
                <p>Deposit Balance: {{ price(auth()->user()->balance) }}</p>
                <p>Available Balance: <span>{{ price(auth()->user()->income) }}</span></p>
            </div>
            <div>
                <p onclick="window.location='{{ route('balance.record') }}';">My Assets</p>
            </div>
        </div>
    </div>

    <div class="links">
        <a class="green" href="{{ route('user.onepay') }}">
            <iconify-icon width="36" icon="hugeicons:money-bag-01"></iconify-icon>
            <p>Deposit</p>
        </a>

        <a class="blue" href="{{ route('user.withdraw') }}">
            <iconify-icon width="36" icon="fa-brands:get-pocket"></iconify-icon>
            <p>Withdraw</p>
        </a>

        <button onclick="openModal('modalBonus')" class="yellow">
            <iconify-icon width="36" icon="mage:gift-fill"></iconify-icon>
            <p>Bonus</p>
        </button>

        <button onclick="openModal('modalInvite')" class="fuchsia" href="#">
            <iconify-icon width="36" icon="majesticons:share"></iconify-icon>
            <p>share link</p>
        </button>

        <a class="yellow" href="{{ route('earning') }}">
            <iconify-icon width="36" icon="mage:file-2-fill"></iconify-icon>
            <p>My order</p>
        </a>

        <a class="blue" href="{{ route('user.card') }}">
            <iconify-icon width="36" icon="cryptocurrency:usdt"></iconify-icon>
            <p>Bind Address</p>
        </a>

        <a class="red" href="{{ route('user.change-password') }}">
            <iconify-icon width="36" icon="mdi:password"></iconify-icon>
            <p>Change password</p>
        </a>

        {{-- <a class="green" href="{{ url('/app.apk') }}">
            <iconify-icon width="36" icon="humbleicons:download"></iconify-icon>
            <p>Download App</p>
        </a> --}}

        <a class="green" href="javascript:void(0);" data-role="language-switch">
            <iconify-icon width="36" icon="ion:language-sharp"></iconify-icon>
            <p>English</p>
        </a>

        <a class="red" href="{{ route('logout') }}">
            <iconify-icon width="36" icon="streamline:logout-1-solid"></iconify-icon>
            <p>Logout</p>
        </a>
        
    </div>

</div>

@include('app.main.mine.modal')
@endsection

@push('script')
<script src="{{ asset(themes('js/modal.js')) }}"></script>
<script src="{{ asset(themes('js/copypaste.js')) }}"></script>
<script src="{{ asset(themes('js/change-language.js')) }}"></script>
@endpush