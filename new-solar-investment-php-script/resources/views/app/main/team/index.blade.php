<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>My Team</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/team.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}">
 </head> 
 <body> 
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/back.png')}}" alt=""> 
     <div>
      Referral Income
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
  </div> 
  <?php
                        $first_ref = \App\Models\Setting::max('first_refer_commission');
                        $second_ref = \App\Models\Setting::max('second_refer_commission');
                        $third_ref = \App\Models\Setting::max('third_refer_commission');
                        ?>
  <input type="hidden" id="TOKEN" value="f70e5d5aaddecfb2e2873e62c4f826b1"> 
  <div class="centeritem"> 
   <div class="flex_be"> 
    <div class="usermoney"> 
     <p class="header_total_money_number">{{price($lvTotalDeposit)}}</p> 
     <span>Total Deposit</span> 
    </div> 
    <div class="usermoney dailyincome"> 
     <p class="header_today_money_number">{{price($lvTotalWithdraw)}}</p>
     <span>Total Withdraw</span> 
    </div> 
   </div> 
   <div class="obtain flex_sta"> 
    <img src="{{asset('public/bp/img/point.png')}}" alt=""> 
    <p>You obtain <span>{{$first_ref}}%</span> of your level 1 referals' deposit amount as commission. <span>{{$second_ref}}%</span> of level 2's and <span>{{$third_ref}}%</span> of Level 3's.</p> 
   </div> 
   <table rules="all" class="leveltable level1"> 
    <tbody>
     <tr> 
      <th colspan="4"> 
       <div class="flex_be"> 
        <h6>LEVEL-01</h6> 
        <a class="flex_sta" href="{{route('users.details', '1')}}"> {{$first_ref}}% <img src="{{asset('public/bp/img/more2.png')}}" alt=""> </a> 
       </div> </th> 
     </tr> 
     <tr> 
      <td></td> 
      <td>Referral</td> 
      <td>Deposit</td> 
      <td>Withdraw</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_day_active_number">{{$first_level_users->count()}}</span></span>/<span class="level_all_day_total_number">{{$first_level_users->count()}}</span></td> 
      <td class="today_money_number">{{price($lv1Recharge)}}</td> 
      <td class="today_income_number">{{price($lv1Withdraw)}}</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_active_number">{{$first_level_users->count()}}</span></span>/<span class="level_total_number">{{$first_level_users->count()}}</span></td> 
      <td class="total_money_number">{{price($lv1Recharge)}}</td> 
      <td class="total_income_number">{{price($lv1Withdraw)}}</td> 
     </tr> 
    </tbody>
   </table> 
   <table rules="all" class="leveltable level2"> 
    <tbody>
     <tr> 
      <th colspan="4"> 
       <div class="flex_be"> 
        <h6>LEVEL-02</h6> 
        <a class="flex_sta" href="{{route('users.details', '2')}}"> {{$second_ref}}% <img src="{{asset('public/bp/img/more2.png')}}" alt=""> </a> 
       </div> </th> 
     </tr> 
     <tr> 
      <td></td> 
      <td>Referral</td> 
      <td>Deposit</td> 
      <td>Withdraw</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_day_active_number">{{$second_level_users->count()}}</span></span>/<span class="level_all_day_total_number">{{$second_level_users->count()}}</span></td> 
      <td class="today_money_number">{{price($lv2Recharge)}}</td> 
      <td class="today_income_number">{{price($lv2Withdraw)}}</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_active_number">{{$second_level_users->count()}}</span></span>/<span class="level_total_number">{{$second_level_users->count()}}</span></td> 
      <td class="total_money_number">{{price($lv2Recharge)}}</td> 
      <td class="total_income_number">{{price($lv2Withdraw)}}</td> 
     </tr> 
    </tbody>
   </table> 
   <table rules="all" class="leveltable level3"> 
    <tbody>
     <tr> 
      <th colspan="4"> 
       <div class="flex_be"> 
        <h6>LEVEL-03</h6> 
        <a class="flex_sta" href="{{route('users.details', '3')}}"> {{$third_ref}}% <img src="{{asset('public/bp/img/more2.png')}}" alt=""> </a> 
       </div> </th> 
     </tr> 
     <tr> 
      <td></td> 
      <td>Referral</td> 
      <td>Deposit</td> 
      <td>Withdraw</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_day_active_number">{{$third_level_users->count()}}</span></span>/<span class="level_all_day_total_number">{{$third_level_users->count()}}</span></td> 
      <td class="today_money_number">{{price($lv3Recharge)}}</td> 
      <td class="today_income_number">{{price($lv3Withdraw)}}</td> 
     </tr> 
     <tr> 
      <td>Total</td> 
      <td><span>(Users)<span class="level_active_number">{{$third_level_users->count()}}</span></span>/<span class="level_total_number">{{$third_level_users->count()}}</span></td> 
      <td class="total_money_number">{{price($lv3Recharge)}}</td> 
      <td class="total_income_number">{{price($lv3Withdraw)}}</td> 
     </tr> 
    </tbody>
   </table> 
  </div> 
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