<div class="header">
    <div class="logo">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <img
                class="logo-unfold"
                src="<?php echo e(asset(setting('site_logo','global'))); ?>"
                alt="Logo"
            />
            <img
                class="logo-fold"
                src="<?php echo e(asset(setting('site_logo','global'))); ?>"
                alt="Logo"
            />
        </a>
    </div>
    
    <div class="nav-wrap">
        <div class="nav-left">
            <button class="sidebar-toggle"><i icon-name="list"></i></button>
        </div>
        
        <div class="nav-right">
            <div class="single-nav-right">
                <a href="<?php echo e(route('home')); ?>" target="_blank" class="item" data-bs-toggle="tooltip" title=""
                   data-bs-placement="left" data-bs-original-title="Visit Landing Page">
                    <i icon-name="globe"></i>
                </a>
            </div>
            <div class="single-nav-right">
                <button type="button" class="item" data-bs-toggle="dropdown" aria-expanded="false">
                    <i icon-name="user"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item"><i
                                icon-name="user"></i><?php echo e(__('Profile')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.password-change')); ?>" class="dropdown-item">
                            <i icon-name="lock"></i><?php echo e(__('Change Password')); ?>

                        </a>
                    </li>
                    <li class="logout">

                        <a href="<?php echo e(url('admin/logout')); ?>" class="dropdown-item" type="button"
                           onclick="event.preventDefault(); localStorage.clear();  $('#logout-form').submit();">
                            <i icon-name="log-out"></i> <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/include/__header.blade.php ENDPATH**/ ?>