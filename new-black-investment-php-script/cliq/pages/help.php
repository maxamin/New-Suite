<?php if(!defined('FastCore')){exit('Opss!');}
# Заголовки
$opt = array(
    'title' => 'Help',
    'description' => 'Contacts for solving issues, as well as for cooperation and advertising.'
    );
?>
<p class="text-center">If you have any problem with the website or looking to cooperate with us, don't hesitate to send us a message! </p>
<div class="row row-grid m-lg-3">

<div class="col-lg-3">
          </div>
<div class="col-lg-6">
      <div class="text-center p-2 about">
            <img src="/img/ask.png" style="width: 128px;">
                  <div>
                    <h3 style="color:#f24;"><b><?=$config->email;?></b></h3>
                    <h5>Contact email:</h5>
                  </div>
            </div>
          </div>


          <div class="col-lg-4" style="display: none;">
      <div class="text-center p-2 about">
            <img src="/img/ask2.png" style="width: 128px;">
                  <div>
                    <h3 style="color:#f24;"><b><?=$config->email;?></b></h3>
                    <h5>Telegram:</h5>
                  </div>
            </div>
          </div>
</div>

<div class="row row-grid m-lg-3">

<div class="col-lg-1"></div>

          <div class="col-lg-10">
            <div class="text-center"><h2 class="wrap-title">FAQ</h2>
            <p>Please read FAQ before sending us</p></div>
            
            <div class="about mb-3 p-2">
              <h4 style="color: #ccccdd;">How much can I earn?</h4>
              <p> You can earn up to 10% daily profits. The more you deposit, the more you earn.
The only limit is your total rewards amount can not exceed 500% of your initial investment.  </p>
            </div>

            <div class="about mb-3 p-2">
              <h4 style="color: #ccccdd;">Why my account is banned?</h4>
              <p> We only ban your account if the system detect that you are creating multiple accounts, using bots. </p>
            </div>

            <div class="about mb-3 p-2">
              <h4 class="card-title" style="color: #ccccdd;">Why my withdraw request status is pending?</h4>
              <p> Sometime, we need to check your account because you have suspicious activity. 
  It should not take longer than 24 hours then your withdraw request will be processed. </p>
            <p> If you are not cheating then no worry, you will get your payment soon! </p>
            </div>

          </div>

          
</div>
