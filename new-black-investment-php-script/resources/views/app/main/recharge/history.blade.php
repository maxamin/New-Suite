@extends("app.layout.ozo")

@push("page_title") Recharge record @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="record">
    <div class="list">

        @foreach($payments as $element)
            @php

                $status_text = 'Success';
                if($element->status == 'pending') {
                    $status_text = 'Pending';
                }elseif($element->status == 'rejected') {
                    $status_text = 'Rejected';
                }
            @endphp
            <div>
                <div>
                    <p>Time: {{ \Carbon\Carbon::parse($element->created_at)->format('d M y h:i') }}</p>
                </div>
                <div>
                    <p>Ref: {{ $element->order_id }} :: {!! $status_text !!}</p>
                    <p>{{price($element->final_amount)}}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
<div class="" style="height: 650px"></div>
@endsection

@push('script')
@endpush