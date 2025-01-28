<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php echo $__env->make('backend.include.__head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    
    
    <video autoplay muted loop id="bg-video">
        <source src="/assets/backend/materials/prodax.mp4" type="video/mp4">
        Tarayıcınız video etiketini desteklemiyor.
    </video>
    
    <style>
        .title {
            color: white;
        }

#bg-video {
    position: fixed; 
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1; /* Diğer içeriklerin üzerine eklemek için */
}

    </style>
    
<!--Full Layout-->
<div class="layout">

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
    <!--Header-->
    <?php echo $__env->make('backend.include.__header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/Header-->

    <!--Side Nav-->
    <?php echo $__env->make('backend.include.__side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/Side Nav-->

    <!--Page Content-->
    <div class="page-container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!--Page Content-->
</div>
<!--/Full Layout-->

<?php echo $__env->make('backend.include.__script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/layouts/app.blade.php ENDPATH**/ ?>