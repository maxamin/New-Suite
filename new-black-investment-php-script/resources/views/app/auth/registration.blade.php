@extends("app.layout.auth")

@push("page_title") Register @endpush

@push('style')
@endpush

@section('auth_header')
<div class="title">
    <img class="logo" src="{{ asset(themes('img/logo.jpeg')) }}" alt="">
    <p></p>
    <p class="notify">Create Account Now<span></span></p>

    <div>
        <a href="{{ route('login') }}" class="{{ menuActive('login') }}">Login</a>
        <a href="{{ route('register') }}" class="{{ menuActive('register') }}">Register</a>
    </div>
</div>
@endsection

@section('content')
<form action="{{route('register')}}" method="post" autocomplete="off">@csrf
    <label class="should-validate form-control" for="email">
        <p>Email</p>
        <div>
            <iconify-icon width="21" icon="line-md:email-opened-multiple-filled"></iconify-icon>
            <input validate="true" placeholder="Enter your email address" type="email" name="email">

        </div>
        <p class="hide">Enter email address please</p>
    </label>

    <label class="should-validate form-control" for="password">
        <p>Password</p>
        <div>
            <iconify-icon width="21" icon="mingcute:lock-line"></iconify-icon>
            <input validate="true" placeholder="Enter your password" type="password" name="password">
        </div>
        <p class="hide">Enter password Please</p>
    </label>

    <label class="should-validate form-control" for="password">
        <p>Confirm Password</p>
        <div>
            <iconify-icon width="21" icon="ri:user-5-line"></iconify-icon>
            <input validate="true" placeholder="Re-enter your password" type="password" name="c_password">
        </div>
        <p class="hide">Confirm password Please</p>
    </label>

    <label class="form-control" for="code">
        <p>Invitation Code</p>
        <div>
            <iconify-icon width="21" icon="mingcute:invite-line"></iconify-icon>
            <input placeholder="Enter code" type="text" name="ref_id" value="{{ $ref_by }}">
        </div>
    </label>

    <button type="submit" class="btn-submit">Register</button>
</form>
@endsection

@push('script')
<script src="{{ asset(themes('js/validate-form.js')) }}"></script>
<script src="{{ asset(themes('js/preloader.js')) }}"></script>
@endpush