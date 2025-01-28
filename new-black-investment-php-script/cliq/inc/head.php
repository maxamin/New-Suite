<?php if(!defined('FastCore')){exit();} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$config->sitename;?> - {!TITLE!} </title>
<?php if (empty($pg->segment[0] ==='user')) { ?>
	<meta name="description" content="{!DESCRIPTION!}">
<?php 
} 
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="/img/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/fav/favicon-16x16.png">
<link rel="manifest" href="/img/fav/site.webmanifest">

    <meta property="og:title" content="{!TITLE!}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://troncoin.fun/img/trontrx.jpg" />
    
	<link rel="dns-prefetch" href="https://use.fontawesome.com">
	<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="https://translate.google.com">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Electrolize&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/style.css?=1">
  <link rel="stylesheet" href="/assets/css/language.css?=1" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/wow.min.js"></script>
	<script type="text/javascript" src="/assets/js/js.cookie.min.js"></script>
  <script> new WOW().init(); </script>
<style>

.buyban {display:inline-block;position:relative;padding: 4px 4px 4px 4px;background: #f24;}
.buyban small a {color: #234;font-weight: bold;}
.buyban small a:hover {color: #f24;}

.buyban .buybut {position: absolute; top:2px; right: 2px;color: #fff;font-size: 14px;}
.buyban .buybut::after {position: absolute; top:2px; right: 2px;content: "+"; background: #f24;padding:1px 4px;font-weight: bold; }
.buyban .buybut:hover::after {position: absolute; top:2px; right: 2px; font-size: 16px; background: #61cb75;padding:2px 5px;}

</style>
</head>
<body>

<script>
  $(document).on('click', '.langoogle li a img', function(){
    Cookies.set('googtransly', $(this).attr('data-google-lang'));
  $('div #language__curr').attr('src',$(this).attr('data-img'));
  })
  
</script>
<div class="container-xl">


<!-- Navbar -->
<div class="row m-0 navmenu">
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand notranslate" href="/"><span>TRON</span>COIN</a>


    <ul class="dropdown2">
<li class="dropdown-top langoogle">
  <?php if($_COOKIE['googtransly']) {
    $varLangGoogle = array('_en' => 'en', '_ru' => 'ru', '_de' => 'de', '_fr' => 'fr', '_tr' => 'tr', '_es' => 'es', '_it' => 'it', '_ar' => 'ae', '_pk' => 'pk', '_bd' => 'bd');
    $langSelectFC = $varLangGoogle[$_COOKIE['googtransly']];
    
  } else {
    $langSelectFC = 'en';
  }
  ?>
  
<div class="langim"><img id="language__curr" src="/img/lang/<?=$langSelectFC;?>.svg" class="active"> <i class="fa fa-angle-down"></i></div>

<ul id="language__list test" class="dropdown-inside notranslate">
<li><a href="#" onclick="doGTranslate('en|en');return false;" title="English"><img src="/img/lang/en.svg" data-google-lang="_en" data-img="/img/lang/en.svg" alt="English"> en</a></li>
<li><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian"><img src="/img/lang/ru.svg" data-google-lang="_ru" data-img="/img/lang/ru.svg" alt="Russian"> ru</a></li>
<li><a href="#" onclick="doGTranslate('en|tr');return false;" title="Turkey"><img src="/img/lang/tr.svg" data-google-lang="_tr" data-img="/img/lang/tr.svg" alt="Turkey"> tr</a></li>
<li><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish"><img src="/img/lang/es.svg" data-google-lang="_es" data-img="/img/lang/es.svg" alt="Spanish"> es</a></li>
<li><a href="#" onclick="doGTranslate('en|it');return false;" title="Italy"><img src="/img/lang/it.svg" data-google-lang="_it" data-img="/img/lang/it.svg" alt="Italy"> it</a></li>
<li><a href="#" onclick="doGTranslate('en|de');return false;" title="German"><img src="/img/lang/de.svg" data-google-lang="_de" data-img="/img/lang/de.svg" alt="German"> de</a></li>
<li><a href="#" onclick="doGTranslate('en|fr');return false;" title="French"><img src="/img/lang/fr.svg" data-google-lang="_fr" data-img="/img/lang/fr.svg" alt="French"> fr</a></li>
<li><a href="#" onclick="doGTranslate('en|ar');return false;" title="UAE"><img src="/img/lang/ae.svg" data-google-lang="_ar" data-img="/img/lang/ae.svg" alt="UAE"> ae</a></li>
<li><a href="#" onclick="doGTranslate('en|ur');return false;" title="Pakistan"><img src="/img/lang/pk.svg" data-google-lang="_pk" data-img="/img/lang/pk.svg" alt="Pakistan"> pk</a></li>
<li><a href="#" style="border: none;" onclick="doGTranslate('en|bn');return false;" title="Bengali"><img src="/img/lang/bd.svg" data-google-lang="_bd" data-img="/img/lang/bd.svg" alt="Bengali"> bd</a></li>

</ul></li></ul>


    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-lg-0 text-center" style="flex-wrap: wrap;">

        <li class="nav-item">
          <a class="nav-link" href="/news"><i class="fa fa-rss"></i> News <span></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/bounty"><i class="fa fa-gift"></i> Bounty <span></span></a>
        </li>
<?php if ($uid) { ?>
  <?php } else { ?>
        <li class="nav-item" style="display:none;">
          <a class="nav-link" href="/ptc"><i class="fa fa-mouse"></i> PTC <span></span></a>
        </li>
  <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="/stats"><i class="fa fa-signal"></i> Stats <span></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/terms"><i class="fa fa-info"></i> Rules <span></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/help"><i class="fa fa-question-circle"></i> Help <span></span></a>
        </li>
<?php if ($uid) { ?>
        <li class="nav-item">
          <a class="nav-link btn-danger" href="/user/mining" style="color: #fff !important;background: #f23;"><i class="fa fa-user-circle" style="color: #fff !important;"></i> Account <span></span></a>
        </li>
  <?php } else { ?>
  <?php } ?>
      </ul>
    </div>
</nav>
    </div>

<?php if (empty($pg->segment[0] === '') && empty($pg->segment[0] ==='i') && empty($pg->segment[1] ==='user')) { ?>

<?php if (empty($pg->segment[0] ==='user')) { ?>
<div class="wrapper mt-0"><div class="wrapper2">
<div class="pt-1 pb-2 text-center">
	<h3 class=" text-uppercase wrap-title px-3"><b>{!TITLE!}</b></h3>
  </div>
<?php 
} else { 
  ?>
	
<div class="wrapper mt-0">
  <?
} // блок кабинета
?>
<?php 
} else { 
  ?>

<div class="wrapper mt-0"><div class="wrapper2">
<?
}
?>
