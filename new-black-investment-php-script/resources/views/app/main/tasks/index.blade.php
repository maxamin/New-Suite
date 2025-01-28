@extends("app.layout.ozo")

@push("page_title") Tasks @endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="tasks">

    <!-- task -->
    @foreach($tasks as $task)
    <div>
        <div>
            <div class="round-badge">
                <img src="{{ asset(themes($task->type->photo)) }}" alt="">
            </div>
            <p>{{ price($task->amount) }}</p>
        </div>
        <div>
            <div>
                <p>{{ $task->name }}</p>
                <p>{!! $task->text_desc !!}</p>
            </div>
            <div>
                @if(auth()->user()->vip == $task->vip && $task->for_vip || $task->for_vip != 1)
                    <button type="button" class="task-submit" data-id="{{ $task->id }}">Get</button>
                @else
                    <button type="button">
                        <iconify-icon icon="hugeicons:time-half-pass" width="10" height="10"  style="color: white"></iconify-icon>
                    </button>
                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection

@push('script')
<script>
    $('.task-submit').on('click', function() {
        
        // Get CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $id = $(this).data('id');

        var $button = this;

        $($button).html('<iconify-icon icon="line-md:loading-twotone-loop" width="24" height="24"  style="color: #fff"></iconify-icon>');

        // Make AJAX POST request
        $.ajax({
            type: 'POST',
            url: "{{ route('user.task') }}",
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