<?php
    $user = \App\Models\User::find($user_id);
?>
<a class="link" href="<?php echo e(route('admin.user.edit',$user->id)); ?>"><?php echo e(safe($user->username)); ?></a>
<?php /**PATH C:\xampp\htdocs\resources\views/backend/transaction/include/__user.blade.php ENDPATH**/ ?>