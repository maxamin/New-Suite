@extends("app.layout.ozo")

@push("page_title") Daily Check-Ins @endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="sign-in">
    <img src="{{ asset(themes('img/group.jpeg')) }}" alt="">

    <p>VIP members exclusive daily sign in</p>

    <div class="list">
        <!-- item 1 -->
        @foreach($checkins as $chec)
        <div>
            <div>
                <div></div>
                <p>{{ $chec->vip->name }}</p>
            </div>
            <div>
                <p>{{ $chec->text_desc }}</p>
                <p>{{ price($chec->amount) }}</p>
            </div>
            <div>
                @if(auth()->user()->vip == $chec->vip && $today == 0)
                    <button type="button" class="gift-submit bg-green" data-id="{{ $chec->id }}">Get</button>
                @else
                    <button type="button">
                        <iconify-icon icon="hugeicons:time-half-pass" width="16" height="16"  style="color: black"></iconify-icon>
                    </button>
                @endif
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

@push('script')
<script>
    $('.gift-submit').on('click', function() {
        
        // Get CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $id = $(this).data('id');

        var $button = this;

        $($button).html('<iconify-icon icon="line-md:loading-twotone-loop" width="24" height="24"  style="color: #fff"></iconify-icon>');

        // Make AJAX POST request
        $.ajax({
            type: 'POST',
            url: "{{route('user.checkin')}}",
            contentType: 'application/json',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": csrfToken
            },
            data:JSON.stringify({id:$id}),
            dataType: 'json',
            success: function(res) {
                if (res.status == true) {
                    //
                    $($button).val('');
                }

                $($button).html('Get');
                message(res.message);
            },
            error: function(jqXHR, textStatus, res) {
                var res = jqXHR.responseText;
                $($button).html('Get');
                message(res.message);
            }
        });
    });
</script>
@endpush