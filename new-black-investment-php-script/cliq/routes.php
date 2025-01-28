<?php if(!defined('FastCore')){echo ('Выявлена попытка взлома!');exit();}

/**
 * Маршрутизатор (правила маршрутизации страниц).
 */

$GLOBALS['routes'] = array (
'_404' => '../inc/404.php', // 404
'/' => 'home.php', // Главная
'/i/([0-9]+)?' => '/home.php', // Реф-ссылка
'/view/([0-9]+)?' => '/inc/view.php', // iFrame
'/stats' => 'stats.php', // Статистика
'/bounty' => 'bounty.php', // Buy script
'/news' => 'news.php', // Новости
'/news/p/([0-9]+)?' => 'news.php',
'/ptc' => 'ptc.php',  // bux
'/adverts' => 'reviews.php', // О проекте
'/terms' => 'terms.php', // Правила
'/help' => 'help.php', // Поддержка

# Аккаунт
'/user' => 'mining.php', // Профиль
'/user/mining' => 'mining.php', // Профиль
'/user/bonus' => 'bonus.php', // Бонусы
'/user/finance' => 'finance.php', // my finance
'/user/bonus3' => 'bonus3.php', // Бонусы 3
'/user/shop' => 'boost.php', // Покупка скорости
'/user/store' => 'store2.php', // Профиль
'/user/insert' => 'insert.php', // Пополнить
'/user/insert/payeer2' => 'insert_py.php', // Пополнить payeer ручные
'/user/insert/([^/]+)' => 'insert.php', // Пополнить freekassa
'/user/pay' => 'pay.php', // Спобом заказа выплаты
'/user/pay/([^/]+)' => 'pay.php', // Выплата payeer
'/user/surf' => 'surf/earn.php', // Серфинг
'/user/surf/add' => 'surf/add.php', // Серфинг добавить
'/user/surf/edit' => 'surf/edit.php', // Серфинг редактирование
'/user/surf/links' => 'surf/links.php', // Серфинг кабинет
'/user/refs' => 'referals.php', // Рефералы
'/user/leaders' => 'leaders.php', // Лидеры дня
'/user/lucky' => 'freebet.php', // Счастливый билет
'/user/contest' => 'contest.php', // Конкурсы
'/user/settings' => 'settings.php', // Настройки
'/user/success' => 'status_success.php', // Success
'/user/fail' => 'status_fail.php', // Fail
'/user/logout' => 'mining.php', // Выход

# Админка
'/'.$adm.'' => 'login.php', // Вход
'/'.$adm.'' => 'main.php', // Главная
'/'.$adm.'/' => 'main.php', // Главная слеш
'/'.$adm.'/config' => 'config.php', // Настройки
'/'.$adm.'/contest_ref' => 'contest_refs.php', // Реф-конкурс
'/'.$adm.'/contest_ref/list' => 'contest_refs.php', // Реф-конкурс 
'/'.$adm.'/contest_ref/add' => 'contest_refs.php', // Реф-конкурс 
'/'.$adm.'/users' => 'users.php', // Пользователи
'/'.$adm.'/users/info/([0-9]+)?' => 'users.php', // Пользователь
'/'.$adm.'/users/p/([0-9]+)?' => 'users.php', // Пользователи страницы
'/'.$adm.'/uips' => 'uips.php', // Пользователи IP
'/'.$adm.'/uips/p/([0-9]+)?' => 'uips.php', // Пользователи страницы IP
'/'.$adm.'/st/([^/]+)' => 'stats.php', // Статистика
'/'.$adm.'/news' => 'news.php', // Новости
'/'.$adm.'/news/add' => 'news.php', // Новости
'/'.$adm.'/news/edit/([0-9]+)?' => 'news.php', // Новости
'/'.$adm.'/pers' => 'pers.php', // Персонажи
'/'.$adm.'/pers/add' => 'pers.php', // Персонажи
'/'.$adm.'/pers/edit/([0-9]+)?' => 'pers.php', // Персонажи
'/'.$adm.'/referers' => 'referers.php', // Источники
'/'.$adm.'/referers/all' => 'referers.php', // Источники
'/'.$adm.'/geo' => 'geo.php', // просмотры
'/'.$adm.'/fake' => 'fake.php', // Фейки
'/'.$adm.'/restart' => 'restart.php', // Фейки
'/'.$adm.'/pays' => 'pays.php', // руч.выплаты
);
?>