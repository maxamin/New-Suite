<div class="col-xl-12 col-md-12">
    <div class="frontend-editor-data">
        <?php echo $paymentDetails; ?>

    </div>
</div>
<?php $__currentLoopData = json_decode($credentials, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $credential): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($credential['type'] == 'file'): ?>
        <div class="col-xl-12 col-md-12">
            <div class="body-title"><?php echo e($credential['name']); ?></div>
            <div class="wrap-custom-file">
                <input
                    type="file"
                    name="manual_data[<?php echo e($credential['name']); ?>]"
                    id="<?php echo e($key); ?>"
                    accept=".gif, .jpg, .png"
                    <?php if($credential['validation'] == 'required'): ?> required <?php endif; ?>
                />
                <label for="<?php echo e($key); ?>">
                    <img
                        class="upload-icon"
                        src="<?php echo e(asset('global/materials/upload.svg')); ?>"
                        alt=""
                    />
                    <span><?php echo e(__('Select '). $credential['name']); ?></span>
                </label>
            </div>
        </div>
    <?php elseif($credential['type'] == 'textarea'): ?>
        <div class="col-xl-12 col-md-12">
            <label for="exampleFormControlInput1" class="form-label"><?php echo e($credential['name']); ?></label>
            <div class="input-group">
                <textarea class="form-control-textarea" <?php if($credential['validation'] == 'required'): ?> required
                          <?php endif; ?> placeholder="Send Money Note" name="manual_data[<?php echo e($credential['name']); ?>]"></textarea>
            </div>
        </div>
    <?php else: ?>
        <div class="col-xl-12 col-md-12">
            <label for="exampleFormControlInput1" class="form-label"><?php echo e($credential['name']); ?></label>
            <div class="input-group">
                <input type="text" name="manual_data[<?php echo e($credential['name']); ?>]"
                       <?php if($credential['validation'] == 'required'): ?> required <?php endif; ?> class="form-control"
                       aria-label="Amount" id="amount" aria-describedby="basic-addon1">
            </div>
        </div>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/gateway/include/manual.blade.php ENDPATH**/ ?>