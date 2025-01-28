<?php $__env->startSection('title'); ?>
    <?php echo e(__('Deposit Now')); ?>

<?php $__env->stopSection(); ?>
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Usdt TRC-20 Deposit')); ?></h3>
</div>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-body">
                    <div class="progress-steps">
                        <div class="single-step <?php echo e($isStepOne); ?>">
                            <div class="number"><?php echo e(__('01')); ?></div>
                            <div class="content">
                                <h4><?php echo e(__('Deposit Amount')); ?></h4>
                                <p><?php echo e(__('Enter your deposit details')); ?></p>
                            </div>
                        </div>
                        <div class="single-step <?php echo e($isStepTwo); ?>">
                            <div class="number"><?php echo e(__('02')); ?></div>
                            <div class="content">
                                <h4><?php echo e(__('Success')); ?></h4>
                                <p><?php echo e($notify['card-header'] ??  __('Success Your Deposit')); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->yieldContent('deposit_content'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/deposit/index.blade.php ENDPATH**/ ?>