
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Page Expired')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <img src="/assets/global/materials/500.svg" class="unusual-page-img" alt="">
    <h2 class="title">419</h2>
    <p class="description"><?php echo e(__('Page Expired')); ?></p>
    <a href="<?php echo e(route('home')); ?>" class="back-to-home-btn"><?php echo e(__('Back to Home')); ?></a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/errors/419.blade.php ENDPATH**/ ?>