@extends($activeTemplate . 'layouts.mobile')
@section('content')
    <style>
        input:not([type="radio"]),
        .form-control {
            padding: 5px 10px;
        }

        .input-group-text {
            background: #00D093;
        }

        label {
            color: #ffffff;
            margin-bottom: 1px;
            font-size: 13px;
        }
        .form-check-input:checked {
            background-color: #00d094;
            border-color: #00d094;
        }

        input:not([type="radio"]), .form-control {
            color: #f6f6f6;
            background: rgba( 0, 208, 148, 0% );
            box-shadow: 3px 2px 9px 0 rgb(31 38 135 / 20%);
            backdrop-filter: blur( 6px );
            -webkit-backdrop-filter: blur( 6px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
        input:not([type="radio"]):hover,
        input:not([type="radio"]):focus,
        .form-control:hover,
        .form-control:focus {
            color: #f6f6f6;
            background: rgba( 0, 208, 148, 0% ) !important;
            box-shadow: 3px 2px 9px 0 rgb(31 38 135 / 20%) !important;
            backdrop-filter: blur( 6px ) !important;
            -webkit-backdrop-filter: blur( 6px ) !important;
            border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
        }
    </style>
    @include('templates.basic.layouts.mobile.top_nav_mini')
    @php
        $noticeCaption = getContent('notice.content', true);
    @endphp
    <div id="appCapsule">

        <div class="container mt-3 mb-3">

            <div class="card glass-bg my-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 small-font-lg text-light">{{$myMethod ? $myMethod->name : ''}}</h5>
                            <h5 class="mb-0 small-font-lg text-light">{{$bank_card ? $bank_card['account_number'] : ''}}</h5>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet text-primary" style="font-size: 40px; opacity: 30%;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <p class="mb-0 small-font text-light">Total Asset</p>
                    <h6 class="mb-0 small-font-lg text-light">{{ showAmount($user->balance) }} {{__($general->cur_text)}}</h6>
                </div>
            </div>

            <div class="card my-2 rounded glass-bg">
                <div class="card-body p-2">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="bank" checked>
                                <label class="form-check-label text-primary" for="bank">
                                  USDT TRC20
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{route('user.withdraw.new.now')}}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="method_code" value="{{$myMethod->id}}">
                <div class="mb-3">
                    <label class="form-label">Plese enter the withdrawal amount</label>
                    <input type="number" class="form-control glass-bg" name="amount" placeholder="Plese enter the withdrawal amount" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Plese enter the fund password</label>
                    <input type="text" class="form-control glass-bg" name="fund_password" placeholder="Plese enter the fund password" required>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill w-100">Submit</button>
            </form>

            <div class="card rounded glass-bg mt-5">
                <div class="card-header border-secondary py-1">
                    <p>Warm Tips</p>
                </div>
                <div class="card-body">
                    <p class="small-font text-light">
                        @php
                            echo $noticeCaption->data_values->withdraw_notice;
                        @endphp
                    </p>
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
