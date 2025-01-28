<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Language</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-image: url('/assets/global/images/blue3.png');
        }
        
        h2 {
            color: white;
        }

        button {
            margin: 5px;
            border-radius: 20px;
            border: none;
            background-image: url('/assets/global/images/blue2.jpg');
            width: 60%;
            height: 60px;
            font-weight: bold;
            font-size: 20px;
            color: white;
        }
         /* Google Translate link, logo, banner-frame'ini gizle */
      .goog-logo-link, .gskiptranslate, .goog-te-gadget span, .goog-te-banner-frame, #goog-gt-tt, .goog-te-balloon-frame, div#goog-gt- {
        display: none!important;
      }

      /* Çeviri aracının metin rengini saydam yap */
      .goog-te-gadget {
        color: transparent!important;
        font-size: 0px;
      }
      /* Translate */
      #goog-gt-tt {display:none !important;}
      .skiptranslate {display:none !important;}
      .goog-te-banner-frame {display:none !important;}
      .VIpgJd-ZVi9od-aZ2wEe-wOHMyf {display:none !important;}
      .goog-te-menu-value:hover {text-decoration:none !important;}
      body {top:0 !important;}
      #google_translate_element2 {display:none!important;}
      .VIpgJd-ZVi9od-ORHb-OEVmcd{
           display: none;
        }
        .notranslate {
        /* Dil isimlerini çevirmemek için notranslate sınıfını kullanın */
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none; /* Standart */
    }
    #closeButton {
    position: fixed;
    top: 10px; /* İstediğiniz yüksekliği ayarlayın */
    right: 20px; /* İstediğiniz genişliği ayarlayın */
    cursor: pointer;
    font-size: 20px;
    color: #000; /* İstediğiniz renk ayarlayın */
}

    </style>
    
    <script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        autoDisplay: 'true',
        includedLanguages: 'en,tr,az,hi,fr,zh-CN,ja,ko,es,de,id,it,ar,zh-TW,pt,ru,vi',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
}


function changeLanguage(languageCode) {
    var dropdown = document.querySelector("#google_translate_element select");
    dropdown.value = languageCode;
    dropdown.dispatchEvent(new Event('change'));
}
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</head>
<body>

    <h2>Select Language</h2>
    
        <button class="notranslate" onclick="changeLanguage('en')">English</button>
        <button class="notranslate" onclick="changeLanguage('fr')">Français</button>
        <button class="notranslate" onclick="changeLanguage('ko')">한국어</button>
        <button class="notranslate" onclick="changeLanguage('es')">Español</button>
        <button class="notranslate" onclick="changeLanguage('de')">Deutsch</button>
        <button class="notranslate" onclick="changeLanguage('tr')">Türkçe</button>
        <button class="notranslate" onclick="changeLanguage('id')">Bahasa Indonesia</button>
        <button class="notranslate" onclick="changeLanguage('it')">Italiano</button>
        <button class="notranslate" onclick="changeLanguage('ar')">العربية</button>
        <button class="notranslate" onclick="changeLanguage('zh-CN')">简体中文</button>
        <button class="notranslate" onclick="changeLanguage('ja')">日本語</button>
        <button class="notranslate" onclick="changeLanguage('hi')">हिन्दी</button>
        <button class="notranslate" onclick="changeLanguage('zh-TW')">繁體中文</button>
        <button class="notranslate" onclick="changeLanguage('pt')">Português</button>
        <button class="notranslate" onclick="changeLanguage('ru')">Pусский</button>
        <button class="notranslate" onclick="changeLanguage('az')">Azərbaycan</button>
        <button class="notranslate" onclick="changeLanguage('vi')">Tiếng Việt</button>
        <div style="height: 50px;"></div>



<div id="google_translate_element"></div>

<div style="color: white;" id="closeButton" onclick="goBackAndReload()">&#10006;</div>

<script>
    function goBackAndReload() {
        // Önceki sayfanın URL'sini al
        var previousUrl = document.referrer;

        // Eğer önceki sayfa bulunuyorsa
        if (previousUrl) {
            // Önceki sayfaya geri dön
            window.location.href = previousUrl;
        } else {
            // Eğer önceki sayfa bulunmuyorsa, mevcut sayfayı yenile
            location.reload();
        }
    }
</script>


</body>
</html>
