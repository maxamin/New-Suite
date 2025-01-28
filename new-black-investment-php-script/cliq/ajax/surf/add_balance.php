<?php
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

if (!defined('FastCore') || FastCore !== true) { Header('Location: /404'); return; }
if (!isset($_SESSION['uid'])) { exit(); }

if (!empty($_POST['surf_id'])) {
	
	$surf_id = filter_var($_POST['surf_id'],FILTER_SANITIZE_NUMBER_INT);
	$surfSum = filter_var($_POST['money'],FILTER_VALIDATE_FLOAT);

	if (empty($data)) {
		$numb =  $db->query('SELECT uid FROM db_surf WHERE id = ?', array($surf_id))->numRows();
		if ($numb > 0) {
				$data_surf = $db->query('SELECT uid FROM db_surf WHERE id = ?', array($surf_id))->fetchArray();
				$owner = $data_surf['uid'];
		if ($uid != $data_surf['uid']) {
				$data['error'] = 'The link does not belong to you!';
		}
	} else {
			$data['error'] = 'No link!';
		}
	}
	
	$data_user = $db->query('SELECT money_p, hold, sum_in FROM db_users WHERE id = ?', array($uid))->fetchArray();
	$balanceUser = $data_user['money_p'];
	$sumInUser = $data_user['sum_in'];

/* Ищем пополнения за последние дни */
$tlast = time()-60*60*2;
$tnow = time();
$last_in = $db->query('SELECT SUM(sum) FROM db_insert WHERE `add` >= '.$tlast.' AND `add` <= '.$tnow.' AND status = 1 AND `uid` = '.$uid.'')->fetchArray();
$lastInvest = round($last_in['SUM(sum)'],0); // Общая сумма пополнений

if ($lastInvest <= 99.99) {
    $lastInsert = 1; // ок
} else {
    $lastInsert = 0;
}
/* Конец лимита пополнений за последние дни */

	if ($surf_id === FALSE) {
		$data['error'] = 'Data error!';
	}
	if ($surfSum === FALSE) {
		$data['error'] = 'The amount is not specified!';
		$data['id'] = 'money';
	}
	if ($balanceUser <= $surfSum) {
		$data['error'] = 'Not enough funds!';
	}
	if ($sumInUser < 100) {
		$data['error'] = 'To pay for ads, make a deposit of 100 TRX or more.';
	}
	if ($lastInsert == 1) {
		$data['error'] = 'You have no deposits for 2 hours, please replenish your balance from 100 TRX.';
	}
	if ($surfSum < 0) {
		$data['error'] = 'The amount cannot be 0!';
	}
	if(!empty($data)){
		$data['status'] = 'error';
		$data['title'] = 'Error!';
		$data['redirect'] = '';
	}

	if(empty($data)){
		
	$sumPay = $surfSum; // трачу
	$sumHold = $data_user['hold']; // холд

	if($sumPay < $sumHold){
	    if ($sumHold > 0) {
	    	$hold = $sumPay;  
	    }
	    else {
	        $hold = $sumHold;
	    }
	//	$hold = 0 ? $sumHold : $sumPay;
	} else {
		$hold = $sumHold;
	}
		$db->query('UPDATE db_surf SET balance = balance + ? WHERE id = ?', $surfSum, $surf_id);
		$db->query('UPDATE db_users SET money_p = money_p - ?, hold = hold - ? WHERE id = ?', $surfSum, $hold, $uid);

		$db->close();
		
		$data['status'] = 'success';
		$data['title'] = 'Success';
		$data['error'] = 'You have successfully replenished the balance of the link for '.$surfSum.' TRX';
		$data['redirect'] = '';
		
	}
} else {
	$data['status'] = 'error';
	$data['title'] = 'Error';
	$data['error'] = 'Data error';
	$data['redirect'] = '';
}
echo json_encode($data);