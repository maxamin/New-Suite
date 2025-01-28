@extends("app.layout.ozo")

@push("page_title") News @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="news-detail">

    <div style="background-image: url('{{ asset($blog->image) }}');" class="title">
        <div>
            <a href="news.html"><p><iconify-icon width="26" icon="eva:arrow-back-outline"></iconify-icon></p></a>
            <img src="{{ asset($blog->image) }}" alt="">
        </div>
    </div>

    <div class="container">
        <div>
            <p>
                {!! $blog->name !!}
            </p>
            <div class="author">
                <p>Author: {!! $blog->author !!}</p>
                <p>Date: {{ date("d/m/Y h:i",strtotime($blog->created_at)) }}</p>
            </div>

            <div class="summary">
                {!! $blog->content !!}
            </div>
        </div>   
    </div>
</div>
<div class="" style="height: 650px"></div>
@endsection

@push('script')
@endpush