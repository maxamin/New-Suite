<div
    class="tab-pane fade"
    id="pills-transfer"
    role="tabpanel"
    aria-labelledby="pills-transfer-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title"><?php echo e(__('Investments')); ?></h4>
                </div>
                <div class="site-card-body table-responsive">
                    <div class="site-datatable">
                        <table id="user-investment-dataTable" class="display data-table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Icon')); ?></th>
                                <th><?php echo e(__('Schema')); ?></th>
                                <th><?php echo e(__('ROI')); ?></th>
                                <th><?php echo e(__('Profit')); ?></th>
                                <th><?php echo e(__('Capital Back')); ?></th>
                                <th><?php echo e(__('Timeline')); ?></th>
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

            var table = $('#user-investment-dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "<?php echo e(route('admin.investments',$user->id)); ?>",
                columns: [
                    {data: 'icon', name: 'icon'},
                    {data: 'schema', name: 'schema'},
                    {data: 'rio', name: 'rio'},
                    {data: 'profit', name: 'profit'},
                    {data: 'capital_back', name: 'capital_back'},
                    {data: 'next_profit_time', name: 'next_profit_time'},
                ]
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__investments.blade.php ENDPATH**/ ?>