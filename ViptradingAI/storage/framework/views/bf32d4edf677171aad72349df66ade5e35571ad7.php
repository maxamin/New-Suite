<div class="col-xl-6 col-md-12">
    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('Method Name:')); ?></label>
    <div class="input-group">
        <input type="text" name="method_name" class="form-control" placeholder="eg. Withdraw Method - USD"
               value="<?php echo e($withdrawMethod->name .'-'. $withdrawMethod->currency); ?>">
    </div>
</div>



<?php $__currentLoopData = json_decode($withdrawMethod->fields, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($field['type'] == 'file'): ?>

        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][type]" value="<?php echo e($field['type']); ?>">
        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][validation]" value="<?php echo e($field['validation']); ?>">

        <div class="col-xl-6 col-md-12">
            <div class="body-title"><?php echo e($field['name']); ?></div>
            <div class="wrap-custom-file">
                <input
                    type="file"
                    name="credentials[<?php echo e($field['name']); ?>][value]"
                    id="<?php echo e($key); ?>"
                    accept=".gif, .jpg, .png"
                    <?php if($field['validation'] == 'required'): ?> required <?php endif; ?>
                />
                <label for="<?php echo e($key); ?>">
                    <img
                        class="upload-icon"
                        src="<?php echo e(asset('global/materials/upload.svg')); ?>"
                        alt=""
                    />
                    <span><?php echo e(__('Select '). $field['name']); ?></span>
                </label>
            </div>
        </div>
    <?php elseif($field['type'] == 'textarea'): ?>
        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][type]" value="<?php echo e($field['type']); ?>">
        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][validation]" value="<?php echo e($field['validation']); ?>">

        <div class="col-xl-6 col-md-12">
            <label for="exampleFormControlInput1" class="form-label"><?php echo e($field['name']); ?></label>
            <div class="input-group">
                <textarea class="form-control-textarea" <?php if($field['validation'] == 'required'): ?> required
                          <?php endif; ?> placeholder="Send Money Note" name="credentials[<?php echo e($field['name']); ?>][value]"></textarea>
            </div>
        </div>

    <?php else: ?>
        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][type]" value="<?php echo e($field['type']); ?>">
        <input type="hidden" name="credentials[<?php echo e($field['name']); ?>][validation]" value="<?php echo e($field['validation']); ?>">

        <div class="col-xl-6 col-md-12">
            <label for="exampleFormControlInput1" class="form-label"><?php echo e($field['name']); ?></label>
            <div class="input-group">
                <input type="text" name="credentials[<?php echo e($field['name']); ?>][value]"
                       <?php if($field['validation'] == 'required'): ?> required <?php endif; ?> class="form-control" aria-label="Amount"
                       id="amount" aria-describedby="basic-addon1">
            </div>
        </div>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/withdraw/include/__account.blade.php ENDPATH**/ ?>