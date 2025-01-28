
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Schema Logs')); ?>

<?php $__env->stopSection(); ?>
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Transcation')); ?></h3>
</div>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-body">
                    <div class="site-datatable">
                        <div class="row table-responsive">
                            <div class="col-xl-12">
                                <table id="dataTable" class="display data-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 100px;"><?php echo e(__('Amount')); ?></th>
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
    </div>
<?php $__env->stopSection(); ?>

<style>
    .dataTables_length {
        display: none;
    }
    
    .dataTables_filter {
        display: none;
    }
</style>

<?php $__env->startSection('script'); ?>
    <script>


        (function ($) {
            "use strict";
            var table = $('#dataTable').DataTable({
                processing: false,
                serverSide: true,
                ajax: "<?php echo e(route('user.transactions')); ?>",
                columns: [
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                ]
            });


        })(jQuery);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/user/transaction/index.blade.php ENDPATH**/ ?>