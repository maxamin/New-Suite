<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<style>
    .card {
        padding: 12px;
        box-shadow: 0px -2px 0px rgb(0, 54, 202);
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
    <div style="display: flex;justify-content: space-between;background: #4bcc5f;color: #fff;padding: 12px 16px;">
        <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
        <div>Total History</div>
        <div></div>
    </div>
    <style>
        i.fa.fa-arrow-down {
            background: #db1e09;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            color: #fff;
            border-radius: 50px;
            margin-right: 5px;
        }
        i.fa.fa-arrow-up {
            background: #db1e09;
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
    <div class="container" id="recharge" style="display: block">
        <div style="margin-top: 20px">
            @foreach(\App\Models\UserLedger::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
                <div class="_card" style="    margin-top: 12px; background: #fff;
    padding: 13px 0;
    border-radius: 7px;">
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;margin-bottom: 0;">
                        <div style="font-weight: 300;color: #4bcc5f;">{{$element->reason}}</div>
                        <div style="font-weight: 300;color: #000;">{{$element->created_at}}</div>
                    </div>
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                        <div style="color: #4bcc5f;
    font-weight: 500;
    font-size: 14px;"></div>
                        <div style="margin-top: 0;">

                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

<!-- menu area -->
@include('app.layout.manu')

</body>
</html>
