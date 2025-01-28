
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Manual Deposit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('deposit_content'); ?>
    <div class="col-xl-12 col-md-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title"><?php echo e(__('Setup Payment Methods')); ?></h3>
            </div>
            <div class="site-card-body">
                <p class="paragraph">
                    <?php echo e(__(' All the ')); ?>

                    <strong><?php echo e(__('Deposit Payment Methods')); ?></strong> <?php echo e(__('Setup for user')); ?>

                </p>
                <?php $__currentLoopData = $manualGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-gateway">
                        <div class="gateway-name">
                            <div class="gateway-icon">
                                <img
                                    src="<?php echo e(asset($gateway->logo)); ?>"
                                    alt=""
                                />
                            </div>
                            <div class="gateway-title">
                                <h4><?php echo e($gateway->name); ?></h4>
                                <p><?php echo e(__('Minimum Deposit: ').$gateway->minimum_deposit .' '. $currency); ?></p>
                            </div>
                        </div>
                        <div class="gateway-right">
                            <div class="gateway-status">
                                <?php if($gateway->status): ?>
                                    <div class="site-badge success"><?php echo e(__('Activated')); ?></div>
                                <?php else: ?>
                                    <div class="site-badge pending"><?php echo e(__('Deactivated')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="gateway-edit">
                                <a href="<?php echo e(route('admin.gateway.edit-gateway',$gateway->gateway_code)); ?>"><i
                                        icon-name="settings-2"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.deposit.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/deposit/manual_gateway.blade.php ENDPATH**/ ?>