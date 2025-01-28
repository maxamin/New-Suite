<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('frontend.include.__head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="<?php echo e(session()->get('site-color-mode') ?? 'dark-theme'); ?>">
    
    
    
    
<?php if (isset($component)) { $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c = $component; } ?>
<?php $component = Mckenziearts\Notify\NotifyComponent::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notify-messages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Mckenziearts\Notify\NotifyComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c)): ?>
<?php $component = $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c; ?>
<?php unset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c); ?>
<?php endif; ?>
<!--Full Layout-->
<div class="panel-layout">

    <div class="page-container">
        <div class="">
            <div class="section-gap">
                <div class="container-fluid">
                    <!--Page Content-->
                    <?php echo $__env->yieldContent('content'); ?>
                    <!--Page Content-->
                </div>
            </div>
        </div>
    </div>
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    // Sayfa yüklendiğinde bu kod çalışacak
    if (window.innerWidth >= 768) { // Masaüstü ekran boyutu kontrolü (örneğin 768 piksel)
      const panelLayout = document.querySelector('.panel-layout');
      if (panelLayout) {
        panelLayout.classList.add('nav-folded');
      }
    }
  });
</script>

    <!-- Automatic Popup -->
    

    <!-- /Automatic Popup End -->
</div>
<!--/Full Layout-->

<?php echo $__env->make('frontend.include.__script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>

<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/layouts/user.blade.php ENDPATH**/ ?>