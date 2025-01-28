@extends("app.layout.ozo")

@push("page_title") My Order @endpush

@push('style')
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="income">
    <div class="title">
        <button class="active" role="product-switch" data-target="data1">In Progress</button>
        <button role="product-switch" data-target="data2">Completed</button>
    </div>

    @php
        $data[1] = collect($orders)->filter(function($item) {
            return $item->status == 'active';
        });

        $data[2] = collect($orders)->filter(function($item) {
            return $item->status == 'inactive';
        });
    @endphp

    @foreach([1,2] as $keydata)
        <div class="products-bag list hide" id="data{{ $keydata }}">

            <div class="card">
                <div>
                    <p>{{ price($receive_able_total_amount )}}</p>
                    <button type="button" onclick="user_received_amount()">Claim</button>
                </div>
                
                {!! $setting->income_summery !!}
            </div>

            @foreach($data[$keydata] as $plan)

                @php
                $package = $plan->package;
                
                $formattedNextDateTime = \Carbon\Carbon::parse($plan->next_return_date);
                @endphp
                <div class="item">
                    <p>{{ $package->name }}</p>
                    <div>
                        <div>
                            <img src="{{ view_image($package->photo) }}" alt="landscape">
                        </div>
                        <table>
                            <tr><td>Price</td><td>{{ price($package->price) }}</td></tr>
                            <tr><td>Validity</td><td>{{ $plan->days }} days</td></tr>
                            <tr><td>Daily income</td><td>{{ price($plan->interest) }}</td></tr>
                        </table>
                    </div>

                    <div>
                        @if($plan->earn_type == 'daily')
                            <p>Total earning {{ price($plan->interest * $plan->count_return) }} of {{ $plan->count_return }} days</p>
                            @if($plan->status == 'active')<p>Next earn drop at {{ $formattedNextDateTime->format('d M h:i') }}</p>@endif
                        @else
                            <p>Total earning {{ price($plan->interest * $plan->days) }} of {{ $plan->days }} days</p>
                            @if($plan->status == 'active')<p>You will receive your earnings after {{ $plan->days }} days</p>@endif
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    @endforeach

</div>
<div class="" style="height: 650px"></div>
@endsection

@push('script')
<script src="{{ asset(themes('js/product-switch.js')) }}"></script>
<script>
    function user_received_amount()
    {
        document.querySelector('.loader_boss').style.display = 'block';

        // Get CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Make AJAX POST request
        $.ajax({
            type: 'POST',
            url: "{{route('user.received.amount')}}",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function(res) {
                if (res.status == true) {
                    var elements = document.querySelectorAll('#amount');
                        elements.forEach(function(element) {
                            element.textContent = '0.00';
                        });
                }

                $('.loader_boss').hide();
                message(res.message);
            },
            error: function(jqXHR, textStatus, res) {
                var res = jqXHR.responseText;
                $('.loader_boss').hide();
                message(res.message);
            }
        });
    }
</script>
@endpush