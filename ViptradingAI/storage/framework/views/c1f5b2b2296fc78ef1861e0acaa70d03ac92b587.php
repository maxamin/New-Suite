<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link
        rel="shortcut icon"
        href="<?php echo e(asset(setting('site_favicon','global'))); ?>"
        type="image/x-icon"
    />
    <link rel="icon" href="<?php echo e(asset(setting('site_favicon','global'))); ?>" type="image/x-icon"/>

    <link rel="stylesheet" href="<?php echo e(asset('global/css/fontawesome.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/animate.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/nice-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('global/css/datatables.min.css')); ?>"/>
    <?php echo notifyCss(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/summernote-lite.min.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(asset('global/css/custom.css?var=2')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/styles.css?var=2')); ?>"/>
    <?php echo $__env->yieldContent('style'); ?>

    <title><?php echo e(setting('site_title', 'global')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
</head>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/include/__head.blade.php ENDPATH**/ ?>