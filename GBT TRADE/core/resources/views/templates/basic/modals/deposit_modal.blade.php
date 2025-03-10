@php
    $eDokanPay = App\Models\Gateway::where('code', 999)->first();
    $gateway_parameters  = json_decode($eDokanPay->gateway_parameters, true);
@endphp

<style>
    .modal-fullscreen{
        margin: 0px !important;
    }
    .modal-fullscreen .modal-content{
        border-radius: 0px !important;
        height: 100vh !important;
    }
    .modal-fullscreen .modal-header {
        flex-direction: row-reverse;
    }
    .modal-fullscreen .modal-header .close {
        padding: 0;
        margin: unset;
    }
    .modal-fullscreen .modal-body {
        overflow-y: auto;
    }
    .align-custom-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        right:0;
        width: 95%;
        margin: auto;
    }

</style>

<!-- Modal -->
<div class="modal" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title" id="depositModalLabel">Add Fund</h5>
                <button id="depositModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="las la-angle-left text-light"></i>
                    </span>
                </button>
            </div>
            <div id="depositModalBoday" class="modal-body">
                <div class="main-container">
                    <div class="container">
                        <form id="depositForm" action="{{ route('user.deposit.insert') }}" method="post">
                            @csrf
                            <input type="hidden" name="method_code" id="method_code">
                            <input type="hidden" name="currency" id="currency">
                            <!-- Input -->
                            <p class="text-center text-secondary mb-1">Enter Amount to Add</p>
                            <div class="input-group mb-3">
                                <input type="number" step="any" name="amount" class="form-control large-gift-card border"
                                    value="" autocomplete="off" placeholder="00.00" required>
                            </div>

                            <p class="text-center text-secondary mb-4">
                                Available: <span class="text-success">{{ $general->cur_sym }} {{ showAmount(auth()->user()->balance) }}</span>
                            </p>

                            <!-- Select Method -->
                            <div id="methodSelect" class="card d-none">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="custom-control custom-switch">
                                                <input type="radio" class="custom-control-input" id="pay3"
                                                    checked="">
                                                <label class="custom-control-label" for="pay3"></label>
                                            </div>
                                        </div>

                                        <div class="col pl-0">
                                            <h6 class="subtitle mb-0">Add via</h6>
                                        </div>
                                        <div class="col-7">
                                            <select style="height: fit-content;" class="form-control form-select p-0 ps-1"
                                                name="gateway">
                                                <option value="">@lang('Select One')</option>
                                                @foreach ($gatewayCurrency as $data)
                                                    <option value="{{ $data->method_code }}" @selected(old('gateway') == $data->method_code)
                                                        data-gateway="{{ $data }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <style>
                            /* gateway-section */
                            .gatewayItem {
                                padding: 10px;
                                border-radius: 11px;
                                border: 1px solid #dee2e6;
                                cursor: pointer;
                                background: #ffffff6e;
                            }

                            .gatewayActive {
                                background: #ffcf5d6e;
                                border: 2px solid #ffc107 !important;
                            }

                            .gatewayItem img {
                                max-width: 110px;
                                width: 100%;
                                transition: transform .2s;
                            }

                            .gatewayItem img:hover {
                                transform: scale(1.1);
                            }
                        </style>
                        <div class="gatewayItemBody mt-3">
                            <h6 class="text-center mb-3">
                                <i class="las la-fingerprint"></i> <u>Select Deposit Method</u>
                            </h6>
                            <div class="row justify-content-center">
                                @foreach ($gatewayCurrency as $data)
                                    <div class="col-4">
                                        <div class="gatewayItem text-center" data-gateway="{{ $data }}">
                                            <img width="100%" src="{{ getImage(imagePath()['gateway']['path'] . '/' . $data->image, imagePath()['gateway']['path']) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                            <!-- Preview Menual-->
                            <div class="my-4 preview-details d-none">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <ul class="list-group list-group-flush payment-list">
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item d-flex justify-content-between">
                                                        <span>@lang('Limit')</span>
                                                        <span><span class="min fw-bold">0</span> {{ __($general->cur_text) }} -
                                                            <span class="max fw-bold">0</span>
                                                            {{ __($general->cur_text) }}</span>
                                                    </li>
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item d-flex justify-content-between">
                                                        <span>@lang('Charge')</span>
                                                        <span><span class="charge fw-bold">0</span>
                                                            {{ __($general->cur_text) }}</span>
                                                    </li>
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item d-flex justify-content-between">
                                                        <span>@lang('Payable')</span> <span><span class="payable fw-bold">
                                                                0</span>
                                                            {{ __($general->cur_text) }}</span>
                                                    </li>
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item justify-content-between d-none rate-element">

                                                    </li>
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item justify-content-between d-none in-site-cur">
                                                        <span>@lang('In') <span class="method_currency"></span></span>
                                                        <span class="final_amo fw-bold">0</span>
                                                    </li>
                                                    <li style="border-width: 0 0 0;"
                                                        class="list-group-item justify-content-center crypto_currency d-none">
                                                        <span>@lang('Conversion with') <span class="method_currency"></span>
                                                            @lang('and final value will Show on next step')</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Preview Auto-->
                            <div id="autoPreview" class="my-4 text-center d-none">
                                <h6 class="mb-0">1 {{@$general->cur_text}} = <span id="eDokanRate">{{$gateway_parameters['rate']}}</span> {{$gateway_parameters['currency']}}</h6>
                                <h6 class="mb-0">You will Pay: <span id="eDokanPayable"></span> {{$gateway_parameters['currency']}}</h6>
                            </div>

                            <div class="mb-5"></div>

                            <div class="my-1 align-custom-bottom" id="submitBtn">
                                <button type="submit" class="btn btn-default my-2 border-0 rounded w-100 menualBtn">Next Step</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--AutoPayment Redirect-->
<div id="LocationPayment"></div>

@push('script')

<script>
    $(document).on('change', '.selectMethod', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if(value==='checkout'){
            $(this).removeAttr('name');
            $('.gatewayType').attr('name', 'wallet_type');
            $('.gatewayItemBody').removeClass('d-none');
        }else {
            $('.gatewayType').removeAttr('name');
            $(this).attr('name', 'wallet_type');
            $('.gatewayItemBody').addClass('d-none');
        }
    });

    $(document).on('click', '.gatewayItem', function (e) {
        e.preventDefault();
        let gateway = $(this).data('gateway');
        console.log(gateway);

        $('.gatewayItem').removeClass('gatewayActive');
        $(this).addClass('gatewayActive');

        // $('[name=gateway]').val(gateway.method_code);
        $('select[name=gateway]').val(gateway.method_code).change();
        $('[name=method_code]').val(gateway.method_code);
        $('[name=currency]').val(gateway.currency);

    });
</script>


    <script>

        //deposit form submit
        $(document).on('submit', '#depositForm', function(e) {
            e.preventDefault()
            if ($('[name=method_code]').val() == '') {
                return notifyMsg("Select a Payment Method!", "warning")
            }
            let formData = new FormData($("#depositForm")[0])

            $.ajax({
                type: "POST",
                url: "{{ route('user.deposit.insert') }}",
                data: formData,
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(res) {
                    console.log(res);
                    $('#depositModalBoday').html(res.view);
                    if (res.cls != 'success') {
                        notifyMsg(res.msg, res.cls)
                    }
                },
                error: function(err) {
                    let errors = err
                    console.log(err);
                }
            });

        });

        $(document).on('submit', '#menualDeposit', function(e) {
            e.preventDefault();
            // alert()
            let formData = new FormData($("#menualDeposit")[0])
            $.ajax({
                type: "POST",
                url: "{{ route('user.deposit.manual.update') }}",
                data: formData,
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(res) {
                    // $('#depositModal').modal('hide');
                    // recallDeposit()
                    $("#depositModalClose").click();
                    $('#depositModalBoday').load(location.href + ' #depositModalBoday');
                    notifyMsg(res.msg, res.cls)
                }
            });
        });

        //copy Address
        $(document).on('click', "#copyBoard", function(e) {
            e.preventDefault();
            var copyText = document.getElementById("addressURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            notifyMsg("Copied: " + copyText.value, 'success')

            // iziToast.success({
            //     message: "Copied: " + copyText.value,
            //     position: "topRight"
            // });

        });

        $(document).on('change', 'select[name=gateway]', function() {
            if (!$('select[name=gateway]').val()) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            var resource = $('select[name=gateway] option:selected').data('gateway');
            var fixed_charge = parseFloat(resource.fixed_charge);
            var percent_charge = parseFloat(resource.percent_charge);
            var rate = parseFloat(resource.rate)
            if (resource.method.crypto == 1) {
                var toFixedDigit = 8;
                $('.crypto_currency').removeClass('d-none');
            } else {
                var toFixedDigit = 2;
                $('.crypto_currency').addClass('d-none');
            }
            $('.min').text(parseFloat(resource.min_amount).toFixed(2));
            $('.max').text(parseFloat(resource.max_amount).toFixed(2));
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            if (amount <= 0) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            $('.preview-details').removeClass('d-none');
            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
            $('.charge').text(charge);
            var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
            $('.payable').text(payable);
            var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(
                toFixedDigit);
            $('.final_amo').text(final_amo);
            if (resource.currency != '{{ $general->cur_text }}') {
                var rateElement =
                    `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{ __($general->cur_text) }} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                $('.rate-element').html(rateElement)
                $('.rate-element').removeClass('d-none');
                $('.in-site-cur').removeClass('d-none');
                $('.rate-element').addClass('d-flex');
                $('.in-site-cur').addClass('d-flex');
            } else {
                $('.rate-element').html('')
                $('.rate-element').addClass('d-none');
                $('.in-site-cur').addClass('d-none');
                $('.rate-element').removeClass('d-flex');
                $('.in-site-cur').removeClass('d-flex');
            }
            $('.base-currency').text(resource.currency);
            $('.method_currency').text(resource.currency);
            $('input[name=currency]').val(resource.currency);
            $('input[name=method_code]').val(resource.method_code);
            $('input[name=amount]').on('input');
        });

        $(document).on('input', 'input[name=amount]', function() {
            $('select[name=gateway]').change();
            $('.amount').text(parseFloat($(this).val()).toFixed(2));
        });
    </script>
@endpush
