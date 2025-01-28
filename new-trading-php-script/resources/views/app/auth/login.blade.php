<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="shortcut icon" href="{{asset('public')}}/static/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/bootstrap-4.6.2/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?2">
    <link rel="stylesheet" href="{{asset('public')}}/static/styles/common.css?3">
    <script src="{{asset('public')}}/static/plugin/jquery-3.5.1.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/layer/layer.js"></script>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css"
          id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>

<link rel="stylesheet" href="{{asset('public')}}/pageCss/login.css">
<style>
    .login-footer label input + i.login-bg {
        background-image: url('{{asset('public')}}/static/images/login-bg.png');
        background-size: 100% 30%;

    }

    .login-footer label input:checked + i {
        background: url('{{asset('public')}}/static/images/icon/check-checked.png') no-repeat;
        background-size: 100% 100%;
        border: none;
    }

    .login-yinsi > div {
        box-sizing: border-box;
        padding: 15px 0 32px 15px;
        font-size: 14px;
        color: var(--text-secondary);
        line-height: 20px;
        text-align: center;
        background: url('{{asset('public')}}/static/images/login/login-app-donw-button.png') no-repeat;
        background-position: center bottom;
    }
    .login-input-group {
        position: relative;
        margin-top: 0;
    }


    .center-panel {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .login-input-group .label {
        color: #fff;
    }
</style>
<form action="{{url('login')}}" method="post">
    @csrf
    <div class="center-panel login-bg">

        <div class="top">
            <div style="flex: 1;color: #fff;display: inline-block;margin-left: 10px;">{{env('APP_NAME')}}</div>
            <div class="lang">
                <span style="color: #fff;display: inline-block;margin-top: 8px;">Login</span>
            </div>

        </div>

        <div class="login-title">
            <img class="logo" style="border-radius: 50px" src="{{asset(setting('photo'))}}">
        </div>

        <div class="login-box">
            <div class="login-input-group">
                <div class="label">Phone number</div>
                <div class="login-input-box form-input-box phone">
                    <input class="form-input login-input-control" type="text" name="phone" placeholder="Please enter your login number" maxlength="16">
                </div>
            </div>

            <div class="login-input-group">
                <div class="label">Password</div>
                <div class="login-input-box form-input-box password">
                    <input class="form-input login-input-control" type="password" placeholder="Please enter your login password" name="password" maxlength="20">
                </div>
            </div>

            <div class="login-footer">
                <a class="color-main" style="color:#fff !important;" href="{{url('account/register')}}">Don't have an account? Sign up now</a>
            </div>

            <button class="form-button" block="" id="login-btn">Login</button>

            <div class="login-footer">

            </div>

            <div class="login-yinsi">
                <div><a class="color-main" style="color:#fff !important;" href="{{url('download-apk')}}">APP download</a></div>
            </div>

        </div>

    </div>
</form>

<!--CONTENT END-->
@include('alert-message')
<script>

    $('#login-btn').click(function () {
        let country_code = $('.login-form-phone-value').text();
        let phone = $("input[name='phone']").val();
        let password = $("input[name='password']").val();

        if (!phone.length)
            return error("Please enter your phone number")

        if (!password.length)
            return error("Please enter your password")

        layer.load(2);

        document.querySelector('form').submit();
    });

    $(function () {
        let country_code = localStorage.getItem("country_code");
        let phone = localStorage.getItem("phone");
        let password = localStorage.getItem("password");
        if (country_code && phone && password) {
            $('.login-form-phone-value').text(country_code);
            $("input[name='phone']").val(phone);
            $("input[name='password']").val(password);
            document.getElementById('remember').checked = true;
        } else {
            document.getElementById('remember').checked = false;
        }

    })
</script>


<link rel="stylesheet" href="{{asset('public')}}/static/styles/phone-options-modal.css">
<script type="text/javascript" src="{{asset('public')}}/static/js/country.js"></script>

<div class="phone-options-modal" id="phoneOptions-modal">
    <div class="phone-options-search">
        <input type="text" placeholder="Enter area code to find">
    </div>
    <div class="form-phone-options">
        <div class="form-phone-option" style="color:#fff;"> United States (<span class="area-num">+1</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> United Kingdom (<span class="area-num">+44</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> China (中国) (<span class="area-num">+86</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Afghanistan (&#x202B;افغانستان&#x202C;&lrm;) (<span
                class="area-num">+93</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Albania (Shqipëri) (<span class="area-num">+355</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Algeria (&#x202B;الجزائر&#x202C;&lrm;) (<span
                class="area-num">+213</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> American Samoa (<span class="area-num">+1684</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Andorra (<span class="area-num">+376</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Angola (<span class="area-num">+244</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Anguilla (<span class="area-num">+1264</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Antigua and Barbuda (<span class="area-num">+1268</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Argentina (<span class="area-num">+54</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Armenia (Հայաստան) (<span class="area-num">+374</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Aruba (<span class="area-num">+297</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Australia (<span class="area-num">+61</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Austria (Österreich) (<span class="area-num">+43</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Azerbaijan (Azərbaycan) (<span class="area-num">+994</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Bahamas (<span class="area-num">+1242</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bahrain (&#x202B;البحرين&#x202C;&lrm;) (<span
                class="area-num">+973</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Bangladesh (বাংলাদেশ) (<span class="area-num">+880</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Barbados (<span class="area-num">+1246</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Belarus (Беларусь) (<span class="area-num">+375</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Belgium (België) (<span class="area-num">+32</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Belize (<span class="area-num">+501</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Benin (Bénin) (<span class="area-num">+229</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bermuda (<span class="area-num">+1441</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bhutan (འབྲུག) (<span class="area-num">+975</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bolivia (<span class="area-num">+591</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bosnia and Herzegovina (Босна и Херцеговина) (<span
                class="area-num">+387</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Botswana (<span class="area-num">+267</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Brazil (Brasil) (<span class="area-num">+55</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> British Indian Ocean Territory (<span
                class="area-num">+246</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> British Virgin Islands (<span class="area-num">+1284</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Brunei (<span class="area-num">+673</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Bulgaria (България) (<span class="area-num">+359</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Burkina Faso (<span class="area-num">+226</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Burundi (Uburundi) (<span class="area-num">+257</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Cambodia (កម្ពុជា) (<span class="area-num">+855</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Cameroon (Cameroun) (<span class="area-num">+237</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Canada (<span class="area-num">+1</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Cape Verde (Kabu Verdi) (<span class="area-num">+238</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Caribbean Netherlands (<span class="area-num">+599</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Cayman Islands (<span class="area-num">+1345</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Central African Republic (République centrafricaine) (<span
                class="area-num">+236</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Chad (Tchad) (<span class="area-num">+235</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Chile (<span class="area-num">+56</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Christmas Island (<span class="area-num">+61</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Cocos (Keeling) Islands (<span class="area-num">+61</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Colombia (<span class="area-num">+57</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Comoros (&#x202B;جزر القمر&#x202C;&lrm;) (<span
                class="area-num">+269</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) (<span
                class="area-num">+243</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Congo (Republic) (Congo-Brazzaville) (<span
                class="area-num">+242</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Cook Islands (<span class="area-num">+682</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Costa Rica (<span class="area-num">+506</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Côte d’Ivoire (<span class="area-num">+225</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Croatia (Hrvatska) (<span class="area-num">+385</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Cuba (<span class="area-num">+53</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Curaçao (<span class="area-num">+599</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Cyprus (Κύπρος) (<span class="area-num">+357</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Czech Republic (Česká republika) (<span class="area-num">+420</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Denmark (Danmark) (<span class="area-num">+45</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Djibouti (<span class="area-num">+253</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Dominica (<span class="area-num">+1767</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Dominican Republic (República Dominicana) (<span
                class="area-num">+1</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Ecuador (<span class="area-num">+593</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Egypt (&#x202B;مصر&#x202C;&lrm;) (<span
                class="area-num">+20</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> El Salvador (<span class="area-num">+503</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Equatorial Guinea (Guinea Ecuatorial) (<span
                class="area-num">+240</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Eritrea (<span class="area-num">+291</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Estonia (Eesti) (<span class="area-num">+372</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Ethiopia (<span class="area-num">+251</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Falkland Islands (Islas Malvinas) (<span class="area-num">+500</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Faroe Islands (Føroyar) (<span class="area-num">+298</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Fiji (<span class="area-num">+679</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Finland (Suomi) (<span class="area-num">+358</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> France (<span class="area-num">+33</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> French Guiana (Guyane française) (<span class="area-num">+594</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> French Polynesia (Polynésie française) (<span
                class="area-num">+689</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Gabon (<span class="area-num">+241</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Gambia (<span class="area-num">+220</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Georgia (საქართველო) (<span class="area-num">+995</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Germany (Deutschland) (<span class="area-num">+49</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Ghana (Gaana) (<span class="area-num">+233</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Gibraltar (<span class="area-num">+350</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Greece (Ελλάδα) (<span class="area-num">+30</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Greenland (Kalaallit Nunaat) (<span
                class="area-num">+299</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Grenada (<span class="area-num">+1473</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guadeloupe (<span class="area-num">+590</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guam (<span class="area-num">+1671</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guatemala (<span class="area-num">+502</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guernsey (<span class="area-num">+44</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guinea (Guinée) (<span class="area-num">+224</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Guinea-Bissau (Guiné Bissau) (<span
                class="area-num">+245</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Guyana (<span class="area-num">+592</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Haiti (<span class="area-num">+509</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Honduras (<span class="area-num">+504</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Hong Kong (香港) (<span class="area-num">+852</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Hungary (Magyarország) (<span class="area-num">+36</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Iceland (Ísland) (<span class="area-num">+354</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> India (भारत) (<span class="area-num">+91</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Indonesia (<span class="area-num">+62</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Iran (&#x202B;ایران&#x202C;&lrm;) (<span class="area-num">+98</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Iraq (&#x202B;العراق&#x202C;&lrm;) (<span class="area-num">+964</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Ireland (<span class="area-num">+353</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Isle of Man (<span class="area-num">+44</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Israel (&#x202B;ישראל&#x202C;&lrm;) (<span class="area-num">+972</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Italy (Italia) (<span class="area-num">+39</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Jamaica (<span class="area-num">+1876</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Japan (日本) (<span class="area-num">+81</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Jersey (<span class="area-num">+44</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Jordan (&#x202B;الأردن&#x202C;&lrm;) (<span
                class="area-num">+962</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Kazakhstan (Казахстан) (<span class="area-num">+7</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Kenya (<span class="area-num">+254</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Kiribati (<span class="area-num">+686</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Kosovo (<span class="area-num">+383</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Kuwait (&#x202B;الكويت&#x202C;&lrm;) (<span
                class="area-num">+965</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Kyrgyzstan (Кыргызстан) (<span class="area-num">+996</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Laos (ລາວ) (<span class="area-num">+856</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Latvia (Latvija) (<span class="area-num">+371</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Lebanon (&#x202B;لبنان&#x202C;&lrm;) (<span
                class="area-num">+961</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Lesotho (<span class="area-num">+266</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Liberia (<span class="area-num">+231</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Libya (&#x202B;ليبيا&#x202C;&lrm;) (<span class="area-num">+218</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Liechtenstein (<span class="area-num">+423</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Lithuania (Lietuva) (<span class="area-num">+370</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Luxembourg (<span class="area-num">+352</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Macau (澳門) (<span class="area-num">+853</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Macedonia (FYROM) (Македонија) (<span
                class="area-num">+389</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Madagascar (Madagasikara) (<span
                class="area-num">+261</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Malawi (<span class="area-num">+265</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Malaysia (<span class="area-num">+60</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Maldives (<span class="area-num">+960</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Mali (<span class="area-num">+223</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Malta (<span class="area-num">+356</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Marshall Islands (<span class="area-num">+692</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Martinique (<span class="area-num">+596</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Mauritania (&#x202B;موريتانيا&#x202C;&lrm;) (<span
                class="area-num">+222</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Mauritius (Moris) (<span class="area-num">+230</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Mayotte (<span class="area-num">+262</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Mexico (México) (<span class="area-num">+52</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Micronesia (<span class="area-num">+691</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Moldova (Republica Moldova) (<span
                class="area-num">+373</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Monaco (<span class="area-num">+377</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Mongolia (Монгол) (<span class="area-num">+976</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Montenegro (Crna Gora) (<span class="area-num">+382</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Montserrat (<span class="area-num">+1664</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Morocco (&#x202B;المغرب&#x202C;&lrm;) (<span
                class="area-num">+212</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Mozambique (Moçambique) (<span class="area-num">+258</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Myanmar (Burma) (မြန်မာ) (<span class="area-num">+95</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Namibia (Namibië) (<span class="area-num">+264</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Nauru (<span class="area-num">+674</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Nepal (नेपाल) (<span class="area-num">+977</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Netherlands (Nederland) (<span class="area-num">+31</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> New Caledonia (Nouvelle-Calédonie) (<span class="area-num">+687</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> New Zealand (<span class="area-num">+64</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Nicaragua (<span class="area-num">+505</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Niger (Nijar) (<span class="area-num">+227</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Nigeria (<span class="area-num">+234</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Niue (<span class="area-num">+683</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Norfolk Island (<span class="area-num">+672</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> North Korea (조선 민주주의 인민 공화국) (<span
                class="area-num">+850</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Northern Mariana Islands (<span
                class="area-num">+1670</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Norway (Norge) (<span class="area-num">+47</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Oman (&#x202B;عُمان&#x202C;&lrm;) (<span class="area-num">+968</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Pakistan (&#x202B;پاکستان&#x202C;&lrm;) (<span
                class="area-num">+92</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Palau (<span class="area-num">+680</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Palestine (&#x202B;فلسطين&#x202C;&lrm;) (<span
                class="area-num">+970</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Panama (Panamá) (<span class="area-num">+507</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Papua New Guinea (<span class="area-num">+675</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Paraguay (<span class="area-num">+595</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Peru (Perú) (<span class="area-num">+51</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Philippines (<span class="area-num">+63</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Poland (Polska) (<span class="area-num">+48</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Portugal (<span class="area-num">+351</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Puerto Rico (<span class="area-num">+1</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Qatar (&#x202B;قطر&#x202C;&lrm;) (<span class="area-num">+974</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Réunion (La Réunion) (<span class="area-num">+262</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Romania (România) (<span class="area-num">+40</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Russia (Россия) (<span class="area-num">+7</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Rwanda (<span class="area-num">+250</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Saint Barthélemy (Saint-Barthélemy) (<span class="area-num">+590</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Saint Helena (<span class="area-num">+290</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Saint Kitts and Nevis (<span class="area-num">+1869</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Saint Lucia (<span class="area-num">+1758</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Saint Martin (Saint-Martin (partie française)) (<span
                class="area-num">+590</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon) (<span
                class="area-num">+508</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Saint Vincent and the Grenadines (<span class="area-num">+1784</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Samoa (<span class="area-num">+685</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> San Marino (<span class="area-num">+378</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> São Tomé and Príncipe (São Tomé e Príncipe) (<span
                class="area-num">+239</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Saudi Arabia (&#x202B;المملكة العربية السعودية&#x202C;&lrm;)
            (<span class="area-num">+966</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Senegal (Sénégal) (<span class="area-num">+221</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Serbia (Србија) (<span class="area-num">+381</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Seychelles (<span class="area-num">+248</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Sierra Leone (<span class="area-num">+232</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Singapore (<span class="area-num">+65</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Sint Maarten (<span class="area-num">+1721</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Slovakia (Slovensko) (<span class="area-num">+421</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Slovenia (Slovenija) (<span class="area-num">+386</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Solomon Islands (<span class="area-num">+677</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Somalia (Soomaaliya) (<span class="area-num">+252</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> South Africa (<span class="area-num">+27</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> South Korea (대한민국) (<span class="area-num">+82</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> South Sudan (&#x202B;جنوب السودان&#x202C;&lrm;) (<span
                class="area-num">+211</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Spain (España) (<span class="area-num">+34</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Sri Lanka (ශ්&zwj;රී ලංකාව) (<span
                class="area-num">+94</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Sudan (&#x202B;السودان&#x202C;&lrm;) (<span
                class="area-num">+249</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Suriname (<span class="area-num">+597</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Svalbard and Jan Mayen (<span class="area-num">+47</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Swaziland (<span class="area-num">+268</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Sweden (Sverige) (<span class="area-num">+46</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Switzerland (Schweiz) (<span class="area-num">+41</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Syria (&#x202B;سوريا&#x202C;&lrm;) (<span class="area-num">+963</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Taiwan (台灣) (<span class="area-num">+886</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Tajikistan (<span class="area-num">+992</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Tanzania (<span class="area-num">+255</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Thailand (ไทย) (<span class="area-num">+66</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Timor-Leste (<span class="area-num">+670</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Togo (<span class="area-num">+228</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Tokelau (<span class="area-num">+690</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Tonga (<span class="area-num">+676</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Trinidad and Tobago (<span class="area-num">+1868</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Tunisia (&#x202B;تونس&#x202C;&lrm;) (<span class="area-num">+216</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Turkey (Türkiye) (<span class="area-num">+90</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Turkmenistan (<span class="area-num">+993</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Turks and Caicos Islands (<span
                class="area-num">+1649</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Tuvalu (<span class="area-num">+688</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> U.S. Virgin Islands (<span class="area-num">+1340</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Uganda (<span class="area-num">+256</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Ukraine (Україна) (<span class="area-num">+380</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> United Arab Emirates (&#x202B;الإمارات العربية المتحدة&#x202C;&lrm;)
            (<span class="area-num">+971</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Uruguay (<span class="area-num">+598</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Uzbekistan (Oʻzbekiston) (<span class="area-num">+998</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Vanuatu (<span class="area-num">+678</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Vatican City (Città del Vaticano) (<span class="area-num">+39</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Venezuela (<span class="area-num">+58</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Vietnam (Việt Nam) (<span class="area-num">+84</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Wallis and Futuna (<span class="area-num">+681</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Yemen (&#x202B;اليمن&#x202C;&lrm;) (<span class="area-num">+967</span>)
        </div>
        <div class="form-phone-option" style="color:#fff;"> Zambia (<span class="area-num">+260</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Zimbabwe (<span class="area-num">+263</span>)</div>
        <div class="form-phone-option" style="color:#fff;"> Åland Islands (<span class="area-num">+358</span>)</div>
    </div>
</div>

<script>
    $('.login-form-phone-select').on('click', function () {
        showPhoneModal($('#phoneOptions-modal'))
    })

    showCountrySelect();

    function showCountrySelect() {
        for (var i = 0; i < CountryData.length; i++) {
            let name = CountryData[i].enName;
            let code = CountryData[i].phoneAreaCode;
            $('.form-phone-options').append(`<div class="form-phone-option" style="color:#fff;"> ${name} (<span class="area-num">${code}</span>) </div>`);
        }

        $('.form-phone-option').on('click', function () {
            var val = $(this).find('.area-num').text().trim()
            $('.login-form-phone-value').text(val)
            closePhoneModal()
        });
    }

    $('.phone-options-search > input').on('input', function () {
        var str = $(this).val()
        if (!str) {
            $('.form-phone-option').show()
        } else {
            $('.form-phone-option').each(function (index, el) {
                var val = $(el).find('.area-num').text().trim()
                if (val.includes(str)) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })
        }
    })

    var PhoneModalIndex = null;

    function showPhoneModal(content) {
        PasswordModalIndex = layer.open({
            type: 1,
            closeBtn: 0,
            content: content,
            shade: [0.8, '#051134'],
            shadeClose: true,
            title: false,
            resize: false,
            area: '100%',
            offset: 'b',
            anim: 2
        });
    }

    function closePhoneModal() {
        $('.phone-options-search > input').val('')
        $('.form-phone-option').show()
        layer.close(PasswordModalIndex)
    }
</script>

<style>
    .service {
        display: none;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #000000a6;
        z-index: 1000;
        top: 0;
    }


    .service-inner {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 8px;
        padding: 16px;
        width: 100%;
        height: 100%;
        max-width: 540px;
    }

    .service-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 8px 4px 0;
        width: 33.33%;
        height: 120px;
        border-radius: 8px;
        background-color: #fff;
    }

    .service-item-icon {
        width: 72px;
    }

    .service-item-title {
        height: 32px;
        line-height: 32px;
        font-size: 14px;
        color: #444;
        text-align: center;
    }
</style>

<div id="service-pop" class="service" onclick="document.getElementById('service-pop').style.display='none'">
    <div class="service-inner">
        <a href="https://t.me/" class="service-item">
            <img src="{{asset('public')}}/static/images/service/s-1.png" class="service-item-icon">
            <div class="service-item-title">Telegram</div>
        </a>
    </div>
</div>

<div id="float_ico"
     style="position: fixed; bottom: 103px; right: 10px; display: flex; justify-content: center; align-items: center; width: 48px; height: 48px;">
    <div style="cursor: pointer;" onclick="document.getElementById('service-pop').style.display='block'">
        <img src="{{asset('public')}}/static/images/cs.png" style="width: 40px;height: 40px;">
    </div>
</div>


<script>
    window.addEventListener('load', function () {
        var actionDir = 1;
        var dec = 100;
        var sum = 5;
        var num = sum;
        var handel_t = setInterval(function () {
            try {
                document.getElementById('float_ico').style.bottom = dec + "px";
            } catch (e) {
            }
            ;
            dec += actionDir;
            num += -1;
            if (num <= 0) {
                actionDir *= -1;
                num = sum
            }
        }, 100)
    })
</script>
</body>
</html>
