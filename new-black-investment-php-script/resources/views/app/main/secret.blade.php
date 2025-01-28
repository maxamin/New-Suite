@extends("app.layout.ozo")

@push("page_title") Settings @endpush

@push('style')
@endpush
@section('container') <div class="w-full pb-20"> @endsection

@section('content')
@include("app.layout.ozo_header_nav")

<!-- list -->
<div class="settings">
    <a href="{{route('user.card')}}">
        <div>
            <iconify-icon width="30" height="30" icon="hugeicons:user-account"></iconify-icon>
            <p>Bind Bank</p>
        </div>
        <iconify-icon icon="solar:arrow-right-broken" width="24" height="24"></iconify-icon>
    </a>

    <a href="{{route('user.change-password')}}">
        <div>
            <iconify-icon width="30" height="30" icon="mdi:password-check"></iconify-icon>
            <p>Password</p>
        </div>
        <iconify-icon icon="solar:arrow-right-broken" width="24" height="24"></iconify-icon>
    </a>
</div>
@endsection

@push('script')
@endpush