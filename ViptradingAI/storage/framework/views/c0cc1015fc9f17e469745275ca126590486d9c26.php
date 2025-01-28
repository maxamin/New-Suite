<?php $__env->startSection('title'); ?>
    <?php echo e(__('Withdraw Schedule')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('withdraw_content'); ?>
    <div class="col-xl-7 col-md-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title"><?php echo e(__('Withdraw Schedule')); ?></h3>
            </div>
            <div class="site-card-body">
                <form action="<?php echo e(route('admin.withdraw.schedule.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="site-input-groups row">
                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 col-label pt-0"><?php echo e($schedule->name); ?></div>
                            <div class="col-sm-8">
                                <div class="form-switch ps-0">
                                    <div class="switch-field">
                                        <input
                                            type="radio"
                                            id="active-<?php echo e($schedule->id); ?>"
                                            name="<?php echo e($schedule->name); ?>"
                                            value="1"
                                            <?php if($schedule->status): ?> checked <?php endif; ?>
                                        />
                                        <label for="active-<?php echo e($schedule->id); ?>"><?php echo e(__('Enable')); ?></label>
                                        <input
                                            type="radio"
                                            id="disable-<?php echo e($schedule->id); ?>"
                                            name="<?php echo e($schedule->name); ?>"
                                            value="0"
                                            <?php if(!$schedule->status): ?> checked <?php endif; ?>
                                        />
                                        <label for="disable-<?php echo e($schedule->id); ?>"><?php echo e(__('Disabled')); ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="row">
                        <div class="offset-sm-4 col-sm-8">
                            <button
                                type="submit"
                                class="site-btn-sm primary-btn w-100">
                                <?php echo e(__('Save Changes')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.withdraw.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/withdraw/schedule.blade.php ENDPATH**/ ?>