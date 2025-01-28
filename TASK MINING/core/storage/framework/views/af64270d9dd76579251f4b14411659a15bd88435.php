<?php $__env->startSection('content'); ?>
<?php echo $__env->make('templates.basic.layouts.mobile.top_nav_mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div id="appCapsule">
    <div class="container mt-3">
        <div class="card glass-bg mb-4">
            <div class="card-body pb-1">
                <form action="">
                    <div class="d-flex flex-wrap gap-1">
                        <div class="flex-grow-1">
                            <label><?php echo app('translator')->get('Transaction Number'); ?></label>
                            <input type="text" name="search" value="<?php echo e(request()->search); ?>" class="form-control form-control-sm">
                        </div>
                        <div class="flex-grow-1">
                            <label><?php echo app('translator')->get('Type'); ?></label>
                            <select name="trx_type" class="form-select form-control-sm">
                                <option value=""><?php echo app('translator')->get('All'); ?></option>
                                <option value="+" <?php if(request()->trx_type == '+'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Plus'); ?></option>
                                <option value="-" <?php if(request()->trx_type == '-'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Minus'); ?></option>
                            </select>
                        </div>
                        <div class="flex-grow-1">
                            <label><?php echo app('translator')->get('Remark'); ?></label>
                            <select class="form-select form-control-sm" name="remark">
                                <option value=""><?php echo app('translator')->get('Any'); ?></option>
                                <?php $__currentLoopData = $remarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($remark->remark); ?>" <?php if(request()->remark == $remark->remark): echo 'selected'; endif; ?>><?php echo e(__(keyToTitle($remark->remark))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="flex-grow-1 align-self-end">
                            <button class="btn btn-sm btn-primary w-100 filterBtn"><i class="las la-filter"></i> <?php echo app('translator')->get('Filter'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="card glass-bg my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0 text-start small-font-lg text-primary">
                                <?php echo e(__($trx->details)); ?>

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
                                <span class="fw-bold <?php if($trx->trx_type == '+'): ?> text--success <?php else: ?> text--danger <?php endif; ?>">
                                    <?php echo e($trx->trx_type); ?> <?php echo e(showAmount($trx->amount)); ?> <?php echo e($general->cur_text); ?>

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
                                <?php echo e($trx->trx); ?>

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0 text-start small-font-sm text-secondary">
                                <?php echo e(showDateTime($trx->created_at)); ?> - <?php echo e(diffForHumans($trx->created_at)); ?>

                            </p>
                        </div>
                    </div>

                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="card glass-bg">
                <div class="card-body">
                    <h6 class="mb-0 text-center small-font-lg text-secondary">
                        Ops, No Withdraw Record Found!
                    </h6>
                </div>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($transactions->links()); ?>

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
@
<?php $__env->startPush('style'); ?>
<style>
    input:not([type="radio"]), .form-control {
        padding: 7px 20px;
    }
    .filterBtn{
        min-height: 38px !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/transactions.blade.php ENDPATH**/ ?>