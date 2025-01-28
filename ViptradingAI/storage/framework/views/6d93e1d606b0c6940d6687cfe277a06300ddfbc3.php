<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php
// Veritabanı bağlantısı için PDO kullanımı
$pdo = DB::connection()->getPdo();

// SQL sorgusu
$sql = "SELECT * FROM settings2 LIMIT 1";

// Sorguyu hazırla ve çalıştır
$statement = $pdo->prepare($sql);
$statement->execute();

// İlk sıradaki verileri al
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Eğer veri varsa, HTML içinde göster
if ($row) {
?>

<?php
} else {
    echo "<p>Site settings not found.</p>";
}
?>
<div style="display: flex; justify-content: center; margin-bottom: 10px;">
  <img src="<?= $row['banners'] ?>" class="rrr" />
</div>

<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-top: -20px;">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%;border-radius: 10px; box-shadow: 0 0 50px rgba(44, 46, 48, 1);">
                <div style="margin-bottom: 30px;"></div>
                <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;"><?php echo e(__('Referral QR Code')); ?></h3>
                                <div style="display: flex; justify-content: center;">
                    <div id="qrcode" style="background-color: white; border: 20px solid white; border-radius: 20px;"></div>
                </div>        
                
                <div class="site-card-body">
                    <div class="referral-link">
                        <div class="referral-link-form">
                            <input style="color: white; background: rgba(0, 0, 0, 0.5); border: none;" type="text" value="<?php echo e($getReferral->link); ?>" id="refLink" readonly="readonly"/>

                            <button style="width: 100%; border: none; border-radius: 5px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;" type="submit" onclick="copyRef()">
                                <i class="anticon anticon-copy"></i>
                                <span id="copy"><?php echo e(__('Copy Url')); ?></span>
                                <input id="copied" hidden value="<?php echo e(__('Copied')); ?>">
                            </button>
                        </div>
                        <p class="referral-joined">
                            <?php echo e($getReferral->relationships()->count()); ?> <?php echo e(__('peoples are joined by using this URL')); ?>

                        </p>
                    </div>

                    
                    <?php if(setting('site_referral','global') == 'level' && auth()->user()->referrals->count() > 0): ?>
                        <section class="management-hierarchy">
                            <div class="hv-container">
                                <div class="hv-wrapper">
                                    <!-- tree component -->
                                        <?php echo $__env->make('frontend.referral.include.__tree',['levelUser' => auth()->user(),'level' => $level,'depth' => 1, 'me' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    
    <script>
    // Sayfa yüklendiğinde çalışacak fonksiyon
    window.onload = function() {
        // QR kodunu oluştur
        var qr = new QRCode(document.getElementById("qrcode"), {
            text: document.getElementById("refLink").value, // QR kodunun içeriği
            width: 228,
            height: 228
        });
    };
</script>
    
    
    <style>

 

    .rtf {
        font-size: 13px; 
        color: #9FABC4; 
        width: 90px;
    }
    
    .rtt {
        font-size: 19px;
        color: #15FFDF;
        margin-top: -18px;
    }
     @media only screen and (min-width: 1024px) {
  .rrr {
    width: 50%;
    border-radius: 10px;
    
  }
}
    
    
    @media (max-width: 1024px) {
  
  .rrr {
    width: 100%;
    border-radius: 0 0 30px 30px;
  }
}
.orsl {
    
}
</style>
    
    
    <div style="width:100%; display: flex; justify-content: center; border-radius: 10px 10px 3px 3px; background-color: red; margin-bottom: 10px; margin-top: -20px; background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%;">
        <p style="font-size: 14px;
    color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue; margin-top: 5px;"><?= $row['refcomment'] ?></p>
    </div>

    
    
    
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%;border-radius: 10px; box-shadow: 0 0 50px rgba(44, 46, 48, 1);">
                <div class="site-card-header">
                    <h3 class="title"><?php echo e(__('All Referral Logs')); ?></h3>
                    <div class="card-header-links">
                        <span
                            class="card-header-link rounded-pill"> <?php echo e(__('Referral Profit:').' '. $totalReferralProfit .' '.$currency); ?></span>
                    </div>
                </div>
                <div class="site-card-body table-responsive">


                    <div class="site-tab-bars">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a
                                    href=""
                                    class="nav-link active"
                                    id="generalTarget-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#generalTarget"
                                    type="button"
                                    role="tab"
                                    aria-controls="generalTarget"
                                    aria-selected="true"
                                ><i icon-name="network"></i><?php echo e(__('General')); ?></a>
                            </li>

                            <?php $__currentLoopData = $referrals->keys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $target = json_decode($raw,true);
                                ?>

                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="t<?php echo e($target['id']); ?>-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#t<?php echo e($target['id']); ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="t<?php echo e($target['id']); ?>"
                                        aria-selected="true"
                                    ><i icon-name="boxes"></i>
                                        <?php if(setting('site_referral','global') == 'level'): ?>
                                           Level <?php echo e($target['the_order']); ?>

                                        <?php else: ?>
                                        <?php echo e($target['name']); ?>

                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>


                    <div class="tab-content" id="pills-tabContent">

                       
                            
                                    <div class="site-datatable" >
                                        <div class="row table-responsive" style="width: 104%;">
                                            <div class="col-xl-12">
                                                <table class="display table">
                                                    <tbody>


                                                    <?php $__currentLoopData = $generalReferrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <strong
                                                                    class="green-color">🎉You Won a Bonus: +<?php echo e($raw->amount.' '. $currency); ?> <div class="site-badge success"><?php echo e($raw->status); ?></div>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    </tbody>
                                                </table>

                                                <?php if($generalReferrals->isEmpty()): ?>
                                                    <p class="centered"><?php echo e(__('No Data Found')); ?></p>
                                                <?php endif; ?>

                                                <?php echo e($generalReferrals->links()); ?>

                                            </div>
                                        </div>
                                    </div>



                        <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target => $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                                $target = json_decode($target,true);
                            ?>

                            <div
                                class="tab-pane fade"
                                id="t<?php echo e($target['id']); ?>"
                                role="tabpanel"
                                aria-labelledby="t<?php echo e($target['id']); ?>-tab"
                            >
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="site-datatable">
                                            <div class="row table-responsive" style="width: 104%;">
                                                <div class="col-xl-12">
                                                    <table class="display table">
                                                        <thead>
                                                        <tr>
                                                            <th style="color: white;"><?php echo e(__('Amount')); ?></th>
                                                            <th style="color: white;"><?php echo e(__('Status')); ?></th>
                                                            <th style="color: white;"><?php echo e(__('Type')); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php $__currentLoopData = $referral->sortDesc(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><strong
                                                                        class="green-color">+<?php echo e($raw->amount.' '. $currency); ?> </strong>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="site-badge success"><?php echo e($raw->status); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="site-badge primary-bg"><?php echo e($raw->target_type); ?></div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php echo $__env->make('frontend.footer.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function copyRef() {
            /* Get the text field */
            var copyApi = document.getElementById("refLink");
            /* Select the text field */
            copyApi.select();
            copyApi.setSelectionRange(0, 999999999); /* For mobile devices */
            /* Copy the text inside the text field */
            document.execCommand('copy');
            $('#copy').text($('#copied').val())
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/referral/index.blade.php ENDPATH**/ ?>