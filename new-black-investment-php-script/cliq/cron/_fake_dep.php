<?php
# Старт сессии
session_start();

# Константа для Include
define('FastCore',true);

# Подгрузка классов
spl_autoload_register(function ($lfc) {
    require '../core/'.$lfc.'.php';
});

# Класс конфига
$config = new config;

# определяем юзера
$user_data = $db->query("SELECT id, login FROM db_users WHERE role = '2' ORDER BY RAND() LIMIT 1")->fetchArray();
$login = $user_data['login'];
$uid = $user_data['id'];

$random_x = rand(2, 25);
$sum = round($random_x*10,2); // сумма депа

# Начисление с бонусом
$bonx = $db->query("SELECT * FROM `db_percent` WHERE `type` = '1' ORDER BY `sum_a` BETWEEN {$sum} AND {$sum}
OR {$sum} BETWEEN `sum_a` AND `sum_b`")->fetchArray();

$bonus = $bonx['sum_x'];
$sum_x = ($sum + ($sum * $bonus));
$ps = 'payeer';

# Вставляем запись в выплаты
$randTimee = rand(1,10);
$randTime = round($randTimee*100,0);
$da = time() - $randTime;
$dd =  time() - $randTime;

$rand_cron = rand(1,3);
if ($rand_cron == 2) {
    
# В статистику попополнений
$db->query("INSERT INTO db_insert (uid, login, sum, sum_x, sys, `add`, `end`, status, role) VALUES ('$uid','$login','$sum','$sum_x','$ps','$da','$dd','1','2')");

# Начисляем баланс
$db->query("UPDATE `db_users` SET `sum_in` = `sum_in` + '$sum', `money_p` = `money_p` + '$sum_x', `hold` = `hold` + '$sum_x' WHERE `id` = '$uid'");

# Реф-система
$uref = new income_ref($db);
$uref->uRef($uid, $sum);
	
# Вставляем статистику
$db->query("UPDATE db_stats SET inserts = inserts + '$sum' WHERE id = '1'");
	}

?>