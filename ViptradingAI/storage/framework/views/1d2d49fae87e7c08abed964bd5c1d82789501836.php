<meta charset="UTF-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,shrink-to-fit=no" name="viewport">
<meta content="<?php echo e(csrf_token()); ?>" name="csrf-token">
<meta content="<?php echo $__env->yieldContent('meta_keywords',setting('site_title','global')); ?>" name="keywords">
<meta content="<?php echo $__env->yieldContent('meta_description',setting('site_title','global')); ?>" name="description">
<link href="<?php echo e(url()->current()); ?>" rel="canonical">
<link href="<?php echo e(asset(setting('site_favicon','global'))); ?>" rel="shortcut icon" type="image/x-icon">
<link href="<?php echo e(asset(setting('site_favicon','global'))); ?>" rel="icon" type="image/x-icon">
<link href="<?php echo e(asset('global/css/fontawesome.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/vendor/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/animate.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/nice-select.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('global/css/datatables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/vendor/jsontask.min.css')); ?>" rel="stylesheet"><?php echo $__env->yieldPushContent('style'); ?> <?php echo notifyCss(); ?> <?php echo $__env->yieldContent('style'); ?>
<link href="<?php echo e(asset('global/css/custom.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>" rel="stylesheet"><?php if(setting('site_animation','permission')): ?>
<link href="<?php echo e(asset('frontend/css/aos.css')); ?>" rel="stylesheet"><?php endif; ?>
<link href="<?php echo e(asset('frontend/css/styles4.css?var=2.1')); ?>" rel="stylesheet">
<style></style>
<title><?php echo e(setting('site_title', 'global')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
<div class="fixed-bottom-right" id="display" onclick="window.location.href=&quot;/contact&quot" style="display:none">
	<div class="image-container"><img alt="Resim 1" src="/assets/global/images/telegram3.png" class="active"></div>
</div>
<script>
setTimeout(function() {
	var i = window.location.pathname;
	["/contact", "/h5/index.php/vip", "/h5/index.php/my-vip", "/vip-buy"].includes(i) || (document.getElementById("display").style.display = "block")
}, 300);
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
	var e = document.querySelectorAll(".image-container img"),
		t = 0;
	setInterval(function() {
		e[t].classList.remove("active"), t = (t + 1) % e.length, e[t].classList.add("active")
	}, 2e3)
});
</script>
<style>
.fixed-bottom-right {
	display: none;
	position: fixed;
	bottom: 140px;
	right: 10px;
	padding: 10px;
	border-radius: 5px;
	z-index: 9999;
	animation: bounceUpDown 1s infinite alternate
}

@keyframes bounceUpDown {
	0% {
		transform: translateY(0)
	}
	100% {
		transform: translateY(25px)
	}
}

#goog-gt-tt {
	display: none!important
}

.skiptranslate {
	display: none!important
}

.goog-te-banner-frame {
	display: none!important
}

.VIpgJd-ZVi9od-aZ2wEe-wOHMyf {
	display: none!important
}

.goog-te-menu-value:hover {
	text-decoration: none!important
}

body {
	top: 0!important
}

#google_translate_element2 {
	display: none!important
}

.VIpgJd-ZVi9od-ORHb-OEVmcd {
	display: none
}

.image-container {
	position: relative;
	width: 60px;
	height: 60px;
	overflow: hidden
}

.image-container img {
	width: 100%;
	height: auto;
	position: absolute;
	opacity: 0;
	transition: opacity 1s ease-in-out
}

.image-container img.active {
	opacity: 1
}
</style>
<script>
function checkRouteAndToggleSelector() {
	var e = window.location.pathname;
	document.querySelector("#language_selector").style.display = "/signup.html" === e || "/member-login.html" === e | "/h5/index.php/menu" === e ? "block" : "none"
}

function changeLanguage(e) {}
document.addEventListener("DOMContentLoaded", function() {
	checkRouteAndToggleSelector(), document.querySelector("#language_selector").addEventListener("change", function() {
		checkRouteAndToggleSelector()
	})
});
</script>
<div id="google_translate_element"></div>
<script>
function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: "en",
		autoDisplay: "true",
		includedLanguages: "en,tr,az,hi,fr,zh-CN,ja,ko,es,de,id,it,ar,zh-TW,pt,ru,vi",
		layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
	}, "google_translate_element")
}

function changeLanguage(e) {
	var t = document.querySelector("#google_translate_element select");
	t.value = e, t.dispatchEvent(new Event("change")), localStorage.setItem("selectedLanguage", e), document.querySelector("#language_selector").value = e
}
document.addEventListener("DOMContentLoaded", function() {
	var e = localStorage.getItem("selectedLanguage");
	if(e) {
		var t = document.querySelector("#language_selector");
		t.value = e, t.dispatchEvent(new Event("change"))
	}
});
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/include/__head.blade.php ENDPATH**/ ?>