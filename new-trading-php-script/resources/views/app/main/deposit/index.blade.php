<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/bootstrap-4.6.2/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?2">
    <link rel="stylesheet" href="{{asset('public')}}/static/styles/common.css?3">
    <script src="{{asset('public')}}/static/plugin/jquery-3.5.1.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/layer/layer.js"></script>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?v=3.5.1"
          id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>

<link rel="stylesheet" href="{{asset('public')}}/pageCss/recharge.css?1">

<style>
    .active {
        background: black;
    }
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .form-box-wrap {
        background: #1dcbff33;
    }
    .input-box {
        background: #1dcbff33 !important;
    }
.frt-msg {
    text-align: justify;
}
        p.address {
            margin-top: 10px;
            color: #000;
            font-size: 13px;
        }
        
       .qr-code-container {
            text-align: center;
            margin-top: 20px;
        }
        
        .deposit-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-block: 20px;
        }

    </style>

<!-- CENTER PANEL -->
<div class="center-panel">

    <div class="top">
        <svg onclick="go('{{route('dashboard')}}')" class="back" viewBox="0 0 1024 1024">
            <path d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
        </svg>
        <div class="title">TopUp</div>
        <div class="lang">

        </div>
    </div>

    <div id="main" class="main page-main">

        <div class="form-box-wrap res-box">

            <div class="rec-input">
                <div class="label">Asset balance</div>
                <div class="rec-text">{{price(user()->balance)}}</div>
            </div>
        
            <div class="qr-code-container">
                {{-- Generate QR Code URL --}}
                @php
                    $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=' . urlencode($walletAddress);
                @endphp
            
                {{-- Display QR Code --}}
                 <img src="{{ $qrCodeUrl }}" alt="QR Code" class="qr-code-image">
            </div>

            <div class="channel_box">
                <h5 class="channel" style="font-weight: 500">Wallet Address: </h5>
                

                <div class="address_details">
                    <div>
                         <p class="address"> {{ $walletAddress }} </p>
                    </div>
                    <div>
                        <img style="width: 25px;" class="copy" onclick="copyLink()" src="{{asset('public/icons8-copy-48.png')}}" alt="">
                    </div>
                </div>
                
            </div>

<div class="qr-code-container">
                <img src="{{asset('public/loading-horizontal.gif')}}" alt="" width="75">
            </div>

           <!-- <div class="rec-input">
                <div class="label">Recharge amount</div>
                <div class="form-input-box form-input-box-sm" style="background: #fff;">
                    <input type="number" class="form-input" id="amount" name="amount"
                           placeholder="Please enter the TopUp amount" value="">
                    <div style="color: #000;padding: 0 10px 0 10px;font-weight: 600;">{{currency()}}</div>
                </div>
            </div>

          <!--  <div class="price-select-list">
                <div class="price-select block" onclick="getAmount(this, 350)">350</div>
                <div class="price-select block" onclick="getAmount(this, 700)">700</div>
                <div class="price-select block" onclick="getAmount(this, 1000)">1000</div>
                <div class="price-select block" onclick="getAmount(this, 2000)">2000</div>
                <div class="price-select block" onclick="getAmount(this, 5000)">5000</div>
                <div class="price-select block" onclick="getAmount(this, 7000)">7000</div>
                <div class="price-select block" onclick="getAmount(this, 10000)">10000</div>
                <div class="price-select block" onclick="getAmount(this, 15000)">15000</div>
                <div class="price-select block" onclick="getAmount(this, 25000)">25000</div>
            </div>-->


        <!--<div class="rec-input">
                <div class="label">Recharge channel</div>
                <div class="form-input-box form-input-box-sm" style="background: #fff;">
                    <select name="channel" class="form-input" id="">
                       <!-- @foreach(\App\Models\PaymentMethod::get() as $element)
                            <option value="{{$element->name}}">{{$element->name}}</option>
                        @endforeach-->
                    </select>
                </div>
            </div>
        </div>

        <!--<div style="margin:0 15px">
            <button class="button form-button" id="submit" type="button" onclick="payment()" block="">TopUp</button>
        </div>-->

        <div class="frt-msg">
            <div class="fz18 fb mb-2">
                <img src="{{asset('public')}}/static/images/recharge/icon-msg.png"
                     style="width: 18px; height: 18px; vertical-align: middle;" alt="">
                Tips:
            </div>
            1. Minimum recharge amount is $10.00<br>
            2.Pay only USDT (TRC20) to this wallet.
            <br>
            3. Any amount you pay into this wallet will be automatically deposited into your account.<br>
        </div>

    </div>


</div>
<!--CONTENT END-->
@include('alert-message')
@include('loading')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    function getAmount(_this, amount){
        var elements = document.querySelectorAll('.amountItem');
        for (let i=0; i<elements.length;i++){
            if (elements[i].classList.contains('ui-active')){
                elements[i].classList.remove('ui-active')
            }
        }
        _this.classList.add('ui-active')

        document.querySelector('input[name="amount"]').value = amount;
    }

    function selectChannel(_this){
        var channel_box = document.querySelector('.channel_box');
        var channel = document.querySelector('.channel');
        var method_ = document.querySelector('input[name="method_"]');
        var address = document.querySelector('.address');

        if (_this.value != ''){
            channel_box.style.display = 'block';
            channel.innerHTML = _this.value.split("::")[0];
            method_.value = _this.value.split("::")[0];
            // address.innerHTML = _this.value.split("::")[1];
        }else {
            channel_box.style.display = 'none';
        }
    }

    function onepayPayment(){
        var amount = document.querySelector('input[name="amount"]').value;
        var transaction_id = document.querySelector('input[name="transaction_id"]').value;
        if (transaction_id == '' || amount == ''){
            message('Incorrect Information');
            return true;
        }else {
            document.querySelector('form').submit();
        }
    }

    function copyLink()
    {
        var text = document.querySelector('.address').innerHTML;
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
        message('Success');
    }
    
    function updateUserBalance() {
    fetch('{{ route('user.balance') }}')
        .then(response => response.json())
        .then(data => {
            const formattedBalance = parseFloat(data.balance).toFixed(2);
            
            const balanceElement = document.getElementById('user-balance');
            balanceElement.innerHTML = `$${formattedBalance}`;
        })
        .catch(error => {
            console.error('Error fetching user balance:', error);
        });
}

updateUserBalance();

setInterval(updateUserBalance, 30000);


</script>
</body>
</html>