

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Register')); ?>

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
                <div class="col-xl-8 col-md-12">
                    <div class="auth-content" style=" border-radius: 20px; background-image: url('/assets/global/images/blue2.jpg');">
                        
                        <br>
                        
                        <div style="text-align: center; margin-top: -40px;">
                            <h1 style="color: #15FFDF;">Create New Account</h1>
                        </div>
                        
                        <br>
                        
                        <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <strong><?php echo e(__('You Entered')); ?> <?php echo e($error); ?></strong>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        <?php endif; ?>


                        <div class="site-auth-form">
                            <form method="POST" action="<?php echo e(route('signup.html')); ?>" class="row">
                                <?php echo csrf_field(); ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="display:none">
                                    <div class="single-field">
                                        <label class="box-label" for="name"><?php echo e(__('First Name')); ?><span
                                                class="required-field">*</span></label>
                                        <input
                                            class="box-input"
                                            type="text"
                                            placeholder="Your First Name"
                                            name="first_name"
                                            value="A"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="display:none">
                                    <div class="single-field">
                                        <label class="box-label" for="name"><?php echo e(__('Last Name')); ?><span
                                                class="required-field">*</span></label>
                                        <input
                                            class="box-input"
                                            type="text"
                                            placeholder="Your Last Name"
                                            name="last_name"
                                            value="A"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="display:none">
                                    <div class="single-field">
                                        <label class="box-label" for="email"><?php echo e(__('Email Address')); ?><span
                                                class="required-field">*</span></label>
                                        <input
                                        id="email-input"
                                            class="box-input"
                                            type="email"
                                            name="email"
                                            value=""
                                            placeholder="Enter Your Email Address"
                                            required
                                        />
                                    </div>
                                </div>
                                
                                 <script>
        function generateRandomEmail() {
            const characters = '0123456789';
            let randomEmail = '';
            for (let i = 0; i < 7; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomEmail += characters.charAt(randomIndex);
            }
            randomEmail += '@id.com';

            document.getElementById('email-input').value = randomEmail;
        }

        generateRandomEmail(); // Sayfa yüklendiğinde otomatik olarak çağırılır.
    </script>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="display:none">
                                    <div class="single-field">
                                        <label class="box-label" for="username"><?php echo e(__('User Name')); ?><span
                                                class="required-field">*</span></label>
                                        <input
                                            id="input2"
                                            class="box-input"
                                            type="text"
                                            placeholder="Enter Your User Name"
                                            name="username"
                                            value="<?php echo e(old('username')); ?>"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="display:none">
                                    <div class="single-field">
                                        <label class="box-label" for="username"><?php echo e(__('Select Country')); ?><span
                                                class="required-field">*</span></label>

                                        <select name="country" id="countrySelect" class="site-nice-select">
                                            <?php $__currentLoopData = getCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if( $location->country_code == $country['code']): ?> selected
                                                        <?php endif; ?> value="<?php echo e($country['name'].':'.$country['dial_code']); ?>">
                                                    <?php echo e($country['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="">
                                    <div class="single-field">
                                        <div class="input-group joint-input" style="border: none;"><span class="input-group-text" style="background-image: url('/assets/global/images/blue3.png'); color: #15FFDF;"
                                                                                   id="dial-code">phone</span>
                                            <input
                                                style="background-image: url('/assets/global/images/blue3.png'); border: none;"
                                                inputmode="numeric"
                                                id="input1"
                                                type="number"
                                                class="form-control"
                                                name="phone"
                                                value="<?php echo e(old('phone')); ?>"
                                                aria-label="Username"
                                                aria-describedby="basic-addon1"
                                            />
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
        const input1 = document.getElementById('input1');
        const input2 = document.getElementById('input2');

        input1.addEventListener('input', function() {
            input2.value = input1.value;
        });

        input2.addEventListener('input', function() {
            input1.value = input2.value;
        });
    </script>
                                
                                <div class="">
                                    <div class="single-field">
                                        <div class="password">
                                            <div class="input-container">
                                            <div class="prefix">password</div>
                                            <input
                                                style="background-image: url('/assets/global/images/blue3.png'); border-radius: 0 5px 5px 0; border: none;"
                                                class="box-input"
                                                type="password"
                                                name="password"
                                                required
                                            />
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="single-field">
                                        <div class="password">
                                            <div class="input-container">
                                           <div class="prefix">password</div>
                                           <input
                                                style="background-image: url('/assets/global/images/blue3.png'); border-radius: 0 5px 5px 0; border: none"
                                                class="box-input"
                                                type="password"
                                                name="password_confirmation"
                                                required
                                            />
                                           </div>
                                        </div>
                                    </div>
                                </div>
								<div class="single-field">
								<p id="myParagraph" style="color: #15FFDF; font-size: 13px;">
								    <div class="input-container">
                                           <div class="prefix">ref</div>
                                           <input
        id="invitationInput"
        type="text"
        class="box-input"
        style="background-image: url('/assets/global/images/blue3.png'); border-radius: 0 5px 5px 0; border: none" readonly>
                                           </div>
    
</p>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var link = document.getElementById('invitationInput');
        var currentURL = window.location.href;
        var query = currentURL.split('=')[1]; 

        if (query) {
            link.value = decodeURIComponent(query); 
        }
    });
</script>
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
                                

                                
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="single-field">
                                        <?php if($googleReCaptcha): ?>
                                            <div class="g-recaptcha" id="feedback-recaptcha"
                                                 data-sitekey="<?php echo e(json_decode($googleReCaptcha->data,true)['google_recaptcha_key']); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12" style="display:none">
                                    <div class="single-field">
                                        <input
                                            class="form-check-input check-input"
                                            type="checkbox"
                                            name="i_agree"
                                            value="yes"
                                            id="flexCheckDefault"
                                            required
                                            checked
                                        />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <?php echo e(__('I agree with')); ?>

                                            <a href="<?php echo e(url('/privacy-policy')); ?>"><?php echo e(__('Privacy & Policy')); ?></a> <?php echo e(__('and')); ?>

                                            <a href="<?php echo e(url('/terms-and-conditions')); ?>"><?php echo e(__('Terms & Condition')); ?></a>
                                        </label>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <script>
    document.addEventListener('DOMContentLoaded', function() {
        var myParagraph = document.getElementById('myParagraph');
        var currentURL = window.location.href;

        if (currentURL.indexOf('?') === -1) {
            myParagraph.style.display = 'none'; // Paragrafı görünmez yap
        }
    });
</script>

                                
                                <script>
    document.addEventListener('DOMContentLoaded', function() {
        var link = document.getElementById('link');
        var currentURL = window.location.href;
        var query = currentURL.split('=')[1]; // "=" işaretinden sonraki yazıyı al

        if (query) {
            link.href = currentURL; // Bağlantıyı mevcut sayfa URL'sine ayarla
            link.textContent = decodeURIComponent(query); // = işaretinden sonraki yazıyı etiketin metni yap
        }
    });
</script>


                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn btn w-100" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                        <?php echo e(__('Create Account')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <p style="color: #15FFDF; font-size: 13px;">By Registering You Agree to the <a href="/privacy-policy" style="color: #EDD587; font-size: 16px; text-decoration: underline;">Privacy Agreement</a></p>
                        
                        
                        <div class="container1">
    <div class="left-buttons">
        <a href="/member-login.html">
            <button class="button" style="width: 70px; border-radius: 5px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px;">Login</button>
        </a>
        <button class="button" style="width: 70px; border: none; border-radius: 5px;background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">Register</button>
    </div>
    <a href="<?= $row['app'] ?>">
        <button class="button" style="border-radius: 5px;background-image: url('/assets/global/images/blue3.png'); color: #9FABC4; font-size: 15px; font-weight: bold;">APP Download</button>
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
        <img width="27px" src="/assets/global/8078640.png">
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
        $('#countrySelect').on('change', function (e) {
            "use strict";
            e.preventDefault();
            var country = $(this).val();
            $('#dial-code').html(country.split(":")[1])
        })
    </script>
    <script>
        // Sayfadaki tüm input elementlerini seç
var inputElements = document.querySelectorAll('input');

// Her bir input elementinin içindeki yazıyı beyaz yap
inputElements.forEach(function(input) {
    input.style.color = '#ddded5';
});

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/auth/register.blade.php ENDPATH**/ ?>