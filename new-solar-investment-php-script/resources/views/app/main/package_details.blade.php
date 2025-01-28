<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Detail</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/details.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}">
  <style>
         .duration p{
            text-wrap: wrap !important;
         }
         .duration p span{
            text-wrap: wrap !important;
         }
    </style> 
 </head> 
 <body> 
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/logo.png')}}" alt=""> 
     <div> 
      <p class="idtitle">ID</p> 
      <p class="userid">{{auth()->user()->username}}</p> 
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
   <input type="hidden" id="TOKEN" value="49c890c2efac48a5c3dad70d47640e79"> 
   <img src="https://www.bp.com/content/dam/bp/business-sites/en/global/corporate/images-jpg-png/news-and-insights/bp-magazine/10-things-hero-image-16x9.jpg" class="detailimg" alt=""> 
   <h3 class="modaltitle">{{$package->name}}</h3></h3> 
   <div class="duration"> 
    <p>Duration: <span>{{$package->validity}}</span>days</p> 
    <p>Daily ROI: <span>{{$package->ROI}}%</span> </p> 
    <p>Daily Return: <span>{{price($package->commission_with_avg_amount / $package->validity)}}</span> </p> 
    <p>status       : <span>{{$package->status}}</span> </p>
   </div> 
   <div class="line"></div> 
   <h3 class="modaltitle">Detail</h3> 
   <div class="duration"> 
    <p><span style="text-wrap: wrap;">{{$package->title}}</span></p>
    <p><br></p>
    <p><br></p> 
   </div> 
  </div> 
  <div class="buybottom flex_be"> 
   <div class="price"> 
    <p>price</p> 
    <h4>{{price($package->price)}}</h4> 
   </div> 
   <div class="buybutton"
   <button onclick="window.location.href='{{route('purchase.confirmation', $package->id)}}'">buy</button>
            </div>
  </div> 
  <div class="coverbg"></div> 
  <div class="paywind"> 
   <div class="flex_be paytitle"> 
    <img src="https://www.bpcity.asia/uploads/material/payicon.png" alt=""> 
    <h5>COMFIRM YOUR ORDER</h5> 
    <img class="close" src="https://www.bpcity.asia/uploads/material/close.png" alt=""> 
   </div> 
   <h5 class="goodsname product-name"></h5> 
   <div class="duration"> 
    <p>Duration: <span class="product-cycle"></span>days</p> 
    <p>Price: <span class="product-money"></span> </p> 
    <p>Daily ROI: <span class="product-rate"></span> </p> 
    <p>Daily Return: <span class="product-day-profit"></span> </p> 
    <p>Total Return: <span class="product-total-profit"></span> </p> 
   </div> 
   <div class="line"></div> 
   <h5 class="goodsname">Please select payment method</h5> 
   <ul class="flex_be getway"> 
    <li class="flex_be active" data-type="1" data-platform="QePay"> <p>Gateway 1</p> 
     <div class="point"> 
      <div class="innerpoint"></div> 
     </div> </li> 
    <li class="flex_be " data-type="3" data-platform="AkPay"> <p>Gateway 2</p> 
     <div class="point"> 
      <div class="innerpoint"></div> 
     </div> </li> 
   </ul> 
   
  <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')
</body>
</html>