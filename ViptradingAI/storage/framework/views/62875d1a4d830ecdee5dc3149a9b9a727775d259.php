<div class="side-nav">
    <div class="side-nav-inside">
        <ul class="side-nav-menu">

            <li class="side-nav-item <?php echo e(isActive('admin.dashboard')); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>"><i
                        icon-name="layout-dashboard"></i><span><?php echo e(__('Dashboard')); ?></span></a>
            </li>
            
            <li class="side-nav-item <?php if(Request::is('admin/bonus')): ?> active <?php endif; ?>">
    <a href="/admin/bonus"><i icon-name="layout-dashboard"></i><span><?php echo e(__('Bonus Manager')); ?></span></a>
</li>
<li class="side-nav-item <?php if(Request::is('admin/settings2')): ?> active <?php endif; ?>">
    <a href="/admin/settings2"><i icon-name="layout-dashboard"></i><span><?php echo e(__('Site Settings')); ?></span></a>
</li>

<style>
    .side-nav-item.active {
    background-color: purple; /* Mor arka plan rengi */
    /* Diğer stil ayarları */
}
</style>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-list','customer-login','customer-mail-send','customer-basic-manage','customer-balance-add-or-subtract','customer-change-password','all-type-status'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Customer Management')); ?></span>
                </li>
                <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.user*'])); ?>">
                    <a href="javascript:void(0);" class="dropdown-link">
                        <i icon-name="users"></i><span><?php echo e(__('Customers')); ?></span>
                        <span class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                    <ul class="dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-list','customer-login','customer-mail-send','customer-basic-manage','customer-balance-add-or-subtract','customer-change-password','all-type-status'])): ?>
                            <li class="<?php echo e(isActive('admin.user.index')); ?>">
                                <a href="<?php echo e(route('admin.user.index')); ?>"><i
                                        icon-name="users"></i><?php echo e(__('All Customers')); ?></a>
                            </li>
                            <li class="<?php echo e(isActive('admin.user.active')); ?>">
                                <a href="<?php echo e(route('admin.user.active')); ?>"><i
                                        icon-name="user-check"></i><?php echo e(__('Active Customers')); ?></a>
                            </li>
                            <li class="<?php echo e(isActive('admin.user.disabled')); ?>">
                                <a href="<?php echo e(route('admin.user.disabled')); ?>"><i
                                        icon-name="user-x"></i><?php echo e(__('Disabled Customers')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-mail-send')): ?>
                            <li class="<?php echo e(isActive('admin.user.mail-send.all')); ?>">
                                <a href="<?php echo e(route('admin.user.mail-send.all')); ?>"><i
                                        icon-name="send"></i><?php echo e(__('Send Email to all')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['kyc-list','kyc-action','kyc-form-manage'])): ?>
                <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.kyc*'])); ?>">
                    <a href="javascript:void(0);" class="dropdown-link"><i
                            icon-name="check-square"></i><span><?php echo e(__('KYC Management')); ?></span><span
                            class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                    <ul class="dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['kyc-list','kyc-action'])): ?>
                            <li class="<?php echo e(isActive('admin.kyc.pending')); ?>">
                                <a href="<?php echo e(route('admin.kyc.pending')); ?>"><i
                                        icon-name="airplay"></i><?php echo e(__('Pending KYC')); ?></a>
                            </li>
                            <li class="<?php echo e(isActive('admin.kyc.rejected')); ?>">
                                <a href="<?php echo e(route('admin.kyc.rejected')); ?>"><i
                                        icon-name="file-warning"></i><?php echo e(__('Rejected KYC')); ?></a>
                            </li>
                            <li class="<?php echo e(isActive('admin.kyc.all')); ?>">
                                <a href="<?php echo e(route('admin.kyc.all')); ?>"><i
                                        icon-name="contact"></i><?php echo e(__('All KYC Logs')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kyc-form-manage')): ?>
                            <li class="<?php echo e(isActive('admin.kyc-form*')); ?>">
                                <a href="<?php echo e(route('admin.kyc-form.index')); ?>"><i
                                        icon-name="check-square"></i><?php echo e(__('KYC Form')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>


            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-list','role-create','role-edit','staff-list','staff-create','staff-edit'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Staff Management')); ?></span>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-list','role-create','role-edit'])): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.roles*')); ?>">
                        <a href="<?php echo e(route('admin.roles.index')); ?>"><i
                                icon-name="contact"></i><span><?php echo e(__('Manage Roles')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['staff-list','staff-create','staff-edit'])): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.staff*')); ?>">
                        <a href="<?php echo e(route('admin.staff.index')); ?>"><i
                                icon-name="user-cog"></i><span><?php echo e(__('Manage Staffs')); ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['schedule-manage','schema-list','schema-create','schema-edit'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Plans')); ?></span>
                </li>
                <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.schedule*','admin.schema*'])); ?>">
                    <a href="javascript:void(0);" class="dropdown-link"><i
                            icon-name="album"></i><span><?php echo e(__('Manage Schema')); ?></span>
                        <span class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                    <ul class="dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['schema-list','schema-create','schema-edit'])): ?>
                            <li class="side-nav-item <?php echo e(isActive('admin.schedule*')); ?>">
                                <a href="<?php echo e(route('admin.schedule.index')); ?>"><i
                                        icon-name="alarm-check"></i><span><?php echo e(__('Schedule')); ?></span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schema-edit')): ?>
                            <li class="side-nav-item <?php echo e(isActive('admin.schema*')); ?>">
                                <a href="<?php echo e(route('admin.schema.index')); ?>"><i
                                        icon-name="airplay"></i><span><?php echo e(__('Manage Schema')); ?></span></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['transaction-list','investment-list','profit-list'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Transactions')); ?></span>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-list')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.transactions')); ?>">
                        <a href="<?php echo e(route('admin.transactions')); ?>"><i
                                icon-name="cast"></i><span><?php echo e(__('Transactions')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('investment-list')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.investments')); ?>">
                        <a href="<?php echo e(route('admin.investments')); ?>"><i
                                icon-name="anchor"></i><span><?php echo e(__('Investments')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit-list')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.all-profits')); ?>">
                        <a href="<?php echo e(route('admin.all-profits')); ?>"><i
                                icon-name="credit-card"></i><span><?php echo e(__('User Profits')); ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['automatic-gateway-manage','manual-gateway-manage','deposit-list','deposit-action',
            'withdraw-list','withdraw-method-manage','withdraw-action','target-manage','referral-create',
            'referral-list','referral-edit','referral-delete','ranking-list','ranking-create','ranking-edit'])): ?>

                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Essentials')); ?></span>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['automatic-gateway-manage','manual-gateway-manage','deposit-list','deposit-action'])): ?>

                    <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.gateway*','admin.deposit*'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i
                                icon-name="arrow-down-circle"></i><span><?php echo e(__('Deposits')); ?></span><span
                                class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-gateway-manage')): ?>
                                <li class="<?php echo e(isActive('admin.gateway.manual')); ?>"><a
                                        href="<?php echo e(route('admin.gateway.manual')); ?>"><i
                                            icon-name="compass"></i><?php echo e(__('Manual Gateways')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['deposit-list','deposit-action'])): ?>
                                <li class="<?php echo e(isActive('admin.deposit.manual.pending')); ?>"><a
                                        href="<?php echo e(route('admin.deposit.manual.pending')); ?>"><i
                                            icon-name="columns"></i><?php echo e(__('Pending Manual Deposits')); ?></a></li>
                                <li class="<?php echo e(isActive('admin.deposit.history')); ?>"><a
                                        href="<?php echo e(route('admin.deposit.history')); ?>"><i
                                            icon-name="clipboard-check"></i><?php echo e(__('Deposit History')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['withdraw-list','withdraw-method-manage','withdraw-action','withdraw-schedule'])): ?>
                    <li class="side-nav-item side-nav-dropdown  <?php echo e(isActive(['admin.withdraw*'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i
                                icon-name="landmark"></i><span><?php echo e(__('Withdraw')); ?></span><span class="right-arrow"><i
                                    icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['withdraw-list','withdraw-action'])): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.pending')); ?>"><a
                                        href="<?php echo e(route('admin.withdraw.pending')); ?>"><i
                                            icon-name="wallet"></i><?php echo e(__('Pending Withdraws')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-method-manage')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.methods*')); ?>"><a
                                        href="<?php echo e(route('admin.withdraw.methods')); ?>"><i
                                            icon-name="currency"></i><?php echo e(__('Withdraw Methods')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-schedule')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.schedule')); ?>"><a
                                        href="<?php echo e(route('admin.withdraw.schedule')); ?>"><i
                                            icon-name="alarm-clock"></i><?php echo e(__('Withdraw Schedule')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-list')): ?>
                                <li class="<?php echo e(isActive('admin.withdraw.history')); ?>"><a
                                        href="<?php echo e(route('admin.withdraw.history')); ?>"><i
                                            icon-name="piggy-bank"></i><?php echo e(__('Withdraw History')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['target-manage','referral-create','referral-list','referral-edit','referral-delete'])): ?>
                    <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.referral*'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i
                                icon-name="settings-2"></i><span><?php echo e(__('Manage Referral')); ?></span><span
                                class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['referral-create','referral-list','referral-edit','referral-delete'])): ?>
                                <li class="<?php echo e(isActive('admin.referral.level*')); ?>">
                                    <a href="<?php echo e(route('admin.referral.level.index')); ?>"><i
                                            icon-name="align-end-horizontal"></i><?php echo e(__('Multi Level Referral')); ?></a>
                                </li>
                                <li class="<?php echo e(isActive('admin.referral.index')); ?>">
                                    <a href="<?php echo e(route('admin.referral.index')); ?>"><i
                                            icon-name="expand"></i><?php echo e(__('Targets Referral')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ranking-list','ranking-create','ranking-edit'])): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.ranking*')); ?>">
                        <a href="<?php echo e(route('admin.ranking.index')); ?>"><i
                                icon-name="medal"></i><span><?php echo e(__('User Rankings')); ?></span></a>
                    </li>
                <?php endif; ?>

            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['landing-page-manage','page-manage','footer-manage','navigation-manage'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Site Essentials')); ?></span>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('landing-page-manage')): ?>
                    <li class="side-nav-item side-nav-dropdown  <?php echo e(isActive(['admin.page.section.section*'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i
                                icon-name="home"></i><span><?php echo e(__('Landing Page')); ?></span><span class="right-arrow"><i
                                    icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">
                            <?php $__currentLoopData = $landingSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if(request()->is('admin/page/section/'.$section->code)): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.page.section.section',$section->code)); ?>"><i
                                            icon-name="egg"></i><?php echo e($section->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-manage')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.page.setting')); ?>">
                        <a href="<?php echo e(route('admin.page.setting')); ?>"><i
                                icon-name="layout"></i><span><?php echo e(__('Page Settings')); ?></span></a>
                    </li>
                    <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.page.edit*','admin.page.create'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i
                                icon-name="layout-grid"></i><span><?php echo e(__('Pages')); ?></span><span class="right-arrow"><i
                                    icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if(request()->is('admin/page/edit/'.$page->code)): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.page.edit',$page->code)); ?>"><i
                                            icon-name="egg"></i><?php echo e($page->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e(isActive('admin.page.create')); ?>">
                                <a href="<?php echo e(route('admin.page.create')); ?>"><i
                                        icon-name="egg"></i><?php echo e(__('Add New Page')); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('navigation-manage')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.navigation*')); ?>">
                        <a href="<?php echo e(route('admin.navigation.menu')); ?>"><i
                                icon-name="menu"></i><span><?php echo e(__('Site Navigations')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('footer-manage')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.footer-content')); ?>">
                        <a href="<?php echo e(route('admin.footer-content')); ?>"><i
                                icon-name="list-end"></i><span><?php echo e(__('Footer Contents')); ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-setting','email-setting','plugin-setting','email-template'])): ?>
                <li class="side-nav-item category-title">
                    <span><?php echo e(__('Site Settings')); ?></span>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-setting','email-setting','plugin-setting'])): ?>
                    <li class="side-nav-item side-nav-dropdown <?php echo e(isActive(['admin.settings*'])); ?>">
                        <a href="javascript:void(0);" class="dropdown-link"><i icon-name="settings"></i>
                            <span><?php echo e(__('Settings')); ?></span><span class="right-arrow"><i icon-name="chevron-down"></i></span></a>
                        <ul class="dropdown-items">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-setting')): ?>
                                <li class="<?php echo e(isActive('admin.settings.site')); ?>">
                                    <a href="<?php echo e(route('admin.settings.site')); ?>"><i
                                            icon-name="settings-2"></i><?php echo e(__('Site Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email-setting')): ?>
                                <li class="<?php echo e(isActive('admin.settings.mail')); ?>">
                                    <a href="<?php echo e(route('admin.settings.mail')); ?>"><i
                                            icon-name="inbox"></i><?php echo e(__('Email Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plugin-setting')): ?>
                                <li class="<?php echo e(isActive('admin.settings.plugin')); ?>">
                                    <a href="<?php echo e(route('admin.settings.plugin')); ?>"><i
                                            icon-name="toy-brick"></i><?php echo e(__('Plugin Settings')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-setting')): ?>
                    <li class="side-nav-item <?php echo e(isActive('admin.language*')); ?>">
                        <a href="<?php echo e(route('admin.language.index')); ?>"><i
                                icon-name="languages"></i><span><?php echo e(__('Language Settings')); ?></span></a>
                    </li>
                <?php endif; ?>

            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email-template')): ?>
                <li class="side-nav-item <?php echo e(isActive('admin.email-template')); ?>">
                    <a href="<?php echo e(route('admin.email-template')); ?>"><i
                            icon-name="mail"></i><span><?php echo e(__('Email Template')); ?></span></a>
                </li>
            <?php endif; ?>

            
            <li class="side-nav-item category-title">
                <span><?php echo e(__('Others')); ?></span>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['subscriber-list','subscriber-mail-send'])): ?>
                <li class="side-nav-item <?php echo e(isActive('admin.subscriber')); ?>">
                    <a href="<?php echo e(route('admin.subscriber')); ?>"><i
                            icon-name="mail-open"></i><span><?php echo e(__('All Subscriber')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['support-ticket-list','support-ticket-action'])): ?>
                <li class="side-nav-item <?php echo e(isActive('admin.ticket*')); ?>">
                    <a href="<?php echo e(route('admin.ticket.index')); ?>"><i
                            icon-name="wrench"></i><span><?php echo e(__('Support Tickets')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('custom-css')): ?>
                <li class="side-nav-item <?php echo e(isActive('admin.custom-css')); ?>">
                    <a href="<?php echo e(route('admin.custom-css')); ?>"><i
                            icon-name="curly-braces"></i><span><?php echo e(__('Custom CSS')); ?></span></a>
                </li>
            <?php endif; ?>

            <li class="side-nav-item <?php echo e(isActive('admin.clear-cache')); ?>">
                <a href="<?php echo e(route('admin.clear-cache')); ?>"><i
                        icon-name="trash-2"></i><span><?php echo e(__('Clear Cache')); ?></span></a>
            </li>
            <li class="side-nav-item  <?php echo e(isActive('admin.application-info')); ?>">
                <a href="<?php echo e(route('admin.application-info')); ?>"><i
                        icon-name="indent"></i><span><?php echo e(__('Application Details')); ?></span><span
                        class="badge yellow-color">2.1</span></a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/include/__side_nav.blade.php ENDPATH**/ ?>