<div class="hv-item">
    <div class="hv-item-parent">
        <div class="person">
            @if(null != $levelUser->avatar)
            @else
            @endif
            <p class="name">
                @if($me)
                    {{ __("It's Me") }} {{ preg_replace('/\+\d+/', '', $levelUser->phone) }}
                @else
                    <b>{{ preg_replace('/^\+\d{1,4}|\d{4}$/', '', $levelUser->phone) }}**** <br> @if(setting('deposit_level'))
                            {{ __('Deposit') }} {{ $currencySymbol.$levelUser->totalDeposit() }},
                        @endif @if(setting('investment_level'))
                            {{ __('Invest') }} {{ $currencySymbol.$levelUser->totalInvestment() }},
                        @endif @if(setting('profit_level'))
                            {{ __('Profit') }} {{ $currencySymbol.$levelUser->totalRoiProfit() }}
                        @endif</b>
                @endif

            </p>
        </div>
    </div>



    @if($depth && $level > $depth && $levelUser->referrals->count() > 0)

        <div class="hv-item-children">

            @foreach($levelUser->referrals as $levelUser)
                <div class="hv-item-child">
                    <!-- Key component -->
                    @include('frontend.referral.include.__tree',['levelUser' => $levelUser,'level' => $level,'depth' => $depth + 1,'me' => false])
                </div>
            @endforeach

        </div>

    @endif


</div>


