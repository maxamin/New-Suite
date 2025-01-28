@extends($activeTemplate . 'layouts.mobile')
@section('content')
@include('templates.basic.layouts.mobile.top_nav_mini')


<div id="appCapsule">
    <div class="container mt-3">
        <div class="card glass-bg mb-4">
            <div class="card-body pb-1">
                <form action="">
                    <div class="d-flex flex-wrap gap-1">
                        <div class="flex-grow-1">
                            <label>@lang('Transaction Number')</label>
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control form-control-sm">
                        </div>
                        <div class="flex-grow-1">
                            <label>@lang('Type')</label>
                            <select name="trx_type" class="form-select form-control-sm">
                                <option value="">@lang('All')</option>
                                <option value="+" @selected(request()->trx_type == '+')>@lang('Plus')</option>
                                <option value="-" @selected(request()->trx_type == '-')>@lang('Minus')</option>
                            </select>
                        </div>
                        <div class="flex-grow-1">
                            <label>@lang('Remark')</label>
                            <select class="form-select form-control-sm" name="remark">
                                <option value="">@lang('Any')</option>
                                @foreach ($remarks as $remark)
                                    <option value="{{ $remark->remark }}" @selected(request()->remark == $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-grow-1 align-self-end">
                            <button class="btn btn-sm btn-primary w-100 filterBtn"><i class="las la-filter"></i> @lang('Filter')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @forelse ($transactions as $trx)

            <div class="card glass-bg my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0 text-start small-font-lg text-primary">
                                {{ __($trx->details) }}
                            </h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="mb-0 text-start small-font text-light">
                                Amount:
                            </p>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-start small-font text-primary">
                                <span class="fw-bold @if ($trx->trx_type == '+') text--success @else text--danger @endif">
                                    {{ $trx->trx_type }} {{ showAmount($trx->amount) }} {{ $general->cur_text }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0 text-start small-font text-light">
                                Transaction:
                            </p>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-start small-font-sm text-warning">
                                {{ $trx->trx }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0 text-start small-font-sm text-secondary">
                                {{ showDateTime($trx->created_at) }} - {{ diffForHumans($trx->created_at) }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        @empty
            <div class="card glass-bg">
                <div class="card-body">
                    <h6 class="mb-0 text-center small-font-lg text-secondary">
                        Ops, No Withdraw Record Found!
                    </h6>
                </div>
            </div>
        @endforelse

        <div class="d-flex justify-content-center mt-4">
            {{ $transactions->links() }}
        </div>

    </div>
</div>

        <footer>
<style type="text/css">
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
.skiptranslate {display:none !important;}
#google_translate_element2 {display:none!important;}
</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<script type="text/javascript">
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
</script>
<div class="clearfix fixed-bottom"></div>
</footer>


    {{-- <div class="cmn-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="show-filter mb-3 text-end">
                        <button type="button" class="btn btn--base showFilterBtn btn-sm"><i class="las la-filter"></i> @lang('Filter')</button>
                    </div>
                    <div class="card responsive-filter-card mb-4">
                        <div class="card-body">
                            <form action="">
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="flex-grow-1">
                                        <label>@lang('Transaction Number')</label>
                                        <input type="text" name="search" value="{{ request()->search }}" class="form-control form--control">
                                    </div>
                                    <div class="flex-grow-1">
                                        <label>@lang('Type')</label>
                                        <select name="trx_type" class="form-select form--select">
                                            <option value="">@lang('All')</option>
                                            <option value="+" @selected(request()->trx_type == '+')>@lang('Plus')</option>
                                            <option value="-" @selected(request()->trx_type == '-')>@lang('Minus')</option>
                                        </select>
                                    </div>
                                    <div class="flex-grow-1">
                                        <label>@lang('Remark')</label>
                                        <select class="form-select form--select" name="remark">
                                            <option value="">@lang('Any')</option>
                                            @foreach ($remarks as $remark)
                                                <option value="{{ $remark->remark }}" @selected(request()->remark == $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex-grow-1 align-self-end">
                                        <button class="btn btn--base w-100"><i class="las la-filter"></i> @lang('Filter')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card custom--card">
                        <div class="card-body p-0">
                            <div class="table-responsive--sm">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>@lang('Trx')</th>
                                            <th>@lang('Transacted')</th>
                                            <th>@lang('Amount')</th>
                                            <th>@lang('Post Balance')</th>
                                            <th>@lang('Detail')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transactions as $trx)
                                            <tr>
                                                <td>
                                                    <strong>{{ $trx->trx }}</strong>
                                                </td>

                                                <td>
                                                    {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at) }}
                                                </td>

                                                <td class="budget">
                                                    <span class="fw-bold @if ($trx->trx_type == '+') text--success @else text--danger @endif">
                                                        {{ $trx->trx_type }} {{ showAmount($trx->amount) }} {{ $general->cur_text }}
                                                    </span>
                                                </td>

                                                <td class="budget">
                                                    {{ showAmount($trx->post_balance) }} {{ __($general->cur_text) }}
                                                </td>


                                                <td>{{ __($trx->details) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@
@push('style')
<style>
    input:not([type="radio"]), .form-control {
        padding: 7px 20px;
    }
    .filterBtn{
        min-height: 38px !important;
    }
</style>
@endpush
