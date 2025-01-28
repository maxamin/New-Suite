<div
    class="tab-pane fade"
    id="pills-tree"
    role="tabpanel"
    aria-labelledby="pills-transactions-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title"><?php echo e(__('Referral Tree')); ?></h4>
                </div>
                <div class="site-card-body table-responsive">

                    
                    <?php if(setting('site_referral','global') == 'level' && $user->referrals->count() > 0): ?>
                        <section class="management-hierarchy">
                            <div class="hv-container">
                                <div class="hv-wrapper">
                                    <!-- tree component -->
                                    <?php echo $__env->make('frontend.referral.include.__tree',['levelUser' => $user,'level' => $level,'depth' => 1, 'me' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </section>
                    <?php else: ?>
                        <p><?php echo e(__('No Referral user found')); ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/user/include/__referral_tree.blade.php ENDPATH**/ ?>