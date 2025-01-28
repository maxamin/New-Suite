@php
    $yourLinks = getContent('links.content', true);
@endphp

<!-- App Download Modal -->
<div class="modal fade" id="appDownloadModal" tabindex="-1" role="dialog" aria-labelledby="appDownloadModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-custom">
            <div style="justify-content: center;" class="modal-header py-1">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Install Software</h5>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center align-items-center">

                    <div class="col-auto text-center">
                        <a class="text-white" href="{{ $yourLinks->data_values->AppleApps }}">
                            <div class="card-box">
                                <img style="width: 80px; height: 80px; max-width: 80px; max-height: 80px;" src="https://img.icons8.com/fluency/100/apple-app-store.png" alt="">
                                <p style="font-size: 14px;">Apple</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto text-center">
                        <a class="text-white" href="{{ $yourLinks->data_values->AndroidApps }}">
                            <div class="card-box">
                                <img style="width: 80px; height: 80px; max-width: 80px; max-height: 80px;" src="https://img.icons8.com/fluency/100/google-play-store-new.png" alt="">
                                <p style="font-size: 14px;">Android</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-sm text-light border-custom w-100" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
