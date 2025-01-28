
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Schedule')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('All Schedules')); ?></h2>
                            <a
                                href=""
                                class="title-btn"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#addNewSchedule"
                            ><i icon-name="plus-circle"></i><?php echo e(__('Add New')); ?></a>
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
                                        <th scope="col"><?php echo e(__('#')); ?></th>
                                        <th scope="col"><?php echo e(__('Name')); ?></th>
                                        <th scope="col"><?php echo e(__('Time')); ?></th>
                                        <th scope="col"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$loop->index); ?></td>
                                            <td><?php echo e($schedule->name); ?></td>
                                            <td>
                                                <strong><?php echo e($schedule->time); ?> <?php echo $schedule->time > 1 ? 'Hours' : 'Hour' ?></strong>
                                            </td>
                                            <td>
                                                <button
                                                    class="round-icon-btn primary-btn"
                                                    type="button"
                                                    id="edit"
                                                    data-id="<?php echo e($schedule->id); ?>"
                                                >
                                                    <i icon-name="edit-3"></i>
                                                </button>
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

        <!-- Modal for Add New Schedule -->
        <?php echo $__env->make('backend.schedule.modal.__new_schedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Modal for Add New Schedule-->

        <!-- Modal for Edit Schedule -->
        <?php echo $__env->make('backend.schedule.modal.__edit_schedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Modal for Edit Schedule-->

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $('body').on('click', '#edit', function (event) {
            "use strict";
            event.preventDefault();
            var id = $(this).data('id');
            $.get('schedule/' + id + '/edit', function (data) {

                var url = '<?php echo e(route("admin.schedule.update", ":id")); ?>';
                url = url.replace(':id', id);
                $('#editForm').attr('action', url)
                $('#editModal').modal('show');

                $('#name').val(data.name);
                $('#time').val(data.time);
                if (data.time <= 1) {
                    $('#time-level').html('Hour');
                } else {
                    $('#time-level').html('Hours');
                }
            })
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/schedule/index.blade.php ENDPATH**/ ?>