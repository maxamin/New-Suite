@extends('frontend.layouts.auth')

@section('title')
    {{ __('Login') }}
@endsection
@section('content')

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
                        
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                    <strong>{{$error}}</strong>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="site-auth-form">
                            <form method="POST" action="{{ route('member-login.html') }}">
                                @csrf
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

                                @if($googleReCaptcha)
                                    <div class="g-recaptcha mb-3" id="feedback-recaptcha"
                                         data-sitekey="{{ json_decode($googleReCaptcha->data,true)['google_recaptcha_key'] }}">
                                    </div>
                                @endif

                                <div class="single-field" style="display:none">
                                    <input
                                        class="form-check-input check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="flexCheckDefault"
                                        checked
                                    />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ __('Remember me') }}
                                    </label>

                                    @if (Route::has('password.request'))
                                        <span class="forget-pass-text"><a
                                                href="{{ route('password.request') }}">{{ __('Forget Password') }}</a></span>
                                    @endif
                                </div>
                                <button type="submit" class="site-btn btn w-100" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                    {{ __('Account Login') }}
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
@endsection
@section('script')
    @if($googleReCaptcha)
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
    <script>
        // Sayfadaki tüm input elementlerini seç
var inputElements = document.querySelectorAll('input');

// Her bir input elementinin içindeki yazıyı beyaz yap
inputElements.forEach(function(input) {
    input.style.color = '#ddded5';
});

    </script>
@endsection
