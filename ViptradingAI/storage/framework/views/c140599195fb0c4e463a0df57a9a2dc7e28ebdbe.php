<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<!--Head-->
<?php echo $__env->make('backend.include.__head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--/Head-->
<body>

    <video autoplay muted loop id="bg-video">
        <source src="/assets/backend/materials/prodax.mp4" type="video/mp4">
        Tarayıcınız video etiketini desteklemiyor.
    </video>
    
    <style>
    
#bg-video {
    position: fixed; 
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1; /* Diğer içeriklerin üzerine eklemek için */
}
.admin-auth {
    background: none;
}
/* Form Container */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Form Element Style */
.single-box {
    margin-bottom: 15px;
}

.box-input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    background: none;
    border: 3px solid #3d03fc;
    border-radius: 5px;
    font-size: 16px;
}

.single-box {
    width: 100%;
}

/* Button Style */
.site-btn {
    background: none;
    width: 100%;
    color: #fff;
    border: 3px solid #3d03fc;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hafif bir gölge efekti */
}

.site-btn:hover {
    background-color: #3d03fc; /* Hover durumunda renk değişimi */
}
    </style>

<!--Auth Page-->
<div class="admin-auth">
    
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('auth-content'); ?>
    <div>
        <div class="login-content">
            <div class="auth-body">

                <form action="<?php echo e(route('admin.login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="single-box">
                        <input
                            type="email"
                            name="email"
                            class="box-input"
                            placeholder="Admin Email"
                            required
                        />
                    </div>
                    <div class="single-box">
                        <input
                            type="password"
                            name="password"
                            class="box-input"
                            placeholder="Password"
                            required
                        />
                    </div>
                    <div class="single-box">
                        <button class="site-btn" type="submit"><?php echo e(__('Admin Login')); ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
    
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
    <?php echo $__env->yieldContent('auth-content'); ?>
</div>
<!--/Auth Page-->

<!--Script-->
<?php echo $__env->make('backend.include.__script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--/Script-->

</body>
</html>







<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/auth/login.blade.php ENDPATH**/ ?>