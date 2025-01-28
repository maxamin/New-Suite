<?php if(!defined('FastCore')){exit('Opss!');}

# Заголовок
$opt['title'] = 'Referral system';

# Экономия места
$income = $user['income'];
$refs = $user['refs'];
$url = ('https://'.$_SERVER['HTTP_HOST']);
$lp = ($url.'/img/promo/');


?>


<div class="row row-grid align-items-center">
<div class="col-xl-8">
<div class="about p-3">
	
Referral system is a great opportunity to get passive earnings every day!<br/>
Below is a special link for invitations and statistics of your referrals.


<div class="row mt-2">
<div class="col-lg-12 col-xl-8 pt-0">
<form action="" method="post" onsubmit="submitfromexchange(this);return false">
<small class="text-warning text-uppercase">Referral link:</small>
<div class="input-group">
	<span class="input-group-text"> <i class="fa fa-link"></i> </span>
	<input type="text" onclick="this.select()" class="form-control" value="<?=$url.'/i/'.$uid; ?>">

</div>

</form>

</div>
<div class="col-lg-12 col-xl-4 text-center">
<button class="btn text-uppercase btn-success mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#demo"><i class="fa fa-copy"></i> <span class="btn-inner--text">Promo GIF</span> </button>
</div>

</div></div>
</div>
<div class="col-xl-4 p-1">

<div class="row">
<div class="col-lg-4 col-xl-12 ">
<div class="mining-info mining-hover"><i class="fa fa-percent"></i> REF.SYSTEM: <b class="notranslate float-end text-danger">15-3%</b></div>
</div>
<div class="col-lg-4 col-xl-12">
<div class="mining-info mining-hover"><i class="fa fa-coins"></i> INCOME: <b class="notranslate float-end text-danger"><?=$income; ?> {!VAL!}</b></div>
</div>
<div class="col-lg-4 col-xl-12">
<div class="mining-info mining-hover"><i class="fa fa-users"></i> REFERALS: <b class="notranslate float-end text-danger"><?=$refs; ?> PEOPLE</b></div>
</div>
</div>

</div>
</div>




<div id="demo" class="p-3 collapse">
<div class="row">
	<div class="col-md-8">
<div class="mb-2">
<div class="p-2">
<img src="<?=$lp;?>468.gif" alt="img">
<h6 class="card-title">Banner size:</h6>
<div class="input-group mb-1">
<span class="input-group-text">468x60 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>468.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">728x90 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>728.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">200x300 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>200.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">300x250 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>300.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">250x250 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>250.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">150x150 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>150.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">125x125 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>125.gif">
</div>
<div class="input-group mb-1">
<span class="input-group-text">100x100 </span>
<input type="text" onclick="this.select()" class="form-control" value="<?=$lp;?>100.gif">
</div>
</div></div>



	</div>

	<div class="col-md-4">
<div class="">
	<div class="p-2">
<img src="<?=$lp;?>200.gif" alt="img">
</div>

	</div>

	</div>
</div>
</div>

<br>

<div class="stats pb-1 mb-2 mt-3">
<div class="stats-title text-uppercase text-white">Referrals list</div>
<div class="table-responsive">
<table class="stats2 table table-sm table-striped mb-0">  
                <thead>
                  <tr scope="row">
                    <th scope="col">Login</th>
                    <th scope="col" class="text-center">Income</th>
                    <th scope="col" class="text-center">Site</th>
                    <th scope="col" class="text-end">Date</th>
                  </tr>
                </thead>
                <tbody>
<?PHP

if (isset($_POST["reflogin"])) {
	$searchRef = filter_var($_POST["reflogin"], FILTER_SANITIZE_STRING);
	$ref = $db->query("SELECT login, ref_to, refsite, reg FROM db_users WHERE rid = '$uid' AND login = '$searchRef'")->fetchAll();
} 
else {
    $ref = $db->query("SELECT ref_to, refsite, login, reg FROM db_users WHERE rid = '$uid' ORDER BY ref_to DESC LIMIT 200")->fetchAll();
}
	foreach($ref as $r){
?>
<tr>
	<td scope="row"><?=substr($r['login'],0,-20); ?><span style="color: #f23;">*****</span></td>
	<td class="text-center"><?=sprintf("%.3f",$r['ref_to']); ?></td>
	<td class="text-center"><?=$r['refsite']; ?></td>
	<td class="text-end"><?=date("d M Y - H:i:s",$r['reg']); ?></td>
</tr>
<?PHP
	}
?>
                </tbody>
              </table>
            </div>
            </div>
