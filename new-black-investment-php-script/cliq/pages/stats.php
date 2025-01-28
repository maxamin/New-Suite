<?php if(!defined('FastCore')){exit('Opss!');}
# Заголовки
$opt = array(
'title' => 'Online stats',
'keywords' => 'Online stats, users, top, referal, members, earning',
'description' => 'Statistics of our project, you can see the leaders and the activity of the players.'
);

# Статистика
$stats = $db->query("SELECT * FROM db_stats WHERE id = '1'")->fetchArray();

function num2word($num = 0, $words = array())
{
    $num     = (int) $num;
    $cases   = array(2, 0, 1, 1, 1, 2);
    return $num . ' <small>' . $words[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}

$prworks = intval(((time() - $config->start_time) / 86400 ) +1);

?>


<div class="row text-center text-uppercase mb-2 mt-2">

<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-users"></i> <b class="stat-count"><?=$stats['users'];?> <small>people</small></b></div><div class="stat-title">Users</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-briefcase"></i> <b class="stat-count"> <?=$stats['inserts'];?> <small class="notranslate">{!VAL!}</small> </b></div><div class="stat-title">Deposits</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-money-bill"></i> <b class="stat-count">  <?=$stats['payments'];?> <small class="notranslate">{!VAL!}</small> </b></div><div class="stat-title">paid out</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-clock"></i> <b class="stat-count"><?=num2word($prworks, ['DAY', 'DAY', 'DAYS']); ?></small></b></div><div class="stat-title">Running online</div></div></div>
</div>

<br>
<style>
@media only screen and (max-width: 721px) {

.stats {
  padding: 5px 2px 0;
}
.table td {font-size: 11px;
}
.table-sm > :not(caption) > * > * {
  padding: .25rem 1px;
}
.hidetime f2023630{
  display:none !important;
}
}
</style>
<div class="row  p-lg-3">
<div class="col-md-6 p-lg-2">
<div class="stats pb-1">
<div class="stats-title text-uppercase text-white">Last 20 deposits</div>
<div class="table-responsive">
<table class="stats2 table table-sm table-striped mb-0">
	<thead>
		<th class="text-center">#</th>
		<th>User</th>
		<th class="text-center">Sum</th>
		<th class="text-end pe-lg-2">Time</th>
	</thead>
<?php
$inserts = $db->query('SELECT * FROM db_insert WHERE status = 1 ORDER BY end DESC LIMIT 20')->fetchAll();
foreach ($inserts as $inserts) {
		?>
		<tr class="notranslate">
			<td class="text-center"><img src="/img/trx.png" height="20" /> </td>
			<td><?=substr($inserts['login'],0,-22); ?><span style="color: #ccd;">*****</span></td>
			<td class="text-center"><span class="text-sum"><?= sprintf("%.2f",$inserts['sum']); ?> <small>{!VAL!}</small></span></td>
			<td class="text-end pe-lg-2 hidetime"><?=date('d M <font>Y -</font> H:i',$inserts['end']); ?></td>
  		</tr>
		<?php
	}
  ?>
</table></div>
</div>
</div>


<div class="col-md-6 p-lg-2">
<div class="stats pb-1">
<div class="stats-title text-uppercase text-white">Last 20 payouts</div>
<div class="table-responsive">
<table class="stats2 table table-sm table-striped mb-0">
	<thead>
		<th class="text-center">#</th>
		<th>User</th>
		<th class="text-center">Sum</th>
		<th class="text-end pe-lg-2">Time</th>
	</thead>
<?php
$payout = $db->query('SELECT * FROM db_payout ORDER BY `add` DESC LIMIT 20')->fetchAll();
foreach ($payout as $payout) {
		?>
		<tr class="notranslate">
			<td class="text-center"><img src="/img/trx.png" height="20" /></td>
			<td><?=substr($payout['login'],0,-22); ?><span style="color: #ccd;">*****</span></td>
			<td class="text-center"><span class="text-sum"><?= sprintf("%.2f",$payout['sum']); ?> <small>{!VAL!}</small></span> </td>
			<td class="text-end pe-lg-2 hidetime"><?=date("d M <font>Y -</font> H:i",$payout['add']); ?> </td>
  		</tr>
		<?php
	}
  ?>
</table></div>
</div></div>



</div>