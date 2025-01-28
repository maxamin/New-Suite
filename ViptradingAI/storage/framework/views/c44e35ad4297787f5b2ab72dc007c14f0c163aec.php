<div
    class="modal fade"
    id="addSubBal"
    tabindex="-1"
    aria-labelledby="addSubBalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubBalLabel">
                    <?php echo e(__('Balance Add or Subtract')); ?>

                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.user.balance-update',$user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="switch-field">
                                <input
                                    type="radio"
                                    id="addMon"
                                    name="type"
                                    value="add"
                                    checked
                                />
                                <label for="addMon"><?php echo e(__('Add')); ?></label>
                                <input
                                    type="radio"
                                    id="addMon2"
                                    name="type"
                                    value="subtract"
                                />
                                <label for="addMon2"><?php echo e(__('Subtract')); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <select  class="form-select" name="wallet">
                            <?php $__currentLoopData = ['main','profit']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>">
                                    <?php echo e(ucwords($type) .' '.__('Wallet')); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>


                        <div class="col-xl-12">
                            <div class="site-input-groups">
                                <div class="input-group joint-input">
                                    <span class="input-group-text"><?php echo e(setting('site_currency','global')); ?></span>
                                    <input type="text" name="amount" oninput="this.value = validateDouble(this.value)"
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <button type="submit" class="site-btn primary-btn w-100">
                                <?php echo e(__('Apply Now')); ?>

                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__balance.blade.php ENDPATH**/ ?>