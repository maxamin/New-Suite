
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Manage Schema')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('All Schemas')); ?></h2>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schema-create')): ?>
                                <a href="<?php echo e(route('admin.schema.create')); ?>" class="title-btn"><i
                                        icon-name="plus-circle"></i><?php echo e(__('Add New')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-body">
                            <div class="site-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('Icon')); ?></th>
                                        <th scope="col"><?php echo e(__('Plan Name')); ?></th>
                                        <th scope="col"><?php echo e(__('Amount')); ?></th>
                                        <th scope="col"><?php echo e(__('Badge')); ?></th>
                                        <th scope="col"><?php echo e(__('Status')); ?></th>
                                        <th scope="col"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img
                                                    class="avatar"
                                                    src="<?php echo e(asset($schema->icon)); ?>"
                                                    alt=""
                                                />
                                            </td>
                                            <td><strong><?php echo e($schema->name); ?></strong></td>
                                            <td>
                                                <strong><?php echo e($schema->type == 'range'? $schema->min_amount.' '.$currency.'-'.$schema->max_amount.' '.$currency:$schema->fixed_amount.' '.$currency); ?></strong>
                                            </td>
                                            <td>
                                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'site-badge', // common classes
                                                    'success' => $schema->featured,
                                                    'pending' => !$schema->featured
                                                  ]) ?>"><?php echo e($schema->featured ? $schema->badge : 'No Feature Badge'); ?></div>
                                            </td>
                                            <td>
                                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'site-badge', // common classes
                                                    'success' => $schema->status,
                                                    'danger' => !$schema->status
                                                  ]) ?>"><?php echo e($schema->status ? 'Active' : 'Deactivated'); ?></div>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schema-edit')): ?>
                                                    <a href="<?php echo e(route('admin.schema.edit',$schema->id)); ?>"
                                                       class="round-icon-btn primary-btn">
                                                        <i icon-name="edit-3"></i>
                                                    </a>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/schema/index.blade.php ENDPATH**/ ?>