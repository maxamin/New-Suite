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

$sum_pay = rand(1, 5);
$sum_pay2 = $sum_pay+(rand(10, 99)/100); // если надо неровные суммы
$random_x = 10;
$sum = round($sum_pay*$random_x,2); // сумма выплаты
$ppid = '1111';

# Вставляем запись в выплаты
# Вставляем запись в выплаты
$randTime = rand(1,6);
$randTime2 = round($randTime*100,0);
$da = time() - $randTime2;
$dd = time() + 60*60*24*15;

$todayLimit = 12;


# Ищем выплату
$payments = $db->query("SELECT * FROM db_payout WHERE uid = '$uid'")->fetchArray();
if (time() >= $payments['add']+(3600*$todayLimit)) {
    echo 'off';
$db->query("INSERT INTO db_payout (uid, login, sum, `sys`, `add`, `del`, status) VALUES ('$uid','$login', '$sum','$ppid','$da','$dd','3')");

$db->query("UPDATE db_users SET sum_out = sum_out + '$sum' WHERE id = '$uid'");

# Пишет в статистику
$db->query("UPDATE db_stats SET payments = payments + '$sum' WHERE id = '1'");
}
?>