
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Deposit History')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('deposit_content'); ?>
    <div class="col-xl-12 col-md-12">
        <div class="site-card">
            <div class="site-card-body table-responsive">
                <div class="site-datatable">
                    <table id="dataTable" class="display data-table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('User')); ?></th>
                            <th><?php echo e(__('Transaction ID')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Gateway')); ?></th>
                            <th><?php echo e(__('Charge')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        (function ($) {
            "use strict";

            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "<?php echo e(route('admin.deposit.history')); ?>",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'username', name: 'username'},
                    {data: 'tnx', name: 'tnx'},
                    {data: 'final_amount', name: 'final_amount'},
                    {data: 'method', name: 'method'},
                    {data: 'charge', name: 'charge'},
                    {data: 'status', name: 'status'},
                ]
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.deposit.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/deposit/history.blade.php ENDPATH**/ ?>