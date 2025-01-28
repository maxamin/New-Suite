
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Withdraw Account')); ?>

<?php $__env->stopSection(); ?>
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/resources/views/frontend/img2/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Withdraw Adress')); ?></h3>
</div>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-header">
                    <h3 class="title"><?php echo e(__('Withdraw Account')); ?></h3>
                    <div class="card-header-links">
                        <a href="<?php echo e(route('user.withdraw.account.create')); ?>"
                           class="card-header-link"><?php echo e(__('Add New')); ?></a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="site-transactions">
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single">
                                <div class="left">
                                    <div style="width:50px;">
                                        <i icon-name="clipboard-check"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title"><?php echo e($account->method_name); ?></div>
                                        <div class="date"><?php echo e($account->method->currency .' '. __('Account')); ?> </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div>
                                        <a href="<?php echo e(route('user.withdraw.account.edit',$account->id)); ?>"><i icon-name="edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/withdraw/account/index.blade.php ENDPATH**/ ?>