<?php if(!defined('FastCore')){exit('Oops!');}

$opt['title'] = 'Make a deposit';

$systemPay = 'tron';
$currency = 'TRX';	
$percentPay = '0'; // комиссия
$minDep = 10; // Мин. размер депозита
$maxDep = 15000; // Макс. размер депозита
$sum_x = '0';


?>

<div class="mb-2">
	<div class="p-2">
		<h5 class="text-uppercase mb-0 text-center"><b>MAKE A DEPOSIT METHOD - <span style="color: #f23;">TRON (TRX)</span></b></h5>
	</div>

	<div class="p-2">
		<h6 class="text-uppercase mb-0 text-center">TRANSFER the exact amount shown on the PAYKASSA<br>PAYMENT SYSTEM AND CURRENCY - TRON ({!VAL!}).</h6>
	</div>
</div>

<?php



# Оплата 
$csrfCheck = $func->csrfVerify();
if (isset($_POST['sum']) && $csrfCheck == TRUE) {

$amount = number_format($_POST['sum'], 2, '.', ''); // сумма депозита
# проверка на мин.депозит и макс.депозит
if ($amount >= $minDep AND $amount <= $maxDep) {

# Заносим в БД
$db->query("INSERT INTO db_insert (uid, login, sum, sum_x, sys, `add`, role, status) VALUES ('$uid','$login','$amount','$sum_x','$currency', '".time()."','1','0')");
$order_idd = $db->LastInsert();
$comment  = 'Insert by id-' .$order_idd;

$paykassa = new PayKassaSCI(
	$config->pkm_id,      // идентификатор мерчанта
	$config->pkm_pass // пароль мерчанта
);

$system_id = [
	"perfectmoney" => 2, // поддерживаемые валюты USD    
	"berty" => 7, // поддерживаемые валюты RUB, USD    
	"bitcoin" => 11, // поддерживаемые валюты BTC    
	"ethereum" => 12, // поддерживаемые валюты ETH    
	"litecoin" => 14, // поддерживаемые валюты LTC    
	"dogecoin" => 15, // поддерживаемые валюты DOGE    
	"dash" => 16, // поддерживаемые валюты DASH    
	"bitcoincash" => 18, // поддерживаемые валюты BCH    
	"zcash" => 19, // поддерживаемые валюты ZEC    
	"ripple" => 22, // поддерживаемые валюты XRP    
	"tron" => 27, // поддерживаемые валюты TRX    
	"stellar" => 28, // поддерживаемые валюты XLM    
	"binancecoin" => 29, // поддерживаемые валюты BNB    
	"tron_trc20" => 30, // поддерживаемые валюты USDT    
	"binancesmartchain_bep20" => 31, // поддерживаемые валюты USDT, BUSD, USDC, ADA, EOS, BTC, ETH, DOGE    
	"ethereum_erc20" => 32, // поддерживаемые валюты USDT    
];

$res = $paykassa->sci_create_order(
	$amount,    // обязательный параметр, сумма платежа, пример: 1.0433
	$currency,  // обязательный параметр, валюта, пример: BTC
	$order_idd,  // обязательный параметр, уникальный числовой идентификатор платежа в вашей системе, пример: 150800
	$comment,   // обязательный параметр, текстовый комментарий платежа, пример: Заказ услуги #150800
	$system_id[$systemPay] // обязательный параметр, указав его Вас минуя мерчант переадресует на платежную систему, пример: 12 - Ethereum
);
?>
<div class="text-center">
<div style="display:none">
	<form  method="POST" id="payeer_form_real" action="<?php echo $res["data"]["url"]; ?>">
	</form>
</div>
Redirecting...
<script>
document.getElementById('payeer_form_real').submit();
</script>
</div>


<?php
}
 else {
	echo '<div class="alert alert-danger h5 p-3 text-center">Minimum deposit amount is <b>'.$minDep.' {!VAL!}.</b><br>
	Maximum deposit amount is <b>'.$maxDep.' {!VAL!}.</b></div>';
}
	return;
}


?>

<div class="row text-center text-uppercase">
<div class="col-lg-3"></div>
<div class="col-lg-6">
<div class="card mt-3">


<div class="p-3">

<form action="" method="post">
<?php $func->csrf(); ?>
    <div class="text-left">Deposit amount ({!VAL!}):</div>
<div class="input-group input-group-lg mb-2">
	<input type="text" class="form-control" value="50" min="<?=$minDep;?>" max="<?=$maxDep;?>" name="sum" onkeyup="generateThis();" id="getsum" />
	<span class="input-group-text">{!VAL!}</span>
</div>
<hr>
	<input type="submit" value="Go to payment" class="btn btn-lg btn-success text-uppercase"/>
</form>

</div>
</div>
</div>

<div class="col-lg-12">
<?php 
 include('inc/akcii.php');

?>
<div class="mb-3 mt-3">
<div class="p-2">
Commission deposit fees <b><?=$percentPay; ?>%</b>
</div>
</div>
</div>

</div>
