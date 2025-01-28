
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

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-gateway-manage')): ?>
                                <li class="<?php echo e(isActive('admin.gateway.manual')); ?>">
                                    <a href="<?php echo e(route('admin.gateway.manual')); ?>"><i
                                            icon-name="book-open"></i><?php echo e(__('Manual Gateway')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['deposit-list','deposit-action'])): ?>
                                <li class="<?php echo e(isActive('admin.deposit.manual.pending')); ?>">
                                    <a href="<?php echo e(route('admin.deposit.manual.pending')); ?>"><i
                                            icon-name="box"></i><?php echo e(__('Manual Pending Deposit')); ?></a>
                                </li>
                                <li class="<?php echo e(isActive('admin.deposit.history')); ?>">
                                    <a href="<?php echo e(route('admin.deposit.history')); ?>"><i
                                            icon-name="calendar"></i><?php echo e(__('Deposit History')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="row">
                        <?php echo $__env->yieldContent('deposit_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/deposit/index.blade.php ENDPATH**/ ?>