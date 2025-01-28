<?php if(!defined('FastCore')){exit('Opss!');}

# Заголовок
$opt['title'] = 'My finance';

?>

<div class="row text-center text-uppercase mb-2 mt-2">
<div class="col-md-6 col-lg-6">
	<div class="card">
		<div class="stat2"><i class="fa fa-arrow-up text-success"></i>
<b class="stat-count"> <?=$user['sum_in'];?> <small>{!VAL!}</small> </b>
	</div>
		<div class="stat-title">Total deposits</div>
		 
		<a class="btn btn-success p-2 shadow-none" href="/user/insert"><span> <b>Deposit</b></span></a>
	</div>
</div>
<div class="col-md-6 col-lg-6">
	<div class="card">
		<div class="stat2"><i class="fa fa-arrow-down text-danger"></i>
<b class="stat-count"> <?=$user['sum_out'];?> <small>{!VAL!}</small> </b>
	</div>
		<div class="stat-title">Total payouts</div>
		
		<a class="btn btn-danger p-2 shadow-none" href="/user/pay"><span> <b>Withdraw</b></span></a>
	</div>
</div>
</div>



<div class="row p-3">
<div class="col-md-6 p-2">
<div class="stats pb-1">
<h5 class="text-uppercase text-white text-center">My last deposits</h5>
<table class="stats2 table table-sm table-striped mb-0">
	<thead>
		<th class="text-center">Status</th>
		<th class="text-center">Sum</th>
		<th class="text-end pe-2">Time</th>
	</thead>
<?php
$status_array = array(0 => '<span class="badge bg-warning text-dark">Wait...</span>', 1 => '<span class="badge bg-success text-white">Success</span>'); // статусы

$inserts = $db->query('SELECT * FROM db_insert WHERE uid = '.$uid.' ORDER BY id DESC LIMIT 10')->fetchAll();
foreach ($inserts as $inserts) {
		?>
		<tr class="notranslate">
			<td class="text-center"><?=$status_array[$inserts['status']]; ?> </td>
			<td class="text-center"><span class="text-sum"><?= sprintf("%.2f",$inserts['sum']); ?> <small>{!VAL!}</small></span></td>
			<td class="text-end pe-2"><?=date("d M Y - H:i",$inserts['add']); ?></td>
  		</tr>
		<?php
	}
  ?>
</table>
</div>
</div>


<div class="col-md-6 p-2">
<div class="stats pb-1">
<h5 class="text-uppercase text-white text-center">My last payouts</h5>
<table class="stats2 table table-sm table-striped mb-0">
	<thead>
		<th class="text-center">Status</th>
		<th class="text-center">Sum</th>
		<th class="text-end pe-2">Time</th>
	</thead>
<?php
$status_array2 = array(0 => '<span class="badge bg-warning text-dark">Wait...</span>', 1 => '<span class="badge bg-warning text-dark">Wait...</span>', 2 => '<span class="badge bg-danger">Cancel</span>', 3 => '<span class="badge bg-success text-white">success</span>');
$payout = $db->query('SELECT * FROM db_payout WHERE uid = '.$uid.' ORDER BY id DESC LIMIT 10')->fetchAll();
foreach ($payout as $payout) {
		?>
		<tr class="notranslate">
			<td class="text-center"><?=$status_array2[$payout['status']]; ?></td>
			<td class="text-center"><span class="text-sum"><?= sprintf("%.2f",$payout['sum']); ?> <small>{!VAL!}</small></span> </td>
			<td class="text-end pe-2"><?=date("d M Y - H:i",$payout['add']); ?> </td>
  		</tr>
		<?php
	}
  ?>
</table>
</div></div>



</div>