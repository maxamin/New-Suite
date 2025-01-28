<?php switch($status):
    case ('pending'): ?>
        <div class="site-badge warnning"><?php echo e(__('Pending')); ?></div>
        <?php break; ?>
    <?php case ('success'): ?>
        <div class="site-badge success"><?php echo e(__('Success')); ?></div>
        <?php break; ?>
    <?php case ('failed'): ?>
        <div class="site-badge primary-bg"><?php echo e(__('canceled')); ?></div>
        <?php break; ?>
<?php endswitch; ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/user/include/__txn_status.blade.php ENDPATH**/ ?>