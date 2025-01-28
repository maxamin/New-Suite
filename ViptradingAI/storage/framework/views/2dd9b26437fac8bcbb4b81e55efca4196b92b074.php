

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Login')); ?>

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

    <!-- Login Section -->
    <section class="section-style site-auth" style="background-image: url('/assets/global/images/blue3.png');
    background-size: cover;
    background-repeat: no-repeat;">
        
        <div style="text-align: center; margin-top: -40px;">
    <img src="/assets/global/images/traders.jpg" style="width: 30%; border-radius: 20px; margin-bottom: 25px;">

</div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-12">
                    <div class="auth-content" style="border-radius: 20px; background-image: url('/assets/global/images/blue2.jpg'); border: none;">
                        
                        <br>
                        
                        <div style="text-align: center; margin-top: -40px;">
                            <h1 style="color: #15FFDF;">Account Login</h1>
                        </div>
                        
                        <br>
                        
                        <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <strong><?php echo e($error); ?></strong>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        <?php endif; ?>


                        <div class="site-auth-form">
                            <form method="POST" action="<?php echo e(route('member-login.html')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="single-field">
                                    <div class="input-container">
    <div class="prefix">phone</div>
    <input
        style="background-image: url('/assets/global/images/blue3.png'); border: none; border-radius: 0 5px 5px 0;"
        class="box-input"
        inputmode="numeric"
        type="number"
        name="email"
        required
    />
</div>

<style>
    .input-container {
        display: flex;
        align-items: center;
        width: auto;
        border: none;
        border-radius: 0;
        padding: 0;
    }

    .prefix {
        padding: 10px;
        background-image: url('/assets/global/images/blue3.png');
        color: #15FFDF;
        border: none;
        height: 50px;
        border-radius: 5px 0 0 5px;
    }

    
</style>
                                </div>
                                <div class="single-field">
                                    <div class="password">
                                        <div class="input-container">
    <div class="prefix">password</div>
                                        <input
                                            style="background-image: url('/assets/global/images/blue3.png'); border: none; border-radius: 0 5px 5px 0;"
                                            class="box-input"
                                            type="password"
                                            name="password"
                                            required
                                        />
                                        </div>
                                    </div>
                                </div>

                                <?php if($googleReCaptcha): ?>
                                    <div class="g-recaptcha mb-3" id="feedback-recaptcha"
                                         data-sitekey="<?php echo e(json_decode($googleReCaptcha->data,true)['google_recaptcha_key']); ?>">
                                    </div>
                                <?php endif; ?>

                                <div class="single-field" style="display:none">
                                    <input
                                        class="form-check-input check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="flexCheckDefault"
                                        checked
                                    />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?php echo e(__('Remember me')); ?>

                                    </label>

                                    <?php if(Route::has('password.request')): ?>
                                        <span class="forget-pass-text"><a
                                                href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forget Password')); ?></a></span>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="site-btn btn w-100" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                    <?php echo e(__('Account Login')); ?>

                                </button>
                            </form>
                        </div>
                        
                        <div class="container1">
    <div class="left-buttons">
        
            <button class="button" style="width: 70px; border: none; border-radius: 5px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">Login</button>
            
        <a href="/signup.html">
        <button class="button" style="width: 70px; border-radius: 5px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px;">Register</button>
        </a>
        
    </div>
    <a href="<?= $row['app'] ?>">
        <button class="button" style="border-radius: 5px; background-image: url('/assets/global/images/blue3.png'); color: #9FABC4; font-size: 15px; font-weight: bold;">APP Download</button>
    </a>
    
</div>                   
                        
                        <style>
    .container1 {
        display: flex;
        justify-content: space-between;
    }
    .left-buttons {
        display: flex;
    }
    .button {
        margin-right: 6px;
    }
</style>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- lang -->
        <div class="container108" onclick="window.location.href='/h5/lang.php'">
        <img width="25px" src="https://teslasolar.pro/h5/static/lang/icon_en-US.png">
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
    </section>
    <!-- Login Section End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if($googleReCaptcha): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>
    <script>
        // Sayfadaki tüm input elementlerini seç
var inputElements = document.querySelectorAll('input');

// Her bir input elementinin içindeki yazıyı beyaz yap
inputElements.forEach(function(input) {
    input.style.color = '#ddded5';
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/auth/login.blade.php ENDPATH**/ ?>