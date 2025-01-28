<div class="site-card mb-0">
    <div class="site-card-header">
        <h3 class="title-small"><?php echo e(__('Account Informations')); ?></h3>
    </div>
    <div class="site-card-body">
        <div class="row">
            <form action="<?php echo e(route('admin.user.status-update',$user->id)); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('Account Status')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="accSta1"
                                name="status"
                                value="1"
                                <?php if($user->status): ?> checked <?php endif; ?>
                            />
                            <label for="accSta1"><?php echo e(__('Active')); ?></label>
                            <input
                                type="radio"
                                id="accSta2"
                                name="status"
                                value="0"
                                <?php if(!$user->status): ?> checked <?php endif; ?>
                            />
                            <label for="accSta2"><?php echo e(__('Disabled')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('Email Verification')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="emaSta1"
                                name="email_verified"
                                value="1"
                                <?php if($user->email_verified_at != null): ?> checked <?php endif; ?>
                            />
                            <label for="emaSta1"><?php echo e(__('Verified')); ?></label>
                            <input
                                type="radio"
                                id="emaSta2"
                                name="email_verified"
                                value="0"
                                <?php if($user->email_verified_at == null): ?> checked <?php endif; ?>
                            />
                            <label for="emaSta2"><?php echo e(__('Unverified')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('KYC Verification')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="kyc1"
                                name="kyc"
                                value="1"
                                <?php if($user->kyc == 1): ?> checked <?php endif; ?>
                            />
                            <label for="kyc1"><?php echo e(__('Verified')); ?></label>
                            <input
                                type="radio"
                                id="kyc2"
                                name="kyc"
                                value="0"
                                <?php if($user->kyc != 1): ?> checked <?php endif; ?>
                            />
                            <label for="kyc2"><?php echo e(__('Unverified')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('2FA Verification')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="2fa1"
                                name="two_fa"
                                value="1"
                                <?php if($user->two_fa): ?> checked <?php endif; ?>
                            />
                            <label for="2fa1"><?php echo e(__('Active')); ?></label>
                            <input
                                type="radio"
                                id="2fa2"
                                name="two_fa"
                                value="0"
                                <?php if(!$user->two_fa): ?> checked <?php endif; ?>
                            />
                            <label for="2fa2"><?php echo e(__('Disabled')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('Deposit Status')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="depo1"
                                name="deposit_status"
                                value="1"
                                <?php if($user->deposit_status): ?> checked <?php endif; ?>
                            />
                            <label for="depo1"><?php echo e(__('Active')); ?></label>
                            <input
                                type="radio"
                                id="depo2"
                                name="deposit_status"
                                value="0"
                                <?php if(!$user->deposit_status): ?> checked <?php endif; ?>
                            />
                            <label for="depo2"><?php echo e(__('Disabled')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('Withdraw Status')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="wid1"
                                name="withdraw_status"
                                value="1"
                                <?php if($user->withdraw_status): ?> checked <?php endif; ?>
                            />
                            <label for="wid1"><?php echo e(__('Active')); ?></label>
                            <input
                                type="radio"
                                id="wid2"
                                name="withdraw_status"
                                value="0"
                                <?php if(!$user->withdraw_status): ?> checked <?php endif; ?>
                            />
                            <label for="wid2"><?php echo e(__('Disabled')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="profile-card-single">
                        <h5 class="heading"><?php echo e(__('Send Money Status')); ?></h5>
                        <div class="switch-field">
                            <input
                                type="radio"
                                id="trans1"
                                name="transfer_status"
                                value="1"
                                <?php if($user->transfer_status): ?> checked <?php endif; ?>
                            />
                            <label for="trans1"><?php echo e(__('Active')); ?></label>
                            <input
                                type="radio"
                                id="trans2"
                                name="transfer_status"
                                value="0"
                                <?php if(!$user->transfer_status): ?> checked <?php endif; ?>
                            />
                            <label for="trans2"><?php echo e(__('Disabled')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="site-btn-sm primary-btn w-100 centered">
                        <?php echo e(__('Save Changes')); ?>

                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__status_update.blade.php ENDPATH**/ ?>