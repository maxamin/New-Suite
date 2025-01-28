<?php $__env->startSection('content'); ?>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-5">
                <div class="d-flex justify-content-center">
                    <div class="verification-code-wrapper glass-bg">
                        <div class="verification-area">
                            <h5 class="pb-3 text-center border-bottom"><?php echo app('translator')->get('Verify Email Address'); ?></h5>
                            <form action="<?php echo e(route('user.password.verify.code')); ?>" method="POST" class="submit-form">
                                <?php echo csrf_field(); ?>
                                <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?> :  <?php echo e(showEmailAddress($email)); ?></p>
                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                <?php echo $__env->make($activeTemplate.'partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                                </div>
                                <div class="form-group text-light mt-3">
                                    <?php echo app('translator')->get('Please check including your Junk/Spam Folder. if not found, you can'); ?>
                                    <a class="text-primary" href="<?php echo e(route('user.password.request')); ?>"><?php echo app('translator')->get('Try to send again'); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
    .verification-code::after {
        background-color: #fff0;
    }
    .verification-code-wrapper {
        background: rgba( 0, 208, 148, 0% );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 6px );
        -webkit-backdrop-filter: blur( 6px );
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hemelmridha/public_html/miningjs.demo4k.xyz/core/resources/views/templates/basic/user/auth/passwords/code_verify.blade.php ENDPATH**/ ?>