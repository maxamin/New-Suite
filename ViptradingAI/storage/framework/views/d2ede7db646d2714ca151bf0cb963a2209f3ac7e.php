<?php $__env->startSection('title'); ?>
    <?php echo e(__('Wallet Exchange')); ?>

<?php $__env->stopSection(); ?>
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/menu'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Wallet Exchange')); ?></h3>
</div>
<?php $__env->startSection('content'); ?>
    <div class="progress-steps-form">
        <form action="<?php echo e(route('user.wallet-exchange-now')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-xl-4 col-md-12" style="display: none;">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('From Wallet:')); ?></label>
                    <div class="input-group">
                        <select name="from_wallet" class="site-nice-select">
                            <option selected
                                    value="2"><?php echo e(__('Profit Wallet').' ('. $user->profit_balance.' '.$currency .')'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12" style="display: none;">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('To Wallet:')); ?></label>
                    <div class="input-group">
                        <select name="to_wallet" class="site-nice-select">
                            <option selected
                                    value="1"><?php echo e(__('Main Wallet').' ('. $user->balance.' '.$currency .')'); ?></option>
                        </select>
                    </div>
                </div>
                
                
               
            </div>
            
            
            <style>
    .containerk {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
    }

    .left-text {
      order: 1; /* Sola yerleştir */
    }

    .center-image {
      order: 2; /* Ortaya yerleştir */
    }

    .right-text {
      order: 3; /* Sağa yerleştir */
    }

    img {
      width: 50px; /* Maksimum genişlik ayarı */
    }
  </style>
            
            
            <div class="containerk">
  <div class="left-text"><p>Profit Balance</p><br><p style="margin-top: -35px; color:#9FABC4;"><?php echo e($user->profit_balance); ?><?php echo e(setting('currency_symbol','global')); ?></p></div>
  <div class="center-image">
    <img src="/assets/frontend/images/8305.png" alt="Resim">
  </div>
  <div class="right-text"><p>Balance</p><br><p style="margin-top: -35px; color: #9FABC4;"><?php echo e($user->balance); ?><?php echo e(setting('currency_symbol','global')); ?></p></div>
</div>
            
            
            
            <div style="display: flex; justify-content: center; margin-bottom: 30px;">
                <div class="input-wrapper">
      <input type='number' id='input' name="amount"
                               oninput="this.value = validateDouble(this.value)" aria-label="Amount" id="amount"
                               aria-describedby="basic-addon1" required>
      </input>
      <label 
             for='input' 
             class='placeholder'>
        Exchange Amount
      </label>
    </div>
            </div>
            
            
            
            <div class="buttons" style="display: flex; justify-content: center;">
                <button type="submit" class="site-btn blue-btn" style="border-radius: 10px; background-image: url('/assets/global/images/blue2.jpg'); color: #15FFDF; font-size: 15px; font-weight: bold; width: 300px;">
                    <?php echo e(__('Proceed to Exchange')); ?><i class="anticon anticon-double-right"></i>
                </button>
            </div>
        </form>
    </div>
    
    <style>
  .input-wrapper {
    --padding: 16px;
    --focus-color: black;
    position: relative;
    display: flex;
    align-items: center;
  }

  input {
    padding: var(--padding);
    border: 2px solid gray;
    outline: none;
    border-radius: 6px;
    color: white;
    background-color: rgba(255, 255, 255, 0); /* Arka plan şeffaflık ayarı */
    width: 300px;
  }

  .placeholder {
    position: absolute;
    background-color: rgba(255, 255, 255, 0);
    color: white;
    left: var(--padding);
    padding: 0 4px;
    transition: all 0.2s ease-in;
  }

  input:is(:focus, :valid) {
    border: 2px solid var(--focus-color);
  }

  input:is(:focus, :valid) + .placeholder {
    transform: translateY(calc(-1 * var(--padding) - 12px));
    font-size: 20px;
    color: white;
  }
</style>


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/wallet/index.blade.php ENDPATH**/ ?>