<div class="table-description">
    <div class="icon">
        <i icon-name="<?php switch($type):
            case ('send_money'): ?>arrow-right
            <?php break; ?>
            <?php case ('receive_money'): ?>arrow-left
            <?php break; ?>
            <?php case ('deposit'): ?>arrow-down-left
            <?php break; ?>
            <?php case ('manual_deposit'): ?>arrow-down-left
            <?php break; ?>
            <?php case ('investment'): ?>arrow-left-right
            <?php break; ?>
            <?php case ('withdraw'): ?>arrow-up-left
            <?php break; ?>
            <?php default: ?>backpack
        <?php endswitch; ?>">
        </i>
    </div>
    <div class="description">
        <strong><?php echo e($description); ?></strong><?php if(!in_array($approval_cause,['none',""])): ?>
            <span class="optional-msg" data-bs-toggle="tooltip" title="" data-bs-original-title="<?php echo e($approval_cause); ?>"><i
                    icon-name="mail"></i></span>
        <?php endif; ?>
        <div class="date"><?php echo e($created_at); ?></div>
    </div>
</div>
<script>
    'use strict';
    lucide.createIcons()
    $(document).ajaxComplete(function () {
        $('[data-bs-toggle="tooltip"]').tooltip({
            "html": true,
        });
    });
</script>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/user/include/__txn_description.blade.php ENDPATH**/ ?>