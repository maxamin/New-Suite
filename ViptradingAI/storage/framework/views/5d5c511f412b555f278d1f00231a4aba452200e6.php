<?php $__env->startSection('wallet_exchange_content'); ?>
    <div class="progress-steps-form">
        <form action="<?php echo e(route('user.wallet-exchange-now')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('From Wallet:')); ?></label>
                    <div class="input-group">
                        <select name="from_wallet" class="site-nice-select">
                            <option selected
                                    value="2"><?php echo e(__('Profit Wallet').' ('. $user->profit_balance.' '.$currency .')'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('Enter Amount:')); ?></label>
                    <div class="input-group">
                        <input type="text" name="amount" class="form-control"
                               oninput="this.value = validateDouble(this.value)" aria-label="Amount" id="amount"
                               aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1"><?php echo e($currency); ?></span>
                    </div>
                    <div class="input-info-text charge"></div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('To Wallet:')); ?></label>
                    <div class="input-group">
                        <select name="to_wallet" class="site-nice-select">
                            <option selected
                                    value="1"><?php echo e(__('Main Wallet').' ('. $user->balance.' '.$currency .')'); ?></option>
                        </select>
                    </div>

                </div>

            </div>


            <div class="transaction-list table-responsive">
                <div class="user-panel-title">
                    <h3><?php echo e(__('Review Details:')); ?></h3>
                </div>
                <table class="table">
                    <tbody>
                    <tr>
                        <td><strong><?php echo e(__('Amount')); ?></strong></td>
                        <td><span class="amount"></span> <span class="currency"></span></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo e(__('Charge')); ?></strong></td>
                        <td class="charge2"></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo e(__('Total')); ?></strong></td>
                        <td class="total"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                <button type="submit" class="site-btn blue-btn">
                    <?php echo e(__('Proceed to Exchange')); ?><i class="anticon anticon-double-right"></i>
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        "use strict"

        var currency = <?php echo json_encode($currency, 15, 512) ?>;

        var charge_type = <?php echo json_encode( setting('wallet_exchange_charge_type', 'fee'), 512) ?>;
        var charge = <?php echo json_encode( setting('wallet_exchange_charge', 'fee'), 512) ?>;

        $('#amount').on('keyup',function (e) {

            var amount = $(this).val()

            $('.amount').text((Number(amount)))

            $('.currency').text(currency)

            var finalCharge = charge_type === 'percentage' ? calPercentage(amount, charge) : charge


            $('.charge2').text(finalCharge + ' ' + currency)

            $('.total').text((Number(amount) + Number(finalCharge)) + ' ' + currency)


            $('.charge').text('Charge ' + charge + ' ' + (charge_type === 'percentage' ? ' % ' : currency))
        })
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.wallet.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/wallet/now.blade.php ENDPATH**/ ?>