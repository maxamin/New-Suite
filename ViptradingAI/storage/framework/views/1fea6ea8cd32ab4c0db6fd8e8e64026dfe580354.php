<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-action')): ?>
    <span type="button"
          data-id="<?php echo e($id); ?>"
          id="withdraw-action"
    ><button class="round-icon-btn red-btn" data-bs-toggle="tooltip" title="" data-bs-original-title="Approval Process"><i
                icon-name="eye"></i></button></span>
    <script>
        'use strict';
        lucide.createIcons();
    </script>
<?php endif; ?>


<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/withdraw/include/__action.blade.php ENDPATH**/ ?>