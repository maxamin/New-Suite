@extends('frontend.layouts.user')
@section('title')
    {{ __('Withdraw Now') }}
@endsection
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;">{{ __('Withdraw') }}</h3>
</div>
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Withdraw Money') }}</h3>
                    <div class="card-header-links">
                        <a href="{{ route('user.withdraw.account.index') }}"
                           class="card-header-link">{{ __('Withdraw Account') }}</a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="progress-steps-form">
                        <form action="{{ route('user.withdraw.now') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-12 mb-3">
                                    <label for="exampleFormControlInput1"
                                           class="form-label">{{ __('Withdraw Account') }}</label>
                                    <div class="input-group">
                                        <select name="withdraw_account" id="withdrawAccountId" class="site-nice-select">
                                            <option selected disabled>{{ __('Withdraw Method') }}</option>
                                            @foreach($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->method_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">{{ __('Amount') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="amount"
                                               oninput="this.value = validateDouble(this.value)"
                                               class="form-control withdrawAmount" placeholder="Enter Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="buttons" style="display: flex; justify-content: center;">
                                <button type="submit" class="site-btn blue-btn" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                    {{ __('Withdraw Money') }}<i class="anticon anticon-double-right"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        "use strict";
        var info = [];
        $("#withdrawAccountId").on('change',function (e) {
            e.preventDefault();

            $('.selectDetailsTbody').children().not(':first', ':second').remove();
            var accountId = $(this).val()
            var amount = $('.withdrawAmount').val();

            if (!isNaN(accountId)) {
                var url = '{{ route("user.withdraw.details",['accountId' => ':accountId', 'amount' => ':amount']) }}';
                url = url.replace(':accountId', accountId,);
                url = url.replace(':amount', amount);

                $.get(url, function (data) {
                    $(data.html).insertAfter(".detailsCol");
                    info = data.info;
                    $('.withdrawAmountRange').text(info.range)
                    $('.processing-time').text(info.processing_time)
                })
            }


        })

        $(".withdrawAmount").on('keyup',function (e) {
            "use strict"
            e.preventDefault();
            var amount = $(this).val()
            var charge = info.charge_type === 'percentage' ? calPercentage(amount, info.charge) : info.charge
            $('.withdrawAmount').text(amount)
            $('.withdrawFee').text(charge)
            $('.processing-time').text(info.processing_time)
            $('.withdrawAmountRange').text(info.range)

        })
    </script>
@endsection
