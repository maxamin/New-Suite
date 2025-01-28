<?php $__env->startSection('content'); ?>
<style>
    .layui-input {
            border-style: none;
         background: #134341 !important;
        }
</style>
<div class="cmn-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom--card">
                    <div class="card-header card-header-bg">
                        <h5 class="title">Payment Amount</h5><br>
                        <center><h4 class="title"><?php echo e(showAmount($data['final_amo']) .' '.$data['method_currency']); ?></h4></center>
                    </div>
                    <div class="card-body  ">
                       <center> <h6 class="title">USDT Adress QR CODE</h6></center>
                        <center><img src="https://i.ibb.co/YWjn4dm/qrusdt.jpg" alt="qrusdt" border="0" style="height:200px"></center>
                        <form action="<?php echo e(route('user.deposit.manual.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                   <pre style="color:white">

<textarea id="myInput" readonly style=" padding-top:10px; font-size: 12px;background:#EAEFF7 !important; height:40px; weight:100%;border-radius: 20px!important; color:#000000" type="text" class="form-control"><?php echo  $data->gateway->description ?></textarea>
<button class="bg-gr-orange"style="
background-image: linear-gradient(to right, rgb(153, 153, 153) , rgb(216, 216, 216));
             border-radius: 25px;
            width:50%;
            font-weight:700;
             height:35px;
              border:0px;
        width:50%; font-weight:700; height:35px; line-height:10px; font-size: 10px; display: inline-block; border:0px; border-radius: 25px; color:white;" type="button"onclick="myFunction()">Copy Adress</button>
</pre>


                                </div>

                                <?php if (isset($component)) { $__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0 = $component; } ?>
<?php $component = App\View\Components\ViserForm::resolve(['identifier' => 'id','identifierValue' => ''.e($gateway->form_id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('viser-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ViserForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0)): ?>
<?php $component = $__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0; ?>
<?php unset($__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0); ?>
<?php endif; ?>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center><button type="submit" class="btn btn--base w-50 mt-3"><?php echo app('translator')->get('Recharge'); ?></button></center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
             function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Adress copied successfully: " + copyText.value);
}
          </script>
          
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/payment/manual.blade.php ENDPATH**/ ?>