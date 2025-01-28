@extends("app.layout.ozo")

@push("page_title") Balance Summary @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="balance">
    <div>
        <p>Balance</p>
        <table>
            <tr><td>My Balance</td> <td>{{ price(auth()->user()->balance) }}</td></tr>
            <tr><td>My Earning</td> <td>{{ price(auth()->user()->income) }}</td></tr>
            <tr><td>pending Deposit</td> <td>{{ price($pending_payment) }}</td></tr>
            <tr><td>pending Withdraw</td> <td><Span>{{ price($pending_withdraw) }}</Span></td></tr>
        </table>
    </div>

    @if(count($transactions) > 0)<p>Transaction History</p>@endif
</div>

<div class="record">
    <div class="list">

        @foreach($transactions as $element)
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
                    <p>{!! $element->perticulation !!} :: {!! $status_text !!}</p>
                    <p>{{price($element->amount)}}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="" style="height: 650px"></div>
@endsection

@push('script')
@endpush