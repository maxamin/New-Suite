@extends("app.layout.ozo")

@push("page_title") Change Password @endpush

@push('style')
@endpush

@section('content')
<form action="{{route('user.change.password')}}" method="post" autocomplete="off">
        @csrf
    @include("app.layout.ozo_header_nav")

    <div class="auth">        
        <div class="form">

            <label class="form-control" for="name">
                <p>Login Password</p>
                <div>
                    <iconify-icon width="21" icon="mingcute:lock-line"></iconify-icon>
                    <input placeholder="Please enter login password" type="password" name="current_password" value="{{old('current_password')}}">
                </div>
            </label>

            <label class="form-control" for="name">
                <p>New Password</p>
                <div>
                    <iconify-icon width="21" icon="mingcute:lock-line"></iconify-icon>
                    <input placeholder="Please enter new password" type="text" name="new_password" value="{{old('new_password')}}">
                </div>
            </label>

            <label class="form-control" for="name">
                <p>Confirm New Password</p>
                <div>
                    <iconify-icon width="21" icon="mingcute:lock-line"></iconify-icon>
                    <input placeholder="Please enter confirm new password" type="text" name="confirm_password" value="{{old('confirm_password')}}">
                </div>
            </label>

            <button type="submit" class="btn-submit">Change</button>
        </div>
    </div>
</form>
@endsection

@push('script')
@endpush