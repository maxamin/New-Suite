<?php $__env->startSection('content'); ?>
<div class="cmn-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="<?php echo e(route('user.deposit.insert')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="currency">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Select USDT Network'); ?></label>
                                <select class="form-select form--select" name="gateway" required>
                                    <option value=""><?php echo app('translator')->get('Select Network'); ?></option>
                                    <?php $__currentLoopData = $gatewayCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->method_code); ?>" <?php if(old('gateway') == $data->method_code): echo 'selected'; endif; ?> data-gateway="<?php echo e($data); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Amount'); ?></label>
                                <div class="input-group">
                                    <input type="number" step="any" name="amount" class="form-control" value="<?php echo e(old('amount')); ?>" autocomplete="off" required>
                                    <span class="input-group-text"><?php echo e($general->cur_text); ?></span>
                                </div>
                            </div>
                            <div class="mt-3 preview-details d-none">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?php echo app('translator')->get('Limit'); ?></span>
                                        <span><span class="min fw-bold">0</span> <?php echo e(__($general->cur_text)); ?> - <span class="max fw-bold">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?php echo app('translator')->get('Charge'); ?></span>
                                        <span><span class="charge fw-bold">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?php echo app('translator')->get('Payable'); ?></span> <span><span class="payable fw-bold"> 0</span> <?php echo e(__($general->cur_text)); ?></span>
                                    </li>
                                    <li class="list-group-item justify-content-between d-none rate-element">

                                    </li>
                                    <li class="list-group-item justify-content-between d-none in-site-cur">
                                        <span><?php echo app('translator')->get('In'); ?> <span class="method_currency"></span></span>
                                        <span class="final_amo fw-bold">0</span>
                                    </li>
                                    <li class="list-group-item justify-content-center crypto_currency d-none">
                                        <span><?php echo app('translator')->get('Conversion with'); ?> <span class="method_currency"></span> <?php echo app('translator')->get('and final value will Show on next step'); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn--base w-100 mt-3"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>
                </form>
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

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('select[name=gateway]').change(function(){
                if(!$('select[name=gateway]').val()){
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if(resource.method.crypto == 1){
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                }else{
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if(amount <= 0){
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge)))*rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != '<?php echo e($general->cur_text); ?>') {
                    var rateElement = `<span class="fw-bold"><?php echo app('translator')->get('Conversion Rate'); ?></span> <span><span  class="fw-bold">1 <?php echo e(__($general->cur_text)); ?> = <span class="rate">${rate}</span>  <span class="method_currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                }else{
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input',function(){
                $('select[name=gateway]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/payment/deposit.blade.php ENDPATH**/ ?>