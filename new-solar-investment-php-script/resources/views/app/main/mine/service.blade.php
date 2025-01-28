<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>FAQ</title> 
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/me.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/loading.css')}}">
 </head> 
 <body> 
  <div class="centeritem"> 
   <div class="headerid flex_be"> 
    <div class="flex_sta"> 
     <img src="{{asset('public/bp/img/back.png/')}}" alt=""> 
     <div>
      FAQ
     </div> 
    </div> 
    <div class="flex_sta"> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/kf.png/')}}" alt=""></a> 
     <a href="{{\App\Models\Setting::first()->telegram}}"><img src="{{asset('public/bp/img/share.png/')}}" alt=""></a> 
    </div> 
   </div> 
  </div> 
  <input type="hidden" id="TOKEN" value="2e3c3a3917102cf0892e428707dd8df7"> 
  <div class="centeritem"> 
   <ul class="questionlist marigntop2"> 
    <li class="trans"> 
     <div class="flex_be question"> 
      <div class="flex_sta"> 
       <h3>Q1</h3> 
       <p>Deposit not reflected?</p> 
      </div> 
      <img class="questionimg " src="{{asset('public/bp/img/question.png/')}}" alt=""> 
     </div> 
     <div class="answer"> 
      <p>Please upload the below 3 info to the system. We will have a review and confirm your order in 24H. 1. Standard transaction receipt 2. Sender name 3. Receiver's bank account number</p> 
     </div> </li> 
    <li class="trans"> 
     <div class="flex_be question"> 
      <div class="flex_sta"> 
       <h3>Q2</h3> 
       <p>Withdraw is under processing</p> 
      </div> 
      <img class="questionimg " src="{{asset('public/bp/img/question.png/')}}" alt=""> 
     </div> 
     <div class="answer"> 
      <p>If your withdrawal status is showing "Processing", it means that your withdrawal is being processed by the bank now. You will receive it in 24H.</p> 
     </div> </li> 
    <li class="trans"> 
     <div class="flex_be question"> 
      <div class="flex_sta"> 
       <h3>Q3</h3> 
       <p>Withdrawal is failed</p> 
      </div> 
      <img class="questionimg " src="{{asset('public/bp/img/question.png/')}}" alt=""> 
     </div> 
     <div class="answer"> 
      <p>Please check your bank account info again and make sure all the info are 100% correct. You should submit the correct bank info and then withdraw again.</p> 
     </div> </li> 
   </ul> 
   <div class="customer click-href" data-href="https://t.me/BPEnergyServeChannel">
    Customer Service
   </div> 
   <div class="smalllogo"> 
    <img src="{{asset('public/bp/img/copyright.png/')}}" alt=""> 
   </div> 
   <p class="copyright">BP p.l.c. Copyright © 1996-2024</p> 
  </div> 
 @include('app.layout.manu')

@include('alert-message')
<!-- menu area -->

</body>
</html>