<?php if(!defined('FastCore')){exit('Opss!');}

# Заголовок
$opt['title'] = 'Daily bonus';

# Бонус выдача
$dep = round($user['sum_in']);
$bon = round($user['earn_bonus'],2);

if ($dep > 49.99) {
	$sum = round($dep/20,2);
} else {
	$sum = '0.5';
}
?>
<div class="about text-center">
Get a bonus of <font style="color: #f24;"><b>5%</b></font> of your account deposits every 24 hours. <br>
The more funds you have deposited or promoted, the higher the daily bonus.<hr class="my-2">
<span class="btn text-light btn-sm btn-outline-success text-uppercase">Your deposit: <b><?=$dep;?> {!VAL!}</b></span>
<span class="btn text-light btn-sm btn-outline-dark text-uppercase">Your bonus: <b><?=$sum;?> {!VAL!}</b></span>
<span class="btn text-light btn-sm btn-outline-danger text-uppercase">Bonus collect: <b><?=$bon;?> {!VAL!}</b></span>
</div>

<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$hide = false;


$true = $db->query("SELECT * FROM `db_bonus` WHERE `uid` = '$uid' AND `del` > '$dadd'")->numRows();
if($true == 0){

# Выдача бонуса
if(isset($_POST["bonus"])){

	# Зачилсяем бонус
	$db->query("UPDATE db_users SET `money_p` = `money_p` + '$sum', `earn_bonus` = `earn_bonus` + '$sum' WHERE `id` = '$uid'");
	# Вносим запись в список бонусов
	$db->query('INSERT INTO db_bonus (`login`, `uid`, `sum`, `add`, `del`) VALUES (?,?,?,?,?)', array($login, $uid, $sum, $dadd, $ddel));
	# Случайная очистка устаревших записей
	$db->query("DELETE FROM db_bonus WHERE `del` < '$dadd'");
	echo '<div class="alert alert-success">You have received a bonus balance: <b>'.$sum.' {!VAL!}</b>.</div>';
	$hide = true;
}

# Скрыть кнопку
if(!$hide){
?>

		
<div class="pb-3 text-center">
<form action="" method="post">
<input type="submit" name="bonus" value="CLAIM BONUS" class="btn btn-lg btn-success mt-2">
</form>
</div>

<?PHP 
	}
}
else {
	$udata = $db->query("SELECT * FROM db_bonus WHERE uid = '$uid'")->fetchArray();

	# Таймер
	$dt=$udata['del']-time();
	$dd=(int)($dt/86400);
	$hh=(int)(($dt-$dd*86400)/3600);
	$mm=(int)(($dt-$dd*86400-$hh*3600)/60);
	$ss=(int)($dt-$dd*86400-$hh*3600-$mm*60);
?>
<div class="text-uppercase p-3 text-center">Until the next bonus is left: <br/>
<h4 class="text-warning"><i class="far fa-clock"></i> <b><?=sprintf("%02d <small>hour</small> %02d <small>min</small> %02d <small>sec</small>", $hh, $mm, $ss);?></b></h4>
</div>
<?php
	}
?>
<div class="stats pb-1 mb-2 mt-3">
<div class="stats-title text-uppercase text-white">Last 10 bonuses</div>
<table class="stats2 table table-sm table-striped mb-0">  
<thead>
		<th class="text-center">#</th>
	<th class="text-start">User</th>
	<th class="text-center">Bonus</th>
	<th class="text-end">Time</th>
</thead>
<?php

$bon = $db->query("SELECT * FROM `db_bonus` ORDER BY `id` DESC LIMIT 10")->fetchAll();
if($bon == false) { 
	echo '<tr><td colspan="4">Bonus empty</td></tr>';
}
foreach ($bon as $b) {
?>
<tr class="notranslate">
			<td class="text-center"><img src="/img/trx.png" height="20" /> </td>
    <td class="text-start"><b><?=substr($b['login'],0,-20); ?><span style="color: #f24;">*****</span></b></td>
    <td class="text-center"><span class="text-sum"><?= sprintf("%.2f",$b['sum']); ?> <small>{!VAL!}</small></span></td>
	<td class="text-end"><?=date("d M Y - H:i:s",$b['add']); ?></td>
</tr>
<?php
	}

?>
</table>
</div>