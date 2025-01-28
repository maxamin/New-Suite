<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

######################################
# Скрипт FastCore
# Мерчант PAYKASSA
# Автор Jumast
######################################

# Старт сессии
session_start();

# Константа для Include
define('FastCore',true);

# Подгрузка классов системы
spl_autoload_register(function ($lfc) {
    require 'core/'.$lfc.'.php';
});

# Класс конфига
$config = new config;

# Функции
$func = new func;

$paykassa = new PayKassaSCI(
	$config->pkm_id,      // идентификатор мерчанта
	$config->pkm_pass // пароль мерчанта
);

//private_hash Мы посылаем в POST запросе при отправке IPN. Важно: для sci_confirm_order и sci_confirm_transaction_notification разные URL в настройках мерчанта.

$res = $paykassa->sci_confirm_order();
if ($res['error']) {        // $res['error'] - true если ошибка
	die('ERR1:'.$res['message'] ); 	// $res['message'] - текст сообщения
	// действия в случае ошибки
} else {
	// действия в случае успеха   
	   
    $shop_id = $res['data']['shop_id'];      // id мерчанта, с которого была сделана выплата, пример 122
	$id = $res["data"]["order_id"];        // уникальный числовой идентификатор платежа в вашей системе, пример: 150800
	$transaction = $res["data"]["transaction"]; // номер транзакции в системе paykassa: 96401
	$hash = $res["data"]["hash"];               // hash, пример: bde834a2f48143f733fcc9684e4ae0212b370d015cf6d3f769c9bc695ab078d1
	$currency = $res["data"]["currency"];       // валюта платежа, пример: DASH
	$system = $res["data"]["system"];           // система, пример: Dash
	$address = $res["data"]["address"];         // адрес криптовалютного кошелька, пример: Xybb9RNvdMx8vq7z24srfr1FQCAFbFGWLg
	$tag = $res["data"]["tag"];                 // Tag для Ripple и Stellar
	$partial = $res["data"]["partial"];         // настройка приема недоплаты или переплаты, 'yes' - принимать, 'no' - не принимать
	$amount = $res["data"]["amount"];    // сумма счета, пример: 1.0000000
    $explorer_address_link = $res["data"]["explorer_address_link"];          // Ссылка для просмотра информации о адресе
    $explorer_transaction_link = $res["data"]["explorer_transaction_link"];      // Ссылка для просмотра информации о транзакции
 
	if ($partial === 'yes') {
		// сумма заявки может не совпадать с полученной суммой, если включен режим частичной оплаты
		// актуально только для криптовалют, по умолчанию 'no'
	}

//	$num = $db->query("SELECT * FROM `db_insert` WHERE `id` = ?", $id)->numRows();
 //   if($num == 0) {	echo $res["data"]["order_id"].'|error'; exit(); }

    $data = $db->query("SELECT * FROM `db_insert` WHERE `id` = ? LIMIT 1", $id)->fetchArray();
    if($data['status'] == 0){ 
		//тут выполняем если все ок:

		$uid = $data['uid'];
		$sum = $data['sum'];
		$bal_type = $data['type'];
		$time = time();

		# Начисление с бонусом
		$bonx = $db->query("SELECT * FROM `db_percent` WHERE `type` = '1' ORDER BY `sum_a` BETWEEN {$sum} AND {$sum} OR {$sum} BETWEEN `sum_a` AND `sum_b`")->fetchArray();
		$bonus = $bonx['sum_x'];
		$sum_x = ($sum + ($sum * $bonus));
		
		 # Обновляем пользователя
		$db->query("UPDATE `db_users` SET `sum_in` = `sum_in` + '$sum', `ref_to` = `ref_to` + '$income', `money_p` = `money_p` + '$sum_x', `hold` = `hold` + '$sum_x' WHERE `id` = '$uid'");

    	# Реф-система
    	$uref = new income_ref($db);
    	$uref->uRef($uid, $sum);

	   $db->query('UPDATE db_insert SET `status` = ?, sum_x = ?, `end` = ? WHERE id = ?', '1', $sum_x, $time, $id);

		# Пишем в статистику
		$db->query("UPDATE `db_stats` SET `inserts` = `inserts` + '$sum' WHERE `id` = '1'");
      

        echo $id.'|success'; // обязательно, для подтверждения зачисления платежа
	}
}

?>