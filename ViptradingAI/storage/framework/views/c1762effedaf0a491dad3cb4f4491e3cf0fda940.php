<?php $__env->startSection('title'); ?>
    <?php echo e(__('Add New Schema')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/choices.min.css')); ?>" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('Add New Schema')); ?></h2>
                            <a href="<?php echo e(url()->previous()); ?>" class="title-btn"><i
                                    icon-name="corner-down-left"></i><?php echo e(__('Back')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="site-card">
                        <div class="site-card-body">
                            <form action="<?php echo e(route('admin.schema.store')); ?>" method="post" enctype="multipart/form-data"
                                  class="row">
                                <?php echo csrf_field(); ?>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for=""><?php echo e(__('Upload Icon:')); ?></label>
                                                <div class="wrap-custom-file">
                                                    <input
                                                        type="file"
                                                        name="icon"
                                                        id="schema-icon"
                                                        accept=".gif, .jpg, .png"
                                                        required
                                                    />
                                                    <label for="schema-icon">
                                                        <img
                                                            class="upload-icon"
                                                            src="<?php echo e(asset('global/materials/upload.svg')); ?>"
                                                            alt=""
                                                        />
                                                        <span><?php echo e(__('Upload Avatar')); ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-name">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Schema Name:')); ?></label>
                                        <input
                                            type="text"
                                            name="name"
                                            class="box-input"
                                            placeholder="Investment Plan name"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-badge">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Schema Badge:')); ?></label>
                                        <input
                                            type="text"
                                            class="box-input"
                                            placeholder="Schema Badge"
                                            name="badge"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-xl-6" style="display: none;">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Schema Type:')); ?></label>
                                        <div class="switch-field same-type">
                                            <input
                                                type="radio"
                                                id="fixed-type"
                                                name="type"
                                                value="fixed"
                                            />
                                            <label for="fixed-type" id="fixed-type-label"><?php echo e(__('Fixed')); ?></label>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var fixedTypeLabel = document.getElementById('fixed-type-label');

        // Sayfa yüklendiğinde etiketi tıkla
        fixedTypeLabel.click();
    });
</script>

                                            <input
                                                type="radio"
                                                id="range-type"
                                                name="type"
                                                checked=""
                                                value="range"
                                            />
                                            <label for="range-type"><?php echo e(__('Range')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="site-input-groups row">
                                        <div class="col-xl-6 min-amount">
                                            <label class="box-input-label" for=""><?php echo e(__('Min Amount:')); ?></label>
                                            <div class="input-group joint-input">
                                                <input type="text" name="min_amount"
                                                       oninput="this.value = validateDouble(this.value)"
                                                       class="form-control" required/>
                                                <span
                                                    class="input-group-text"><?php echo e(setting('site_currency','global')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 max-amount">
                                            <label class="box-input-label" for=""><?php echo e(__('Max Amount:')); ?></label>
                                            <div class="input-group joint-input">
                                                <input type="text" name="max_amount"
                                                       oninput="this.value = validateDouble(this.value)"
                                                       class="form-control" required/>
                                                <span
                                                    class="input-group-text"><?php echo e(setting('site_currency','global')); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 fixed-amount hidden">
                                            <label class="box-input-label" for=""><?php echo e(__('Amount:')); ?></label>
                                            <div class="input-group joint-input">
                                                <input type="text" name="fixed_amount"
                                                       oninput="this.value = validateDouble(this.value)"
                                                       class="form-control"/>
                                                <span
                                                    class="input-group-text"><?php echo e(setting('site_currency','global')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Return Of Interest:')); ?></label>
                                        <div class="position-relative">
                                            <input
                                                type="text"
                                                class="box-input"
                                                placeholder="Number"
                                                name="return_interest"
                                                oninput="this.value = validateDouble(this.value)"
                                                required
                                            />
                                            <div class="prcntcurr">
                                                <select name="interest_type" class="form-select" id="">
                                                    <option value="fixed"><?php echo e($currencySymbol); ?></option>
                                                    <option value="percentage"><?php echo e(__('%')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Return Period:')); ?></label>
                                        <select name="return_period" class="form-select" id="">
                                            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($schedule->id); ?>"><?php echo e($schedule->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6" style="display: none;">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Return Type:')); ?></label>
                                        <div class="switch-field same-type">
                                            <input
                                                type="radio"
                                                id="return-type-period"
                                                name="return_type"
                                                checked=""
                                                value="period"
                                            />
                                            <label for="return-type-period"><?php echo e(__('Period')); ?></label>
                                            <input
                                                type="radio"
                                                id="return-type-lifetime"
                                                name="return_type"
                                                value="lifetime"
                                            />
                                            <label for="return-type-lifetime"><?php echo e(__('Lifetime')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Number of Period:')); ?></label>
                                        <div class="input-group joint-input">
                                            <input
                                                type="text"
                                                name="number_of_period"
                                                onkeypress="return validateNumber(event)"
                                                class="form-control"
                                                placeholder="Total Repeat Time"
                                                required
                                            />
                                            <span class="input-group-text"><?php echo e(__('Times')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for=""><?php echo e(__('Profit Return Holiday:')); ?></label>
                                        <select id="choices-multiple-remove-button" name="off_days[]" placeholder="Manage Days" multiple>
                                            <?php $__currentLoopData = $offDaySchedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offDay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($offDay); ?>"><?php echo e($offDay); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for=""><?php echo e(__('Capital Back:')); ?></label>
                                                <div class="switch-field">
                                                    <input
                                                        type="radio"
                                                        id="radio-seven"
                                                        name="capital_back"
                                                        checked=""
                                                        value="1"
                                                    />
                                                    <label for="radio-seven"><?php echo e(__('Yes')); ?></label>
                                                    <input
                                                        type="radio"
                                                        id="radio-eight"
                                                        name="capital_back"
                                                        value="0"
                                                    />
                                                    <label for="radio-eight" id="capitalno"><?php echo e(__('No')); ?></label>
                                                    
                                                    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var fixedTypeLabel = document.getElementById('capitalno');

        // Sayfa yüklendiğinde etiketi tıkla
        fixedTypeLabel.click();
    });
</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for=""><?php echo e(__('Featured:')); ?></label>
                                                <div class="switch-field">
                                                    <input
                                                        type="radio"
                                                        id="featured-yes"
                                                        name="featured"
                                                        checked=""
                                                        value="1"
                                                    />
                                                    <label for="featured-yes"><?php echo e(__('Yes')); ?></label>
                                                    <input
                                                        type="radio"
                                                        id="featured-no"
                                                        name="featured"
                                                        value="0"
                                                    />
                                                    <label for="featured-no"><?php echo e(__('No')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for=""><?php echo e(__('Status:')); ?></label>
                                                <div class="switch-field">
                                                    <input
                                                        type="radio"
                                                        id="radio-five"
                                                        name="status"
                                                        checked=""
                                                        value="1"
                                                    />
                                                    <label for="radio-five"><?php echo e(__('Active')); ?></label>
                                                    <input
                                                        type="radio"
                                                        id="radio-six"
                                                        name="status"
                                                        value="0"
                                                    />
                                                    <label for="radio-six"><?php echo e(__('Deactivate')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn-sm primary-btn w-100">
                                        <?php echo e(__('Add New Schema')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('backend/js/choices.min.js')); ?>"></script>
    <script>

        $("#fixed-type").on('click',function () {
            $("input[name='fixed_amount']").prop('required', true);
            $("input[name='min_amount']").removeAttr('required');
            $("input[name='max_amount']").removeAttr('required');

            $(".min-amount").addClass('hidden');
            $(".max-amount").addClass('hidden');
            $(".fixed-amount").removeClass('hidden');
        });
        $("#range-type").on('click',function () {

            $("input[name='fixed_amount']").removeAttr('required');
            $("input[name='min_amount']").prop('required', true);
            $("input[name='max_amount']").prop('required', true);

            $(".fixed-amount").addClass('hidden');
            $(".min-amount").removeClass('hidden');
            $(".max-amount").removeClass('hidden');
        });

        $("#featured-no").on('click',function () {
            $("input[name='badge']").removeAttr('required');
            var schemaName = $(".schema-name");
            $(".schema-badge").addClass('hidden');
            schemaName.removeClass('col-xl-6');
            schemaName.addClass('col-xl-12');

        });
        $("#featured-yes").on('click',function () {
            $("input[name='badge']").prop('required', true);
            var schemaName = $(".schema-name");
            $(".schema-badge").removeClass('hidden');
            schemaName.removeClass('col-xl-12');
            schemaName.addClass('col-xl-6');
        });


        $("#return-type-period").on('click',function () {
            $("input[name='number_of_period']").prop('required', true);
            $(".number-period").removeClass('hidden');
        });

        $("#return-type-lifetime").on('click',function () {
            $("input[name='number_of_period']").removeAttr('required');
            $(".number-period").addClass('hidden');
        });

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:7,
            searchResultLimit:7,
            renderChoiceLimit:7
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/schema/create.blade.php ENDPATH**/ ?>