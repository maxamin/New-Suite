<div
    class="modal fade"
    id="sendEmail"
    tabindex="-1"
    aria-labelledby="sendEmailModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-body popup-body">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="popup-body-text">
                    <h3 class="title mb-4"> <?php echo e(__('Send Mail to')); ?> <span id="name"><?php echo e($name ?? ''); ?></span></h3>
                    <form action="<?php echo e(route('admin.user.mail-send')); ?>" method="post" id="send-mail-form">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="<?php echo e($id ?? 0); ?>" id="userId">

                        <div class="site-input-groups">
                            <label for="" class="box-input-label"><?php echo e(__('Subject:')); ?></label>
                            <input
                                type="text"
                                name="subject"
                                class="box-input mb-0"
                                required=""
                            />
                        </div>
                        <div class="site-input-groups">
                            <label for="" class="box-input-label"><?php echo e(__('Email Details')); ?></label>
                            <textarea name="message" class="form-textarea mb-0"></textarea>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="send"></i>
                                <?php echo e(__('Send Email')); ?>

                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                <i icon-name="x"></i>
                                <?php echo e(__('Close')); ?>

                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/user/include/__mail_send.blade.php ENDPATH**/ ?>