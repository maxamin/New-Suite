@extends('frontend.layouts.user')
@section('title')
    {{ __('Schema Logs') }}
@endsection
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
<link rel="stylesheet" href="{{ asset('frontend/css/myinvest1.css') }}"/>
<div style="display: flex; justify-content: center;">
  <img src="<?= $row['banners'] ?>" class="rrr" />
</div>

@section('content')


<div class="container47">
    <div class="container48">
    <div onclick="window.location.href='/h5/index.php/vip'" class="text" style="border-radius: 10px 3px 10px 10px;"><button class="fdre">Investing</button></div>
    <div class="line"></div>
    <div class="text" style="background-color: #041740; border-radius: 3px 10px 10px 10px;"><button class="fdre">My Invest</button></div>
</div>
</div>

<div class="centered-div2">
        <div class="content-box" style="background: none;">
            <table id="dataTable">
                                </table>
        </div>
        </div>
        
                                
@endsection

@section('script')
    <script>


        (function ($) {
            "use strict";
            var table = $('#dataTable').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ route('user.invest-logs') }}",
                columns: [
                    {data: 'schema', name: 'schema'},
                    {data: 'rio', name: 'rio'},
                   // {data: 'period_remaining', name: 'period_remaining'},
                    {data: 'next_profit_time', name: 'next_profit_time'},
                ]
            });


        })(jQuery);

    </script>
@endsection
@include('frontend.footer.invest')