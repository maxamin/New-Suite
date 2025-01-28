<?php use App\Enums\InvestStatus; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title"><?php echo e(setting('site_title', 'global')); ?> <?php echo e(__('Dashboard')); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['deposit-action','withdraw-action','kyc-action',])): ?>
                    <?php if($data['withdraw_count'] || $data['kyc_count'] || $data['deposit_count']): ?>
                        <div class="col-xl-12">
                            <div class="admin-latest-announcements">
                                <div class="content"><i
                                        icon-name="zap"></i><?php echo e(__("Explore what's important to review first")); ?></div>
                                <div class="content">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw-action')): ?>
                                        <?php if($data['withdraw_count']): ?>
                                            <a href="<?php echo e(route('admin.withdraw.pending')); ?>" class="site-btn-xs red-btn"><i
                                                    icon-name="loader"
                                                    class="spining-icon"></i><?php echo e(__('Withdraw Requests')); ?>

                                                (<?php echo e($data['withdraw_count']); ?>)</a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kyc-action')): ?>
                                        <?php if($data['kyc_count']): ?>
                                            <a href="<?php echo e(route('admin.kyc.pending')); ?>" class="site-btn-xs green-btn"><i
                                                    icon-name="loader" class="spining-icon"></i><?php echo e(__('KYC Requests')); ?>

                                                (<?php echo e($data['kyc_count']); ?>)</a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deposit-action')): ?>
                                        <?php if($data['deposit_count']): ?>
                                            <a href="<?php echo e(route('admin.deposit.manual.pending')); ?>"
                                               class="site-btn-xs primary-btn"><i icon-name="loader"
                                                                                  class="spining-icon"></i><?php echo e(__('Deposit Requests')); ?>

                                                (<?php echo e($data['deposit_count']); ?>)</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php echo $__env->make('backend.include.__data_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title"><?php echo e(__('Weekly Deposit')); ?></h3>
                                <div class="card-header-links">
                                    <h3 class="title-small"><?php echo e($data['date_range']); ?></h3>
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="depositChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title"><?php echo e(__('Weekly Investment')); ?></h3>
                                <div class="card-header-links">
                                    <h3 class="title-small"><?php echo e($data['date_range']); ?></h3>
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="investChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title"><?php echo e(__('Latest Registered User')); ?></h3>
                        </div>
                        <div class="site-card-body table-responsive">
                            <div class="site-datatable">
                                <table class="data-table mb-0">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('Avatar')); ?></th>
                                        <th><?php echo e(__('User')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Balance')); ?></th>
                                        <th><?php echo e(__('Profit')); ?></th>
                                        <th><?php echo e(__('KYC')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $data['latest_user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if(null != $user->avatar): ?>
                                                    <img class="avatar" src="<?php echo e(asset($user->avatar)); ?>" alt=""
                                                         height="40" width="40">
                                                <?php else: ?>
                                                    <span
                                                        class="avatar-text"><?php echo e($user->first_name[0]); ?><?php echo e($user->last_name[0]); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="<?php echo e(route('admin.user.edit',$user->id)); ?>"
                                                   class="link"><?php echo e(safe($user->username)); ?></a></td>
                                            <td>
                                                <strong><?php echo e(safe($user->email)); ?></strong>
                                            </td>
                                            <td><strong><?php echo e($currencySymbol . $user->balance); ?></strong></td>
                                            <td><strong><?php echo e($currencySymbol . $user->total_profit); ?></strong></td>
                                            <td>
                                                <?php if($user->kyc == 1): ?>
                                                    <div class="site-badge success"><?php echo e(__('Verified')); ?></div>
                                                <?php else: ?>
                                                    <div class="site-badge pending"><?php echo e(__('Unverified')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($user->status == 1): ?>
                                                    <div class="site-badge success"><?php echo e(__('Active')); ?></div>
                                                <?php else: ?>
                                                    <div class="site-badge danger"><?php echo e(__('DeActivated')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>

                                                <a href="<?php echo e(route('admin.user.edit',$user->id)); ?>"
                                                   class="round-icon-btn primary-btn" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Edit User"><i icon-name="edit-3"></i></a>
                                                <span type="button"
                                                      data-id="<?php echo e($user->id); ?>"
                                                      data-name="<?php echo e($user->first_name.' '. $user->last_name); ?>"
                                                      class="send-mail"
                                                ><button class="round-icon-btn red-btn" data-bs-toggle="tooltip"
                                                         title="" data-bs-original-title="Send Email"><i
                                                            icon-name="mail"></i></button></span>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="centered">
                                        <td colspan="7">
                                            <?php if($data['latest_user']->isEmpty()): ?>
                                                <?php echo e(__('No Data Found')); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            

            

        </div>
    </div>


    <!-- Modal for Send Email -->
    <?php echo $__env->make('backend.user.include.__mail_send', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Modal for Send Email-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        (function ($) {
            'use strict';

            //deposit chart
            var deposit = <?php echo json_encode($data['last7days_deposit'], 15, 512) ?>;

            var deposit_label = Object.keys(deposit);
            var deposit_data = Object.values(deposit);

            // Bar Chart
            var data = {
                labels: deposit_label,
                datasets: [{
                    label: 'Weekly Deposit',
                    data: deposit_data,
                    backgroundColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderWidth: 0,
                    borderRadius: 3,
                    barPercentage: 0.3,
                    hoverBackgroundColor: '#5e3fc9',
                }]
            };
            // render init block
            new Chart(
                document.getElementById('depositChart'),
                {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            );


            //investment chart

            var invest = <?php echo json_encode($data['last7days_invest'], 15, 512) ?>;

            var invest_label = Object.keys(invest);
            var invest_data = Object.values(invest);

            // Bar Chart
            var data = {
                labels: invest_label,
                datasets: [{
                    label: 'Weekly Investment',
                    data: invest_data,
                    backgroundColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderColor: [
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9',
                        '#d2d3d8',
                        '#5e3fc9'
                    ],
                    borderWidth: 0,
                    borderRadius: 3,
                    barPercentage: 0.3,
                    hoverBackgroundColor: '#5e3fc9',
                }]
            };
            // render init block
            new Chart(
                document.getElementById('investChart'),
                {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            );

            //send mail modal form open
            $('.send-mail').on('click', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name').html(name);
                $('#userId').val(id);
                $('#sendEmail').modal('toggle')
            })

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/dashboard.blade.php ENDPATH**/ ?>