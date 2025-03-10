@forelse($transactions as $trx)
<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-auto pr-0">
                <div class="avatar avatar-50 rounded">
                    <div class="background">
                        <img width="50px" src="{{ asset('assets/images/3d-logo/trx.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col align-self-center pr-0">
                <h6 class="font-weight-normal mb-1 text-white"> {{ __(@$trx->details) }}</h6>
                <p class="small text-white">{{ showDateTime($trx->created_at, 'd-m-Y') }} |
                    {{ diffForHumans($trx->created_at) }}
                    <br>
                    Trx: <b class="text-light">{{ $trx->trx }}</b>
                </p>
            </div>

            <div class="col-auto">

                <h6 class="mb-0 text-no-shadow trxAmount  @if ($trx->trx_type == '+') {{ 'text-success' }} @else {{ 'text-danger' }} @endif">

                    @if (getAmount($trx->amount) != 0)
                        {{ __($trx->trx_type) }}
                        {{ __($general->cur_sym) }}
                        {{ getAmount($trx->amount) }}
                    @else
                        {{ __($trx->trx_type) }}
                        {{ __($general->cur_sym) }}
                        {{ getAmount($trx->charge) }}
                    @endif

                </h6>

            </div>

        </div>
    </div>
</div>
@empty
    <div colspan="100%" class="text-center text-danger">@lang('Data Not Found')!</div>
@endforelse
{{ paginateLinks($transactions) }}
