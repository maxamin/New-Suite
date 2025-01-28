<div
    class="tab-pane fade show active"
    id="pills-informations"
    role="tabpanel"
    aria-labelledby="pills-informations-tab"
>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-basic-manage')): ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="site-card">
                    <div class="site-card-header">
                        <h3 class="title"><?php echo e(__('Basic Info')); ?></h3>
                    </div>
                    <div class="site-card-body">
                        <form action="<?php echo e(route('admin.user.update',$user->id)); ?>" method="post">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('First Name:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e($user->first_name); ?>"
                                               name="first_name" required="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Last Name:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e($user->last_name); ?>" required=""
                                               name="last_name">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Country:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e($user->country); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Phone:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e(safe($user->phone)); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Username:')); ?></label>
                                        <input type="text" class="box-input" name="username" value="<?php echo e(safe($user->username)); ?>"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Email:')); ?></label>
                                        <input type="email" class="box-input" value="<?php echo e(safe($user->email)); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Gender:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e($user->gender); ?>" required=""
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Date of Birth:')); ?></label>
                                        <input type="text" class="box-input" value="<?php echo e($user->date_of_birth); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('City:')); ?></label>
                                        <input type="text" name="city" class="box-input" value="<?php echo e($user->city); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Zip Code:')); ?></label>
                                        <input type="text" class="box-input" name="zip_code" value="<?php echo e($user->zip_code); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Address:')); ?></label>
                                        <input type="text" class="box-input" name="address" value="<?php echo e($user->address); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Joining Date:')); ?></label>
                                        <input type="text" class="box-input"
                                               value="<?php echo e(carbonInstance($user->created_at)->toDayDateTimeString()); ?>"
                                               required="" disabled>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit"
                                            class="site-btn-sm primary-btn w-100 centered"><?php echo e(__('Save Changes')); ?></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-change-password')): ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="site-card">
                    <div class="site-card-header">
                        <h3 class="title"><?php echo e(__('Change Password')); ?></h3>
                    </div>
                    <div class="site-card-body">
                        <form action="<?php echo e(route('admin.user.password-update',$user->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('New Password:')); ?></label>
                                        <input type="password" name="new_password" class="box-input" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="site-input-groups">
                                        <label for="" class="box-input-label"><?php echo e(__('Confirm Password:')); ?></label>
                                        <input type="password" name="new_confirm_password" class="box-input"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit"
                                            class="site-btn-sm primary-btn w-100 centered"><?php echo e(__('Change Password')); ?></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__basic_info.blade.php ENDPATH**/ ?>