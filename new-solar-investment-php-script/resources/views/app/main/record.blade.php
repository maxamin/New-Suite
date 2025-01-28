<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<style>
    .card {
        padding: 12px;
        box-shadow: 0px -2px 0px rgb(0, 202, 30);
        border-radius: 5px;
        margin: 10px 0;
        background: #29be00;
    }
    .wrapper.team-page, .wrapper.profile-page {
        background: #ededed;
    }
</style>
<body>
<div class="wrapper profile-page" style="padding-top: 0">
    <div style="display: flex;justify-content: space-between;background: #fff;color: #4bcc5f;padding: 12px 16px;">
        <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
        <div>My History</div>
        <div></div>
    </div>
    <div class="card_menu" style="width: 95%;overflow: hidden;padding-top: 15px;margin: auto;padding: 12px 0;background: #fff;">
        <div class="card_menu_one" style="
        width: 50%;
        float: left;
        text-align: center;
        padding-bottom: 10px;
        padding: 10px 0;
        font-weight: 300;
        color: #000;
        border-bottom: 2px solid red;
    "
             onclick="rechargeTab()"
        >Recharge</div>
        <div class="card_menu_two" style="width: 50%;float: left;text-align: center;padding-bottom: 10px;margin-top: 8px;"
             onclick="withdrawTab()"
        >Withdraw</div>
    </div>
    <style>
        
        i.fa.fa-arrow-down {
            background: #4bcc5f;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            color: #fff;
            border-radius: 50px;
            margin-right: 5px;
        }
        i.fa.fa-arrow-up {
            background: #4bcc5f;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            color: #fff;
            border-radius: 50px;
            margin-right: 5px;
        }
        hr.hr {
            margin: 15px 0 0 0;
        }
    </style>
    <div class="container" id="withdraw" style="display: none">
        @foreach(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
            <div class="_card" style="    margin-top: 12px;
    background: #fff;
    padding: 13px 0;
    border-radius: 7px;">
                <div style="padding: 0 15px;display: flex;justify-content: space-between;margin-bottom: 0;">
                    <div style="font-weight: 300;color: #00000052;">{{$element->oid}}</div>
                    <div style="font-weight: 300;color: #00000052;">{{$element->created_at}}</div>
                </div>
                <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                    <div style="color: #4bcc5f;
    font-weight: 700;
    font-size: 14px;">{{price($element->final_amount)}}</div>
                    <div style="margin-top: 0px;">
                        @if($element->status == 'approved')
                            Success
                        @elseif($element->status == 'rejected')
                            Cancel
                        @else
                            Proccessing
                        @endif
                    </div>
                </div>
            </div>
            @if($loop->last)
            @else
            @endif
        @endforeach
    </div>

    <div class="container" id="recharge" style="display: block">
        <div style="margin-top: 14px">
            @foreach(\App\Models\Deposit::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
                <div class="_card" style="    margin-top: 12px; background: #fff;
    padding: 13px 0;
    border-radius: 7px;">
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;margin-bottom: 0;">
                        <div style="font-weight: 300;color: #00000052">{{$element->oid}}</div>
                        <div style="font-weight: 300;color: #00000052;">{{$element->created_at}}</div>
                    </div>
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                        <div style="color: #4bcc5f;
    font-weight: 700;
    font-size: 14px;">{{price($element->final_amount)}}</div>
                        <div style="margin-top: 0px;">
                            @if($element->status == 'approved')
                                Success
                            @elseif($element->status == 'rejected')
                                Cancel
                            @else
                                Processing
                            @endif
                        </div>
                    </div>
                </div>
                @if($loop->last)
                @else
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- menu area -->
@include('app.layout.manu')

<!-- === Script Area === -->
@include('app.layout.js')

<script>
    function rechargeTab()
    {
        document.getElementById('recharge').style.display = 'block';
        document.getElementById('withdraw').style.display = 'none';

        document.querySelector('.card_menu_two').style.padding = '10px 0';
        document.querySelector('.card_menu_two').style.fontWeight = '600';
        document.querySelector('.card_menu_two').style.color = '#000';
        document.querySelector('.card_menu_two').style.borderBottom = 'none';

        document.querySelector('.card_menu_one').style.borderBottom = '2px solid red';
        document.querySelector('.card_menu_one').style.padding = '10px 0';
        document.querySelector('.card_menu_one').style.fontWeight = '600';
        document.querySelector('.card_menu_one').style.color = '#000';
    }
    function withdrawTab()
    {
        document.getElementById('recharge').style.display = 'none';
        document.getElementById('withdraw').style.display = 'block';

        document.querySelector('.card_menu_one').style.padding = '10px 0';
        document.querySelector('.card_menu_one').style.fontWeight = '600';
        document.querySelector('.card_menu_one').style.color = '#000';

        document.querySelector('.card_menu_two').style.borderBottom = '2px solid red';

        document.querySelector('.card_menu_one').style.borderBottom = 'none';

        document.querySelector('.card_menu_two').style.padding = '10px 0';
        document.querySelector('.card_menu_two').style.fontWeight = '600';
        document.querySelector('.card_menu_two').style.color = '#000';
        document.querySelector('.card_menu_two').style.marginTop = '0';
    }


</script>
</body>
</html>
