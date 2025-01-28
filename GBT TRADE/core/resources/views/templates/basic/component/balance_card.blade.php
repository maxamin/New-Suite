{{-- <div class="mt-1 mb-4">
    <div class="card">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col text-left">
                    <div class="mb-2">
                        <p class="text-secondary mb-0">Current Balance</p>
                        <h4 class="text-success mb-0 user_balance">{{ $general->cur_sym }} {{ showAmount($user->balance) }}</h4>
                    </div>
                    <div class="mb-0">
                        <p class="text-secondary mb-0">Robot Balance</p>
                        <h4 class="text-warning mb-0 user_trade_balance">{{ $general->cur_sym }} {{ showAmount($user->trade_balance) }}</h4>
                    </div>
                </div>
                <div class="col-auto">
                    <img style="img-fluid" width="110px" height="110px" src="{{asset('assets/images/new-logo-3d/coins.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="mt-1 mb-3">
    <div class="card">
        <div class="card-body px-4 pt-2 pb-1">
            <div class="row align-items-center">
                <div class="col-6 text-left">
                    <div class="mb-2">
                        <p class="text-secondary mb-0">Current Balance</p>
                        <h5 class="text-success mb-0 user_balance">{{ $general->cur_sym }} {{ showAmount($user->balance) }}</h5>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="mb-0">
                        <p class="text-secondary mb-0">Robot Balance</p>
                        <h5 class="text-warning mb-0 user_trade_balance">{{ $general->cur_sym }} {{ showAmount($user->trade_balance) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
