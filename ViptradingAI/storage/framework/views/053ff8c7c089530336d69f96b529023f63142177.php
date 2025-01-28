<?php switch($status):
    case ('pending'): ?>
        <div class="site-badge pending"><?php echo e(__('Pending')); ?></div>
        <?php break; ?>
    <?php case ('success'): ?>
        <div class="site-badge success"><?php echo e(__('Success')); ?></div>
        <?php break; ?>
    <?php case ('failed'): ?>
        <div class="site-badge danger"><?php echo e(__('Failed')); ?></div>
        <?php break; ?>
<?php endswitch; ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__txn_status.blade.php ENDPATH**/ ?>