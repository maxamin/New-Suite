@if(!Auth::check())
    <?php
        header("Location: " . url('/member-login.html'));
        exit();
    ?>
@endif
@extends('frontend.layouts.user')
<link rel="stylesheet" href="{{ asset('frontend/css/giftcode1.css') }}"/>
@section('title')
    {{ __('checkin') }}
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
    
    
    <div class="popup-container" id="popupContainer">
        <span class="close-btn" onclick="window.location.href='/h5/index.php/home'">&#10006;</span>
    <div class="popup-content">
        <!-- İçeriğinizi buraya ekleyin -->
        <div style="display: flex; justify-content: center; widt: 100%;">
            <h1 style="color: gold; margin: 0 auto; margin-top: 30px; display:none;">GIFT CODE</h1>
        </div>
        
        <div style="display: flex; justify-content: center; widt: 100%;">
            <div style="margin-top: 70px; width: 95%;">
                <div style="display: flex; justify-content: center; widt: 100%;">
            <div style="margin-top: 50px; padding: 10px;">
                
             @if (isset($successMessage))
        <p id="myParagraph" class="success-message">{{ $successMessage }}</p>
    @elseif (isset($alreadyUsedMessage))
        <p id="myParagraph" class="error-message">{{ $alreadyUsedMessage }}</p>
    @elseif (isset($invalidCodeMessage))
        <p id="myParagraph" class="error-message">{{ $invalidCodeMessage }}</p>
    @endif
            </div>
                </div>

<form class="custom-form" method="POST" action="/h5/index.php/home" style="margin-bottom: 30px;">
    @csrf
    <label class="form-label" for="message">Gift Code:</label>
    <input class="form-input" type="text" name="message" id="message" required placeholder="Please Enter Gift Code" oninput="convertToLowerCase(this)">
    <button class="form-button" type="submit">Get Bonus</button>
</form>


				<div class="custom-form" style="background-color: rgba(0, 0, 0, 0.8);">
					<?= $row['form3'] ?>
				</div>




<script>
    function convertToLowerCase(element) {
        element.value = element.value.toLowerCase();
    }
</script>

     
        
       
        
       
        
        
        <script>
    // JavaScript kullanarak paragrafı 3 saniye sonra görünmez yap
    setTimeout(function() {
        var myParagraph = document.getElementById('myParagraph');
        myParagraph.style.opacity = 0;
    }, 4000);
</script>
        
    </div>
</div>
</div>
</div>

@endsection
