<html lang="en">
 <head>
     @include('app.layout.css')
</head>
<body>
@include('app.layout.loading')
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Withdraw</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/withdraw.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}"> 
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
 <body> 
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/back.png')}}" alt=""> 
     <div>
         <form action="{{route('user.withdraw.request')}}" method="post">@csrf
      Withdraw
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
  </div> 
  <input type="hidden" id="TOKEN" value="d51b00b229573f4242a023404b14727b"> 
  <div class="centeritem"> 
   <div class="balancebox"> 
    <div class="jianbian"> 
     <div class="flex_sta"> 
      <img class="balanceicon"  src="{{asset('public/bp/img/balance.png')}}" alt=""> 
      <p>Balance</p> 
     </div> 
     <h3>{{price(\auth()->user()->income)}}</h3> 
     <img class="coinimg" src="{{asset('public/bp/img/coin.png')}}" alt=""> 
    </div> 
   </div> 
   <div class="obtain"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/point.png')}}" alt=""> 
     <p>Processing Time：7×24h</p> 
    </div> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/point.png')}}" alt=""> 
     <p>Min Withdrawl：{{price(setting('minimum_withdraw'))}}</p> 
    </div> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/point.png')}}" alt=""> 
     <p>Fees：{{setting('withdraw_charge')}}%</p> 
    </div> 
   </div> 
   <div class="withdrawbox flex_be"> 
    <h4>₱</h4> 
    <div> 
     <p>Withdrawal amount</p> 
     <input type="number" class="check_number_func" name="amount" placeholder="Write Amount" class="amount_input"
                               required>
    </div> 
   </div> 
   <button class="withdrawbtn" onclick="withdraw();">
    Withdraw
   </button>
   <div class="nocard flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/nocard.png')}}" alt=""> 
     <p>Don't have a bank card?</p>
    </div> 
    <a href='{{route('user.bank')}}'>Bind Bank Card</a> 
   </div>
   <h3 class="modaltitle">Withdraw Record</h3>
   @foreach(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element) 

            <!-- Withdraw Record Section -->
            <div class="mt-2 p-4 bg-white rounded-lg shadow-sm flex items-center justify-between">
                <div>
                    <p>{{price($element->final_amount)}}</p>
                    <p class="text-xs text-gray-500">{{$element->created_at}}</p>
                </div>
                <div class="text-green-500 font-medium flex items-center space-x-1">
                    <span>@if($element->status == 'approved')
                            Success
                        @elseif($element->status == 'rejected')
                            Cancel
                        @else
                            Proccessing
                        @endif</span>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            @if($loop->last)
                @else
                @endif
            @endforeach
            <p class="text-center text-gray-500 mt-4">— End —</p>
        </div>
        
  </div>
</form>
@include('app.layout.manu')

@include('alert-message')
<!-- menu area -->

</body>
</html>