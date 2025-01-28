
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Withdraw Methods')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('withdraw_content'); ?>
    <div class="col-xl-12 col-md-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title"><?php echo e(__('Withdraw Methods')); ?></h3>
            </div>
            <div class="site-card-body">
                <p class="paragraph">
                    <?php echo e(__(' All the ')); ?> <strong><?php echo e(__('Withdraw Methods')); ?></strong> <?php echo e(__('setup for user')); ?>

                </p>
                <?php $__currentLoopData = $withdrawMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-gateway">
                        <div class="gateway-name">
                            <div class="gateway-icon">
                                <img
                                    src="<?php echo e(asset($method->icon)); ?>"
                                    alt=""
                                />
                            </div>
                            <div class="gateway-title">
                                <h4><?php echo e($method->name); ?></h4>
                                <p><?php echo e(__('Minimum Withdraw: ').$method->min_withdraw .' '.$currency); ?></p>
                            </div>
                        </div>
                        <div class="gateway-right">
                            <div class="gateway-status">
                                <?php if( $method->status): ?>
                                    <div class="site-badge success"><?php echo e(__('Activated')); ?></div>
                                <?php else: ?>
                                    <div class="site-badge pending"><?php echo e(__('DeActivated')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="gateway-edit">
                                <a href="<?php echo e(route('admin.withdraw.account-edit',$method->id)); ?>"><i
                                        icon-name="settings-2"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.withdraw.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/withdraw/method.blade.php ENDPATH**/ ?>