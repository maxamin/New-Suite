<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Referral Program</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/share.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}">
 </head> 
 <body> 
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/back.png')}}" alt=""> 
     <div>
      Referral Program
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
  </div> 
  <input type="hidden" id="TOKEN" value="a49f0abe1c1109463b72ea89c8ee5f5d"> 
  <div class="bannerbox"> 
   <img src="{{asset('public/bp/img/banner1.png')}}" alt=""> 
  </div>
  <h4 style="    padding: 12px;
    padding-bottom: 0;
    margin-bottom: 0;
    margin: 10px 0;
    font-weight: 500;"></h4>
  <div class="referralbox"> 
   <p>My Referral Link</p> 
   <div class="inputbox">
    {{url('register').'?inviteCode='.auth()->user()->ref_id}}
   </div> 
   <div class="copy copy-href="javascript:void(0)" onclick="copyLink('{{url('register').'?inviteCode='.auth()->user()->ref_id}}')">Copy Link</a>
</div>"
  
 


   <p class="newly">Newly launched legit earning platform has been launched. Signup bonus 20₱ and 30%+5%+2% commission.</p> 
  </div> 
  @include('app.layout.manu')
 @include('alert-message')
<script>
    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copied success..')
    }
</script>

</body>
</html>