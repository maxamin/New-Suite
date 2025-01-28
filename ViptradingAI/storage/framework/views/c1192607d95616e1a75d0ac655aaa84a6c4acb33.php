<script src="<?php echo e(asset('global/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/jquery-migrate.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/scrollUp.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/lucide.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/datatables.min.js')); ?>" type="text/javascript" charset="utf8"></script>
<script src="<?php echo e(asset('frontend/js/main.js?var=5')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/cookie.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/custom.js?var=5')); ?>"></script>
<?php if(setting('site_animation','permission')): ?>
    <script>
        (function ($) {
            'use strict';
            // AOS initialization
            AOS.init();
        })(jQuery);
    </script>
<?php endif; ?>


<?php if(setting('back_to_top','permission')): ?>
    <script>
        (function ($) {
            'use strict';
            // To top
            $.scrollUp({
                scrollText: '<i class="fas fa-caret-up"></i>',
                easingType: 'linear',
                scrollSpeed: 500,
                animation: 'fade'
            });
        })(jQuery);
    </script>
<?php endif; ?>

<?php echo notifyJs(); ?>
<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldPushContent('script'); ?>

<?php
    $googleAnalytics = plugin_active('Google Analytics');
    $tawkChat = plugin_active('Tawk Chat');
    $fb = plugin_active('Facebook Messenger');
?>

<?php if($googleAnalytics): ?>
    <?php echo $__env->make('frontend.plugin.google_analytics',['GoogleAnalyticsId' => json_decode($googleAnalytics?->data,true)['app_id']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($tawkChat): ?>
    <?php echo $__env->make('frontend.plugin.tawk',['data' => json_decode($tawkChat->data, true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php if($fb): ?>
    <?php echo $__env->make('frontend.plugin.fb',['data' => json_decode($fb->data, true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/include/__script.blade.php ENDPATH**/ ?>