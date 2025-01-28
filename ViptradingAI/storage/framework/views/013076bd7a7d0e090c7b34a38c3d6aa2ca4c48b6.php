<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-basic-manage','customer-balance-add-or-subtract','customer-change-password','all-type-status'])): ?>
    <a href="<?php echo e(route('admin.user.edit',$id)); ?>" class="round-icon-btn primary-btn" data-bs-toggle="tooltip"
       title="Edit User" data-bs-original-title="Edit User"><i icon-name="edit-3"></i></a>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-mail-send')): ?>
    <span type="button"
          data-id="<?php echo e($id); ?>"
          data-name="<?php echo e($first_name.' '. $last_name); ?>"
          class="send-mail"
    ><button class="round-icon-btn red-btn" data-bs-toggle="tooltip" title="Send Email"
             data-bs-original-title="Send Email"><i icon-name="mail"></i></button></span>
<?php endif; ?>

<script>
    lucide.createIcons();
    $(document).ajaxComplete(function () {
        "use strict";
        $('[data-bs-toggle="tooltip"]').tooltip({
            "html": true,
        });
    });
</script>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__action.blade.php ENDPATH**/ ?>