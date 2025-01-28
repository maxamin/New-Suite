<!-- resources/views/backend/edit/settings2.blade.php -->
  <?php use App\Enums\InvestStatus; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Bonus Manager')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 

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

<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <?php if(session('success')): ?>
    <div id="notification" class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>

    <script>
        // Sayfa yüklendiğinde bildirimi 3 saniye göster
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var notification = document.getElementById('notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 3000);
        });
    </script>
<?php endif; ?>

<style>
    .form-group label {
        color: white;
    }
    h1 {
        color: white;
    }
</style>


   
    
    <div style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin-right: auto;">Settings 2 Edit</h1>
    </div>

    <form method="POST" action="<?php echo e(route('admin.settings2.update')); ?>">
        <?php echo csrf_field(); ?>
        
        <div class="form-group">
            <label for="homelogo">Home Logo URL:</label>
            <input type="text" name="logohome" id="logohome" value="<?= $row['logohome'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="menulogo">Menu Logo URL:</label>
            <input type="text" name="logo" id="logo" value="<?= $row['logo'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="support2">Site Banners URL:</label>
            <input type="text" name="banners" id="banners" value="<?= $row['banners'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="homelogo">Home Slider 1 URL:</label>
            <input type="text" name="slider1" id="slider1" value="<?= $row['slider1'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="homelogo">Home Slider 2 URL:</label>
            <input type="text" name="slider2" id="slider2" value="<?= $row['slider2'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="homelogo">Home Slider 3 URL:</label>
            <input type="text" name="slider3" id="slider3" value="<?= $row['slider3'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="homelogo">Home Slider 4 URL:</label>
            <input type="text" name="slider4" id="slider4" value="<?= $row['slider4'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="homelogo">Home Slider 5 URL:</label>
            <input type="text" name="slider5" id="slider1" value="<?= $row['slider5'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="form4">Rent PLan Background Banners:</label>
            <input type="text" name="form4" id="form4" value="<?= $row['form4'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="usdt_adress">USDT Adress:</label>
            <input type="text" name="usdt_adress" id="usdt_adress" value="<?= $row['usdt_adress'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="support">support:</label>
            <input type="text" name="support" id="support" value="<?= $row['support'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="support2">support 2:</label>
            <input type="text" name="support2" id="support2" value="<?= $row['support2'] ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="support3">support 3:</label>
            <input type="text" name="support3" id="support3" value="<?= $row['support3'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="chanell">Chanell:</label>
            <input type="text" name="chanell" id="chanell" value="<?= $row['chanell'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="form2">News marquee</label>
            <textarea type="text" name="form2" id="form2" class="form-control"><?= $row['form2'] ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="refcomment">Team Comment</label>
            <textarea type="text" name="refcomment" id="refcomment" class="form-control"><?= $row['refcomment'] ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="app">APP URL:</label>
            <input type="text" name="app" id="app" value="<?= $row['app'] ?>" class="form-control">
        </div>

       <div class="form-group">
         <label for="form1">Popup - sql form1:</label>
         <textarea class="form-control"><?= $row['form1'] ?></textarea>
      </div>

        <div class="form-group">
            <label for="form3">giftcode comment - sql form 3:</label>
            <textarea class="form-control"><?= $row['form3'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">SAVE</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/edit/settings2.blade.php ENDPATH**/ ?>