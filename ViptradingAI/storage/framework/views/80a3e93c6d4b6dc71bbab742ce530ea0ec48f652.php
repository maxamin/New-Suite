
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Manage Roles')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('Manage Roles')); ?></h2>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                                <a href="<?php echo e(route('admin.roles.create')); ?>" class="title-btn"><i
                                        icon-name="plus-circle"></i><?php echo e(__('Add New Role')); ?></a>
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
                        <div class="site-card-body centered">
                            <div class="site-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('#')); ?></th>
                                        <th scope="col"><?php echo e(__('Name')); ?></th>
                                        <th scope="col"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$loop->index); ?></td>
                                            <td><strong><?php echo e(str_replace('-',' ',$role->name)); ?></strong></td>
                                            <td>
                                                <?php if($role->name == 'Super-Admin'): ?>
                                                    <button class="site-btn-xs red-btn table-btn"><i
                                                            icon-name="alert-triangle"></i><?php echo e(__('Not Editable')); ?>

                                                    </button>
                                                <?php else: ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                                        <a href="<?php echo e(route('admin.roles.edit',$role->id)); ?>"
                                                           class="site-btn-xs primary-btn table-btn"><i
                                                                icon-name="edit-3"></i><?php echo e(__('Edit Permission')); ?></a>
                                                    <?php endif; ?>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/roles/index.blade.php ENDPATH**/ ?>