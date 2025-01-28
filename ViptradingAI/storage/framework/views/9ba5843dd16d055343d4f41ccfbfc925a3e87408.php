<?php $__env->startSection('title'); ?>
    <?php echo e(__('Schema Preview')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section style="background-size: 100% 100%; height: 750px;">
    
     <img onclick="window.location.href='/h5/index.php/vip'" class="image" src="/assets/frontend/images/close.png">
     
     
    <div style="height: 50px;"></div>
    
    <div class="endiv" style="background-color: rgba(0, 0, 0, 0.7); border: 1px solid white; border-radius: 10px;">
        
       

        
        
        <div style="height: 20px;"></div>
        
        <div style="text-align: center;">
  <h1 style="color: #8993A9;">Protocol</h1>
</div>
    
      <div class="container5">
    <div class="content5">

        <p style="color: #6e706c; font-size: 14px;">Thank you for using our products and services. The services are provided by TRADER VIP AI. TRADER VIP AI, established in the United States, owns and manages the TRADER VIP AI platform. The TRADER VIP AI Physical Solar Panel Leasing Service Agreement (hereinafter referred to as the "Agreement") is the relevant service terms and includes the included risk statement. The TRADER VIP AI platform is used by users and TRADER VIP AI for the physical solar panel leasing service under the TRADER VIP AI Private Banking Department. The user acknowledges that they have fully read, understood, and accepted all the contents of this agreement before accepting the service. When the user clicks the "I Accept" box or button after signing this agreement or benefiting from the service, the user declares that they fully understand this agreement and are bound by both the user and TRADER VIP AI in the form of information messages, and they accept this agreement.</p>
        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            IF YOU DO NOT AGREE TO THESE TERMS, DO NOT ACCESS OR USE THE SERVICE.
        </p>
        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            1. Service Content: TRADER VIP AI uses its own system and device partners to offer the leasing of solar panels and other possible new projects on the basis of TRADER VIP AI and the TRADER VIP AI Private Banking Area. Additional services/products.
        </p>
        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            2. User agrees with the registration information provided by the user:
        </p>
        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            (1) To provide legal, accurate, precise, and detailed personal information;
        </p>

        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            (2) To update user information when any changes occur. If the registration information provided by the user is illegal, inaccurate, misleading, or incomplete, the user bears the relevant responsibility, and TRADER VIP AI reserves the right to suspend the user's use of TRADER VIP AI services.
        </p>

        <div style="height: 2px;"></div>
        <p style="color: #6e706c; font-size: 14px;">
            (3) Under the [TRADER VIP AI Private Banking Area], no cooperation or agency agreement has been made with any third-party individual or group until this agreement is signed. The TRADER VIP AI platform will not review, endorse, or accept any response to any third-party website requesting access to [TRADER VIP AI Private Banking Area] services.
        </p>

    </div>
</div>

    
    <div style="height: 20px;"></div>
    <div style="text-align: center;">
        <button onclick="otomatikTikla()" class="site-btn" style="border: 1px solid #15FFDF; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold; width: 80%;">
                                    To Accept
                                </button>
</div>
    
        
        <div style="height: 30px;"></div>
        
    </div>
    
    
    
    
    
    
    <style>
    
    .image {
    position: absolute;
    top: 85px;
    right: 17px;
    width: 30px; /* İmg etiketi boyutunu ayarlayın */
  }
    

    /* Orta hizalama için flex kullanımı */
    .container5 {
    display: flex;
    justify-content: center;
    overflow-y: auto;
    align-items: flex-start; /* İçeriği yukarıda hizala */
    width: 100%;
    height: 500px;
    
    
}

.content5 {
    width: 100%; /* İçeriğin genişliğini ayarlayabilirsiniz */
    height: auto; /* İçeriğin yüksekliğini otomatik olarak ayarlar */
    padding: 20px; /* İçerikle kenar boşluğu ekleyebilirsiniz */
}

.fixed-bottom-right {
        display: none;
    }
   
</style>
    

    <form action="<?php echo e(route('user.invest-now')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="progress-steps-form">
                            <div class="transaction-list table-responsive" style="display:none;">
                                <table class="table preview-table">
                                    <tbody>
                                    <tr>
                                        <td><strong><?php echo e(__('Select Schema:')); ?></strong></td>
                                        <td>
                                            <div class="input-group mb-0">
                                                <select class="site-nice-select" aria-label="Default select example"
                                                        id="select-schema" name="schema_id" required>
                                                    <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($plan->id); ?>"
                                                                <?php if($plan->id == $schema->id ): ?> selected <?php endif; ?>><?php echo e($plan->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong><?php echo e(__('Profit Holiday:')); ?></strong></td>
                                        <td id="holiday">
                                            <?php if( null != $schema->off_days): ?> <?php echo e(implode(', ', json_decode($schema->off_days,true))); ?>  <?php else: ?> <?php echo e(__('No')); ?> <?php endif; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong><?php echo e(__('Amount:')); ?></strong></td>
                                        <td id="amount">
                                            <?php echo e($schema->type == 'range' ? 'Minimum ' . $schema->min_amount .' '.$currency. ' - ' . 'Maximum ' . $schema->max_amount.' '.$currency :  $schema->fixed_amount.' '.$currency); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong><?php echo e(__('Enter Amount:')); ?></strong></td>
                                        <td>
                                            <div class="input-group mb-0">
                                                <input type="text" class="form-control"
                                                       <?php if($schema->type == 'fixed'): ?> value="<?php echo e($schema->fixed_amount); ?>"
                                                       readonly <?php endif; ?> placeholder="Enter Amount"
                                                       oninput="this.value = validateDouble(this.value)"
                                                       aria-label="Amount" name="invest_amount" id="enter-amount"
                                                       aria-describedby="basic-addon1" required>
                                                <span class="input-group-text" id="basic-addon1"><?php echo e($currency); ?></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong><?php echo e(__('Select Wallet:')); ?></strong></td>
                                        <td>
                                            <div class="input-group mb-0">
                                                <select class="site-nice-select" aria-label="Default select example"
                                                        name="wallet" required id="selectWallet">
                                                    <option
                                                        value="main"><?php echo e(__('Main Wallet ( ') . $user->balance.' '. $currency); ?>

                                                        )
                                                    </option>
                                                    <option
                                                        value="profit"><?php echo e(__('Profit Wallet ( ') . $user->profit_balance.' '. $currency); ?>

                                                        )
                                                    </option>
                                                    <option value="gateway"><?php echo e(__('Direct Gateway')); ?></option>
                                                </select>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr class="gatewaySelect">

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <div class="row manual-row"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong><?php echo e(__('Return of Interest:')); ?></strong></td>
                                        <td id="return-interest"><?php echo e(($schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $schema->return_interest.' '.$currency ) .' ('.$schema->schedule->name .')'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo e(__('Number of Period:')); ?></strong></td>
                                        <td id="number-period"><?php echo e(( $schema->return_type == 'period' ? $schema->number_of_period : 'Unlimited').($schema->number_of_period == 1 ? ' Time' : ' Times' )); ?> </td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo e(__('Capital Back:')); ?></strong></td>
                                        <td id="capital_back"><?php echo e($schema->capital_back ? 'Yes' : 'No'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo e(__('Total Investment Amount:')); ?></strong></td>
                                        <td><span
                                                id="total-amount"> <?php echo e($schema->fixed_amount ?? ''); ?></span> <?php echo e($currency); ?>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="button" style="display:none;">
                                <button id="ikinciButon" type="submit" class="site-btn primary-btn me-3">
                                    <i class="anticon anticon-check"></i><?php echo e(__('Invest Now')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
    </div>
    
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
function otomatikTikla() {
  document.getElementById("ikinciButon").click();
}
</script>

    <script>
        $("#select-schema").on('change',function (e) {
            "use strict";
            e.preventDefault();
            var id = $(this).val();

            var invest_amount = $("#enter-amount");
            invest_amount.val('');
            invest_amount.attr('readonly', false);

            var url = '<?php echo e(route("user.schema.select", ":id")); ?>';
            url = url.replace(':id', id);

            $.ajax({
                url: url, success: function (result) {
                    $('#amount').html(result.amount_range);
                    $('#holiday').html(result.holiday);
                    $('#return-interest').html(result.return_interest);
                    $('#number-period').html(result.number_period);
                    $('#capital_back').html(result.capital_back);

                    if (result.invest_amount > 0) {
                        invest_amount.val(result.invest_amount);
                        invest_amount.attr('readonly', true);
                    }

                }
            });
        });
        $("#enter-amount").on('keyup',function (e) {
            "use strict";
            e.preventDefault();
            var amount = $(this).val();
            $("#total-amount").html(amount);
        })

        $("#selectWallet").on('change',function (e) {
            "use strict";
            $('.gatewaySelect').empty();
            $('.manual-row').empty();
            var wallet = $(this).val();
            if (wallet === 'gateway') {
                $.get('<?php echo e(route('gateway.list')); ?>', function (data) {
                    $('.gatewaySelect').append(data)
                    $('select').niceSelect();

                });
            }

        })
        $('body').on('change', '#gatewaySelect', function (e) {
            "use strict"
            e.preventDefault();

            $('.manual-row').empty();

            var code = $(this).val()

            var url = '<?php echo e(route("user.deposit.gateway",":code")); ?>';
            url = url.replace(':code', code);
            $.get(url, function (data) {

                if (data.credentials !== undefined) {

                    console.log(data.credentials);

                    $('.manual-row').append(data.credentials)
                    imagePreview()
                }


            });

            $('#amount').on('keyup',function (e) {
                "use strict"
                var amount = $(this).val()
                $('.amount').text((Number(amount)))
                $('.currency').text(currency)
                var charge = globalData.charge_type === 'percentage' ? calPercentage(amount, globalData.charge) : globalData.charge
                $('.charge2').text(charge + ' ' + currency)

                $('.total').text((Number(amount) + Number(charge)) + ' ' + currency)
            })


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/schema/preview.blade.php ENDPATH**/ ?>