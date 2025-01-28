<div
    class="tab-pane fade"
    id="pills-deposit"
    role="tabpanel"
    aria-labelledby="pills-deposit-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title"><?php echo e(__('Earnings')); ?></h4>
                    <div
                        class="card-header-info"><?php echo e(__('Total Earnings:')); ?> <?php echo e($user->totalProfit()); ?> <?php echo e($currency); ?></div>
                </div>
                <div class="site-card-body table-responsive">
                    <div class="site-datatable">
                        <table id="user-profit-dataTable" class="display data-table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Profit From')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
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

            var table = $('#user-profit-dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "<?php echo e(route('admin.all-profits',$user->id)); ?>",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'final_amount', name: 'final_amount'},
                    {data: 'type', name: 'type'},
                    {data: 'profit_from', name: 'profit_from'},
                    {data: 'description', name: 'description'},

                ]
            });


        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__earnings.blade.php ENDPATH**/ ?>