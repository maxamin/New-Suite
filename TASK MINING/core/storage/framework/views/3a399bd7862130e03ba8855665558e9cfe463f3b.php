<?php $__env->startSection('content'); ?>
<div class="cmn-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0 py-3">

                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive--sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Initiated'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Amount'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Conversion'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Status'); ?></th>
                                        <th><?php echo app('translator')->get('Details'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> <span class="text-primary"><?php echo e(__($deposit->gateway?->name)); ?></span> </span>
                                                <br>
                                                <small> <?php echo e($deposit->trx); ?> </small>
                                           </td>

                                           <td class="text-center">
                                               <?php echo e(showDateTime($deposit->created_at)); ?><br><?php echo e(diffForHumans($deposit->created_at)); ?>

                                           </td>
                                           <td class="text-center">
                                              <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($deposit->amount )); ?> + <span class="text-danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($deposit->charge)); ?> </span>
                                               <br>
                                               <strong title="<?php echo app('translator')->get('Amount with charge'); ?>">
                                               <?php echo e(showAmount($deposit->amount+$deposit->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                               </strong>
                                           </td>
                                           <td class="text-center">
                                              1 <?php echo e(__($general->cur_text)); ?> =  <?php echo e(showAmount($deposit->rate)); ?> <?php echo e(__($deposit->method_currency)); ?>

                                               <br>
                                               <strong><?php echo e(showAmount($deposit->final_amo)); ?> <?php echo e(__($deposit->method_currency)); ?></strong>
                                           </td>
                                           <td class="text-center">
                                               <?php echo $deposit->statusBadge ?>
                                           </td>
                                            <?php
                                                $details = ($deposit->detail != null) ? json_encode($deposit->detail) : null;
                                            ?>

                                            <td>
                                                <a href="javascript:void(0)" class="btn btn--base btn-sm <?php if($deposit->method_code >= 1000): ?> detailBtn <?php else: ?> disabled <?php endif; ?>"
                                                    <?php if($deposit->method_code >= 1000): ?>
                                                        data-info="<?php echo e($details); ?>"
                                                    <?php endif; ?>
                                                    <?php if($deposit->status == Status::PAYMENT_REJECT): ?>
                                                    data-admin_feedback="<?php echo e($deposit->admin_feedback); ?>"
                                                    <?php endif; ?>
                                                    >
                                                    <i class="fa fa-desktop"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="100%" class="text-center"><?php echo e(__($emptyMessage)); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($deposits->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($deposits->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <ul class="list-group userData mb-2">
                </ul>
                <div class="feedback"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.detailBtn').on('click', function () {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if(userData){
                    userData.forEach(element => {
                        if(element.type != 'file'){
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if($(this).data('admin_feedback') != undefined){
                    var adminFeedback = `
                        <div class="my-3">
                            <strong><?php echo app('translator')->get('Admin Feedback'); ?></strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                }else{
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);


                modal.modal('show');
            });
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrorko/Sites/ptclab-new-look/core/resources/views/templates/basic/user/deposit_history.blade.php ENDPATH**/ ?>