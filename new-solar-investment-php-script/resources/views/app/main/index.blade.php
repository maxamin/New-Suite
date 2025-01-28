<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Home</title> 
  <!--<link rel="stylesheet" href="{{asset('public/bp/swiper.min.css')}}">-->
  <link rel="stylesheet" href="{{asset('public/bp/main.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bp/details.css')}}">
  <link rel="stylesheet" href="{{asset('public/bp/index.css')}}">
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
     <a href="{{route('user.invite')}}"><img src="{{asset('public/bp/img/share.png')}}" alt=""></a> 
    </div> 
   </div> 
   <input type="hidden" id="TOKEN" value="e35d370cc0ad55f64974b1e8aeb8b0f6"> 
     <div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" style="width: 324px; margin-right: 15px;"> 
      <a href="{{route('user.invite')}}"> <img src="{{asset('public/bp/img/0e29acd3d20e32fc977bf5bf06fdaa4c.png')}}" alt=""> </a> 
     </div>
    </div>
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
     <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
     <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
     <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span>
    </div> 
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
   </div> 
   <div class="flex_be"> 
    <a class="balance" href='{{route('user.deposit')}}'>
     <div class="flex_be"> 
      <div class="flex_sta"> 
       <img class="" src="{{asset('public/bp/img/balance.png')}}" alt=""> 
       <p>Recharge Balance</p> 
      </div> 
      <img src="{{asset('public/bp/img/more.png')}}" alt=""> 
     </div> <h5>{{price(auth()->user()->balance)}}</h5> </a> 
    <a class="about" href="#"> <img src="{{asset('public/bp/img/about.png')}}" alt=""> <p>About us</p> </a>
    <a class="referral" href="{{route('user.invite')}}"> <img src="{{asset('public/bp/img/referral.png')}}" alt=""> <p>Referral</p> </a> 
   </div> 
   <h3 class="modaltitle">Invest To Earn</h3> 
  @foreach(\App\Models\Package::where('status', 'active')->get() as $element)
            <?php
            $myVip = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
 


   <ul class="productlist" id="productListUl"> 
    <li> <h6>{{$element->name}}</h6> <p class="duration">Duration: <span>60</span>days</p> 
     <div class="Price_box">
      {{price($element->price)}}
     </div> 
     <div class="flex_be"> 
      <img class="goodsimg" src="{{asset($element->photo)}}" alt=""> 
      <div class="goodsinfo"> 
       <div class="flex_be"> 
        <p>PRICE:</p> 
        <span>{{price($element->price)}}</span> 
       </div> 
       <div class="flex_be"> 
        <p>Daily ROI:</p> 
        <span>{{$element->ROI}}%</span> 
       </div>
       <div class="flex_be"> 
        <p>Daily Return:</p> 
        <span>{{price($element->commission_with_avg_amount / $element->validity)}}</span> 
       </div> 
       <div class="flex_be"> 
        <p>Validity days:</p> 
        <span>{{$element->validity}}</span> 
       </div> 
      </div>
     </div> 
     <div class="flex_be"> 
      <a href="{{route('package.details',$element->id)}}" class="detailbtn">Detail</a> 
     <a href="{{route('package.details', $element->id)}}">
      <div class="buybtn1" data-product-name="BP invest plan-1" data-product-cycle="60" data-product-money="200" data-product-rate="25" data-product-day-profit="50" data-product-total-profit="3000" data-product-id="93">
       Buy </a>
      </div> 
     </div> </li> 
     
    
    <div class="coverbg"></div> 
  <div class="paywind"> 
   <div class="flex_be paytitle"> 
    <img src="{{asset('public/bp/img/ayicon.png')}}" alt=""> 
    <h5>COMFIRM YOUR ORDER</h5> 
    <img class="close" src="{{asset('public/bp/img/close1.png')}}" alt=""> 
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
   <div class="confirm buyBtn">
    Confirm payment of 
    <span class="product-money"></span>
   </div> 
  </div> 

@endforeach

<!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->

@include('alert-message')
<!-- menu area -->
<script>

    var alipay_id = "0";
    var is_status = true;

    $(function(){

        $(document).on('click', '.buybtn1', function(){

            $('.product-name').html($(this).data('product-name'))
            $('.product-cycle').html($(this).data('product-cycle'))
            $('.product-money').html('₱' + $(this).data('product-money'))
            $('.product-rate').html($(this).data('product-rate') + '%')
            $('.product-day-profit').html('₱' + $(this).data('product-day-profit'))
            $('.product-total-profit').html('₱' + $(this).data('product-total-profit'))
            alipay_id = $(this).data('product-id');

            $('.coverbg').show()
            $('.paywind').slideToggle(300)

        })


        $('.buyBtn').click(function(){

            let dom = $('.getway li.active');
            let type = dom.data('type')
            let platform =dom.data('platform')

            // console.log(type);
            // console.log(platform);
            // console.log(alipay_id);
            // console.log(is_status);
            // return false;
            if(!type){
                Toast('Please select a payment gateway',2000);
                return false;
            }
            if(!alipay_id){
                Toast('Please select a product first',2000);
                return false;
            }
            if(!is_status){
                return false;
            }
            loading.showLoading({
                type:1,
                tip:"Loading"
            })
            is_status = false;
            var TOKEN = "2da1930e31ffa72bd26f38fe88748581";
            $.post("/money/recharge.html",z({type:type,alipay_id:alipay_id,platform:platform,TOKEN:TOKEN}),function(msg){
                loading.hideLoading();
                is_status = true;
                if(msg.code == 1){
                    is_status = true;
                    $("#my_form").html(' ');
                    $("#my_form").append(msg.data);
                    $("body").find('#yqfForm').submit();
                    //$('.outerbox').hide();
                }else if(msg.code == 2){
                    window.location.href = msg.data;
                    // $('.outerbox').hide();
                }else if(msg.code == 9998 || msg.code == 0){
                    successToast(msg.data, ()=>{window.location.href = msg.data.url;})
                }else{
                    Toast(msg.data,3000);
                }
            },'json')
        });

    })



    let swiper = new Swiper(".swiper-container2", {
        spaceBetween: 15,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });


    $('.getway li').click(function(){
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
    })
    $('.close').click(function(){
        $('.paywind').slideToggle(300)
        $('.coverbg').hide()
    })
    // $('.buybtn').click(function(){
    //     $('.coverbg').show()
    //     $('.paywind').slideToggle(300)
    // })
</script> 
 </body>
</html>