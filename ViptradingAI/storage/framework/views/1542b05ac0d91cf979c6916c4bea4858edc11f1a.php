<div class="row">
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="users"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['register_user']); ?></h4>
                <p><?php echo e(__('Registered User')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.user.index')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="user-check"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['active_user']); ?></h4>
                <p><?php echo e(__('Active Users')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.user.active')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="user-cog"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['total_staff']); ?></h4>
                <p><?php echo e(__('Site Staff')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.staff.index')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="wallet"></i>
            </div>
            <div class="content">
                <h4><?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['total_deposit'],2)); ?></span></h4>
                <p><?php echo e(__('Total Deposits')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.deposit.history')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="landmark"></i>
            </div>
            <div class="content">
                <h4><?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['total_withdraw'],2)); ?></span></h4>
                <p><?php echo e(__('Total Withdraw')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.withdraw.history')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="link"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['total_referral']); ?></h4>
                <p><?php echo e(__('Total Referral')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.referral.index')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="send"></i>
            </div>
            <div class="content">
                <h4><?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['total_send'],2)); ?></span></h4>
                <p><?php echo e(__('Total Send')); ?></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="droplet"></i>
            </div>
            <div class="content">
                <h4><?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['total_investment'],2)); ?></span></h4>
                <p><?php echo e(__('Total Investment')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.investments')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>


    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="package-plus"></i>
            </div>
            <div class="content">
                <h4><?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['deposit_bonus'],2)); ?></span></h4>
                <p><?php echo e(__('Deposit Bonus')); ?></p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="sprout"></i>
            </div>
            <div class="content">
                <h4>  <?php echo e($currencySymbol); ?><span class="count"><?php echo e(round($data['investment_bonus'],2)); ?></span></h4>
                <p><?php echo e(__('Investment Bonus')); ?></p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="webhook"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['total_gateway']); ?></h4>
                <p><?php echo e(__('Total Automatic Gateway')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.gateway.automatic')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="data-card">
            <div class="icon">
                <i icon-name="help-circle"></i>
            </div>
            <div class="content">
                <h4 class="count"><?php echo e($data['total_ticket']); ?></h4>
                <p><?php echo e(__('Total Ticket')); ?></p>
            </div>
            <a class="link" href="<?php echo e(route('admin.ticket.index')); ?>"><i icon-name="external-link"></i></a>
        </div>
    </div>

</div>
<?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/include/__data_card.blade.php ENDPATH**/ ?>