<div id="confirmationModal" class="modal fade <?php echo e($customModal); ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Confirmation Alert!'); ?></h5>
                <button type="button" class="close <?php echo e($closeButton); ?>" data-bs-dismiss="modal" aria-label="Close">
                    <?php if(!$closeButton != ''): ?>
                        <i class="las la-times"></i>
                    <?php endif; ?>
                </button>
            </div>
            <form action="" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p class="question"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                    <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Yes'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>

<script>
    (function ($) {
        "use strict";
        $(document).on('click','.confirmationBtn', function () {
            var modal   = $('#confirmationModal');
            let data    = $(this).data();
            modal.find('.question').text(`${data.question}`);
            modal.find('form').attr('action', `${data.action}`);
            modal.modal('show');
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/components/confirmation-modal.blade.php ENDPATH**/ ?>