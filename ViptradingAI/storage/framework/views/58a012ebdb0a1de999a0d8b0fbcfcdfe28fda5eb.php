<div
    class="tab-pane fade"
    id="pills-transactions"
    role="tabpanel"
    aria-labelledby="pills-transactions-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title"><?php echo e(__('Transactions')); ?></h4>
                </div>
                <div class="site-card-body table-responsive">
                    <div class="site-datatable">
                        <table id="user-transaction-dataTable" class="display data-table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Transaction ID')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Gateway')); ?></th>
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
    </div>
</div>
<?php $__env->startPush('single-script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('#user-transaction-dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "<?php echo e(route('admin.user.transaction',$user->id)); ?>",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'tnx', name: 'tnx'},
                    {data: 'type', name: 'type'},
                    {data: 'final_amount', name: 'final_amount'},
                    {data: 'method', name: 'method'},
                    {data: 'status', name: 'status'},
                ]
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__transactions.blade.php ENDPATH**/ ?>