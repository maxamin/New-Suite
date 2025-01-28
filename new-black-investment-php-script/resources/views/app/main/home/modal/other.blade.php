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