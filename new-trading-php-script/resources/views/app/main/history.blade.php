<html lang="en"
      style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + 0px); --window-bottom: 0px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NiceHash</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <style type="text/css">


        /*每个页面公共css */
        * {
            font-family: Regular
        }


        .Regular {
            font-family: Regular
        }

        .Medium {
            font-family: Medium
        }

        .Bold {
            font-family: Bold;
            font-weight: 700
        }

        .innerBox90 {
            width: 90%;
            margin: auto
        }

        .colorBule {
            color: #7c8de5
        }

        .radius30 {
            border-radius: 17px;
            overflow: hidden
        }

        .radius20 {
            border-radius: 11px;
            overflow: hidden
        }

        uni-toast {
            z-index: 999999
        }

        .pages {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(251, 163, 66, .6), rgba(251, 163, 66, 0));
            background-size: 100% 115px;
            background-repeat: no-repeat;
            overflow-y: scroll;
            font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: constant(safe-area-inset-bottom);
            /* // 兼容 IOS<11.2 */
            padding-bottom: env(safe-area-inset-bottom)
            /* // 兼容 IOS>11.2 */
        }

        .noData {
            text-align: center;
            color: #cfcfcf;
            width: 100%;
            font-size: 16px;
            margin-top: 57px
        }

        .status_bar {
            width: 100%;
            height: 101px
        }

        .tab_bar {
            width: 100%;
            height: 57px
        }

        .status_tab {
            width: 100%;
            height: 50px
        }

        .buttons {
            width: 363px;
            height: 62px;
            font-family: Medium;
            background: #fba342;
            border-radius: 20px 20px 20px 20px;
            margin: auto;
            line-height: 62px;
            color: #162645;
            font-weight: 500;
            font-size: 20px;
            color: #fff;
            text-align: center
        }
        .pages .itemBox[data-v-7ddd6d44] {
            color: rgba(37, 204, 63, 1);
            background: aliceblue;
            padding: 1px 7px;
        }
        .unButtons {
            opacity: .8;
            pointer-events: none
        }

        .uni-tabbar {
            padding-bottom: 17px !important
        }

        .auto80 {
            margin: auto;
            width: 363px
        }

        .auto90 {
            margin: auto;
            width: 398px
        }

        .flexAround {
            display: flex;
            justify-content: space-around;
            align-items: center
        }

        .flexBetween {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .flexStart {
            display: flex;
            justify-content: flex-start;
            align-items: center
        }

        .flexWrap {
            flex-wrap: wrap
        }

        .flexColumn {
            flex-direction: column;
            white-space: nowrap
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .bar[data-v-638835ae] {
            width: 100%;
            z-index: 2
        }

        .black .title[data-v-638835ae],
        .black .back[data-v-638835ae] {
            color: #000
        }

        .status_bars[data-v-638835ae] {
            width: 100%;
            height: 50px;
            line-height: 50px
        }

        .backBar[data-v-638835ae] {
            width: 398px;
            margin-left: 17px
        }

        .backBar .lineBox[data-v-638835ae] {
            width: 100%;
            height: 50px;
            line-height: 50px
        }

        .backBar .lineBox .ke[data-v-638835ae] {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 24px;
            color: #000
        }

        .backBar .lineBox .ke .back[data-v-638835ae] {
            display: flex;
            align-items: center
        }

        .backBar .lineBox .ke .back uni-image[data-v-638835ae] {
            width: 27px;
            height: 27px;
            margin-right: 27px
        }

        .backBar .lineBox .bell[data-v-638835ae] {
            display: flex;
            align-items: center
        }

        .backBar .lineBox .bell uni-image[data-v-638835ae] {
            width: 27px;
            height: 27px;
            margin-left: 31px
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .Announcement[data-v-be769600] {
            width: 363px;
            background: #f5faf8;
            margin: auto;
            margin-top: 20%;
            height: 588px;
            position: relative;
            border-radius: 13px;
            z-index: 10
        }

        .Announcement .blue_box[data-v-be769600] {
            color: #54a9da;
            padding: 8px 0
        }

        .Announcement .boxCenter[data-v-be769600] {
            width: 346px;
            padding-top: 20px;
            margin: auto
        }

        .Announcement .boxCenter .closeR[data-v-be769600] {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 15
        }

        .Announcement .boxCenter .closeR uni-image[data-v-be769600] {
            width: 27px;
            height: 27px
        }

        .Announcement .boxCenter .box-image[data-v-be769600] {
            margin: auto;
            text-align: center;
            position: relative
        }

        .Announcement .boxCenter .box-image > uni-image[data-v-be769600] {
            width: 173px;
            height: 103px
        }

        .Announcement .boxCenter .fixB[data-v-be769600] {
            padding: 34px 0 20px;
            font-weight: 700;
            font-size: 24px;
            text-align: center
        }

        .Announcement .boxCenter .content[data-v-be769600] {
            color: #787b82;
            width: 311px;
            margin: auto;
            height: 265px;
            overflow-y: scroll;
            font-size: 17px
        }

        .Announcement .boxCenter .content .boxI[data-v-be769600] {
            width: 100%
        }

        .Announcement .boxCenter .btnss[data-v-be769600] {
            width: 277px;
            height: 62px;
            line-height: 62px;
            background: #fba342;
            text-align: center;
            box-shadow: 0px 3px 5px 0px rgba(251, 163, 66, .4);
            border-radius: 51px 51px 51px 51px;
            margin: 27px auto;
            font-weight: 500;
            font-size: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff
        }

        .Announcement .boxCenter .btnss uni-image[data-v-be769600] {
            width: 28px;
            margin-right: 17px;
            height: 28px
        }

        .Announcement .boxCenter .boxT[data-v-be769600] {
            width: 329px;
            height: 51px;
            position: absolute;
            bottom: 23px;
            display: flex
        }

        .Announcement .boxCenter .boxT .linkUrl[data-v-be769600] {
            display: flex;
            align-items: center;
            justify-content: center
        }

        .Announcement .boxCenter .boxT .linkUrl > uni-view[data-v-be769600] {
            display: flex;
            flex-direction: column;
            text-align: left;
            width: 86px;
            font-size: 13px
        }

        .Announcement .boxCenter .boxT .linkUrl > uni-view > uni-view[data-v-be769600]:nth-of-type(2) {
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            zoom: .8
        }

        .Announcement .boxCenter .boxT .linkUrl uni-image[data-v-be769600] {
            width: 27px;
            height: 27px;
            vertical-align: middle;
            margin-right: 5px
        }

        .Announcement .boxCenter .boxT .linkUrl[data-v-be769600]:nth-of-type(1) {
            width: 144px;
            height: 48px;
            background: #fff;
            border-radius: 6px 6px 6px 6px;
            border: 1px solid #009b0d;
            color: #7c8de5;
            text-align: center;
            margin: auto
        }

        .Announcement .boxCenter .boxT .linkUrl:nth-of-type(1) > uni-view[data-v-be769600]:nth-of-type(1) {
            color: #00980c
        }

        .Announcement .boxCenter .boxT .linkUrl[data-v-be769600]:nth-of-type(2) {
            width: 144px;
            height: 48px;
            background: #fff;
            border-radius: 6px 6px 6px 6px;
            border: 1px solid #4293ff
        }

        .Announcement .boxCenter .boxT .linkUrl:nth-of-type(2) > uni-view[data-v-be769600]:nth-of-type(1) {
            color: #4091ff
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .uni-popup[data-v-3193bb52] {
            position: fixed;
            z-index: 99
        }

        .uni-popup.top[data-v-3193bb52], .uni-popup.left[data-v-3193bb52], .uni-popup.right[data-v-3193bb52] {
            top: var(--window-top)
        }

        .uni-popup .uni-popup__wrapper[data-v-3193bb52] {
            display: block;
            position: relative
            /* iphonex 等安全区设置，底部安全区适配 */
        }

        .uni-popup .uni-popup__wrapper.left[data-v-3193bb52], .uni-popup .uni-popup__wrapper.right[data-v-3193bb52] {
            padding-top: var(--window-top);
            flex: 1
        }

        .fixforpc-z-index[data-v-3193bb52] {
            z-index: 999
        }

        .fixforpc-top[data-v-3193bb52] {
            top: 0
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .boxBox[data-v-7b388d2f] {
            width: 115px;
            height: 115px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40vh auto 0 auto
        }

        .boxBox .my-loading-pop[data-v-7b388d2f] {
            width: 433px
        }

        .boxBox .my-loading-pop uni-image[data-v-7b388d2f] {
            width: 115px
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .barBox[data-v-5c192be9] {
            width: 415px;
            height: 86px;
            background: #000;
            border-radius: 51px 51px 51px 51px;
            position: fixed;
            left: 8px;
            bottom: 20px;
            z-index: 9;
            color: #666;
            font-size: 13px
        }

        .barBox .widthA[data-v-5c192be9] {
            height: 69px
        }

        .barBox .BoxIner[data-v-5c192be9] {
            position: relative;
            z-index: 90;
            height: 86px
        }

        .barBox .boxItem[data-v-5c192be9] {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 69px;
            width: 25%;
            text-align: center
        }

        .barBox .boxItem .b1 uni-image[data-v-5c192be9] {
            width: 27px;
            height: 27px
        }

        .barBox .light[data-v-5c192be9] {
            width: 41px;
            height: 41px;
            background: linear-gradient(90deg, #fbbf41, #fba342);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .barBox .dark[data-v-5c192be9] {
            opacity: .6;
            color: #b4b4b4
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .buy-pages[data-v-bcb18222] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10
        }

        .top-pages[data-v-bcb18222] {
            width: 100%;
            background: rgba(0, 0, 0, .7725490196078432);
            height: 100%;
            position: relative;
            z-index: 3
        }

        .Announcement[data-v-bcb18222] {
            width: 415px;
            height: 675px;
            background: url({{asset('public')}}/static/bgi/bb.png) no-repeat top;
            background-size: 100% 100%;
            position: absolute;
            z-index: 4;
            bottom: 8px;
            left: 8px
        }

        .Announcement .box-re[data-v-bcb18222] {
            margin-top: 20px;
            margin-bottom: 17px;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .Announcement .box-re uni-image[data-v-bcb18222] {
            width: 86px;
            height: 86px
        }

        .Announcement .titile[data-v-bcb18222] {
            height: 32px;
            width: 100%;
            font-weight: 500;
            font-size: 27px;
            color: #000;
            text-align: center;
            margin-bottom: 13px
        }

        .Announcement .box-thr[data-v-bcb18222] {
            width: 329px;
            height: 20px;
            display: flex;
            margin: auto;
            justify-content: space-between;
            align-items: center;
            color: #787b82
        }

        .Announcement .box-thr uni-view[data-v-bcb18222] {
            width: 1px;
            height: 13px;
            background: #787b82;
            border-radius: 0px 0px 0px 0px
        }

        .Announcement .box-price[data-v-bcb18222] {
            font-weight: 500;
            font-size: 34px;
            color: #000;
            width: 346px;
            margin: 27px auto 0
        }

        .Announcement .box-buy[data-v-bcb18222] {
            font-weight: 400;
            font-size: 17px;
            color: #000;
            width: 346px;
            margin: 6px auto 0
        }

        .Announcement .imageBox[data-v-bcb18222] {
            width: 346px;
            margin: 13px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            word-break: break-all;
            line-height: 16px;
            color: #787b82
        }

        .Announcement .txt-free[data-v-bcb18222] {
            width: 346px;
            margin: auto;
            font-weight: 400;
            font-size: 13px;
            color: #999
        }

        .Announcement .txt-free uni-text[data-v-bcb18222] {
            color: #ff534f
        }

        .Announcement .box-info[data-v-bcb18222] {
            width: 346px;
            margin: auto;
            margin-top: 13px;
            margin-bottom: 17px
        }

        .Announcement .lineS[data-v-bcb18222] {
            font-size: 17px;
            margin: 10px auto;
            width: 353px;
            height: 41px;
            font-weight: 500;
            display: flex;
            align-items: center
        }

        .Announcement .lineS .s1[data-v-bcb18222] {
            display: flex;
            font-weight: 500;
            font-size: 17px;
            font-family: Medium;
            color: #000
        }

        .Announcement .lineS .s2[data-v-bcb18222] {
            font-weight: 600;
            font-size: 17px;
            margin-left: 17px;
            color: #000
        }

        .Announcement .lineS .s3[data-v-bcb18222] {
            margin-left: 17px
        }

        .Announcement .lineS .s3 .btn-coupon[data-v-bcb18222] {
            width: 59px;
            height: 24px;
            border-radius: 17px;
            font-weight: 500;
            font-size: 13px;
            line-height: 24px;
            text-align: center
        }

        .Announcement .lineS .s3 .checked[data-v-bcb18222] {
            background: #fba342;
            color: #fff
        }

        .Announcement .lineS .s3 .unchecked[data-v-bcb18222] {
            color: #999;
            background: #eee
        }

        .Announcement .box-wallet[data-v-bcb18222] {
            position: absolute;
            bottom: 23px;
            left: 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 381px;
            height: 58px;
            background: #fff;
            box-shadow: 0px 6px 10px 0px rgba(0, 0, 0, .1);
            border-radius: 34px;
            border: 1px solid #edf0ed
        }

        .Announcement .box-wallet > uni-view[data-v-bcb18222] {
            width: 50%;
            height: 58px;
            font-weight: 500;
            margin: 20px auto;
            font-size: 17px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .Announcement .box-wallet > uni-view uni-image[data-v-bcb18222] {
            width: 27px;
            height: 27px;
            margin-right: 6px
        }

        .Announcement .box-wallet .btns2[data-v-bcb18222] {
            border-radius: 10px;
            text-align: center;
            color: #787b82
        }

        .Announcement .box-wallet .btnsLine[data-v-bcb18222] {
            width: 1px;
            height: 34px;
            background: #edf0ed;
            border-radius: 0px 0px 0px 0px
        }

        .Announcement .box-wallet .btns[data-v-bcb18222] {
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            color: #fba342
        }

        .Announcement .box-wallet .unbtns[data-v-bcb18222] {
            opacity: .5;
            pointer-events: none
        }

        .Announcement .btn-cancel[data-v-bcb18222] {
            position: absolute;
            top: 63px;
            right: 20px;
            text-align: center;
            width: 46px;
            height: 46px;
            font-weight: 500;
            font-size: 13px;
            color: #333;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAA+ElEQVQ4T5XUXQqCQBAH8BkU6gBBoBcKoaiHevdkvkfQF4nrCXrpGgvdoECZmK1kXddd9XHAnzszfxeFEA8AkFLKbZqmLxjxZFk2jeP4QERzLMvyDAArIiqklJuhGCNRFB0RcUFEV8zzfBIEwelXGIQZSFHX9Rq5kzGYDUmS5K2goVgfwu83kA9zIR2oD+O6Nlg1E25HX3DrRH1tqi9+t2NFrCeyYVxzIU5In8kfcuXM2po5WL21PqwD2bbDkC+0Lci1Yl9oG8iXE1/OFDQE8f0BOAZxYSiEuCDi0pcT85rSZwYAN4buiPisqmpnxt53xzEWhuGeiGYfPa1c1ScgZdEAAAAASUVORK5CYII=) no-repeat 50%;
            background-size: 20px 20px
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .sign[data-v-6d431086] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .7725490196078432);
            z-index: 10
        }

        .sign .close[data-v-6d431086] {
            width: 34px;
            height: 34px;
            float: right;
            margin-top: 34px
        }

        .sign .signT[data-v-6d431086] {
            width: 415px;
            height: 86px;
            margin: auto
        }

        .sign .box-center[data-v-6d431086] {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-60%);
            transform: translateY(-60%);
            width: 433px;
            height: 484px;
            background: url({{asset('public')}}/static/bgi/boom.png) no-repeat top;
            background-size: 100% auto
        }

        .sign .box-center .inner[data-v-6d431086] {
            display: flex;
            justify-content: space-around;
            margin-top: 54px
        }

        .sign .box-center .inner .boxSign[data-v-6d431086] {
            width: 109px;
            height: 144px;
            background: url({{asset('public')}}/static/bgi/open.png) no-repeat top;
            background-size: 100% 100%
        }

        .sign .box-center .Checked[data-v-6d431086] {
            background-color: pink;
            -webkit-animation: mymove-data-v-6d431086 1s infinite;
            animation: mymove-data-v-6d431086 1s infinite
        }

        @-webkit-keyframes mymove-data-v-6d431086 {
            0% {
                -webkit-transform: rotateY(0);
                transform: rotateY(0)
            }
            100% {
                -webkit-transform: rotateY(1turn);
                transform: rotateY(1turn)
            }
        }

        @keyframes mymove-data-v-6d431086 {
            0% {
                -webkit-transform: rotateY(0);
                transform: rotateY(0)
            }
            100% {
                -webkit-transform: rotateY(1turn);
                transform: rotateY(1turn)
            }
        }

        .sign .box-center .txt[data-v-6d431086] {
            text-align: center;
            margin-top: 28px;
            font-weight: 400;
            font-size: 17px;
            color: #fff
        }

        .sign .box-result[data-v-6d431086] {
            width: 100%;
            height: 100%;
            background: url({{asset('public')}}/static/coverImg/duang.png) no-repeat 50%;
            background-size: 100% 100%
        }

        .sign .box-result .closex[data-v-6d431086] {
            position: absolute;
            top: 20%;
            right: 17px;
            width: 34px;
            height: 34px;
            float: right
        }

        .sign .box-result .boxRed[data-v-6d431086] {
            width: 325px;
            height: 415px;
            background: url({{asset('public')}}/static/coverImg/re.png) no-repeat 50%;
            background-size: 100% auto;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .sign .box-result .boxRed > uni-image[data-v-6d431086] {
            width: 259px;
            height: 51px
        }

        .sign .box-result .boxRed > uni-view[data-v-6d431086]:nth-of-type(1) {
            font-weight: 700;
            font-size: 115px;
            color: #f33f31;
            margin-top: 34px
        }

        .sign .box-result .boxRed > uni-view[data-v-6d431086]:nth-of-type(2) {
            font-weight: 700;
            font-size: 34px;
            color: #fdf1e1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            bottom: 50px;
            width: 100%
        }

        .sign .box-result .boxRed > uni-view:nth-of-type(2) uni-image[data-v-6d431086] {
            width: 51px;
            height: 51px;
            margin-right: 6px
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .pages[data-v-5ef3095c] {
            font-family: Regular !important
        }

        .pages .mask[data-v-5ef3095c] {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .3764705882352941);
            top: 0;
            left: 0;
            z-index: 9
        }

        .pages .topBanner[data-v-5ef3095c] {
            display: flex;
            justify-content: space-between;
            width: 398px;
            margin: 0 auto 17px
        }

        .pages .topBanner > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            width: 127px;
            height: 27px
        }

        .pages .topBanner > uni-view:nth-of-type(1) uni-image[data-v-5ef3095c] {
            width: 100%
        }

        .pages .topBanner .bell[data-v-5ef3095c] {
            display: flex;
            align-items: center
        }

        .pages .topBanner .bell uni-image[data-v-5ef3095c] {
            width: 27px;
            height: 27px;
            margin-left: 31px
        }

        .pages .banner[data-v-5ef3095c] {
            width: 398px;
            height: 161px;
            margin: 0 auto
        }

        .pages .banner .backSwiper[data-v-5ef3095c] {
            width: 398px;
            height: 138px;
            border-radius: 11px
        }

        .pages .banner uni-image[data-v-5ef3095c] {
            width: 100%;
            height: 138px
        }

        .pages .center[data-v-5ef3095c] {
            width: 398px;
            height: 41px;
            border-radius: 10px 10px 10px 10px;
            border: 1px solid #bfc4d9;
            text-align: left;
            font-size: 15px;
            line-height: 41px;
            overflow: hidden;
            margin: 10px auto;
            color: #000;
            position: relative
        }

        .pages .center .notice[data-v-5ef3095c] {
            position: absolute;
            left: 17px;
            top: 12px;
            width: 17px;
            height: 17px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAABa0lEQVQ4T7WTu0vCURiGn89rhiEhQbchgy44uARFOaRtLUHYVJBZQdA/UKNrGNRgUARZGK0FQU2K0NDU0BBNRkthJC1BiT/rF0dUXCxB+uAM5/Jw3vO+3xEaKGmA5Td4AAgCM8AacKou0kEeYz6rK5TKlWE70FVSMQYsAaPAFTAIbAEbehiD1uvfF/Q283xqSsEGIA30lGANiAAHpfVLIKVgLT6xDXrA9CU+WUimFdwEfALDQD+wCXRUeVGBC8fj00Yx3cpc4kHtV8NKnhq7teDnvaFmm6XF8pl/z3eu3HzUDWcinqiz3fkKYkPnw9SUaa0bLhoW87VjMVgRycls4qUa9gB9wE4t2drRuN/0LfcSSmXKbzYCauIoefAFrAPHQBaoGJaP+w8Br/lbfBJMPpVzVu4qp1Up11XOLuAcGAGiRdkXk9ZCNncGulbOuVaHeoFFIACsAifq4F3YbXF3O+yyfP32b73955/5AYyubOnjnV/TAAAAAElFTkSuQmCC) no-repeat 50%;
            background-size: 100% auto
        }

        .pages .center .message-box[data-v-5ef3095c] {
            display: block;
            width: 100%;
            text-indent: 46px;
            font-weight: 700;
            letter-spacing: 1px
        }

        .pages .boxBorder[data-v-5ef3095c] {
            position: relative;
            width: 398px;
            height: 161px;
            margin: 27px auto 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between
        }

        .pages .boxBorder .itemBox[data-v-5ef3095c] {
            width: 25%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .pages .boxBorder .itemBox .left-box[data-v-5ef3095c] {
            width: 34px
        }

        .pages .boxBorder .itemBox .left-box > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            width: 34px;
            height: 34px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative
        }

        .pages .boxBorder .itemBox .left-box > uni-view:nth-of-type(1) > uni-view[data-v-5ef3095c] {
            position: absolute;
            width: 27px;
            height: 13px;
            background: #b614ff;
            z-index: 2;
            right: -20px;
            top: -6px;
            font-weight: 500;
            font-size: 20px;
            color: #fff;
            border-radius: 6px 6px 6px 0;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .pages .boxBorder .itemBox .left-box > uni-view:nth-of-type(1) > uni-view uni-text[data-v-5ef3095c] {
            zoom: .5
        }

        .pages .boxBorder .itemBox .left-box > uni-view:nth-of-type(1) uni-image[data-v-5ef3095c] {
            width: 34px;
            height: 34px
        }

        .pages .boxBorder .itemBox > uni-view[data-v-5ef3095c]:nth-of-type(2) {
            font-weight: 400;
            font-size: 13px;
            color: #787b82;
            padding: 13px 0 0 0
        }

        .pages .title[data-v-5ef3095c] {
            font-size: 20px;
            font-family: Bold !important;
            font-weight: 700;
            margin-top: 20px;
            color: #000;
            text-align: center
        }

        .pages .title > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            font-weight: 500;
            font-size: 17px;
            color: #000
        }

        .pages .title > uni-view:nth-of-type(1) uni-text[data-v-5ef3095c] {
            color: #fba342
        }

        .pages .title > uni-view[data-v-5ef3095c]:nth-of-type(2) {
            font-weight: 400;
            font-size: 13px;
            color: #787b82;
            margin-top: 6px
        }

        .pages .bannerList[data-v-5ef3095c] {
            margin: 13px auto
        }

        .pages .bannerList .itemcontent[data-v-5ef3095c] {
            position: relative;
            white-space: nowrap;
            width: 398px;
            background: linear-gradient(180deg, #fff5e2, #fff);
            border-radius: 13px 13px 13px 13px;
            border: 1px solid #edf0ed
        }

        .pages .bannerList .itemcontent .boxShadow[data-v-5ef3095c] {
            width: 398px;
            padding-bottom: 6px;
            position: relative
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox[data-v-5ef3095c] {
            width: 370px;
            margin: auto;
            color: #000;
            border-bottom: 1px solid #d9d9d9
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .contentTxt[data-v-5ef3095c] {
            position: absolute;
            right: 13px;
            top: 13px;
            width: 103px;
            height: 34px;
            background: linear-gradient(90deg, #fbbf41, #fba342);
            border-radius: 51px;
            color: #fff;
            text-align: center;
            line-height: 34px;
            font-weight: 500;
            font-size: 17px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft[data-v-5ef3095c] {
            width: 207px;
            display: flex;
            justify-content: space-between;
            flex-direction: column
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft .txtTittle[data-v-5ef3095c] {
            text-align: left;
            font-weight: 500;
            font-size: 17px;
            color: #000;
            width: 207px;
            display: flex;
            padding-top: 19px;
            padding-bottom: 6px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft .txtTittle uni-image[data-v-5ef3095c] {
            width: 17px;
            height: 17px;
            margin-right: 6px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft .box-thr[data-v-5ef3095c] {
            width: 246px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 400;
            font-size: 13px;
            color: #787b82;
            padding-bottom: 8px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft .box-thr > uni-view[data-v-5ef3095c] {
            display: inline-block;
            width: 1px;
            height: 10px;
            background: #787b82;
            margin: 0 6px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .txtLeft > uni-view[data-v-5ef3095c]:nth-of-type(3) {
            font-weight: 500;
            font-size: 20px;
            color: #000
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .box[data-v-5ef3095c] {
            display: flex;
            font-weight: 400;
            font-size: 13px;
            color: #000;
            margin-top: 6px;
            margin-bottom: 10px
        }

        .pages .bannerList .itemcontent .boxShadow .infoBox .box > uni-image[data-v-5ef3095c] {
            width: 13px;
            height: 13px;
            margin-right: 3px
        }

        .pages .bannerList .txtRight[data-v-5ef3095c] {
            width: 370px;
            margin: 10px auto 9px;
            display: flex
        }

        .pages .bannerList .txtRight .txts[data-v-5ef3095c],
        .pages .bannerList .txtRight .txts2[data-v-5ef3095c] {
            height: 27px;
            border-radius: 6px 6px 6px 6px;
            border: 1px solid #fbbf41;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .pages .bannerList .txtRight .txts > uni-view[data-v-5ef3095c]:nth-of-type(1),
        .pages .bannerList .txtRight .txts2 > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            font-weight: 400;
            font-size: 13px;
            color: #fff;
            height: 27px;
            padding: 0 6px;
            line-height: 27px;
            background: #fbbf41;
            border-radius: 6px 0px 0px 6px
        }

        .pages .bannerList .txtRight .txts > uni-view[data-v-5ef3095c]:nth-of-type(2),
        .pages .bannerList .txtRight .txts2 > uni-view[data-v-5ef3095c]:nth-of-type(2) {
            font-weight: 500;
            font-size: 13px;
            color: #fbbf41;
            padding: 0 10px
        }

        .pages .bannerList .txtRight .txts2[data-v-5ef3095c] {
            margin-left: 13px
        }

        .pages .bannerList .txtRight .txts2 > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            background: #fba342
        }

        .pages .bannerList .txtRight .txts2 > uni-view[data-v-5ef3095c]:nth-of-type(2) {
            color: #fba342
        }

        .pages .signIn[data-v-5ef3095c] {
            position: fixed;
            top: 346px;
            z-index: 5;
            right: 0;
            width: 46px;
            height: 46px;
            background: url({{asset('public')}}/static/icon/turntable.png) no-repeat 50%;
            background-size: 100% auto;
            -webkit-animation: mymove-data-v-5ef3095c 6s infinite;
            animation: mymove-data-v-5ef3095c 6s infinite;
            -webkit-animation-delay: 3s;
            animation-delay: 3s;
            -webkit-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out
        }

        @-webkit-keyframes mymove-data-v-5ef3095c {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            69% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            70% {
                -webkit-transform: rotate(20deg);
                transform: rotate(20deg)
            }
            71% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            72% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }
            73% {
                -webkit-transform: rotate(-15deg);
                transform: rotate(-15deg)
            }
            74% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }
            75% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
        }

        @keyframes mymove-data-v-5ef3095c {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            69% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            70% {
                -webkit-transform: rotate(20deg);
                transform: rotate(20deg)
            }
            71% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            72% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }
            73% {
                -webkit-transform: rotate(-15deg);
                transform: rotate(-15deg)
            }
            74% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }
            75% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
        }

        .pages .connect[data-v-5ef3095c] {
            position: fixed;
            top: 92px;
            z-index: 5;
            right: 0;
            width: 115px;
            height: 115px;
            background: url({{asset('public')}}/static/icon/connect.png) no-repeat 50%;
            background-size: 100% auto
        }

        .sginSuccess[data-v-5ef3095c] {
            margin: 132px auto 0 auto;
            width: 329px;
            height: 381px;
            background: #fff;
            border-radius: 20px 20px 20px 20px;
            text-align: center;
            position: relative;
            color: #000;
            text-align: center
        }

        .sginSuccess .txt-box[data-v-5ef3095c] {
            font-family: Segoe UI;
            font-style: italic
        }

        .sginSuccess .txt-box > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            height: 51px;
            background: url({{asset('public')}}/static/bgi/tt.png) no-repeat top;
            background-size: 259px 51px
        }

        .sginSuccess .txt-box > uni-view[data-v-5ef3095c]:nth-of-type(2) {
            width: 277px;
            height: 115px;
            background: #fff5e2;
            border-radius: 17px 17px 17px 17px;
            border: 1px solid #fba342;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 27px auto 0;
            font-weight: 700;
            font-size: 69px
        }

        .sginSuccess .txt-box > uni-view:nth-of-type(2) uni-text[data-v-5ef3095c] {
            font-style: normal;
            text-transform: none;
            background: linear-gradient(1turn, #fbbf41, #fba342);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .sginSuccess .txt-box > uni-view:nth-of-type(2) uni-image[data-v-5ef3095c] {
            width: 69px
        }

        .sginSuccess .signBox[data-v-5ef3095c] {
            width: 100%;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            margin-top: 17px
        }

        .sginSuccess .signBox .lll[data-v-5ef3095c] {
            font-weight: 500;
            text-align: center;
            font-size: 27px;
            color: #bb6f1c;
            margin: 0 auto
        }

        .sginSuccess .signBox .btnSign[data-v-5ef3095c] {
            width: 277px;
            height: 62px;
            background: #fba342;
            box-shadow: 0px 3px 5px 0px rgba(251, 163, 66, .4);
            border-radius: 51px 51px 51px 51px;
            margin: 27px auto 6px auto;
            white-space: nowrap;
            font-weight: 500;
            font-size: 20px;
            color: #fff;
            line-height: 62px
        }

        .sginSuccess .signBox > uni-view[data-v-5ef3095c]:nth-of-type(3) {
            text-align: center;
            font-weight: 500;
            font-size: 17px;
            color: #787b82
        }

        .sginSuccess .closeR[data-v-5ef3095c] {
            position: absolute;
            right: 0px;
            top: -46px
        }

        .sginSuccess .closeR uni-image[data-v-5ef3095c] {
            width: 34px;
            height: 34px
        }

        .sginSuccess .Small[data-v-5ef3095c] {
            font-size: 13px;
            font-weight: 400;
            color: #7684a3;
            line-height: 16px
        }

        .my-wheel-pop[data-v-5ef3095c] {
            position: absolute;
            top: 115px;
            left: 51px;
            width: 346px;
            height: 506px
        }

        .my-wheel-pop .my-wheel-pop-top[data-v-5ef3095c] {
            width: 294px;
            height: 160px;
            background: url({{asset('public')}}/static/decorate/image2505.png) top no-repeat;
            background-size: 100% auto;
            margin: auto
        }

        .my-wheel-pop .my-wheel-pop-box[data-v-5ef3095c] {
            width: 346px;
            height: 346px;
            background: #f9faff;
            border-radius: 17px;
            border: 9px solid #a1aded
        }

        .my-wheel-pop-title[data-v-5ef3095c] {
            font-weight: 700;
            position: relative;
            margin: 23px auto;
            text-align: center
        }

        .my-wheel-pop-title > uni-view[data-v-5ef3095c]:nth-of-type(1) {
            width: 100%;
            text-align: center;
            font-weight: 900;
            font-size: 27px;
            color: #7c8de5
        }

        .my-wheel-pop-img[data-v-5ef3095c] {
            width: 242px;
            height: 58px;
            margin: auto;
            text-align: center;
            background: #7c8de5;
            border-radius: 34px;
            line-height: 58px;
            color: #fff;
            margin-top: 11px;
            font-weight: 700;
            font-size: 20px
        }

        .valueShow[data-v-5ef3095c] {
            font-size: 28px;
            height: 34px;
            text-align: center;
            font-family: Poppins;
            margin: 8px auto 27px;
            font-weight: 900;
            font-size: 34px;
            color: #fd4646
        }

        .imamge[data-v-5ef3095c] {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAMAAABiM0N1AAAC/VBMVEUAAAD1sAnspA74swj/9IjspQz9ugfnng3zrQr7z0/elRPpog3xqwvvqAvjmQ/6tQf4w0P7twf5xU3mnAvsqBX/2GP21nTjmA3kmg7/64P2vTTxsy7lnhTloiHjnBf8yk31sAfdkw7/5Hj5yUDrowz95on8y07mng3+6Hv4x07+7Yj954rtpQr/6H7qogzmnAvqoAn+6Izkmw/1sAn91V/62Wr+6Iz3sQj+7IvbkRH7tgfxrRX922395Hf8ykv2sQj812P/22f+5Wf0z2f900L7xCTckBD8zFD+4GzekxDonw786Iz+64f82Wz7ylD/3lXipDLflBD0vDz8uAj96Iz+74LuxWDupwvytjb70lj7zlr7yEv+6Iz8yUv8yk/5zW3xqlDtmkfpiDz5ymvslUPwp07URhHtl0XogTjvokvunknnfjb3xWXrkkL2wWL1u13ohTvysFT4yGjqjkD/8oXmezT1vV/ogzr912D81Fv0uVvztFfddBz60XD94W78zlLqij3wpE3qjD/71nTrkEH+7n/92mX3w2T0t1ryrlLxrVHWThT954v84X/603H2v2HcaxrunEj+7Hz833r83Xb95HH93Wj0tVn80Vb7yEz+6HjleDP82Hb932rzslX95IX+8IL8zFH+6nn6z2795oj844P95XP823L4xmf80lj92mL7zVbZXRj71HP91l37z1rvoErbZRvYWBb81GT80FT7y1PfbivZYRj82nj82W/82Gz81Wf80V3qrlPuulvXVBX/9Yn+53XopU3kdjHiiyLyxGPtq0XkfDPidC/hhyH70WDstVf8zVD812nnjzfikCPzyGbwv1/okzzgijzoiDvdgzjggyDwuk3lnEbhkEDffx/eeh73x2jqn0LWaSn80mHlgzbWbyz0zW7poErjlkLpmjvcfTXfcST0tRz53Hz93GXywVf4yFHspUPddTHYdjDTZyn42Xb2y2rjfC7jhCvSZCf3zF7YejPkhy7hfCfsrSX76H7zuljrqknlkEDdwYj7AAAAXHRSTlMA/gf+/v7+/v4P/v7+/v7+/v77Rf0b/nprH/7+/v2WfHJhOf7u4drXuLSMgmBDNigd9e7r4N3Y1s+9vLi3lZSUhzD+/v7+7Ojm2MKydVVB/vXv6ejm4tTU09HNzbvJyZ8AAAhSSURBVFjDlZgFVFNRGMcfKM4NnAp2d3d3d3fHpsNAERBbsTFQsVFMRLHA1pmbOp1Dp5Mx5jYVpMTuzuN344Wbc/o7nuN9cN7v/b/v3vve4zHOKdy9atdG/WoPG7bzSYH6AyqXKF3Dnfl/qldpMMyOJ896NS5U678s+auWt7dQl0XSuLT7P2uqQDkCVgoP9jyTdCgo/heNezescc5OC6hcpyoDrXHFk+KSzj4uPFWhDtestEgkJf4WStzV6al2h20lks41nS+cRnbdeJOuNar1er3amFAgZiXHHqBAcUlvH2ee8oLrr9xZQKvWvt0dvmjRoZCRb7VqlTo9Zg9iJ+FNcYmktBPPSp6YdHVC+Jlt27aBJzw8ZPfIkSMnqlXGJzExMTtjCG+KS6WF/tSfBns4YtKNb8+cOYM1h8JDsGf06Mmg0q7iOVdMKv1Dpko7Od4YE7aBBzSLBJrJ9/dPnKRShaxatZ7yUSqV+jjMO467KgaulG4MZ+OEE89o5Nk/ceLSpZOWabRYsgFhkUrr2M1ddS7w+gTtNl7Dx0GeSZNWrw7Q6DcQ9u3b91Ukrej+W4PKc4G12jOCJgvjIM+0aQEBGtU+lhPFRKISQlFzLm6C1iEOr1kNmoBZyzSqs5RzeUQikaBNrWlY8BhJGjrnNA6rmQaaWcuWzc7Qn0PcunXr/FeRSFBcMzbqSPUi+znnq6KeTbNnB1mnnad4e3p6FuR2PJdUHfL7nI/mm8xqwLMjSGa9cYLy1dOznJgNdI5iTLBv8n0Sh6sKaXYELV+eoXnw4MENRB5PDw8aqfAtwvm2aogDGr47f4wDnjBZ5rMLlHweHuVIl1rhYiGl+i2ZLE6zn48TIIgTFiaTZViPUIp4eHhUw6J6uNYHDz6qUZN3c012jAOaIKyR+fraLLGEyFweHl1wq6FYDOz3EIcl6FhVGNL4LpBbT1Ee58qVqxaqjNb6UR/Cduf7NZaw73wc7CFxFiwYP97kPYJQBESlQDSE1vrMyHXn2m2eh2FoCQrjEM9427VIQh4vL6+msM1iKfr7XHeuXRXyglRFu0M1R/0UmZGRJFJOL6987kwPWulzFdVAd15cF3J1ubAqX6LxWys3Pz81DxH7OGfOnDWYkrRSbz146BJ8cQcIC5gV9PAOItkhDnjWyk2WzcCRAweKgKgQ04JWajFCd+6TJZh8FwhDTU5EI4MgzgLQ4DxyuenHTEJZt5xuLZnKkaRUy2p+zpPvATK0BPHIgD1+hvd37r7/bFiL48jHjv1pnUG46ebm1pSpsGsXLlU1id+gD+cAvmgl45EBzdXnOZRE0CCPIti2hHAARA2ZjrGxuFLVRKzBS5CIwBP0BY38sIcXYY1CsdgcERGxHTiYLZtbXeYILVQzETz0tpO4BkiW+SZ/QYP34PFDg3uGRMP7OcGgAY+//+KsuZRsYGJmUDSCHQEini++AP6JP26yAjTYs/jTxo17MdkA5iAtVEM3KMzVLMMxjkcGPFeJeKwg3SGa4OBXl7dgonMDzK0IAErVrOY3qOE0x7sFeM7l5OhRqgJr/EGzcP6n6Oh1iOi8efNmYzrROjUB4KG3naQ44F3qozjg0Xi8BN/FEU7rSBzwJGWFAlFRUUjUl6m/EYA6Vcv4fZ56HJDLZI/Q//FkJevijhPe4TgL549KNU0hXM6RI0dDptJlUqk+iLsLBqVeBMbKZOPj0GA+2REK3bGLiOPBxDMq1Zr9EqYNiJowzaMBKFSrQnHI/UK3AlDAlkhCg+NymCw85wuPoeNArBkVmKXPnv1SdqAniFoy3UIJBTQ4Dt7oWOSPmozPVMrl85PwZOFfTJ8PnsDAwFfptLR2ICrFVI8iR6FW/i54ZQywGG1Q/xVomDRWNyZOqdMp0dEK0CQFBk4fl/YNnxgV1T5H3hw1GDHkw6jCuNsXFgXjfa5Ew4sK3RgOJY4zfbrOFEUIzQGzDw+kRlAoIiGDe0bEExE02W8sjqTcKvSgOOPGvdSHEtrAcmzCMEyV7KS2b5n4tgP4BscDY/3wjghUIhbGHzu+YsXFOOV08ExHnglpG0JD1yHagagUehxNoaWqNNwzYgFeO+xkcUsQTxb2TJjw0oYXNdAedlotBuhPay2Q6XgXxBuUaMDDayZMTdFuIaC9D5Wh2kIpmgz2UcNr7OKAhnhemi9TysJtjTyyC6+jhNtYDe/xxx6yBPk4U7e+1u5FwPZ67OZW152+GUOpGFUmF8exO0lYQz1K20bKSQhUin3RimbLta110eRxoAFPfNr5uYTt8FCrK6YitHH3YhJMfvbdoU0Wxtl65bV6O2UePNMgEKX1Rha9aa1dHNodVoM9KdYIytPHXl4N3QWvx3NZNCYuDp1zu6qQx7bk6RJCWXiB8GF4xJ3YqBFWE9H4B3NNBo8gzpUU84yDlJleuXK1ZIRU386GXZJh9gcclyCNE//aNoPlMLxjDYTChLSKePqU5lVlJdEmO3bnivJD8mGOIvAe6vAHabMlB1memc0LUZMduxOfkmaZyVEWXkN9GHvE9WdwXEj+ZE7idwTxgEb5ITH2AMfwfOh11pH89UheuNThmc8zX2WlCrqD03wweW8mnAQi83l6FrKXUBPKewD+IZ6/MKe9fKnTIQ9kSfnw6uHzk4h5BOSheRxNg+kF6VW9ryWaX6W9fp2SlmV44Y3OvgnswuTJJyrnwzhDXJlek4eeCYwQUsRTVBHmyzkld/EXHWHHcI7IovCHo4vvLK0rCM50ApRV0YdxhXtJb2cCNk6xOq4++9Cet/B2oREz/4i4ZAUnRRUt1gU+jf0PPVpUcLQU/9+PdbTE7iUrD+3oDeXkydNnUNMShf76+fAXYEMm5n7RhXIAAAAASUVORK5CYII=) no-repeat top;
            background-size: 100% auto;
            width: 83px;
            height: 83px;
            margin: auto;
            text-align: center;
            line-height: 83px
        }

        .maches[data-v-5ef3095c] {
            background: url({{asset('public')}}/static/icon/ticket.png) no-repeat 50%;
            background-size: 100% auto;
            width: 173px;
            height: 83px;
            margin: auto;
            text-align: center;
            line-height: 83px;
            font-weight: 700;
            font-size: 27px;
            color: #f0d9ac
        }

        .mache[data-v-5ef3095c] {
            width: 100%;
            margin: 11px auto;
            color: #000;
            display: flex;
            justify-content: center
        }

        .mache uni-image[data-v-5ef3095c] {
            width: 173px;
            margin: auto
        }</style>

    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">
        .fixTop[data-v-4e99b1b2] {
            width: 100%;
            height: 113px;
            z-index: 9
        }

        .borLine[data-v-4e99b1b2] {
            width: 398px;
            text-align: center;
            margin: 17px auto 0;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            position: relative
        }

        .borLine .bannerShow[data-v-4e99b1b2] {
            width: 398px;
            height: 115px;
            background: linear-gradient(90deg, #fbbf41, #fba342);
            border-radius: 17px;
            color: #fff;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 3
        }

        .borLine .bannerShow .balance[data-v-4e99b1b2] {
            font-weight: 400;
            font-size: 17px;
            color: #fff
        }

        .borLine .bannerShow .Account[data-v-4e99b1b2] {
            font-size: 28px;
            height: 46px;
            margin-top: 10px;
            line-height: 46px
        }

        .borLine .bannerShow2[data-v-4e99b1b2] {
            width: 363px;
            height: 115px;
            background: #fba342;
            border-radius: 23px 23px 23px 23px;
            opacity: .3;
            position: absolute;
            top: 13px;
            left: 17px;
            z-index: 2
        }

        .borLine .bannerShow3[data-v-4e99b1b2] {
            width: 329px;
            height: 115px;
            background: #ffdeba;
            border-radius: 23px 23px 23px 23px;
            opacity: .3;
            position: absolute;
            top: 27px;
            left: 34px;
            z-index: 1
        }

        .box-func[data-v-4e99b1b2] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 304px;
            margin: 48px auto
        }

        .box-func .box-over > uni-view[data-v-4e99b1b2]:nth-of-type(1) {
            background: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 69px;
            height: 69px;
            border-radius: 50%
        }

        .box-func .box-over > uni-view:nth-of-type(1) uni-image[data-v-4e99b1b2] {
            width: 41px;
            height: 41px
        }

        .box-func .box-over > uni-view[data-v-4e99b1b2]:nth-of-type(2) {
            font-weight: 500;
            font-size: 17px;
            color: #000;
            margin-top: 10px
        }

        .amount[data-v-4e99b1b2] {
            font-size: 17px;
            position: relative;
            z-index: 2;
            width: 398px;
            padding: 20px 0 17px 0;
            border-top: 1px solid #d9d9d9
        }

        .amount .box[data-v-4e99b1b2] {
            width: 398px;
            margin-top: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-weight: 400;
            font-size: 17px;
            color: #000
        }

        .amount .box > uni-image[data-v-4e99b1b2] {
            width: 100%;
            height: 6px
        }

        .amount .box .right[data-v-4e99b1b2] {
            height: 62px;
            border-radius: 13px;
            border: 1px solid #fba342;
            color: #000;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            margin-top: 13px
        }

        .amount .box .right .left[data-v-4e99b1b2] {
            width: 34px;
            height: 34px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAADvUlEQVRIS72XXUxbZRzGf/8yKAwK0nZmUTNgLjNxSzYHatQZR4J8bG6wjLFkBjMTEzaMXGi80Au/LvTCqAlsQE2M8WNmYSbOxTlhZGwRiQiLznnhBowYBQu0lBZcKbR9zWkHghV4u4DvXXue5/md9z3nPec5gsZQX5eYx/8KFyt4XCAP2AByGwoBRpWo60CXKGmxpEmz7DwbWCrWMC44VFNBho+E50V4FsS2VFj0uBoF5bCkJL4tT5zxLORZEOxtKjooQq0+MAYxopR6IaOi+ZP/gseAux25iRuttjowVenNcHGVQjX2jLpq8qouTc9VzgNHoJn2zxHZsxzQ2QylTl/zuMrnwueBvSeLGgQ5vKzQmbBw2JF+oGU2exbsbSqqFJGPVwR6M1Qp9WRGRfNnxs8IWH21K3PcH7oKrFlJMCi3RYXulopWbwTsO1n4JpheWlnozc2m1BsZFc2vSv+HO5JtaeYBEOv/Aka501NNd0rwesueoH/oy3ihfv80fv8UVmtqvFZWWdaWiVLqKBhPJr0x+KeXjz7tIN2SwurVSbhHJ8jOslO+d5teQFR1zAB3Ag/ouFzuCY42XOBQ5UOkpCQxOOghO8vG5St/0Ns3wjNPb9eJMTSdBngEsOs46h0XKN+by6BzjJ8u/87ERID1OWvIvW8dX5z+kf378rDpLb3bAIcAkw64rqEtsqQ/dPXT3tHHz78MsLNoE4UF9zI5OY1zyEdJ0WadqJABDgIJOur3alsp3b2Fi+09fNfRx8DgGI8+soFdxZuZDATxeG5QXLhJJypsgF2A1ivv/Q++jcxoeMRH96XfCAbDZK2zsXXLXZw5e4V9Zduw29N0wC4D/D3woI7a5/NTV9/Ggf15kZvLOeQlJ8vGtd5hfr3q5FDlwzoxhqYr7u00PDLO8ROdmJNWkZychNd7g5wcO2W7t+pCo9vpRM/50v5x56l4XIZ2OhgiEAiSlmqO10q2ZW2pUFtiJjEwgOhd57gpsYZRpsx3RF+Ljfmvg7yyDKEaEeotDre9HAU7CjIIh/tWfNbGw0pN30N1u+efBlKffxCTHNc45VuXqNBTHLkYKX/zy15DfiMiy1LyYs4uTCPV54/M/D8f7MhNJJy+ImUPk6+cOU0ztldH4XXLNnOlHJh8z82Fxi713PVpeKwSTO8gcms9TOFGqRqq2yLl7t9j0U8Y6rdnYkp8ESLXXa8aGUBRx5CEd6lq9S50Jy4OnnG9tiOZ26UQE4Uo7kdYjxIrgkIxhqheoBs4x1TyN9Qs/dH2N+JxZP0baVaZAAAAAElFTkSuQmCC) no-repeat 50%;
            background-size: 34px 34px;
            margin-top: 13px;
            margin-left: 13px
        }

        .amount .box .right uni-input[data-v-4e99b1b2] {
            width: 323px;
            height: 62px;
            line-height: 62px;
            text-align: left;
            font-weight: 400;
            font-size: 20px
        }

        .amount .box .right .Ptxt[data-v-4e99b1b2] {
            color: #999;
            line-height: 51px
        }

        .amount .boxBox[data-v-4e99b1b2] {
            display: flex;
            flex-wrap: wrap;
            margin-top: 17px;
            font-size: 17px;
            color: #999;
            justify-content: space-between
        }

        .amount .boxBox .boxItem[data-v-4e99b1b2] {
            text-align: center;
            width: 22%;
            height: 27px;
            margin-right: 5px;
            line-height: 27px;
            background: #eee;
            border-radius: 17px;
            margin-bottom: 13px
        }

        .amount .boxBox .boxHide[data-v-4e99b1b2] {
            opacity: 0
        }

        .amount .boxBox .light[data-v-4e99b1b2] {
            background: #fba342;
            color: #fff
        }

        .title[data-v-4e99b1b2] {
            font-size: 20px;
            padding: 13px 0;
            color: #000
        }

        .title uni-image[data-v-4e99b1b2] {
            width: 27px;
            height: 27px;
            vertical-align: middle;
            margin-right: 10px
        }

        .btnConfirm[data-v-4e99b1b2] {
            line-height: 62px;
            text-align: center;
            margin: auto;
            width: 381px;
            height: 62px;
            position: relative;
            top: -18px;
            background: #fba342;
            border-radius: 20px 20px 20px 20px;
            font-weight: 500;
            font-size: 20px;
            color: #fff
        }

        .boxBottom[data-v-4e99b1b2] {
            border-radius: 34px;
            padding: 17px 0
        }

        .boxBottom .titles[data-v-4e99b1b2] {
            height: 27px;
            font-size: 17px;
            color: #000;
            line-height: 27px
        }

        .boxBottom .boxW[data-v-4e99b1b2] {
            padding: 5px 0;
            color: #000;
            font-size: 17px;
            color: #9d9d9d
        }

        .box-bor[data-v-4e99b1b2] {
            width: 398px;
            border-radius: 13px 13px 13px 13px;
            border: 1px solid #d9d9d9;
            margin: auto;
            padding-bottom: 27px
        }

        .box-bor .title[data-v-4e99b1b2] {
            font-weight: 400;
            font-size: 17px;
            color: #000;
            display: flex;
            align-items: center
        }

        .box-bor .title uni-image[data-v-4e99b1b2] {
            width: 27px;
            height: 27px;
            margin: 0 17px 0 13px
        }

        .buttonBox .button[data-v-4e99b1b2] {
            width: 370px;
            height: 51px;
            margin: auto;
            line-height: 51px;
            font-weight: 500;
            font-size: 17px;
            color: #000;
            position: relative;
            display: flex;
            justify-content: space-between
        }

        .buttonBox .button uni-image[data-v-4e99b1b2] {
            width: 17px;
            height: 17px;
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: 3
        }

        .buttonBox .button .uncheck[data-v-4e99b1b2] {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #999
        }

        .buttonBox .button .checked[data-v-4e99b1b2] {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #000;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 13px
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">@charset "UTF-8";
        /**
     * 这里是uni-app内置的常用样式变量
     *
     * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量
     * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App
     *
     */
        /**
     * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能
     *
     * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件
     */
        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        .pages[data-v-248ff974] {
            background-color: #fff;
            height: 100%
        }

        .pages .tops[data-v-248ff974] {
            display: flex;
            justify-content: space-between;
            width: 398px;
            margin: 0 auto 17px;
            font-weight: 500;
            font-size: 24px;
            color: #000
        }

        .pages .tops > uni-view[data-v-248ff974]:nth-of-type(1) {
            width: 127px;
            height: 27px
        }

        .pages .tops > uni-view:nth-of-type(1) uni-image[data-v-248ff974] {
            width: 100%
        }

        .pages .tops .bell[data-v-248ff974] {
            display: flex;
            align-items: center
        }

        .pages .tops .bell uni-image[data-v-248ff974] {
            width: 27px;
            height: 27px;
            margin-left: 31px
        }

        .pages .topBanner[data-v-248ff974] {
            width: 100%;
            position: relative;
            color: #000
        }

        .pages .topBanner .signUp[data-v-248ff974] {
            width: 398px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: auto
        }

        .pages .topBanner .signUp .imageBox[data-v-248ff974] {
            box-shadow: 0 0 5px #c2c2c2;
            border-radius: 50%
        }

        .pages .topBanner .signUp .imageBox uni-image[data-v-248ff974] {
            width: 69px;
            height: 69px;
            border-radius: 50%
        }

        .pages .topBanner .signUp .box[data-v-248ff974] {
            text-align: left
        }

        .pages .topBanner .signUp .box > uni-view[data-v-248ff974]:nth-of-type(1) {
            font-weight: 500;
            font-size: 27px;
            color: #000
        }

        .pages .topBanner .signUp .box > uni-view[data-v-248ff974]:nth-of-type(2) {
            font-weight: 400;
            font-size: 17px;
            color: #000;
            margin-top: 13px
        }

        .pages .wallet-box1[data-v-248ff974],
        .pages .wallet-box2[data-v-248ff974] {
            width: 100%;
            height: 195px;
            background: url({{asset('public')}}/static/bgi/box1.png) no-repeat top;
            background-size: 100% auto;
            position: relative
        }

        .pages .wallet-box1 .box-value[data-v-248ff974],
        .pages .wallet-box2 .box-value[data-v-248ff974] {
            width: 342px;
            margin: auto;
            padding-top: 19px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff
        }

        .pages .wallet-box1 .box-value > uni-view[data-v-248ff974]:nth-of-type(1),
        .pages .wallet-box2 .box-value > uni-view[data-v-248ff974]:nth-of-type(1) {
            display: flex;
            align-items: center;
            font-weight: 500;
            font-size: 13px
        }

        .pages .wallet-box1 .box-value > uni-view:nth-of-type(1) uni-text[data-v-248ff974],
        .pages .wallet-box2 .box-value > uni-view:nth-of-type(1) uni-text[data-v-248ff974] {
            display: inline-block;
            width: 49px;
            height: 32px
        }

        .pages .wallet-box1 .box-value > uni-view:nth-of-type(1) uni-image[data-v-248ff974],
        .pages .wallet-box2 .box-value > uni-view:nth-of-type(1) uni-image[data-v-248ff974] {
            width: 27px;
            height: 27px;
            margin-right: 6px
        }

        .pages .wallet-box1 .box-value > uni-view[data-v-248ff974]:nth-of-type(2),
        .pages .wallet-box2 .box-value > uni-view[data-v-248ff974]:nth-of-type(2) {
            font-weight: 500;
            font-size: 27px
        }

        .pages .wallet-box1 .box-func[data-v-248ff974],
        .pages .wallet-box2 .box-func[data-v-248ff974] {
            display: flex;
            align-items: center;
            justify-content: space-around;
            width: 305px;
            margin: 17px auto
        }

        .pages .wallet-box1 .box-func uni-view[data-v-248ff974],
        .pages .wallet-box2 .box-func uni-view[data-v-248ff974] {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 69px;
            height: 69px;
            background: hsla(0, 0%, 100%, .3);
            border-radius: 50%
        }

        .pages .wallet-box1 .box-func uni-view uni-image[data-v-248ff974],
        .pages .wallet-box2 .box-func uni-view uni-image[data-v-248ff974] {
            width: 41px;
            height: 41px
        }

        .pages .wallet-box1 .box-btn[data-v-248ff974],
        .pages .wallet-box2 .box-btn[data-v-248ff974] {
            width: 193px;
            height: 41px;
            background: #bb6f1c;
            border-radius: 27px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 400;
            font-size: 17px;
            left: 119px;
            bottom: 0;
            color: #fff
        }

        .pages .wallet-box1 .box-btn uni-image[data-v-248ff974],
        .pages .wallet-box2 .box-btn uni-image[data-v-248ff974] {
            width: 17px;
            height: 17px;
            margin-right: 6px
        }

        .pages .wallet-box2[data-v-248ff974] {
            background: url({{asset('public')}}/static/bgi/box2.png) no-repeat top;
            background-size: 100% auto;
            margin-top: 17px
        }

        .pages .wallet-box2 .box-btn[data-v-248ff974] {
            background: #878d9b
        }

        .pages .boxBorder[data-v-248ff974] {
            position: relative;
            width: 398px;
            margin: 27px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between
        }

        .pages .boxBorder .itemBox[data-v-248ff974] {
            width: 25%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .pages .boxBorder .itemBox .left-box[data-v-248ff974] {
            width: 58px
        }

        .pages .boxBorder .itemBox .left-box > uni-view[data-v-248ff974]:nth-of-type(1) {
            width: 58px;
            height: 58px;
            background: var(--bgcc);
            border-radius: 13px 13px 13px 13px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .pages .boxBorder .itemBox .left-box > uni-view:nth-of-type(1) uni-image[data-v-248ff974] {
            width: 34px;
            height: 34px
        }

        .pages .boxBorder .itemBox > uni-view[data-v-248ff974]:nth-of-type(2) {
            font-weight: 400;
            font-size: 17px;
            color: #787b82;
            padding: 11px 0 20px
        }

        .pages .btnOut[data-v-248ff974] {
            width: 346px;
            height: 51px;
            border-radius: 17px;
            border: 1px solid #2d3132;
            margin: auto;
            color: #2d3132;
            text-align: center;
            line-height: 51px;
            margin-top: 20px
        }

        .pages .mask[data-v-248ff974] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 900;
            background-color: rgba(0, 0, 0, .788235294117647)
        }

        .pages .Card[data-v-248ff974] {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 999;
            width: 346px;
            background: #fff;
            border-radius: 11px;
            color: #162645;
            overflow: hidden
        }

        .pages .Card uni-view[data-v-248ff974] {
            width: 346px;
            margin: auto;
            text-align: center;
            color: #000
        }

        .pages .Card .d1[data-v-248ff974] {
            font-size: 21px;
            margin: 13px auto;
            text-align: center
        }

        .pages .Card .d2[data-v-248ff974] {
            width: 80%;
            font-size: 17px;
            padding-bottom: 21px
        }

        .pages .Card .yes[data-v-248ff974] {
            line-height: 62px;
            font-size: 20px;
            color: #fff;
            width: 277px;
            height: 62px;
            background: #fba342;
            box-shadow: 0px 3px 5px 0px rgba(251, 163, 66, .4);
            border-radius: 51px 51px 51px 51px;
            text-align: center
        }

        .pages .Card .no[data-v-248ff974] {
            width: 50%;
            height: 51px;
            line-height: 51px;
            color: #999;
            font-size: 17px;
            text-align: center
        }

        .pages .my-signIn-pop[data-v-248ff974] {
            width: 329px;
            margin: 0 auto;
            margin-top: 138px;
            position: relative;
            text-align: center
        }

        .pages .my-signIn-pop > uni-view[data-v-248ff974]:nth-child(1) {
            font-size: 0
        }

        .pages .my-signIn-pop > uni-view:nth-child(1) uni-image[data-v-248ff974] {
            width: 329px;
            height: 109px
        }

        .pages .my-signIn-pop > uni-view[data-v-248ff974]:nth-child(2) {
            background: #fff;
            border-radius: 0 0 11px 11px;
            padding: 28px 26px
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view[data-v-248ff974]:nth-child(1) {
            font-family: Aptos-Bold;
            color: #111;
            font-size: 20px
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view[data-v-248ff974]:nth-child(2) {
            font-family: Aptos;
            color: #111;
            font-size: 16px;
            font-weight: 600
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view:nth-child(2) > uni-view[data-v-248ff974] {
            max-width: 183px;
            margin: 22px auto
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view:nth-child(2) > uni-view uni-image[data-v-248ff974] {
            width: 95px;
            height: 79px
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view:nth-child(2) > uni-view uni-text[data-v-248ff974] {
            font-family: Aptos-Bold;
            font-size: 17px;
            color: #2867b2;
            margin: 0 5px
        }

        .pages .my-signIn-pop > uni-view:nth-child(2) > uni-view[data-v-248ff974]:nth-child(3) {
            height: 43px;
            line-height: 43px;
            background: #ffed00;
            border: 1px solid #d9d9d9;
            text-align: center;
            font-family: Aptos-ExtraBold;
            color: #070a30;
            font-size: 18px;
            font-weight: 600
        }

        .pages .my-signIn-pop > uni-view[data-v-248ff974]:nth-child(3) {
            position: absolute;
            width: 28px;
            height: 28px;
            background: url({{asset('public')}}/static/yunta/image/home/cl.png) no-repeat;
            background-size: 100% 100%;
            right: 0;
            top: -46px
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">.refreshBox[data-v-73afa0ce] {
            margin: 0 auto;
            width: 100%;
            height: 57px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            max-height: 173px;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            -webkit-transform: translateY(-57px);
            transform: translateY(-57px)
        }

        .animationSmall[data-v-73afa0ce] {
            -webkit-animation: small-data-v-73afa0ce 1.1s both;
            animation: small-data-v-73afa0ce 1.1s both
        }

        @-webkit-keyframes small-data-v-73afa0ce {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            20% {
                -webkit-transform: scale(1.4);
                transform: scale(1.4)
            }
            100% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
        }

        @keyframes small-data-v-73afa0ce {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            20% {
                -webkit-transform: scale(1.4);
                transform: scale(1.4)
            }
            100% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
        }

        .refreshText[data-v-73afa0ce] {
            width: 86px;
            height: 15px;
            font-size: 13px;
            line-height: 15px;
            text-align: center;
            border-radius: 15px
        }

        .refresh[data-v-73afa0ce] {
            min-width: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 28px;
            background: #fff;
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, .1);
            border-radius: 28px
        }

        .refreshCirle[data-v-73afa0ce] {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            border: 3px solid #000;
            border-bottom-color: transparent;
            border-top-color: transparent
        }

        .animation[data-v-73afa0ce] {
            -webkit-animation: rotate-data-v-73afa0ce 1.1s infinite;
            animation: rotate-data-v-73afa0ce 1.1s infinite;
            -webkit-animation-timing-function: cubic-bezier(.3, 1.65, .7, -.65);
            animation-timing-function: cubic-bezier(.3, 1.65, .7, -.65)
        }

        @-webkit-keyframes rotate-data-v-73afa0ce {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        @keyframes rotate-data-v-73afa0ce {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        .true[data-v-73afa0ce] {
            color: #000
        }

        .iconRefreshed[data-v-73afa0ce] {
            width: 19px;
            height: 19px
        }

        .floter[data-v-73afa0ce] {
            width: 100%;
            height: 57px;
            line-height: 57px;
            opacity: .5;
            margin-bottom: 57px;
            text-align: center
        }

        .noCard[data-v-73afa0ce] {
            width: 90%;
            height: 57px;
            margin: auto;
            /* margin-bottom: 100upx; */
            /* background-color: white; */
            display: flex;
            align-items: center;
            justify-content: center;
            color: hsla(0, 0%, 67.5%, .5843137254901961);
            /* box-shadow: 0 0 10upx 0 rgba(0, 0, 0, 0.10); */
            border-radius: 5px
        }

        /* 回到顶部的按钮 */
        .totop[data-v-73afa0ce] {
            z-index: 9990;
            position: fixed !important;
            /* 避免编译到H5,在多mescroll中定位失效 */
            right: 11px;
            bottom: 69px;
            width: 41px;
            height: 41px;
            border-radius: 50%;
            opacity: 1
        }

        .fade-in[data-v-73afa0ce] {
            -webkit-animation: mescrollFadeIn .3s linear forwards;
            animation: mescrollFadeIn .3s linear forwards
        }</style>
    <style type="text/css">
        .pages .fixedTop[data-v-7ddd6d44] {
            height: 152px
        }

        .pages .fixedTop .fixA[data-v-7ddd6d44] {
            position: relative
        }

        .pages .fixedTop .fixA .lfToast[data-v-7ddd6d44] {
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: space-between;
            line-height: 41px;
            width: 398px;
            border-radius: 10px;
            margin-top: 11px
        }

        .pages .fixedTop .fixA .lfToast > uni-view[data-v-7ddd6d44] {
            width: 92px;
            height: 41px;
            font-size: 17px;
            background: rgba(254, 165, 67, .5333333333333333);
            border-radius: 10px 10px 10px 10px
        }

        .pages .fixedTop .fixA .lfToast .light[data-v-7ddd6d44] {
            width: 92px;
            height: 41px;
            background: #00afcb;
            border-radius: 0;
            position: relative;
        }

        .pages .fixedTop .fixA .lfToast .light uni-view[data-v-7ddd6d44] {
            position: absolute;
            bottom: -6px;
            left: 32px;
            content: "";
            border-top: 8px solid #00afcb;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
        }

        .pages .boxAll[data-v-7ddd6d44] {
            width: 398px;
            margin: 0 auto 0;
            background: #fff;
            border-radius: 13px 13px 13px 13px
        }

        .pages .itemBox[data-v-7ddd6d44] {
            width: 370px;
            height: 69px;
            margin: 10px auto;
            color: #000;
            border-bottom: 1px solid rgba(0, 0, 0, .1)
        }

        .pages .itemBox uni-image[data-v-7ddd6d44] {
            width: 41px;
            height: 41px;
            border-radius: 50%
        }

        .pages .itemBox .itemLeft[data-v-7ddd6d44] {
            display: flex;
            text-align: left
        }

        .pages .itemBox .itemLeft .l1[data-v-7ddd6d44] {
            font-weight: 500;
            font-size: 17px;
            width: 100%
        }

        .pages .itemBox .itemLeft .l2[data-v-7ddd6d44] {
            margin-top: 10px;
            font-weight: 400;
            font-size: 13px;
            color: rgba(0, 0, 0, .6);
            width: 100%
        }

        .pages .itemBox .itemRight[data-v-7ddd6d44] {
            font-weight: 500;
            text-align: right;
            font-size: 17px
        }

        .pages .itemBox .itemRight > uni-view[data-v-7ddd6d44]:nth-of-type(1) {
            color: #000;
            font-size: 13px;
            margin-bottom: 6px
        }

        .pages .come[data-v-7ddd6d44] {
            -webkit-animation: comming-data-v-7ddd6d44 .3s ease-in-out;
            animation: comming-data-v-7ddd6d44 .3s ease-in-out
        }

        .pages .leave[data-v-7ddd6d44] {
            pointer-events: none;
            -webkit-animation: leaving-data-v-7ddd6d44 .3s ease-in-out;
            animation: leaving-data-v-7ddd6d44 .3s ease-in-out
        }

        @-webkit-keyframes comming-data-v-7ddd6d44 {
            0% {
                opacity: .5
            }
            100% {
                opacity: 1
            }
        }

        @keyframes comming-data-v-7ddd6d44 {
            0% {
                opacity: .5
            }
            100% {
                opacity: 1
            }
        }

        @-webkit-keyframes leaving-data-v-7ddd6d44 {
            0% {
                opacity: 1
            }
            100% {
                opacity: .5
            }
        }

        @keyframes leaving-data-v-7ddd6d44 {
            0% {
                opacity: 1
            }
            100% {
                opacity: .5
            }
        }

        .pages .itenBox[data-v-7ddd6d44] {
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 4;
            height: 363px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            background: #fff;
            color: #162645;
            border-radius: 28px
        }

        .pages .itenBox .n1[data-v-7ddd6d44] {
            height: 16px;
            font-size: 13px;
            line-height: 16px;
            text-align: center;
            margin-top: 34px
        }

        .pages .itenBox .n2[data-v-7ddd6d44] {
            height: 48px;
            font-size: 41px;
            font-weight: 500;
            color: #fea543;
            line-height: 48px;
            text-align: center;
            margin-top: 13px
        }

        .pages .itenBox .line[data-v-7ddd6d44] {
            width: 90%;
            margin: auto;
            height: 1px;
            background: #c5c5c5;
            margin: 27px auto
        }

        .pages .itenBox .flexBetween[data-v-7ddd6d44] {
            margin: 17px auto
        }

        .maskShow[data-v-7ddd6d44] {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .3764705882352941);
            z-index: 3
        }
        .backBar[data-v-638835ae] {
            width: 100%;
            margin-left: 17px;
        }
        .backBar .lineBox[data-v-638835ae] {
            width: 90%;
            height: 50px;
            line-height: 50px;
            margin: auto;
        }
        .auto90 {
            margin: auto;
            width: 90%;
        }
        .pages .fixedTop .fixA .lfToast > uni-view[data-v-7ddd6d44] {
            width: 24%;
            height: 41px;
            font-size: 17px;
            background: rgba(254, 165, 67, .5333333333333333);
            border-radius: 0;
        }
        .pages .boxAll[data-v-7ddd6d44] {
            width: 90%;
            margin: 0 auto 0;
            background: #fff;
            border-radius: 13px 13px 13px 13px;
        }
        .pages .itemBox[data-v-7ddd6d44] {
            width: 90%;
            height: 69px;
            margin: 10px auto;
            color: #000;
            border-bottom: 1px solid rgba(0, 0, 0, .1);
        }
        uni-view.itemRight.Blod {
            display: flex;
            flex-flow: column;
        }
        .pages {
            background: radial-gradient(#0C3C78 0%, #090030 100%);
        }
        .pages .itemBox[data-v-7ddd6d44] {
            color: rgba(37, 204, 63, 1);
        }
        .pages .itemBox .itemLeft .l2[data-v-7ddd6d44] {
            color: #000;
        }
        uni-view.title.Bold {
            color: #000;
        }
        uni-view.back {
            filter: invert(1);
        }
        .pages .fixedTop .fixA .lfToast > uni-view[data-v-7ddd6d44] {
            background: #04879C;
        }
        .pages {
            background: rgba(239, 241, 243, 1);
        }
        uni-view.title.Bold {
            color: #000;
        }
        uni-image {
            filter: invert(1);
        }
        .pages .fixedTop .fixA .lfToast > uni-view[data-v-7ddd6d44] {
            background: rgba(29, 203, 255, 1);
        }
        .pages {
            background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
            background-attachment: fixed;
            background-size: cover;
        }
        uni-view.title.Bold {
            color: #fff;
        }
    </style>
</head>
<body class="uni-body pages-mine-bill" style="overflow: visible;">
<uni-app class="uni-app--maxwidth">
    <uni-page>
        <uni-page-wrapper>
            <uni-page-body>
                <uni-view data-v-7ddd6d44="" class="pages">
                    <uni-view data-v-7b388d2f="" data-v-7ddd6d44=""></uni-view>
                    <uni-view data-v-7ddd6d44="" class="fixedTop">
                        <uni-view data-v-638835ae="" data-v-7ddd6d44="" class="bar">
                            <uni-view data-v-638835ae="" class="backBar">
                                <uni-view data-v-638835ae="" style="height: 50px;"></uni-view>
                                <uni-view data-v-638835ae="" class="lineBox flexBetween white">
                                    <uni-view data-v-638835ae="" class="ke">
                                        <uni-view data-v-638835ae="" class="back" onclick="window.location.href='{{route('profile')}}'">
                                            <img style="width: 30px;margin-right: 20px;filter: invert(1)" src="https://img.icons8.com/external-inkubators-detailed-outline-inkubators/50/external-left-chevron-arrows-inkubators-detailed-outline-inkubators.png">
                                        </uni-view>
                                        <uni-view data-v-638835ae="" class="title Bold">Transaction History</uni-view>
                                    </uni-view>
                                    <uni-view data-v-638835ae="" class="bell">

                                    </uni-view>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-7ddd6d44="" class="fixA flexStart auto90">
                            <uni-view data-v-7ddd6d44="" class="lfToast Blod rds30 ">
                                <uni-view data-v-7ddd6d44="" class="light tabMenuItem" onclick="tabMenu(this, 'all')">All
                                    <uni-view data-v-7ddd6d44=""></uni-view>
                                </uni-view>
                                <uni-view data-v-7ddd6d44="" class="tabMenuItem" onclick="tabMenu(this, 'recharge')">Recharge
                                    <uni-view data-v-7ddd6d44=""></uni-view>
                                </uni-view>
                                <uni-view data-v-7ddd6d44="" class="tabMenuItem" onclick="tabMenu(this, 'withdraw')">Withdraw
                                    <uni-view data-v-7ddd6d44=""></uni-view>
                                </uni-view>
                                <uni-view data-v-7ddd6d44="" class="tabMenuItem" onclick="tabMenu(this, 'reword')">Reward
                                    <uni-view data-v-7ddd6d44=""></uni-view>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                    </uni-view>
                    <uni-view data-v-7ddd6d44="" class="boxAll" style="height: 586px;">
                        <uni-view data-v-73afa0ce="" data-v-7ddd6d44="">
                            <uni-view data-v-73afa0ce="">
                                <uni-scroll-view data-v-73afa0ce="" style="height: 586px;">
                                    <div class="uni-scroll-view">
                                        <div class="uni-scroll-view" style="overflow: hidden auto;">
                                            <div class="uni-scroll-view-content">
                                                <uni-view data-v-73afa0ce="" id="topId"></uni-view>
                                                <div class="all">
                                                    @foreach(\App\Models\UserLedger::where('user_id', auth()->id())->orderByDesc('id')->get() as $element)
                                                        <uni-view data-v-7ddd6d44="" class="flexBetween  itemBox">
                                                            <uni-view data-v-7ddd6d44="" class="itemLeft">
                                                                <uni-view data-v-7ddd6d44="" class="flexBetween flexColumn">
                                                                    <uni-view data-v-7ddd6d44="" class="l1">{{$element->reason}}
                                                                    </uni-view>
                                                                    <uni-view data-v-7ddd6d44="" class="l2 Small">{{$element->created_at}}
                                                                    </uni-view>
                                                                </uni-view>
                                                            </uni-view>
                                                            <uni-view data-v-7ddd6d44="" class="itemRight Blod ">
                                                                <uni-view data-v-7ddd6d44="" style="color: rgb(254, 165, 67);">
                                                                    <uni-text data-v-7ddd6d44="" style="margin-right: 2px;">
                                                                        <span>+</span></uni-text>
                                                                    {{price($element->amount)}}
                                                                </uni-view>
                                                                <uni-view data-v-7ddd6d44="">Balance: {{price(user()->balance)}}</uni-view>
                                                            </uni-view>
                                                        </uni-view>
                                                    @endforeach
                                                </div>

                                                <div class="deposit" style="display: none">
                                                    @foreach(\App\Models\Deposit::where('user_id', auth()->id())->orderByDesc('id')->get() as $element)
                                                        <uni-view data-v-7ddd6d44="" class="flexBetween  itemBox">
                                                            <uni-view data-v-7ddd6d44="" class="itemLeft">
                                                                <uni-view data-v-7ddd6d44="" class="flexBetween flexColumn">
                                                                    <uni-view data-v-7ddd6d44="" class="l1">Deposit</uni-view>
                                                                    <uni-view data-v-7ddd6d44="" class="l2 Small">{{$element->created_at}}</uni-view>
                                                                </uni-view>
                                                            </uni-view>
                                                            <uni-view data-v-7ddd6d44="" class="itemRight Blod ">
                                                                <uni-view data-v-7ddd6d44="" style="color: rgb(254, 165, 67);">
                                                                    <uni-text data-v-7ddd6d44="" style="margin-right: 2px;">
                                                                        <span>+</span></uni-text>
                                                                    {{price($element->amount)}}
                                                                </uni-view>
                                                                <uni-view data-v-7ddd6d44="">Status:
                                                                    @if($element->status == 'approved')
                                                                        Finished
                                                                    @elseif($element->status == 'rejected')
                                                                        Failed
                                                                    @elseif($element->status == 'pending' || $element->status == 'processing')
                                                                        Processing
                                                                    @endif
                                                                </uni-view>
                                                            </uni-view>
                                                        </uni-view>
                                                    @endforeach
                                                </div>
                                                <div class="withdraw" style="display: none">
                                                    @foreach(\App\Models\Withdrawal::where('user_id', auth()->id())->orderByDesc('id')->get() as $element)
                                                        <uni-view data-v-7ddd6d44="" class="flexBetween  itemBox">
                                                            <uni-view data-v-7ddd6d44="" class="itemLeft">
                                                                <uni-view data-v-7ddd6d44="" class="flexBetween flexColumn">
                                                                    <uni-view data-v-7ddd6d44="" class="l1">Withdrawal</uni-view>
                                                                    <uni-view data-v-7ddd6d44="" class="l2 Small">{{$element->created_at}}</uni-view>
                                                                </uni-view>
                                                            </uni-view>
                                                            <uni-view data-v-7ddd6d44="" class="itemRight Blod ">
                                                                <uni-view data-v-7ddd6d44="" style="color: rgb(254, 165, 67);">
                                                                    <uni-text data-v-7ddd6d44="" style="margin-right: 2px;">
                                                                        <span>-</span></uni-text>
                                                                    {{price($element->amount)}}
                                                                </uni-view>
                                                                <uni-view data-v-7ddd6d44="">Status:
                                                                    @if($element->status == 'approved')
                                                                        Finished
                                                                    @elseif($element->status == 'rejected')
                                                                        Failed
                                                                    @elseif($element->status == 'pending' || $element->status == 'processing')
                                                                        Processing
                                                                    @endif
                                                                </uni-view>
                                                            </uni-view>
                                                        </uni-view>
                                                    @endforeach
                                                </div>
                                                <div class="reward" style="display: none">
                                                    @foreach(\App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'rebate')->orderByDesc('id')->get() as $element)
                                                        <uni-view data-v-7ddd6d44="" class="flexBetween  itemBox">
                                                            <uni-view data-v-7ddd6d44="" class="itemLeft">
                                                                <uni-view data-v-7ddd6d44="" class="flexBetween flexColumn">
                                                                    <uni-view data-v-7ddd6d44="" class="l1">{{$element->reason}}
                                                                    </uni-view>
                                                                    <uni-view data-v-7ddd6d44="" class="l2 Small">{{$element->created_at}}
                                                                    </uni-view>
                                                                </uni-view>
                                                            </uni-view>
                                                            <uni-view data-v-7ddd6d44="" class="itemRight Blod ">
                                                                <uni-view data-v-7ddd6d44="" style="color: rgb(254, 165, 67);">
                                                                    <uni-text data-v-7ddd6d44="" style="margin-right: 2px;">
                                                                        <span>+</span></uni-text>
                                                                    {{price($element->amount)}}
                                                                </uni-view>
                                                                <uni-view data-v-7ddd6d44="">Balance: {{price(user()->balance)}}</uni-view>
                                                            </uni-view>
                                                        </uni-view>
                                                    @endforeach
                                                </div>

                                                <uni-view data-v-73afa0ce="" class="noCard">-—— No more data available ——-</uni-view>
                                                <uni-view data-v-73afa0ce="" style="height: 80px;"></uni-view>
                                            </div>
                                        </div>
                                    </div>
                                </uni-scroll-view>
                            </uni-view>
                            <uni-view data-v-73afa0ce=""></uni-view>
                        </uni-view>
                    </uni-view>
                </uni-view>
            </uni-page-body>
        </uni-page-wrapper>
    </uni-page>
</uni-app>
<script>
    function tabMenu(_this, menuType){
        var elements = document.querySelectorAll('.tabMenuItem');
        for (let i=0;i<elements.length;i++){
            if (elements[i].classList.contains('light')){
                elements[i].classList.remove('light');
            }
        }
        _this.classList.add('light');

        var all = document.querySelector('.all');
        var withdraw = document.querySelector('.withdraw');
        var deposit = document.querySelector('.deposit');
        var reward = document.querySelector('.reward');

        if (menuType == 'all'){
            all.style.display = 'block';
            withdraw.style.display = 'none';
            deposit.style.display = 'none';
            reward.style.display = 'none';
        }

        if (menuType == 'withdraw'){
            all.style.display = 'none';
            withdraw.style.display = 'block';
            deposit.style.display = 'none';
            reward.style.display = 'none';
        }

        if (menuType == 'recharge'){
            all.style.display = 'none';
            withdraw.style.display = 'none';
            deposit.style.display = 'block';
            reward.style.display = 'none';
        }

        if (menuType == 'reword'){
            all.style.display = 'none';
            withdraw.style.display = 'none';
            deposit.style.display = 'none';
            reward.style.display = 'block';
        }

    }
</script>
</body>
</html>
