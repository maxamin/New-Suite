<div
    class="tab-pane fade"
    id="pills-ticket"
    role="tabpanel"
    aria-labelledby="pills-ticket-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title"><?php echo e(__('Support Tickets')); ?></h4>
                </div>
                <div class="site-card-body table-responsive">
                    <div class="site-datatable">
                        <table id="user-ticket-dataTable" class="display data-table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Ticket Name')); ?></th>
                                <th><?php echo e(__('Opening Date')); ?></th>
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
        </div>
    </div>
</div>
<?php $__env->startPush('single-script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('#user-ticket-dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "<?php echo e(route('admin.ticket.index',$user->id)); ?>",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__ticket.blade.php ENDPATH**/ ?>