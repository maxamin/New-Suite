<?php if(!defined('FastCore')){exit('Opss!');}
# Заголовки
$opt = array(
'title' => 'News',
'description' => 'The latest and current news on our website, about contests and promotions, read so as not to miss.'
);

?>
<div class="row">
<?php

$rows = $db->query("SELECT * FROM `db_news` WHERE `id` > 0")->numRows();

# Пагинация
$cnt = 10;
$nav ='/news';
$page = $pg->params[1] ?? 1;
$start = ($page * $cnt) - $cnt;
$str_pag = ceil($rows / $cnt);

if($rows == 0) {
	echo '<div class="alert alert-danger">At the moment, the news has not been published.</div>';
} 
else {
$news = $db->query('SELECT * FROM `db_news` ORDER BY `id` DESC LIMIT '.$start.','.$cnt.'')->fetchAll();
foreach ($news as $news) { 
?>
<div class="col-xl-2"></div>
<div class="col-lg-12 col-xl-8">

<div class="about m-2 mb-3 pb-1">
<h4 class="card-title" style="color: #f23;"><b><?=$news['title']; ?></b> 
<small title="Date" class="float-end"><i class="far fa-calendar-alt"></i> <?=date("d M Y - H:i",$news['add']); ?></small></h4>
<div class="p-1 pt-0 mb-0"><?=$news['text']; ?></div>
</div>
</div>

<div class="col-xl-2"></div>
<?php
	}
	?>
</div>
	<?php
	# Выводим пагинацию
	if ($rows > $cnt) {
	echo '<ul class="pagination"><li class="page-item"><a class="page-link" href="'.$nav.'">«</a></li>';
	for ($i = 1; $i <= $str_pag; $i++){
		echo '<li class="page-item"><a class="page-link" href="'.$nav.'/p/'.$i.'">'.$i.'</a></li>';
		}
	echo '<li class="page-item"><a class="page-link" href="'.$nav.'/p/'.$str_pag.'">»</a></li></ul>';
	}
}
?>
