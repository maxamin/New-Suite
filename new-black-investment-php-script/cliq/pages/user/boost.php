<?php if(!defined('FastCore')){exit('Opss!');}

# Персонажи
$pers = $db->query('SELECT * FROM db_tarif')->fetchAll();

# Покупка персонажа
if(isset($_POST['buy']) && $id = intval($_POST['buy'])) {
	foreach ($pers as $buy) {
		if($buy['id'] === $id) {

			# Проверка баланса
			if($buy['price'] <= $user['money_p']) {

			# Характеристика
			$title = $buy['title'];
			$price = $buy['price'];
			$speed = round($buy['price']*$buy['speed'],4);
			$bank = round($buy['price']*$buy['profit_speed'],4);
			$time = time();

	$sumPay22 = $price; // трачу
	$sumHold = $user['hold']; // холд

	if($sumPay22 < $sumHold){
	    if ($sumHold > 0) {
	    	$holdm = $sumPay22;  
	    }
	    else {
	        $holdm = $sumHold;
	    }
	} else {
		$holdm = $sumHold;
	}

			# Обновляем пользователя
			$db->query('UPDATE db_users SET money_p = money_p - ?, speed = speed + ?, bank = bank + ?, bankin = bankin + ?, hold = hold - ?, `last` = ? WHERE id = ?
			', $price, $speed, $bank, $price, $holdm, $time, $uid);
		
		//	$db->query("INSERT INTO db_store (uid, tarif, title, speed, level, `add`, `end`, `last` ) VALUES ('$uid', '$id', '$title', '$speed', '1', '$time', '$end', '$time')");
			echo '<div class="alert alert-success text-center">You bought '.$title.' <b>and received mining '.$bank.' {!VAL!}</b>. </div>';

			} else echo '<div class="alert alert-danger text-center">Not enough funds to pay!</div>';	
		}
	}
}
?>
<div class="row tarif">

<?php
foreach($pers as $b){
$month= round(($b['speed']*100)/100,4)*30;
$profitPrc= round(($b['profit_speed']*100),4);
if ($b['id'] == 1) {
	$duration = '8';
}
if ($b['id'] == 2) {
	$duration = '6';
}
if ($b['id'] == 3) {
	$duration = '4';
}
if ($b['id'] == 4) {
	$duration = '3';
}
if ($b['id'] == 5) {
	$duration = '2';
}
?>


<div class="col-xl-4 col-lg-6 p-2">

<br><br><br><br>
<div class="card mb-1">
<div class="row row-grid align-items-center">
<div class="col-lg-12 ps-auto pe-lg-0 pe-xl-0">
	<div class="tarif-position">
<div class="tarif-img"><div class="rot" style="animation-duration: <?=$duration;?>s;"></div><div class="rot2 animated pulse infinite slow" style='background: url("/img/items/<?=$b['id'];?>.png") no-repeat center center;'></div></div>
	</div>
</div>
<div class="col-lg-12 ps-auto">
<div class="p-2">
<h3 class="card-title ps-0 text-center mt-1 mb-0"><?=$b['title'];?></h3>

<div class="mb-2">
<table class="tarif-table">
	<tr>
	<td>
	<div class="tarif-info">
	Income per day: <b class="notranslate float-end"><?=round(($b['price']*$b['speed'])/100,4); ?> {!VAL!}</b>
	</div>
	</td>
	<td>
	<div class="tarif-info2"><b class="notranslate">+<?=($month/30); ?> %</b></div>
	</td>
	</tr>
	
	<tr>
	<td>
	<div class="tarif-info">
	Income per month: <b class="notranslate float-end"><?=round(($b['price']*$b['speed'])/100,4)*30; ?> {!VAL!}</b>
	</div>
	</td>
	<td>
	<div class="tarif-info2"><b class="notranslate">+<?=($month); ?> %</b></div>
	</td>
	</tr>

	<tr>
	<td>
	<div class="tarif-info">
	Total profit: <b class="notranslate float-end"><?=$b['price']*$b['profit_speed']; ?> {!VAL!}</b>
	</div>
	</td>
	<td>
	<div class="tarif-info2"><b class="notranslate">+<?=($profitPrc); ?> %</b></div>
	</td>
	</tr>
</table>
</div>

<table class="tarif-table">
<tr>
	<td>
<form action="" method="post" class="m-0">
<input type="hidden" name="buy" value="<?=$b['id'];?>" />
<button class="btn btn-danger" type="submit">BUY</button>
</form>
	</td>
	<td>
	<div class="tarif-info2">PRICE: <b class="notranslate"><?=$b['price']; ?>  {!VAL!}</b></div>
	</td>
	</tr>
</table>
</div>
</div>
</div>
</div>



</div>
<?php
	}
?> 

</div>
