@extends("app.layout.ozo")

@push("page_title") VIP @endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="vip">
    <div>
        @foreach($vips as $vip)
        <div>
            <div>
                <span>{{ $vip->name }}</span>
                <p>{{ price($vip->amount) }}</p>
            </div>
            <div>
                <p>{!! $vip->text_desc !!}</p>
            </div>
        </div>
        @endforeach
        
    </div>                
</div>
@endsection

@push('script')
@endpush