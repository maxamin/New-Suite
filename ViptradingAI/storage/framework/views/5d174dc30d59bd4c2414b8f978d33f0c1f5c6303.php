<div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="editScheduleModalLabel"
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
                    <h3 class="title mb-4"><?php echo e(__('Edit Schedule')); ?></h3>
                    <form action="" id="editForm" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="site-input-groups">
                            <label for="" class="box-input-label"><?php echo e(__('Schedule Name:')); ?></label>
                            <input
                                type="text"
                                class="box-input mb-0"
                                required=""
                                name="name"
                                id="name"
                            />
                        </div>
                        <div class="site-input-groups">
                            <label for="" class="box-input-label"><?php echo e(__('Schedule In Hours:')); ?></label>
                            <div class="input-group joint-input">
                                <input type="text" class="form-control" name="time" id="time"/>
                                <span class="input-group-text" id="time-level"><?php echo e(__('Hours')); ?></span>
                            </div>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                <?php echo e(__('Save Schedule')); ?>

                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                <i icon-name="x"></i>
                                <?php echo e(__('Cancel')); ?>

                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/schedule/modal/__edit_schedule.blade.php ENDPATH**/ ?>