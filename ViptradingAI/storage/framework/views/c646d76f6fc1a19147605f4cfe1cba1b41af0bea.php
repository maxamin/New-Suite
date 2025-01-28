<?php $__env->startSection('title'); ?>
    <?php echo e(__('Pending Withdraws')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('withdraw_content'); ?>
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
                            <th><?php echo e(__('Charge')); ?></th>
                            <th><?php echo e(__('Gateway')); ?></th>
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
        <!-- Modal for Pending Deposit Approval -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-action')): ?>
            <div
                class="modal fade"
                id="deposit-action-modal"
                tabindex="-1"
                aria-labelledby="editPendingDepositModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content site-table-modal">
                        <div class="modal-body popup-body">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                            <div class="popup-body-text withdraw-action">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Modal for Pending Deposit Approval -->
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
                ajax: "<?php echo e(route('admin.withdraw.pending')); ?>",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'username', name: 'username'},
                    {data: 'tnx', name: 'tnx'},
                    {data: 'amount', name: 'amount'},
                    {data: 'charge', name: 'charge'},
                    {data: 'method', name: 'method'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ]
            });


            //send mail modal form open
            $('body').on('click', '#withdraw-action', function () {
                $('.withdraw-action').empty();

                var id = $(this).data('id');
                var url = '<?php echo e(route("admin.withdraw.action",":id")); ?>';
                url = url.replace(':id', id);
                $.get(url, function (data) {
                    $('.withdraw-action').append(data)
                    imagePreview()
                })
                $('#deposit-action-modal').modal('toggle')

            })

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.withdraw.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/withdraw/pending.blade.php ENDPATH**/ ?>