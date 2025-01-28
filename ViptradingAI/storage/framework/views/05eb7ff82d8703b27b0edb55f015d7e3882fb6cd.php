<?php $__env->startSection('title'); ?>
    <?php echo e(__('All Customers')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('All Customers')); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-body table-responsive">
                            <div class="site-datatable">
                                <table id="dataTable" class="display data-table">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('Avatar')); ?></th>
                                        <th><?php echo e(__('User')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Balance')); ?></th>
                                        <th><?php echo e(__('Profit')); ?></th>
                                        <th><?php echo e(__('KYC')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for Send Email -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-mail-send')): ?>
                        <?php echo $__env->make('backend.user.include.__mail_send', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <!-- Modal for Send Email-->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    ]
    <script>
        (function ($) {
            "use strict";

            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('admin.user.index')); ?>",
                columns: [
                    {data: 'avatar', name: 'avatar'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'balance', name: 'balance'},
                    {data: 'total_profit', name: 'total_profit', orderable: false, searchable: false},
                    {data: 'kyc', name: 'kyc'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            //send mail modal form open
            $('body').on('click', '.send-mail', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name').html(name);
                $('#userId').val(id);
                $('#sendEmail').modal('toggle')
            })

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/user/index.blade.php ENDPATH**/ ?>