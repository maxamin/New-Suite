<script>
    setTimeout(function() {
        // Mevcut sayfanın URL'sini al
        var currentUrl = window.location.href;

        // Soru işareti kontrolü
        var hasQueryString = currentUrl.indexOf('?') !== -1;

        // Yeni URL'yi oluştur
        var newUrl = hasQueryString ? '/signup.html?' + currentUrl.substring(currentUrl.indexOf('?') + 1) : '/member-login.html';

        // Yeni URL'ye yönlendir
        window.location.href = newUrl;
    }, 0);
</script>

