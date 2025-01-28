<?php if(!defined('FastCore')){exit('Opss!');}
# Заголовки
$opt = array(
'title' => 'mining earn real money',
'keywords' => 'mining farm, game, ptc, claim bux, php, review, earn, free bonus trx',
'description' => 'tron mining - online mining with real money withdrawal. Free bonus 100 trx'
);

if ($uid) { } else {
# Вставляем в куки ID пригласителя /i/123
if (isset($pg->params[1])) {
$refd = (intval($pg->params[1]) > 0) ? intval($pg->params[1]) : 1;
setcookie('i',$refd,time()+(60*60*24*14), '/'); 
header('Location: /'); return;
}

# Форма регистрации
if (isset($_POST['reg'])){

    # Фильтрация кошельков
    $wallet = new wallets();
    $login = $wallet->tron_wallet($_POST["tron"]);
    
    $time = time();
    
    # Источник перехода
    if (!empty($_COOKIE['rsite'])) $rsite = $_COOKIE['rsite'];
    $host = parse_url($rsite);
    $siter = $host['host'];
    if ($siter) { 
    $site = $siter;
     } else {
    $site = 'noref';
    }

    # Кто пригласил
    $rid = (isset($_COOKIE["i"])) ? intval($_COOKIE["i"]) : 1;
    $referer = $rid == 1 ? null : $db->query('SELECT login FROM db_users WHERE id = ? LIMIT 1',array($rid))->fetchArray();
    $referer = $referer['login'];
    
    if($referer == null) {$rid = 1; $referer = "Admin";}
    
    # IP адрес
    $ipGet = $func->ipGet();
    $ip = $func->ipValid($ipGet);
    
    # Проверка на валидность
    //if(empty($_POST['g-recaptcha-response'])) { $errors[] = 'Ошибка распознавания капчи!'; }
    if(empty($login)) { $errors[] = 'Error Dogecoin-wallet (DOGE)!'; }
    
    
    # Проверка на уникальность
    $users = $db->query('SELECT * FROM db_users WHERE login = ?',array($login))->fetchArray();

    if ($users['login'] == $login){  
     
    # Если забанен
    if ($users['ban'] == 1) { $errors[] = 'Your account has been blocked!'; } else {


        $userID = $users['id'];
        $db->query('UPDATE db_users SET auth = ? WHERE id = ?',array($time, $userID));
        $db->query('UPDATE db_uips SET ip2 = ?, time = ? WHERE id = ?',array($ip, $time, $userID));
        $_SESSION['uid'] = $users['id'];
        $_SESSION['login'] = $users['login'];
        echo '<div class="alert alert-success"> Welcome!</div> </div></div>'; 
        header('Location: /user/mining');return;
     } 
    
    } else {
    
$ipUser = $db->query('SELECT * FROM db_uips WHERE ip = ?',array($ip))->numRows();
if ($ipUser >= 5){ $errors[] = 'Registration from this IP ('.$ip.') has already been!'; }

    # Успешная регистрация
    if (empty($errors)) {
     
        $speed = $config->bonus;
    
        # Создаем пользователя
        $db->query('INSERT INTO db_users (login, reg, auth, money_p, hold, last, rid, referer, refsite) VALUES (?,?,?,?,?,?,?,?,?)', array($login, $time, $time, $speed, $speed, $time, $rid, $referer, $site));
        $lid = $db->LastInsert();
    
        # Дополнительно
        $db->query('INSERT INTO db_uips (id,ip,ip2,time) VALUES (?,?,?,?)', array($lid, $ip, $ip, $time));
        
        # Прибавляем рефоводу +1
        $db->query('UPDATE db_users SET refs = refs + ? WHERE id = ?',array('1',$rid));
         
    if ($lid) {
        # Пишем в статистику
        $db->query("UPDATE `db_stats` SET `users` = `users` + 1 WHERE `id` = '1'");
    }

        $_SESSION['uid'] = $lid;
        $_SESSION['login'] = $login;
    echo ' <center><div class="dogehome"></div></center><hr>';
        echo '<div class="alert alert-success text-center"> WELCOME!</div></div></div>'; 
        header('Refresh: 2; URL=/user/mining'); return;
        }
    else {
        # Вывод ошибок
        echo '<div class="alert alert-danger">'.array_shift($errors).'", "error"); </div>';
        }
    }
    }
}    
?>

<div class="row mt-0 text-center">
      <div class="col-xl-12 ">
      </div>
      <div class="col-xl-3">
      </div>
      <div class="col-xl-6">
      
<?php if ($uid) { ?>
    <center>
    <div class="dogehome"></div></center><hr>
<a href="/user/mining" class="btn btn-lg btn-danger btn-home me-auto  animated tada">BACK TO ACCOUNT</a>
  <?php } else { ?>
    <form action="" method="POST">
    <div class="dogehome" style="max-width: 90%;"></div>
    <div class="mb-3 login-home animated shake">
      <input type="text" name="tron" class="form-control" id="floatingInput" placeholder="TRON-WALLET" style="font-size: 22px;line-height: 30px;">
    <span class="input-ico"><img src="/img/trx.png" alt="tron"></span>
    </div> 
     <h2 class="logo-title2 text-uppercase pb-2"> Welcome bonus <span class="d-block d-md-inline"><b>100 {!VAL!}</b> <i class="fa fa-gift"></i></span></h2>
  
    <div class="m-auto">
    <button name="reg" type="submit" class="btn btn-lg btn-danger btn-home me-auto  animated tada">START</button>
    </div>
    </form>

  <?php } ?>
      </div>
    </div>

<br>


 
<?php 
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
<div class="row text-center text-uppercase mb-3 mt-5">

<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-users"></i> <b class="stat-count"><?=$stats['users'];?> <small>people</small></b></div><div class="stat-title">Users</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-briefcase"></i> <b class="stat-count"> <?=$stats['inserts'];?> <small class="notranslate">{!VAL!}</small> </b></div><div class="stat-title">Deposits</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-money-bill"></i> <b class="stat-count">  <?=$stats['payments'];?> <small class="notranslate">{!VAL!}</small> </b></div><div class="stat-title">paid out</div></div></div>
<div class="col-md-6 col-lg-3"><div class="stat"><div class="stat2"><i class="fa fa-clock"></i> <b class="stat-count"><?=num2word($prworks, ['DAY', 'DAY', 'DAYS']); ?></small></b></div><div class="stat-title">Running online</div></div></div>
</div>



<div class="m-lg-4 m-xl-5 mb-0">

<center><h4 class="wrap-title2 text-uppercase pb-2">How much can I earn?</h4>
<p style="font-size: 120%;" class="pt-2 pb-3">
We nide good earnings , you need to log in to your account and get bonus.<br>
You can earn up to 10% daily profits. The more you deposit, the more you earn. <br>
The only limit is your total rewards amount can not exceed 500% of your initial investment.
</p>

</center>


<center><h4 class="wrap-title2 text-uppercase pb-2">How to start</h4>
<div class="col-sm-12 p-2">
            <div class="card about p-0">
              <div class="p-1">
              <div class="row">
                <div class="col-lg-3 col-md-6 p-2">
                  <b>1. Register</b>
                  <p class="text-secondary text-small">Get free bonus 100 {!VAL!}</p>
                </div>

                <div class="col-lg-3 col-md-6 p-2">
                  <b>2. Deposit</b>
                  <p class="text-secondary text-small">Make deposits and receive bonuses</p>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                  <b>3. Buy Mining Package</b>
                  <p class="text-secondary text-small">Improve capacity and earn more</p>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                  <b>4. Withdraw income</b>
                  <p class="text-secondary text-small">You can withdraw 5000 TRX daily</p>
                </div>
            </div>
                
              </div> 
            </div>
          </div>
</center>
<br>
<div class="row">

<div class="col-lg-4">
<div class="row check-list oval-left">
<div class="col-12 animated bounceInLeft"><div class="check-oval"><i class="fas fa-gift"></i> </div> 
<span><b>WELCOME BONUS 100 {!VAL!}</b> </span></div>
<div class="col-12 animated bounceInLeft delay-2s"><div class="check-oval"><i class="fas fa-star"></i> </div> 
<span><b>DAILY BONUS UP TO 50 {!VAL!}</b></span></div>
</div>
</div>

<div class="col-lg-4">
<div class="row check-list oval-left">
<div class="col-12 animated bounceInLeft delay-1s"><div class="check-oval"><i class="fa fa-coins"></i> </div> 
<span><b>DAILY PROFIT +10%</b> </span></div>

<div class="col-12 animated bounceInRight delay-1s"><div class="check-oval"><i class="fas fa-users"></i> </div> 
<span><b>REFERAL SYSTEM 15-3%</b></span></div>
</div>
</div>

<div class="col-lg-4">
<div class="row check-list oval-right">
<div class="col-12 animated bounceInRight"><div class="check-oval"><i class="fas fa-eye"></i> </div> 
<span><b>EARN PTC | ADS</b> </span></div>
<div class="col-12 animated bounceInRight delay-2s"><div class="check-oval"><i class="fas fa-check"></i> </div> 
<span><b>FAST PAYMENTS {!VAL!}</b></span></div>
</div>
</div>

</div>


</div>
