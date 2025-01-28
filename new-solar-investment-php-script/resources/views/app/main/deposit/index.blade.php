<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Balance-Recharge</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="{{asset('rahat/app.css')}}">
    <style>
        body {
            background: #f7f7f7;
            padding: 0;
            margin: 0;
        }
        .check {
            position: absolute;
            top: 15px;
            display: none;
        }
        .payImage {
            width: 100px;
            height: 70px;
            border-radius: 50%;
            box-shadow: 0px 5px 10px;
        }
    </style>
</head>
<body>

<div class="page_title">
    <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
    <div>Recharge</div>
    <div></div>
</div>

<div style="margin: 0 10px;">
    <div class="activateArea" style="height: 100px;margin-top: 5px;border-radius: 13px;background: #fff;padding: 10px 20px;text-align: center;">
        <div class="sgstyvcgv">
            <h4 style="margin: 0">{{price(auth()->user()->balance)}}</h4>
            <div class="ruiuler"></div>
            <p>My Balance</p>
        </div>
    </div>

    <div style="overflow: hidden;margin-top: 10px;width: 90%;margin-left: auto;margin-right: auto;">
        @php
            $paymentMethods = \App\Models\PaymentMethod::where('status', 'active')->get();
        @endphp
        @foreach($paymentMethods as $index => $element)
        <div onclick="selectMethod('{{$element->id}}', '{{$element->name}}')" style="width: 40%;float: left;margin-right: 0%;background: #fff;border-radius: 8px;text-align: center;padding: 12px;position:relative;">
            <div><img class="payImage" style="width: 40px; height: 40px;" src="{{asset($element->photo)}}" alt=""></div>
            <div style="padding-top: 5px;">{{$element->name}}</div>
            <div class="check bkashcheck"><img style="width: 20px;" src="{{asset('5610944.png')}}" alt=""></div>
        </div>
        @endforeach
    </div>

    <div class="activateArea" style="margin-top: 10px;border-radius: 13px;background: #fff;padding: 15px;">
        <div class="sgstyvcgv">
            <p style="margin: 0;font-size: 16px;color: #000;"> <span style="color: green;font-weight: bold;font-size: 18px;" id="seesPayemt"></span></p>

            <div style="overflow: hidden;margin-top: 20px;">
                <div style="width: 20%;float: left;margin-top: 7px">Amount</div>
                <div style="width: 80%;float: left;"><input type="number" value="" name="amount" class="amount_input"></div>
            </div>

            <p style="margin: 0;font-size: 16px;color: #000;text-align: center;margin-top: 30px;">Select Amount</p>
            <div class="amonnt_select" style="margin-top: 15px;">
                <div class="amount_row">
                    
                    <div class="amount_fix"><button onclick="getAmount(6500)">6500</button></div>
                    <div class="amount_fix"><button onclick="getAmount(15000)">15000</button></div>
                    <div class="amount_fix"><button onclick="getAmount(35000)">35000</button></div>
                </div>

                <div class="amount_row">
                    <div class="amount_fix"><button onclick="getAmount(78000)">78000</button></div>
                    <div class="amount_fix"><button onclick="getAmount(150000)">150000</button></div>
                    <div class="amount_fix"><button onclick="getAmount(260000)">260000</button></div>
                    
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="pay_method">

    <div class="recharge_button prof_btn">
        <button onclick="go_payment()">Recharge</button>
    </div>

    <div style="padding:15px;">
        <span>Recharge rules:<br>
            1. The minimum deposit {{price(2500)}}<br>
            2. Secured and safety way to payment systems.<br>
            3. Once you recharge your account successful before 3 minutes your deposit reflect into your wallet, very important if you do any fake deposit it will results your account disabled<br>
        </span>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>
@include('alert-message')
<script>
    function selectMethod(selected_method_id, selectMethodName){
        document.getElementById('seesPayemt').innerHTML = selectMethodName;
        document.querySelector('input[name="pay_method"]').value = selected_method_id;
    }

    function getAmount(amount){
        document.querySelector('input[name="amount"]').value = amount;
    }

    function go_payment(){
        let pay_method = document.querySelector('input[name="pay_method"]').value;
        let amount = document.querySelector('input[name="amount"]').value;

        if (!pay_method) {
            message('Please select a payment method');
            return;
        }

        if (amount >= 300){
            window.location.href='{{url('recharge-confirm/')}}' + "/" + amount + "/" + pay_method;
        } else {
            message('Please select a limited amount');
        }
    }

    // Automatically select the first payment method if none is selected
    document.addEventListener('DOMContentLoaded', (event) => {
        let paymentMethods = document.querySelectorAll('div[onclick*="selectMethod"]');
        if (paymentMethods.length > 0) {
            let firstMethod = paymentMethods[0];
            let methodId = firstMethod.getAttribute('onclick').match(/'(\d+)'/)[1];
            let methodName = firstMethod.querySelector('div').textContent;
            selectMethod(methodId, methodName);
        }
    });
</script>
<!-- menu area -->
    @include('app.layout.manu')
</body>
</html>