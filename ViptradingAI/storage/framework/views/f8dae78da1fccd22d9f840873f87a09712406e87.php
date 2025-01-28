<?php $__env->startSection('title'); ?>
    <?php echo e(__('Withdraw Account Create')); ?>

<?php $__env->stopSection(); ?>
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/resources/views/frontend/img2/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/withdraw/account'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Withdraw Account Create')); ?></h3>
</div>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-header">
                    <h3 class="title"><?php echo e(__('Add New Withdraw Account')); ?></h3>
                    <div class="card-header-links">
                        <a href="<?php echo e(route('user.withdraw.account.index')); ?>"
                           class="card-header-link"><?php echo e(__('Withdraw Account')); ?></a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="progress-steps-form">
                        <form action="<?php echo e(route('user.withdraw.account.store')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row selectMethodRow">
                                <div class="col-xl-6 col-md-12 selectMethodCol">
                                    <label for="exampleFormControlInput1"
                                           class="form-label"><?php echo e(__('Choice Method:')); ?></label>
                                    <div class="input-group">
                                        <select name="withdraw_method_id" id="selectMethod"
                                                class="site-nice-select">
                                            <option selected><?php echo e(__('Select Method')); ?></option>
                                            <?php $__currentLoopData = $withdrawMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($raw->id); ?>"><?php echo e($raw->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="buttons" style="display: flex; justify-content: center;">
                                <button type="submit" class="site-btn blue-btn" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                    <?php echo e(__('Add New Withdraw Account')); ?><i
                                        class="anticon anticon-double-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $("#selectMethod").on('change',function (e) {
            "use strict"
            e.preventDefault();

            //$('.manual-row').empty();
            $('.selectMethodRow').children().not(':first').remove();

            var id = $(this).val()

            var url = '<?php echo e(route("user.withdraw.method",":id")); ?>';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $(data).insertAfter(".selectMethodCol");
                imagePreview()
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/withdraw/account/create.blade.php ENDPATH**/ ?>