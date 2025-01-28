<?php if(null != $avatar): ?>
    <img class="avatar" src="<?php echo e(asset($avatar)); ?>" alt="" height="40" width="40">
<?php else: ?>
    <span class="avatar-text"><?php echo e($first_name[0]); ?><?php echo e($last_name[0]); ?></span>
<?php endif; ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__avatar.blade.php ENDPATH**/ ?>