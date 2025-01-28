<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Me</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/me.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}"> 
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
   <input type="hidden" id="TOKEN" value="d6fc66a9c3256bc93a4a7af948aa296c"> 
   <div class="balancebox"> 
    <div class="jianbian"> 
     <div class="flex_sta"> 
      <img class="balanceicon" src="{{asset('public/bp/img/balance.png')}}" alt=""> 
      <p>Balance</p> 
     </div> 
     <h3>{{price(auth()->user()->balance)}}</h3> 
     <img class="coinimg" src="{{asset('public/bp/img/coin.png')}}" alt=""> 
    </div> 
    <a class="flex_cen invest" href='{{route('gift')}}'"> <p>Get Extra <span>Commission</span></p> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> 
   </div> 
  </div> 
  <ul class="listmenu"> 
   <li> <a href="{{route('pgroup')}}" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/b98a9342e13ae6545ad878d891fb72fd.png')}}" alt=""> 
      <p>My Orders</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href='{{route('record')}}'" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/aeb88491c7ab51f7a22cd9cb65785a36.png')}}" alt=""> 
      <p>Payment Record</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href='{{route('user.bank')}}'" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/9dc4d07c1be7f240793dbfee426cf1e0.png')}}" alt=""> 
      <p>Bind Bank Card</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href='{{route('user.withdraw')}}'" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/a08aad177f82e91f54346e38ee1a6e69.png')}}" alt=""> 
      <p>Withdraw</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="{{route('user.invite')}}" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/c27e922d90fd58a348450475cf0242b4.png')}}" alt=""> 
      <p>Referral Program</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="{{route('user.team')}}" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/5bfebb043857770f28e614d05e0dc2df.png')}}"  alt=""> 
      <p>Referral Icome</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="{{route('user.deposit')}}" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/Recharge-energy-power-charge-electricity-128.png')}}" alt=""> 
      <p>Recharge</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="{{route('service')}}" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/dbf6315bd73d3fd7fe6a01ee0f9ef1a2.png/')}}" alt=""> 
      <p>FAQ</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="https://t.me/tnldeveleper" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/f98b7e6adfba01b348c08055d4d421ee.png')}}" alt=""> 
      <p>Subscribe To Our Channel</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href="https://t.me/tnldeveleper" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/3e5161fcb7bf4e7a78324155de6fdbce.png')}}" alt=""> 
      <p>Customer Service</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
   <li> <a href='{{route('logout')}}'" class="flex_be"> 
     <div class="flex_sta"> 
      <img class="icon" src="{{asset('public/bp/img/da48ae7614b89405a700c30828dabf90.png')}}" alt=""> 
      <p>Log Out</p> 
     </div> <img class="moreicon" src="{{asset('public/bp/img/more1.png/')}}" alt=""> </a> </li> 
  </ul> 
  <div class="smalllogo"> 
   <img src="{{asset('public/bp/img/copyright.png')}}" alt=""> 
  </div> 
  <p class="copyright">BP p.l.c. Copyright © 1996-2024</p> 
  <!-- menu area -->
    @include('app.layout.manu')
    <!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>