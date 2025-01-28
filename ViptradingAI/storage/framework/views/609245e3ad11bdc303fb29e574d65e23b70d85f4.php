
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/menu2.css')); ?>"/>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.footer.my', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<div style="text-align: center; margin-right: 160px; margin-top: -15px;">
    <div style="display: inline-block; text-align: right;">
       <div class="centered-h2">
        <h4>Private Center</h4>
    </div> 
    </div>
</div>
<br>

<div style="text-align: center; padding-left: 5px;
    padding-right: 5px;">
    <div style="display: flex; background-image: url('/assets/global/images/blue2.jpg');
    background-size: cover;
    background-repeat: no-repeat; border-radius: 1px;">
    <div style="flex: 1;">
        <p class="ppr">Balance(<?php echo e(setting('currency_symbol','global')); ?>)<br><a class="ppa"><?php echo e($user->balance); ?></a></p>
    </div>
    <div style="flex: 1;">
        <img src="<?= $row['logo'] ?>" style="max-width: 100px; height: auto; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 252, 114, 0.3);">
    </div>
    <div style="flex: 1;">
        <p class="ppr">Profit(<?php echo e(setting('currency_symbol','global')); ?>)<br><a class="ppa"><?php echo e($user->profit_balance); ?></a></p>
    </div>
</div>
</div>

<div style="margin-top: 20px;"></div>

<div class="centered-content2">
    <p class="kjk">Commissioner</p>
</div>
<div style="margin-top: 5px;"></div>
<div class="centered-content2">
    <p class="kjk">ID: <?php echo e(str_replace('@id.com', '', $user->email)); ?> </p>
    
    <p class="kjk">Phone: <?php echo e(preg_replace('/\+\d+/', '', $user->phone)); ?> </p>
</div>

<div style="margin-top: 30px;"></div>

<div class="centered-content">
    <div class="paragraph-container">
    <a href="/h5/index.php/deposit" class="prg" style="margin-left: 15px; text-shadow: 2px 2px 4px rgba(246, 255, 0, 0.3), -2px -2px 4px rgba(246, 255, 0, 0.3);">Deposit</a>
    <a href="/h5/index.php/deposit"><img  src="/assets/frontend/images/transin.png" style="height: 40px; margin-top: 12px;"></a>
    <div class="line"></div>
    <a href="/h5/index.php/withdraw" class="prg">Withdraw</a>
    <a href="/h5/index.php/withdraw"><img src="/assets/frontend/images/transout.png" style="height: 40px; margin-top: 12px;"></a>
</div>

</div>

<div style="margin-top: 30px;"></div>



<div class="centered-content">
    <div class="content-container">
    
    <a href="/h5/index.php/wallet-exchange">
    <div class="container" style="margin-top: 0px;">
    <p class="left-top">Wallet Exchange</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>
    
    <a href="/h5/index.php/deposit/log">
    <div class="container" style="margin-top: 20px;">
    <p class="left-top">Deposit Record</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>
    
<a href="/h5/index.php/withdraw/log">
    <div class="container" style="margin-top: 20px;">
    <p class="left-top">Withdraw Record</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>

<a href="/h5/index.php/transactions">
    <div class="container" style="margin-top: 20px;">
    <p class="left-top">Transcation</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>

<a href="/h5/index.php/withdraw/account">
    <div class="container" style="margin-top: 20px;">
    <p class="left-top">Add Wallet</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>

<a href="/h5/index.php/change-password">
    <div class="container" style="margin-top: 20px;">
    <p class="left-top">Reset Password</p>
    <img src="/assets/frontend/images/join.png" style="margin-right: -13px;" class="right-top">
</div>
<div class="horizontal-line"></div>
</a>

</div>

</div>


<div style="margin-top: 10px;"></div>



<div class="centered-content3">
    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="custom-button">Logout</button>
    </form>
</div>


<div style="margin-top: 40px;"></div>


<!-- lang -->
        <div class="container108" onclick="window.location.href='/h5/lang.php'">
        <img width="25px" src="/assets/global/8078640.png">
        <div class="content47">
            <button class="notranslate" style="color: white; font-size: 13px; margin-top: 4px; margin-left: -15px; border: none; background: none;">Language</button>
        </div>
    </div>
    
    <style>
        .container108 {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            position: fixed;
            top: 10px;
            right: 10px;
            width: 95px;
            height:28px;
            background-image: url('/assets/global/images/blue2.jpg');
            border-radius: 30px;
            border: none;
        }
        .content47 {
            margin-left: 20px;
        }
        .notranslate {
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none; /* Standart */
    }
    </style>
    <!-- lang end -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/user/setting/index.blade.php ENDPATH**/ ?>