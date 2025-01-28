<html lang="en">
 <head> 
 @include('app.layout.css')
 @include('app.layout.loading')
  <html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Order</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/order.css')}}">
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
     <a href="{{\App\Models\Setting::first()->telegram}}">"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div>
   <div class="package">
   <input type="hidden" id="TOKEN" value="a878c4382ab473f28fd32df0a84a744b"> 
   <div class="flex_be"> 
    <div class="usermoney"> 
     <p>{{\App\Models\Purchase::where('status', 'active')->where('user_id', user()->id)->count()}}</span></uni-text></p> 
     <span>Order Item</span> 
    </div> 
    <div class="usermoney dailyincome"> 
     <p>{{price(\App\Models\Purchase::where('status', 'active')->where('user_id', user()->id)->sum('daily_income'))}}</p> 
     <span>Daily Income</span> 
    </div> 
   </div>
   <!--<div class="package">-->
                <?php
                use App\Models\Package;
                use App\Models\Purchase;
                //$packages = Package::whereIn('id', my_vips())->orderByDesc('id')->get();
                $packages = Purchase::where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->get();
                ?>
                @foreach($packages as $plan)
                
                @php

                        $element = $plan->package;
                        $purchase_running = Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
                        $nextTime = \Carbon\Carbon::parse($plan->next_return_date);
                        $formattedDateTime = \Carbon\Carbon::parse($plan->created_at)->format('d.m.y H:i A');
                        $formattedNextDateTime = \Carbon\Carbon::parse($plan->next_return_date)->format('d M H:i A');
                        $dailyEarn = $element->commission_with_avg_amount / $element->validity;
                    @endphp
   <ul> 
    <li>
     
     </div> 
     <div class="orderinfo"> 
      <div class="numbertop flex_be"> 
       <div class="flex_sta"> 
        <!--            <img src="/uploads/material/copyright.png" alt="">--> 
        <img src="{{asset('public/bp/img//logo.png')}}" alt=""> 
        <p>BP</p> 
       </div> 
       <p>CF17301848743426544</p> 
      </div> 
      <div class="mation"> 
       <div class="flex_be pricenumber"> 
        <p>{{$element->name}} <span>(Activated)</span> </p> 
        <p>{{price($element->price)}}</p> 
       </div> 
       <div class="flex_be roi"> 
        <img src="{{asset($element->photo)}}" alt=""> 
        <div class="roiBox"> 
         <p>Daily ROI: {{$element->ROI}}</p> 
         <p>Daily Return: {{price($dailyEarn)}}</p> 
         <p>Validity: {{$element->validity}}Day</p> 
         <p>Earning: <b>{{ price($dailyEarn * $plan->count_return) }}</b> of {{ $element->validity }} Days</p>
         <p>Next earn: {{ $formattedNextDateTime }}</p>
                        </div>
        </div> 
       </div>
       @endforeach
      </div> 
     </div> </li> 
   </ul> 
  </div> 
 <!-- menu area -->
    @include('app.layout.manu')
    <!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>