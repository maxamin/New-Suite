<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label> <?php echo app('translator')->get('Site Title'); ?></label>
                                    <input class="form-control" type="text" name="site_name" required value="<?php echo e($general->site_name); ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Currency'); ?></label>
                                    <input class="form-control" type="text" name="cur_text" required value="<?php echo e($general->cur_text); ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Currency Symbol'); ?></label>
                                    <input class="form-control" type="text" name="cur_sym" required value="<?php echo e($general->cur_sym); ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> <?php echo app('translator')->get('Timezone'); ?></label>
                                <select class="select2-basic" name="timezone">
                                    <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="'<?php echo e(@$timezone); ?>'"><?php echo e(__($timezone)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> <?php echo app('translator')->get('Site Base Color'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="<?php echo e($general->base_color); ?>"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="base_color" value="<?php echo e($general->base_color); ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> <?php echo app('translator')->get('Site Secondary Color'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="<?php echo e($general->secondary_color); ?>"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="secondary_color" value="<?php echo e($general->secondary_color); ?>"/>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> <?php echo app('translator')->get('Registration Bonus'); ?></label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="registration_bonus" required value="<?php echo e(getAmount($general->registration_bonus)); ?>">
                                        <span class="input-group-text"><?php echo e(__($general->cur_text)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> <?php echo app('translator')->get('Default Plan'); ?></label>
                                    <select class="form-control" name="default_plan">
                                        <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                        <option value="0"><?php echo app('translator')->get('None'); ?></option>
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($plan->id); ?>"><?php echo e(__($plan->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> <?php echo app('translator')->get('Balance Transfer Fixed Charge'); ?></label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="bt_fixed" required value="<?php echo e(getAmount($general->bt_fixed)); ?>">
                                        <span class="input-group-text"><?php echo e(__($general->cur_text)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> <?php echo app('translator')->get('Balance Transfer Percent Charge'); ?></label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="bt_percent" required value="<?php echo e(getAmount($general->bt_percent)); ?>">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("'<?php echo e(config('app.timezone')); ?>'").select2();
            $('.select2-basic').select2({
                dropdownParent:$('.card-body')
            });

            $('[name=default_plan]').val('<?php echo e($general->default_plan); ?>');

            $('[name=balance_transfer]').on('change', function () {
                var isCheck = $(this).prop('checked');
                if (isCheck == true) {
                    $('[name=bt_fixed]').removeAttr('readonly')
                    $('[name=bt_percent]').removeAttr('readonly')
                } else {
                    $('[name=bt_fixed]').attr('readonly',true)
                    $('[name=bt_percent]').attr('readonly',true)
                }
            }).change();

        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrorko/Sites/newTrading/core/resources/views/admin/setting/general.blade.php ENDPATH**/ ?>