@extends("app.layout.auth")

@push("page_title") Login @endpush

@push('style')
@endpush

@section('content')
<form action="{{route('login-submit')}}" method="post" autocomplete="off">@csrf
    <label class="should-validate form-control" for="email">
        <p>Email</p>
        <div>
            <iconify-icon width="21" icon="line-md:email-opened-multiple-filled"></iconify-icon>
            <input validate="true" placeholder="Enter your email address" type="email" name="email">

        </div>
        <p>Enter email address please</p>
    </label>

    <label class="should-validate form-control" for="password">
        <p>Password</p>
        <div>
            <iconify-icon width="21" icon="mingcute:lock-line"></iconify-icon>
            <input validate="true" placeholder="Enter your password" type="password" name="password">
        </div>
        <p>Wrong password</p>
    </label>

    <button type="submit" class="btn-submit">Login</button>
</form>
@endsection

@push('script')
<script src="{{ asset(themes('js/validate-form.js')) }}"></script>
<script src="{{ asset(themes('js/preloader.js')) }}"></script>
@endpush