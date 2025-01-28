@php
$noticeCaption = getContent('notice.content',true);
@endphp
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered m-5" style="margin-top: -30px !important;" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center py-2">
                <h6 class="modal-title" id="noticeModalScrollableTitle">Importent Notice</h6>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> --}}
            </div>
            <div class="modal-body">
                @php
                    echo $noticeCaption->data_values->YourNotice;
                @endphp
            </div>
        </div>
        <button type="button" class="btn btn-danger btn-circle btn-sm p-1 mt-2"
            data-dismiss="modal" aria-label="Close">
            <i class="las la-power-off" style="font-size: 20px; margin-top: -1.4px"></i>
        </button>
    </div>
</div>
