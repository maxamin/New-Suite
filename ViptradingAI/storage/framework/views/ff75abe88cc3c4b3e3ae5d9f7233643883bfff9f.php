<?php $__env->startSection('title'); ?>
    <?php echo e(__('Customer Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(__('Details of')   .' '. $user->first_name .' '.  $user->last_name); ?> </h2>
                            <a href="<?php echo e(url()->previous()); ?>" class="title-btn"><i
                                    icon-name="corner-down-left"></i><?php echo e(__('Back')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-6 col-lg-8 col-md-6 col-sm-12">
                    <div class="profile-card">
                        <div class="top">
                            <div class="avatar">
                                <?php if(null != $user->avatar): ?>
                                    <img
                                        class="avatar-image"
                                        src="<?php echo e(asset($user->avatar)); ?>"
                                        alt="<?php echo e($user->first_name); ?>"
                                    />
                                <?php else: ?>
                                    <span class="avatar-text"><?php echo e($user->first_name[0] .$user->last_name[0]); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="title-des">
                                <h4><?php echo e($user->first_name .' '. $user->last_name); ?></h4>
                                <p><?php echo e(ucwords($user->city)); ?> <?php if($user->city != ''): ?> ,<?php endif; ?><?php echo e($user->country); ?></p>
                            </div>
                            <div class="btns">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-mail-send')): ?>
                                    <span type="button" data-bs-toggle="modal" data-bs-target="#sendEmail"><a
                                            href="javascript:void(0);" class="site-btn-round blue-btn"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Send Email"><i
                                                icon-name="mail"></i></a></span>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-login')): ?>
                                    <a href="<?php echo e(route('admin.user.login',$user->id)); ?>" target="_blank"
                                       class="site-btn-round red-btn" data-bs-toggle="tooltip" title=""
                                       data-bs-placement="top" data-bs-original-title="Login As User">
                                        <i icon-name="user-plus"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-balance-add-or-subtract')): ?>
                                    <span data-bs-toggle="modal" data-bs-target="#addSubBal">
                                    <a href="javascript:void(0);" type="button" class="site-btn-round primary-btn"
                                       data-bs-toggle="tooltip" title="" data-bs-placement="top"
                                       data-bs-original-title="Fund Add or Subtract">
                                    <i icon-name="wallet"></i></a></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="admin-user-balance-card">
                                            <div class="wallet-name">
                                                <div class="name"><?php echo e(__('Main Wallet')); ?></div>
                                                <div class="chip-icon">
                                                    <img class="chip"
                                                        src="<?php echo e(asset('backend/materials/chip.png')); ?>"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            <div class="wallet-info">
                                                <div class="wallet-id"><?php echo e(setting('site_currency','global')); ?></div>
                                                <div
                                                    class="balance"><?php echo e(setting('currency_symbol','global') . $user->balance); ?></div>
                                            </div>
                                        </div>
                                        <div class="admin-user-balance-card">
                                            <div class="wallet-name">
                                                <div class="name"><?php echo e(__('Profit Wallet')); ?></div>
                                                <div class="chip-icon">
                                                    <img
                                                        class="chip"
                                                        src="<?php echo e(asset('backend/materials/chip.png')); ?>"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            <div class="wallet-info">
                                                <div class="wallet-id"><?php echo e(setting('site_currency','global')); ?></div>
                                                <div
                                                    class="balance"><?php echo e(setting('currency_symbol','global') . $user->profit_balance); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User Status Update -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all-type-status')): ?>
                            <?php echo $__env->make('backend.user.include.__status_update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- User Status Update End-->

                    </div>
                </div>


                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="site-tab-bars">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-basic-manage','customer-change-password'])): ?>
                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link active"
                                        id="pills-informations-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-informations"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-informations"
                                        aria-selected="true"
                                    ><i icon-name="user"></i><?php echo e(__('Informations')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('investment-list')): ?>
                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="pills-transfer-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-transfer"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-transfer"
                                        aria-selected="true"
                                    ><i icon-name="anchor"></i><?php echo e(__('Investments')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit-list')): ?>
                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="pills-deposit-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-deposit"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-deposit"
                                        aria-selected="true"
                                    ><i icon-name="credit-card"></i><?php echo e(__('Earnings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-list')): ?>
                                    <li class="nav-item" role="presentation">
                                        <a
                                            href=""
                                            class="nav-link"
                                            id="pills-transactions-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-transactions"
                                            type="button"
                                            role="tab"
                                            aria-controls="pills-transactions"
                                            aria-selected="true"
                                        ><i icon-name="cast"></i><?php echo e(__('Transactions')); ?></a>
                                    </li>
                                <?php endif; ?>

                            <?php if(setting('site_referral','global') == 'level'): ?>
                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="pills-ticket-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-tree"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-transfer"
                                        aria-selected="true"
                                    ><i icon-name="network"></i><?php echo e(__('Referral Tree')); ?></a>
                                </li>
                            <?php endif; ?>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['support-ticket-list','support-ticket-action'])): ?>
                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="pills-ticket-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-ticket"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-transfer"
                                        aria-selected="true"
                                    ><i icon-name="wrench"></i><?php echo e(__('Ticket')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- basic Info -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-basic-manage','customer-change-password'])): ?>
                            <?php echo $__env->make('backend.user.include.__basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>


                        <!-- investments -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('investment-list')): ?>
                            <?php echo $__env->make('backend.user.include.__investments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <!-- earnings -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit-list')): ?>
                            <?php echo $__env->make('backend.user.include.__earnings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <!-- transaction -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-list')): ?>
                            <?php echo $__env->make('backend.user.include.__transactions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <!-- Referral Tree -->
                        <?php if(setting('site_referral','global') == 'level'): ?>
                          <?php echo $__env->make('backend.user.include.__referral_tree', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <!-- ticket -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['support-ticket-list','support-ticket-action'])): ?>
                            <?php echo $__env->make('backend.user.include.__ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Send Email -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-mail-send')): ?>
        <?php echo $__env->make('backend.user.include.__mail_send',['name' => $user->first_name.' '.$user->last_name, 'id' => $user->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Modal for Send Email-->

    <!-- Modal for Add or Subtract Balance -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-balance-add-or-subtract')): ?>
        <?php echo $__env->make('backend.user.include.__balance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Modal for Add or Subtract Balance End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/edit.blade.php ENDPATH**/ ?>