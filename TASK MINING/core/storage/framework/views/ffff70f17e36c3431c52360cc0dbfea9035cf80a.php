<?php $__env->startSection('content'); ?>
<div class="cmn-section">
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header border-0">
                        <form action="">
                            <div class="d-flex justify-content-end">
                                <div class="input-group w-auto">
                                    <input type="text" name="search" class="form-control" value="<?php echo e(request()->search); ?>" placeholder="<?php echo app('translator')->get('Search by transactions'); ?>">
                                    <button class="input-group-text bg-primary text-white border-0">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
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
                                        <th><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold"><span class="text-primary"> <?php echo e(__(@$withdraw->method->name)); ?></span></span>
                                            <br>
                                            <small><?php echo e($withdraw->trx); ?></small>
                                        </td>
                                        <td class="text-center">
                                            <?php echo e(showDateTime($withdraw->created_at)); ?> <br>  <?php echo e(diffForHumans($withdraw->created_at)); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($withdraw->amount )); ?> - <span class="text-danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($withdraw->charge)); ?> </span>
                                             <br>
                                             <strong title="<?php echo app('translator')->get('Amount after charge'); ?>">
                                             <?php echo e(showAmount($withdraw->amount-$withdraw->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                             </strong>

                                         </td>
                                         <td class="text-center">
                                            1 <?php echo e(__($general->cur_text)); ?> =  <?php echo e(showAmount($withdraw->rate)); ?> <?php echo e(__($withdraw->currency)); ?>

                                             <br>
                                             <strong><?php echo e(showAmount($withdraw->final_amount)); ?> <?php echo e(__($withdraw->currency)); ?></strong>
                                         </td>
                                         <td class="text-center">
                                            <?php echo $withdraw->statusBadge ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn--base detailBtn"
                                            data-user_data="<?php echo e(json_encode($withdraw->withdraw_information)); ?>"
                                            <?php if($withdraw->status == Status::PAYMENT_REJECT): ?>
                                            data-admin_feedback="<?php echo e($withdraw->admin_feedback); ?>"
                                            <?php endif; ?>
                                            >
                                                <i class="la la-desktop"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($withdraws->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($withdraws->links()); ?>

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
                <ul class="list-group userData">

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
                var userData = $(this).data('user_data');
                var html = ``;
                userData.forEach(element => {
                    if(element.type != 'file'){
                        html += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${element.name}</span>
                            <span">${element.value}</span>
                        </li>`;
                    }
                });
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

<?php echo $__env->make($activeTemplate.'layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrorko/Sites/ptclab-new-look/core/resources/views/templates/basic/user/withdraw/log.blade.php ENDPATH**/ ?>