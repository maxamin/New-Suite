<?php if(!defined('FastCore')){exit('Oops!');}

$opt['title'] = 'Withdrawal of funds';

if ($user['ban'] == 1){
    exit('Your account has been blocked for violating the rules');
}

# Конфигурация
$db->query("SELECT * FROM db_conf WHERE id = '1' LIMIT 1");
$cnf = $db->fetchArray();

/* Ищем пополнения за последние дни */
$tlast = time()-60*60*24*5;
$tnow = time();
$last_in = $db->query('SELECT SUM(sum) FROM db_insert WHERE `add` >= '.$tlast.' AND `add` <= '.$tnow.' AND status = 1 AND `uid` = '.$uid.'')->fetchArray();
$lastInvest = round($last_in['SUM(sum)'],0); // Общая сумма пополнений

if ($user['sum_in'] <= 199.9) {
if ($lastInvest <= 49.99) {
    $lastInsert = 1; // ок
} else {
    $lastInsert = 0;
}
} else {
    $lastInsert = 0;
}
/* Конец лимита пополнений за последние дни */


# Параметры лимитов
$accPay = 50; // 1 USD
$accPay2 = 200; // 1 USD

# начисляем лимит 
$dep = $user['sum_in'];
$refDep = round($user['income'],2);

if($dep >= $accPay2 && $dep <= 100000) {
    $sumlimit = $dep / 4;
    $sumlimit = floor($sumlimit);
    $sumlimit = round($sumlimit,2);
    $userHitr = 0; // заглушка
   } else {
    $userHitr = 1; // заглушка
    $sumlimit = 25;
   }

   $valid = $user['login'];
   $varPy = 'DXtp6FhA3NXP2e434343ptFjaMECDcJ';
   $systemPay = 'tron';
   $currency = 'TRX';
   $commision = '10.00';
   $minPay = 10;
   $maxPay = 2500;
   $maxPay2 = $sumlimit;
   $todayLimit = 24;

?>
			
<script>
var longtext = "<?=$user["login"]; ?>";
var smalltext = "<?=substr_replace($user['login'], "<span style='color: #f23;'>xxxxxx</span>", -18, 9); ?>";
$(function() {
    $("#mytrx").html(smalltext);
    var done = false;
    $("#mytrx").click(function() {
        if (!done) {
            done = true;
            $(this).text(longtext);
        }
    });
});
</script>	

<div class="mb-2">
	<div class="p-0 pt-2">
		<h5 class="text-uppercase mb-0 text-center"><b>Payments are made quickly and automatically.</b></h5>
	</div>

	<div class="p-2">
		<h6 class="mb-0 text-center">Minimum payout: <?=$minPay;?> {!VAL!} Maximum payout:  <?=$maxPay;?> {!VAL!} in transactions.</h6>
	</div>
</div>

<?

# Фильтрация кошельков
$wallet = new wallets();
$pWallet = 'tron_wallet';
$purse = $wallet->$pWallet($valid);

$sumUser = $user['money_p']-$user['hold']; // -hold

# Заносим выплату
$csrfCheck = $func->csrfVerify();
if(isset($_POST['pay']) && $csrfCheck == TRUE) {

$sum = filter_var($_POST['sum'], FILTER_VALIDATE_FLOAT);
$com = $sum - ($sum * $commision /100); // коммисия 0%
$com = round($com,2); // коммисия 0%

  # валидация кошелька
if($purse == $valid) {
  # период выплат
  $payments = $db->query("SELECT * FROM db_payout WHERE uid = '$uid'")->fetchArray();
if (time() >= $payments['add']+(3600*$todayLimit)) {  
  # лимит минимальной и максимальной стандарт
if ($sum >= $minPay AND $sum <= $maxPay) {
  # заглушка
if($user['sum_in'] >= $accPay) {
  # баланс юзера
if($sum <= $sumUser) {
  # лимит минимальной и максимальной от суммы депозита
if ($sum >= $minPay AND $sum <= $maxPay2) {
  # если несколько дней не пополнял хотим ещё
if ($lastInsert == 0) {
  # большая сумма в ручные
if ($sum > 21) {

# Снимаем с пользователя
$db->query("UPDATE db_users SET money_p = money_p - '$sum' WHERE id = '$uid'");

# Вставляем запись в выплаты
$da = time();
$dd = $da + 60*60*24*15;
$ppid = 1;
$db->query("INSERT INTO db_payout (uid, login, sum, `sys`, `add`, `del`, status) VALUES ('$uid', '$purse','$sum','$ppid','$da','$dd','1')");
$db->query("UPDATE db_users SET sum_out = sum_out + '$sum' WHERE id = '$uid'");

# Пишет в статистику
$db->query("UPDATE db_stats SET payments = payments + '$sum' WHERE id = '1'");

	echo '<div class="alert alert-success">The request for payment has been sent, wait for the administrator to check!<br/><small> verification time usually takes from 10 minutes to 24 hours.</small></div>';
}
else {
	# Делаем выплату							
	$paykassa_api_id = $config->pka_id;
	$paykassa_api_password = $config->pka_pass;
	$paykassa_merchant_id = $config->pkm_id;
														 
	$test = false; // тестовый режим false - выключен, true - включен
														
														
    $wallet = $purse;
    $comment = 'Payoy by id-'.$user['id'];
    $paid_commission = '';
    $tag = $purseTag;
    $real_fee = true; // поддерживаются - BTC, LTC, DOGE, DASH, BSV, BCH, ZEC, ETH
    $priority = "high"; // low - медленно, medium - средне, high - быстро

    $paykassa = new PayKassaAPI($paykassa_api_id,$paykassa_api_password,$test);
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

 $res = $paykassa->api_payment(
        $paykassa_merchant_id,  // обязательный параметр, id мерчанта с которого нужно сделать выплату
        $system_id[$systemPay],    // обязательный параметр, id платежного метода
        $wallet,                // обязательный параметр, номер кошелька на который отправляем деньги
        (float)$com,         // обязательный параметр, сумма платежа, сколько отправить
        $currency,              // обязательный параметр, валюта платежа
        $comment,               // обязательный параметр, комментарий к платежу, можно передать пустой
        $paid_commission,       // необязательный параметр, кто оплачивает комиссию за перевод, shop или client
        $tag,                   // необязательный параметр, тег для выплаты, можно передать пустой
        $real_fee,              // устаревший параметр, всегда имеет значение true
        $priority               // необязательный параметр(по умолчанию medium), используется для задания
                                // приоритета включения в блок вместе с $real_fee === true
    );
	if ($res['error']) {        // $res['error'] - true если ошибка
	//	echo $res['message'];   // $res['message'] - текст сообщения об ошибке
		echo '<div class="alert alert-danger text-center">Internal error - report it to the administrator!</div>';
	} else {
    //действия в случае успеха
	$shop_id = $res['data']['shop_id'];                         // id мерчанта, с которого была сделана выплата, пример 122
	$transaction = $res['data']['transaction'];                 // номер транзакции платежа, пример 130236
	$txid = $res['data']['txid'];                               // txid 70d6dc6841782c6efd8deac4b44d9cc3338fda7af38043dd47d7cbad7e84d5dd , может быть пустым,
	// в этом случае информацию о транзакции можно получить с помощью универсальной ссылки из поля explorer_transaction_link, смотрите ниже
	$amount = $res['data']['amount'];                           // сумма выплаты, сколько списалось с баланса мерчанта, 0.42
	$amount_pay = $res['data']['amount_pay'];                   // сумма выплаты, столько пришло пользователю, пример: 0.41
	$system = $res['data']['system'];                           // система выплаты, куда была сделана выплата, пример: Bitcoin
	$currency = $res['data']['currency'];                       // валюта выплаты, пример: BTC
	$number = $res['data']['number'];                           // номер адреса куда были отправлены средства
	$comission_percent = $res['data']['shop_comission_percent'];// комиссия за перевод в процентах, пример: 1.5
	$comission_amount = $res['data']['shop_comission_amount'];  // комиссия за перевод сумма, пример: 1.00
	$paid_commission = $res['data']['paid_commission'];         // кто оплачивал комиссию, пример: shop

	$explorer_address_link = $res["data"]["explorer_address_link"];          // Ссылка для просмотра информации о адресе
	$explorer_transaction_link = $res["data"]["explorer_transaction_link"];      // Ссылка для просмотра информации о транзакции


# Снимаем с пользователя
$db->query("UPDATE db_users SET money_p = money_p - '$sum' WHERE id = '$uid'");

# Вставляем запись в выплаты
$da = time();
$dd = $da + 60*60*24*15;
$db->query("INSERT INTO db_payout (uid, login, sum, `add`, `del`, status) VALUES ('$uid','$purse','$sum','$da','$dd','3')");
$db->query("UPDATE db_users SET sum_out = sum_out + '$sum' WHERE id = '$uid'");

# Пишет в статистику
$db->query("UPDATE db_stats SET payments = payments + '$sum' WHERE id = '1'");
	echo '<div class="alert alert-success">Funds have been successfully transferred to your wallet</div>';
} 
}
  } else echo '<div class="alert alert-danger">You have not replenished your balance for more than 7 days, top up your game balance!<br/>
<b>At the moment, your deposits '.$lastInvest.' {!VAL!}. The required amount is from 50 {!VAL!}.</b><br/>
If you deposit more than 200 {!VAL!} for the entire time, there will no longer be a need to replenish the balance.
</div>';
}else echo '<div class="alert alert-danger">Minimum payout amount is <b>'.$minPay.' {!VAL!}.</b><br>
Maximum payout amount is <b>'.$maxPay2.' {!VAL!}.</b></div>';
  }else echo '<div class="alert alert-warning">Error. Available balance for withdrawal '.$sumUser.' {!VAL!}.</div>'; // Доступно для вывода
	}else echo '<div class="alert alert-danger">Make a deposit on '.$accPay.' {!VAL!}. After that, the payouts will be available.</div>';	 // заглушка 1
  }else echo '<div class="alert alert-danger">Minimum payout amount is <b>'.$minPay.' {!VAL!}.</b><br>
	Maximum payout amount is <b>'.$maxPay.' {!VAL!}.</b></div>';
	}else echo '<div class="alert alert-danger">You have already ordered a payment for the last '.$todayLimit.' hour. </div>'; // лимит час
	}else echo '<div class="alert alert-warning">Purse '.$purse.' filled in incorrectly</div>'; // ошибка кошелька
}
?>

<div class="row text-center">
<div class="col-lg-3"></div>
<div class="col-lg-6">
<div class="card mt-3">


<div class="p-3">

    <form action="" method="POST">
<?php $func->csrf(); ?>
<label class="text-uppercase">Your wallet doge:</label>

<div class="input-group mb-2">

<div class="form-control"><i class="fa fa-wallet text-danger"></i> <span id="mytrx"></span></div>
</div>
<div class="p-3 text-uppercase"><label>Payout amount:</label>



<div class="input-group input-group-lg mb-2">
	<input type="text" class="form-control" placeholder="Payout amount" value="<?=round($sumUser,2); ?>" min="<?=$minPay;?>" max="<?=$maxPay;?>" name="sum">
	<span class="input-group-text">{!VAL!}</span>
</div>
<hr>
<button class="btn btn-lg btn-success text-uppercase" name="pay" type="submit">Withdraw</button>
</div></form>

</div>
</div>

</div>
