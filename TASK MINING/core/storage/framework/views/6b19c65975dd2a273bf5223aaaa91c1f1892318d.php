<?php $__env->startSection('content'); ?>
<style>
    input:not([type="radio"]), .form-control {
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
</style>
<?php echo $__env->make('templates.basic.layouts.mobile.top_nav_mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $noticeCaption = getContent('notice.content', true);
?>
<div id="appCapsule">
    <div class="container mt-3 mb-3">
        
        <div class="card glass-bg">
            <div class="card-body">
                <div class="border border-secondary border-2 p-2">
                    <p class="mb-0 small-font-lg text-light">
                        <span id="randomTxt">
                            <?php
                                echo $noticeCaption->data_values->invite_notice;
                            ?>
                            <?php echo e(route('user.register')); ?>?inviteCode=<?php echo e(refCode_encode($user->id)); ?>

                        </span>
                        <span hidden id="refLink">
                            <?php echo e(route('user.register')); ?>?inviteCode=<?php echo e(refCode_encode($user->id)); ?>

                        </span>
                    </p>
                </div>
                <div class="row mt-2">
                    <div class="col-6 text-start">
                        <button onclick="copyTxt('randomTxt')" class="btn btn-sm btn-outline-light border border-2 border-secondary">Copy Text</button>
                    </div>
                    <div class="col-6 text-end">
                        <button onclick="copyTxt('refLink')" class="btn btn-sm btn-outline-light border border-2 border-secondary">Copy Link</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card glass-bg mt-3">
            <div class="card-body">
                <h5 class="small-font-lg text-light">
                    <?php
                        echo $noticeCaption->data_values->invite_page_notice;
                    ?>
                </h5>
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
<?php $__env->startPush('style'); ?>
<style type="text/css">
    .copytextDiv{
        border:1px solid #00000021;
        cursor: pointer;
    }
    #referralURL{
        border-right: 1px solid #00000021;
    }
    .bg-success-custom{
        background-color: #28a7456e!important;
    }
    .brd-success-custom{
        border: 1px dashed #28a745;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    (function ($) {
        "use strict";
        $('#copyBoard').click(function(){
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            notifyMsg("Copied: " + copyText.value, 'success')
        });
    })(jQuery);
</script>
<script type="text/javascript">
    (function ($) {
        "use strict";
        $('#copyBoard2').click(function(){
            var copyText = document.getElementById("referralCode");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            notifyMsg("Copied: " + copyText.value, 'success')
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/invite.blade.php ENDPATH**/ ?>