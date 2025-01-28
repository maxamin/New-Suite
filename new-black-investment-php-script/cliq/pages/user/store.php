<?php if(!defined('FastCore')){exit('Opss!');}

# Заголовок
$opt['title'] = 'Collect Profit';


$db->query("SELECT * FROM db_conf WHERE id = '1' LIMIT 1");
$cnf = $db->fetchArray();
?>

<div class="p-2 alert bg-light border-4 mt-2 mb-1">
<p class="mb-0">
Increase your income, for this you need  
<a class="alert-link text-decoration-none text-dark" href="/user/shop">BUY FRUIT</a> different levels, 
the more expensive, the more earnings.
 
Get a daily bonus that increases the rate of earnings, bonuses for replenishment. 
Invite referrals and get money from their deposits.
</p>
</div>
<?php
$time = time();

$db->Query("SELECT speed, bank, last, id FROM db_users WHERE id = '$uid'");
$pers = $db->FetchArray();

$percentU = 100;
$userSpeed = round($pers['bank']/$percentU/24,6); // кассу делим на 100 получаем скорость в час.

# Считаем выручку
$profit = $func->SumCalc($userSpeed, 1, $pers['last']);

if(isset($_POST['sbor'])){

	# Ограничиваем сбор
	if($pers['last'] < ($time-600)){
		if($profit > $cnf['min_s']){

		# Деньги на баланс пользователю
		$moneyAdd = $profit / $cnf['coint'];

		$db->query('UPDATE db_users SET money_p = money_p + ?, bank = bank - ?, bankout = bankout + ?, `last` = ? WHERE id = ?', $moneyAdd, $moneyAdd, $moneyAdd, $time, $uid);
	
		echo '<div class="alert bg-success text-white">You have collected <b class="notranslate">'.$moneyAdd.' usd</b></div>';
 		} else echo '<div class="alert bg-danger text-white">Minimum amount to collect <b class="notranslate">'.$cnf['min_s'].' usd</b></div>';
 	} else echo '<div class="alert bg-danger text-white">You have already collected profits in the last 10 minutes!</div>';
}

# Профит в процентах
if (($user['bankin'] * $user['bankout']) != 0) { $profitUser = ($user['bankout']*100)/$user['bankin']; } else { $profitUser = 0; }

?>
<div class="text-center">

    <div style="position: relative;z-index: 5;">
	<center>
		<img src="/img/about.png" style="max-width: 300px;">
	</center>
    <h4 class="card-text mt-5 mb-1" style="font-size: 56px;color: #fd2;"><b id="mining_run"> <?=sprintf("%.6f",$profit);?></b> <small class="fa fa-dollar-sign"></small></h4>
    <h5 class="card-title">YOUR EARNING NOW</h5>

<script>
(function () {
	var writeTo = document.getElementById("mining_run");
	var sec = <?=sprintf("%.6f",$profit);?>;
	var a = setInterval(function () {
		sec = sec + (<?=$userSpeed;?>/36000);
		writeTo.innerHTML = sec.toFixed(6);
	}, 100)
})();
</script>

    <p class="card-text">
        
<form action="" method="post" class="mt-3 mb-2">
	<input type="hidden" name="sbor" value="<?=$pers['id']?>">
	<button type="submit" class="btn btn2 btn-lg btn-danger mb-2">
    <i class="far fa-money-bill-alt"></i> <b style="font-weight: 900;">COLLECT</b></button>
</form>
    </p>
</div>
</div>
	<style>
		.floatopacity {
			position: absolute;
			right: 10px; top: 10px;
			font-size: 38px;
			opacity: 0.1;
		}
		.panel {
			border1: 2px dashed rgba(210, 57, 182, 1) !important;	
			border-radius: 1em;
			border-width: 2px;
			padding: 10px;
		}
		.panel b {
			font-weight: 800;
			font-size: 1.2em;
			opacity: 0.9;
		}
		.panel:hover .floatopacity {
			font-size: 46px;
		}
	</style>

	<div class="row">

<div class="col-lg-4">
<div class="card card-body alert-danger text-dark panel mt-2">
	<b class="notranslate"><?=round($user['bank'],2);?> usd.</b><br/>Your bonus
	<i class="fa fa-gift text-danger floatopacity" style="opacity: 0.3;"></i>
</div></div>

<div class="col-lg-4">
<div class="card card-body alert-warning text-dark panel mt-2">
	<b class="notranslate"><?=round($userSpeed*24,4);?> usd.</b><br/>Income per day
	<i class="fa fa-tachometer-alt text-warning floatopacity" style="opacity: 0.4;"></i>
</div></div>

<div class="col-lg-4">
<div class="card card-body alert-success text-dark panel mt-2">
	<b class="notranslate"><?=round($profitUser,2);?>% (<?=$user['bankout'];?> usd)</b><br/>Profit earn
	<i class="fa fa-percent text-success floatopacity" style="opacity: 0.2;"></i>
</div></div>

	</div>