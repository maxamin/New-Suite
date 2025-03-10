<form id="menualDeposit" action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 text-center mb-5">
            <p class="text-center mt-2">@lang('You have requested') <b
                    class="text-success">{{ showAmount($data['amount']) }}
                    {{ __($general->cur_text) }}</b> , @lang('Please pay')
                <b class="text-success">{{ showAmount($data['final_amo']) . ' ' . $data['method_currency'] }}
                </b> @lang('for successful payment')
            </p>
            <h5 class="text-center mb-4">@lang('Please follow the instruction')</h5>

            <p class="my-4 text-center">@php echo $data->gateway->description @endphp</p>

            @if ($method->wallet_address != null)
                <!-- Copy Address -->
                <div class="container">
                    <div class="pb-1">
                        <div class="row">
                            <div class="col-12 text-center pb-1">
                                <h3 class="text-success">SCAN IT</h3>
                                <img class="rounded border border-2 border-dark"
                                    src="https://chart.googleapis.com/chart?cht=qr&chl={{ @$method->wallet_address }}&chs=180x180&choe=UTF-8&chld=L|2"
                                    alt="QR Code">
                                <h4 class="text-danger pt-2">OR</h4>
                            </div>
                            <div class="col-12 text-center">
                                <h6 class="text-warning">===
                                    {{ @$method->wallet_address_lab }} ===</h6>
                            </div>
                        </div>

                        <div align="center" class="row pt-1 pb-1">
                            <div class="col px-0">
                                <input class="form-control border-custom text-center "
                                    type="text" value="{{ @$method->wallet_address }}"
                                    id="addressURL" readonly>
                            </div>
                            <div class="col-auto px-1">
                                <h4 class="btn btn-warning bg-gradiant text-white border-custom px-4"
                                    id="copyBoard">Copy</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-left">
                <x-viser-form identifier="id" identifierValue="{{ $gateway->form_id }}" />
            </div>

        </div>
        <div class="col-12 align-custom-bottom">
            <button type="submit" class="btn btn-default border-custom w-100 mb-3">@lang('Pay Now')</button>
        </div>
    </div>
</form>

@push('script')
    <script type="text/javascript">

        // $(document).on('submit', '#menualDeposit', function (e) {
        //     e.preventDefault();
        //     alert()

        // });

        // (function($) {
        //     "use strict";
        //     $('#copyBoard').click(function() {
        //         var copyText = document.getElementById("addressURL");
        //         copyText.select();
        //         copyText.setSelectionRange(0, 99999);
        //         /*For mobile devices*/
        //         document.execCommand("copy");
        //         iziToast.success({
        //             message: "Copied: " + copyText.value,
        //             position: "topRight"
        //         });
        //     });
        // })(jQuery);
    </script>
@endpush
