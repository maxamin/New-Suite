<?php if(!defined('FastCore')){exit('Oops!');}
$opt['title'] = 'View ads';
$time = time();
?>



<div>
<div class="row row-grid align-items-center">
<div class="col-xl-9">
	
<p class="about text-start">
View the ads of advertisers and get paid to balance!</b><br/>
The administration is not responsible for advertising links posted in surfing.
</p>
</div>

<div class="col-xl-3">
<center class="mb-3">
<a href="/user/surf/links" class="btn btn-primary text-uppercase"><i class="fa fa-list"></i> ADD LINKS</a>
</center>
</div>
</div>
</div>
<hr class="my-1">
<div class="pt-2">
<style>
.surfblockopen{background-color: #d0F0e0;border-color: #D0D0D0;color: #808080;opacity:0.3;display:none;}
.panel-success {border-width: 2px;}
</style>
<script>
function showFrame(div, link) {
  window.open('/view/'+link, '_blank');
  $(div).parent().parent().parent().addClass("surfblockopen");
}
</script>

<div class="row row-cols-1 row">
<?

$useripi = $db->query('SELECT * FROM db_uips WHERE id = '.$uid.'')->fetchArray();
$country_user = $useripi['country'];

// $rowViews = $db->query('SELECT uid,link FROM db_surf_views WHERE uid = '.$uid.' AND time_end > '.time().' ORDER BY `time_end` DESC')->fetchAll();

$rowViews = $db->query('SELECT uid, link FROM `db_surf_views` WHERE `uid` IN('.$uid.') AND time_end > UNIX_TIMESTAMP() ORDER BY `id` DESC')->fetchAll();

$visitss = array();

foreach ($rowViews as $rv) {
$visitss[$rv['link']] = $rv;
}

$numms = $db->query("SELECT * FROM db_surf WHERE `balance` >= `price_click` and `status` = '1' ORDER BY vip DESC, price_click DESC, balance DESC")->fetchAll();
$is = 0;
 foreach ($numms as $surf) {
 if (isset($visitss[$surf['id']])) continue;

$eye = $surf['balance']/$surf['price_click'];

# ограничение по странам
if (isset($surf['country']) && $surf['country'] != 'XX|') {
	$country = explode('|', $surf['country']);
	if ($surf['crev']) {
		if (in_array($country_user, $country)) continue; // показывать
	}
	else {
		 if (!in_array($country_user, $country)) continue; // не показывать
	}
}

if ($surf['wind'] == 0) { $wind = ''; } else { $wind = '<span class="badge bg-white text-secondary"><b><i title="Active iframe" class="fa fa-desktop"></i></b></span> '; }
if ($surf['vip'] == 0) { $vip = 'btn-primary text-dark'; } else { $vip = 'btn-danger'; }

?>
<div class="col col-lg-6 col-xl-4 p-2">
<div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid rgba(45,40,25,0.1);">
<div class="p-1 text-center serf-link h-100">
 <?=$surf['title'];?>
</div>
<div class="p-1 text-center">
<span class="badge" title="per click"><i class="fa fa-gift"></i> <b><?=$surf['per_click']; ?> {!VAL!}</b></span> 
<span class="badge" title="timer"><i class="fa fa-clock"></i> <?=$surf['timer'];?> sec.</span> 
<span class="badge" title="views"><i class="fa fa-eye"></i> <?=sprintf("%.0f",$eye);?></span> 
</div>


<div class="text-center p-2" title="Pay per view">

<a href="#" onclick="showFrame(this, '<?=$surf['id'];?>');" class="btn w-75 <?=$vip;?>" title="Click to view">VIEW</a>

</div>

</div>
</div>
<? 
$is++;
 }
$asss = $is;

if (isset($asss) == true) { $surfEyes = $is; } else { $surfEyes = 0; }
?>
</div>
 <?
if ($surfEyes > 0) {

} else {
	echo '<div class="alert alert-warning text-center text-uppercase"><b>There are no links to view!</b></div>';
}

?>

</div>