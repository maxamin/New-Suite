<?php if(!defined('FastCore')){ exit('Oops!'); }

# База данных
const dbHost = 'localhost';
const dbUser = 'tritonsw_test';
const dbPass = 'tritonsw_test';
const dbName = 'tritonsw_test'; 

# Подключение к БД
include('classes/db.php');
$db = new db(dbHost, dbUser, dbPass, dbName);

class config {
	# Настройки сайта
	public $start_time = '1692378000'; // Старт (timestamp).
	public $sitename = 'TRON COIN'; // Название сайта
	public $email = 'support@troncoin.pro'; // Почта
	
	public $bonus = '100.000000'; // Бонус за регистрацию
	public $valuta = 'TRX'; //  Валюта сайта
	public $percent = '10'; // Процент доходност

	# Админка 
	# Меняйте директорию всегда под себя
	public $adm_dir = 'adminka'; // Директория
	public $adm_name = 'admin'; // Логин
	public $adm_pass = '123456'; // Пароль

    # PAYKASSA
	public $pkm_id = '11111'; // ID магазина
	public $pkm_pass = 'iT5lp8wxboTKWkw08767JqrI0ANvvIe3'; // PASS магазина
	public $pka_id = '22222'; // ID API
	public $pka_pass = 'NW1G95lQoLRxVlsV76PigT7N4CLXQJ3K'; // PASS API 
}

?>