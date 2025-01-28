<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"> <?php echo $__env->yieldContent('title'); ?></h2>
                            <?php if(isset($button)): ?>
                                <a href="<?php echo e($button['route']); ?>"
                                   class="title-btn"
                                   type="button"
                                ><i icon-name="<?php echo e($button['icon']); ?>"></i><?php echo e($button['name']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-tab-bars">
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-list')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.pending')); ?>">
                                    <a href="<?php echo e(route('admin.withdraw.pending')); ?>"><i
                                            icon-name="anchor"></i><?php echo e(__('Pending Withdraws')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-method-manage')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.methods*')); ?>">
                                    <a href="<?php echo e(route('admin.withdraw.methods')); ?>"><i
                                            icon-name="landmark"></i><?php echo e(__('Withdraw Methods')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-schedule')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.schedule')); ?>">
                                    <a href="<?php echo e(route('admin.withdraw.schedule')); ?>"><i
                                            icon-name="alarm-clock"></i><?php echo e(__('Withdraw Schedule')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-list')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.history')); ?>">
                                    <a href="<?php echo e(route('admin.withdraw.history')); ?>"><i
                                            icon-name="calendar"></i><?php echo e(__('Withdraw History')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="row">
                        <?php echo $__env->yieldContent('withdraw_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/withdraw/index.blade.php ENDPATH**/ ?>