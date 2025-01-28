<?php $__env->startSection('content'); ?>
<?php
    $inportentLinks = getContent('links.content', true);
?>

<!-- Top Nav -->
<?php echo $__env->make('templates.basic.layouts.mobile.top_nav_mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="appCapsule">
    <div class="container mt-3">

        <div class="card bg-gr-green-light-alt">
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img style="width: 50px" src="<?php echo e(asset('assets/images/3d-logo/support-24.png')); ?>" alt="">
                    </div>
                    <div class="col text-end">
                        <h5 class="mb-1 small-font-lg text-light">Customer Service</h5>
                        <a href="<?php echo e(@$inportentLinks->data_values->customer_service_telegram); ?>" class="btn btn-mini btn-light rounded-pill">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gr-navy mt-3">
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img style="width: 50px" src="<?php echo e(asset('assets/images/3d-logo/telegram.png')); ?>" alt="">
                    </div>
                    <div class="col text-end">
                        <h5 class="mb-1 small-font-lg text-light">Telegram</h5>
                        <a href="<?php echo e(@$inportentLinks->data_values->telegram_group); ?>" class="btn btn-mini btn-light rounded-pill">
                            Join
                        </a>
                    </div>
                </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/support/online_service.blade.php ENDPATH**/ ?>