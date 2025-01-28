@extends($activeTemplate . 'layouts.mobile')
@section('content')
    <!-- Top Nav -->
    @include('templates.basic.layouts.mobile.top_nav_mini')
    <div id="appCapsule">
        <div class="container mt-3">
            <form action="" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label mb-0 mt-1">@lang('Current Password')</label>
                    <input type="password" class="form-control form-control-sm" name="current_password" required
                        autocomplete="current-password">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label mb-0 mt-1">@lang('Password')</label>
                    <input type="password" class="form-control form-control-sm" name="password" required
                        autocomplete="current-password">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label mb-0 mt-1">@lang('Confirm Password')</label>
                    <input type="password" class="form-control form-control-sm" name="password_confirmation" required
                        autocomplete="current-password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded-pill w-100 mt-3">@lang('Submit')</button>
                </div>
            </form>
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
@if ($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif

@push('style')
    <style>
        input:not([type="radio"]), .form-control {
            padding: 7px 20px;
        }
    </style>
@endpush
