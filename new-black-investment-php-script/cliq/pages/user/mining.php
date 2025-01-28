<?php if(!defined('FastCore')){exit('Opss!');}

# Заголовок
$opt['title'] = 'My Account';

$url = ('https://'.$_SERVER['HTTP_HOST']);

# Пользователь вышел
if ($pg->segment[1] === 'logout') {
session_destroy(); header('Location: /'); return;
}

$db->query("SELECT * FROM db_conf WHERE id = '1' LIMIT 1");
$cnf = $db->fetchArray();

$time = time();

$db->Query("SELECT speed, bank, last, id FROM db_users WHERE id = '$uid'");
$pers = $db->FetchArray();

$percentU = 100;
$userSpeed = round($pers['speed']/$percentU/24,6); // кассу делим на 100 получаем скорость в час.

# Считаем выручку
$profit = $func->SumCalc($userSpeed, 1, $pers['last']);

	# Ограничиваем сбор
	if($pers['last'] < ($time-30)){
		if($profit > $cnf['min_s']){

		# Деньги на баланс пользователю
		$moneyAdd = $profit / $cnf['coint'];

		$db->query('UPDATE db_users SET money_p = money_p + ?, bank = bank - ?, bankout = bankout + ?, `last` = ? WHERE id = ?', $moneyAdd, $moneyAdd, $moneyAdd, $time, $uid);
	
	//	echo '<div class="alert alert-success">You have collected <b class="notranslate">'.$moneyAdd.'  {!VAL!}</b></div>';
 		} 
 	}


# Профит в процентах
if (($user['bankin'] * $user['bankout']) != 0) { $profitUser = ($user['bankout']*100)/$user['bankin']; } else { $profitUser = 0; }

?>
<style>
.countmining {font-size: 44px; }
@media only screen and (max-width: 691px) {
.countmining {font-size: 32px;
}
}
</style>

<div class="row row-grid align-items-center">
<div class="col-xl-8">
<div class="p-3 about" >
<div class="row row-grid align-items-center"> 
<div class="col-md-5 col-lg-4 text-md-end text-center">
		<div class="mining"><div class="rot"></div><div class="rot2 slow"></div></div>
</div>
<div class="col-md-7 col-lg-8 text-md-start text-center">
<div class="text-white" style="position: relative;z-index: 5;"><h5 class="card-title mb-0">MY BALANCE</h5>
    <h4 class="card-text mt-0 countmining" style="color: #e33;"><b id="mining_run"> <?=round($profit+$user['money_p'],6);?></b> <small>{!VAL!}</small></h4>
    
<script>
(function () {
	var writeTo = document.getElementById("mining_run");
	var sec = <?=$profit+$user['money_p'];?>;
	var a = setInterval(function () {
		sec = sec + (<?=round($userSpeed,6);?>/36000);
		writeTo.innerHTML = sec.toFixed(6);
	}, 100)
})();
</script>

</div>
<div class="w-100 mt-1 btn-balance">
		<a class="btn btn-lg btn-success p-2" href="/user/insert"><i class="fa fa-arrow-up"></i><span> <b>DEPOSIT</b></span></a>
		<a class="btn btn-lg btn-danger p-2" href="/user/pay"><i class="fa fa-arrow-down"></i><span> <b>WITHDRAW</b></span></a>
</div>
	</div>
</div>
</div>

</div>
<div class="col-xl-4 p-1">

<div class="row">
<div class="col-md-6 col-lg-6 col-xl-12 ">
<div class="mining-info mining-hover"><i class="fa fa-bolt text-center text-warning" style="width: 20px;"></i> My capacity: <b class="notranslate float-end text-danger"><?=round($user['bank'],2);?> {!VAL!}</b></div>
</div>
<div class="col-md-6 col-lg-6 col-xl-12">
<div class="mining-info mining-hover"><i class="fa fa-coins text-center text-primary" style="width: 20px;"></i> Daily profit: <b class="notranslate float-end text-danger"><?=round($userSpeed*24,2);?> {!VAL!}</b></div>
</div>
<div class="col-md-6 col-lg-6 col-xl-12">
<div class="mining-info mining-hover"><i class="fa fa-arrow-up text-center text-success" style="width: 20px;"></i> Deposit: <b class="notranslate float-end text-danger"><?=round($user['bankin'],2);?> {!VAL!}</b></div>
</div>
<div class="col-md-6 col-lg-6 col-xl-12">
<div class="mining-info mining-hover"><i class="fa fa-arrow-down text-center text-danger" style="width: 20px;"></i> Income: <b class="notranslate float-end text-danger"><?=round($user['bankout'],2);?> {!VAL!}</b></div>
</div>
</div>

</div>
</div>

<?php 

 // профит в процентах
 if (($profitUser) != 0) { 
	$processedPercent = round(($profitUser*100)/100,0);
} else {
	 $processedPercent = 0;
 }

# тут делаем красиво
if ($profitUser < $user['bankin']) { 
 ?>
 <style>
     .progress {
  display: flex;
  height: 1rem;
  overflow: hidden;
  font-size: .55rem;
  background-color: #444;
  border-radius: .25rem;
 </style>
<div class="progress mt-2" title="Your profit!">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-dark text-uppercase" role="progressbar" style="font-weight: bold;width: <?=$processedPercent;?>%;" aria-valuenow="<?=$processedPercent;?>" aria-valuemin="0" aria-valuemax="100">Income profit: <?=$processedPercent;?>%</div>
</div>
<? }
  ?>
<br>



<div class="text-center">
<h3 class="wrap-title text-center">TARIF UP MINING SPEED</h3>

<p class="mb-0">
Buy mining plans and improve your daily earnings.
</p><br>
</div>
<?php
include('boost.php');
?>