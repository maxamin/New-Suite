@extends('frontend.layouts.user')
@section('title')
    {{ __('All Schema') }}
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
<link rel="stylesheet" href="{{ asset('frontend/css/schema3.css') }}"/>
<div style="display: flex; justify-content: center;">
  <img src="<?= $row['banners'] ?>" class="rrr" />
</div>

@section('content')





<div class="container47">
    <div class="container48">
    <div class="text" style=" background-color: #041740; border-radius: 10px 3px 10px 10px;"><button class="fdre">Investing</button></div>
    <div class="line"></div>
    <div onclick="window.location.href='/h5/index.php/my-vip'" class="text" style=" border-radius: 3px 10px 10px 10px;"><button class="fdre">My Invest</button></div>
</div>
</div>


@foreach($schemas as $schema)
<div class="container1">
        <div class="containerg" style="background: url('{{ asset($schema->icon) }}'); background-size: 100% 100%;">
            <div class="gconti">
                 @if($schema->badge)
                         <p class="slar">{{$schema->badge}}</p>                
                                    @endif
               
            </div>
        </div>
        <div class="container3">
            
            <p class="container4">{{$schema->name}}</p>
            <p class="rkm">Invest Price:</p>
            <p class="rkm khg">Daily Earnings:</p>
            <p class="rkm khg">VIP Duration:</p>
            
            </div>
            
             <div class="container3">
                 
                 <p class="rkj" style="visibility:hidden;">v</p>
                 <p class="rkj">{{ $schema->type == 'range' ? $currencySymbol . $schema->min_amount . '-' . $currencySymbol . $schema->max_amount : $currencySymbol . $schema->fixed_amount }}</p>
                 <p class="rkj khg">{{ ' '. ($schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $currencySymbol.$schema->return_interest ) }}</p>
                 <p class="rkj khg">{{ ($schema->return_type == 'period' ? $schema->number_of_period : 'Unlimited').($schema->number_of_period == 1 ? ' Time' : ' Days' )  }}</p>
                 <a href="{{route('user.schema.preview',$schema->id)}}">
                     <button class="rkjj">INVEST</button>
                 </a>
            
            </div>
    </div>
@endforeach

    
    @include('frontend.footer.invest')
@endsection
