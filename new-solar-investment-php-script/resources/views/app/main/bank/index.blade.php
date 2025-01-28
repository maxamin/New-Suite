<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Bind Bank Card</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/card.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/loading.cc')}}">
 </head> 
 <body> 
 @php
    $user = auth()->user();
@endphp
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/back.png')}}" alt=""> 
     <div>
      Bind Bank Card
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
  </div>
  <form action="{{route('user.bank_setup_confirm')}}" method="post">@csrf
  <input type="hidden" id="TOKEN" value="d909f2518cdb7cf237f00a3fd4837817"> 
  <div class="bankbox"> 
   <img class="walleticon" src="{{asset('public/bp/img/wallet.png')}}" alt=""> 
   <span class="label">Bank Account Number</span> 
   <input class="inputbox check_number_func_1" type="text" beforeval="" name="gateway_address" value="{{ $user->gateway_address }}" placeholder="Enter your bank account number"> 
   <span class="label">Account Holder’s Name</span> 
   <input class="inputbox" type="text" name="realname" value="{{ $user->realname }}" placeholder="Enter your account holder's name">
   <span class="label">Bank Name</span>
   <!--<option value="">Choose Bank</option>-->
   <div class="flex_be inputbox" style="padding-right: 16px;position: relative;">
       
    <select name="gateway_method" id="">
    @foreach(\App\Models\BankList::where('status', '1')->get() as $elemenet)
    <option value="{{$elemenet->bank_code}}" @if($user->gateway_method == $elemenet->bank_code) selected @endif>{{$elemenet->name}}</option>
                @endforeach
            </select>
    
    <img class="selecticon" src="{{asset('public/bp/img/select.png')}}" alt=""> 
   </div> 
   <button class="submit" onclick="card_submit()">
    Submit
   </button>
   </div> 
   <div class="smalllogo"> 
    <img src="{{asset('public/bp/img/copyright.png')}}" alt=""> 
   </div> 
   <p class="copyright">BP p.l.c. Copyright © 1996-2024</p> 
  </div> 
 </div>
</form>

@include('alert-message')

</body>
</html>