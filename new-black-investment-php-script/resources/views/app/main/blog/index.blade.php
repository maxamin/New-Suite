@extends("app.layout.ozo")

@push("page_title") News @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="news">
    <!-- first news -->
    @foreach($blogs as $news)
    <a href="{{ route('user.blog.page', ['id' => $news->slug]) }}">
        <div>
            <div>
                <p class="leading">
                    {{ $news->name }}
                </p>
                <p>{!! \Illuminate\Support\Str::words($news->content, 15) !!}</p>
                <p>
                    Date: {{ date("d/m/Y",strtotime($news->created_at)) }}
                </p>
            </div>
        </div>
        <div>
            <img src="{{ asset($news->image) }}" class="feature-img-square" alt="" />
        </div>
    </a>
    @endforeach

</div>
@endsection

@push('script')
@endpush