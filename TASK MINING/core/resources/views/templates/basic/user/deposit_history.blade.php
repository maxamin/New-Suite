@extends($activeTemplate.'layouts.mobile')
@section('content')
@include('templates.basic.layouts.mobile.top_nav_mini')

<div id="appCapsule">
    <div class="container mt-3">
        @forelse ($deposits as $k=>$deposit)

            <div class="card glass-bg my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto ps-1">
                            <p class="text-light mb-0 small-font">
                                {{$k+1}}.
                            </p>
                        </div>
                        <div class="col pe-1">
                            <div class="row">
                                <div class="col pe-1">
                                    <p class="text-light mb-0 small-font">
                                        {{ $deposit->created_at }}
                                        @if ($deposit->status == 1)
                                            <span class="ps-2 text-success">Success</span>
                                        @elseif ($deposit->status == 2)
                                            <span class="ps-2 text-warning">Processing</span>
                                        @elseif ($deposit->status == 3)
                                            <span class="ps-2 text-danger">Failed</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-auto ps-0">
                                    <h5 class="mb-0 text-start small-font text-light fw-bold">
                                        {{ getAmount($deposit->amount ) }} {{ __($general->cur_text) }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pe-1">
                                    <p class="text-light mb-0 small-font">
                                        Order Number: <span class="fw-bold">{{ $deposit->trx }}</span>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="text-light mb-0 small-font">
                                        <span class="fw-bold">OnlinePayment</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            {{-- <div class="card glass-bg my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0 text-start small-font-lg text-primary">
                                Deposit With {{ __(@$deposit->gateway?->name) }}
                            </h6>
                        </div>
                        <div class="col-auto">
                            <h6 class="mb-0 small-font text-secondary">
                                @php echo $deposit->statusBadge @endphp
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
                                {{ getAmount($deposit->amount ) }} {{ __($general->cur_text) }}
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
                            <p class="mb-0 text-start small-font text-warning">
                                {{ $deposit->trx }}
                            </p>
                        </div>
                    </div>

                </div>
            </div> --}}

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
            {{ $deposits->links() }}
        </div>
    </div>
</div>

{{-- <div class="cmn-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0 py-3">

                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive--sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>@lang('Gateway | Transaction')</th>
                                        <th class="text-center">@lang('Initiated')</th>
                                        <th class="text-center">@lang('Amount')</th>
                                        <th class="text-center">@lang('Conversion')</th>
                                        <th class="text-center">@lang('Status')</th>
                                        <th>@lang('Details')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($deposits as $deposit)
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> <span class="text-primary">{{ __($deposit->gateway?->name) }}</span> </span>
                                                <br>
                                                <small> {{ $deposit->trx }} </small>
                                           </td>

                                           <td class="text-center">
                                               {{ showDateTime($deposit->created_at) }}<br>{{ diffForHumans($deposit->created_at) }}
                                           </td>
                                           <td class="text-center">
                                              {{ __($general->cur_sym) }}{{ showAmount($deposit->amount ) }} + <span class="text-danger" title="@lang('charge')">{{ showAmount($deposit->charge)}} </span>
                                               <br>
                                               <strong title="@lang('Amount with charge')">
                                               {{ showAmount($deposit->amount+$deposit->charge) }} {{ __($general->cur_text) }}
                                               </strong>
                                           </td>
                                           <td class="text-center">
                                              1 {{ __($general->cur_text) }} =  {{ showAmount($deposit->rate) }} {{__($deposit->method_currency)}}
                                               <br>
                                               <strong>{{ showAmount($deposit->final_amo) }} {{__($deposit->method_currency)}}</strong>
                                           </td>
                                           <td class="text-center">
                                               @php echo $deposit->statusBadge @endphp
                                           </td>
                                            @php
                                                $details = ($deposit->detail != null) ? json_encode($deposit->detail) : null;
                                            @endphp

                                            <td>
                                                <a href="javascript:void(0)" class="btn btn--base btn-sm @if($deposit->method_code >= 1000) detailBtn @else disabled @endif"
                                                    @if($deposit->method_code >= 1000)
                                                        data-info="{{ $details }}"
                                                    @endif
                                                    @if ($deposit->status == Status::PAYMENT_REJECT)
                                                    data-admin_feedback="{{ $deposit->admin_feedback }}"
                                                    @endif
                                                    >
                                                    <i class="fa fa-desktop"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($deposits->hasPages())
                    <div class="card-footer">
                        {{ $deposits->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- APPROVE MODAL --}}
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Details')</h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <ul class="list-group userData mb-2">
                </ul>
                <div class="feedback"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
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
@endsection


@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.detailBtn').on('click', function () {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if(userData){
                    userData.forEach(element => {
                        if(element.type != 'file'){
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if($(this).data('admin_feedback') != undefined){
                    var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                }else{
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);


                modal.modal('show');
            });
        })(jQuery);

    </script>
@endpush
