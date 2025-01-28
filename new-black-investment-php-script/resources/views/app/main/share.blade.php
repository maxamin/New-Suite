@extends("app.layout.ozo")

@push("page_title") Invite @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

@php
    $sharelink = url('register').'?ref_by='.auth()->user()->ref_id;
@endphp

<div class="invite-ribbon">
    <p>User Invitation introduction: {{ auth()->user()->ref_id }}</p>
    <button type="button" onclick="copy('{{auth()->user()->ref_id}}')">Copy</button>
</div>
<div class="invite-ribbon">
    <p>{{$sharelink}}</p>
    <button onclick="copy('{{ $sharelink }}')">Copy Link</button>
</div>

<div class="invite">
    <p>Invitation Rule</p>
    <div>
        <iconify-icon width="26" icon="simple-line-icons:badge"></iconify-icon>
        <div>
            {!! $setting->invite_summery !!}
        </div>
    </div>

    <div>
        <iconify-icon width="26" icon="simple-line-icons:badge"></iconify-icon>
        <div>
            {!! $setting->invite_summery_2 !!}
        </div>
    </div>

    <div>
        <iconify-icon width="26" icon="simple-line-icons:badge"></iconify-icon>
        <div>
            {!! $setting->invite_summery_3 !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
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