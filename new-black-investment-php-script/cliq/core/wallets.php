<?php if(!defined('FastCore')){echo ('Выявлена попытка взлома!');exit();}

class wallets {

	# TRON фильтрация
	public function tron_wallet($purse){
		if( substr($purse,0,1) != "T") return false;
				if(!preg_match("#^[A-Za-z0-9]{12,50}$#", $purse)) return false;	
	return $purse;
	}
	# Payeer фильтрация
	public function payeer_wallet($purse){
		if( substr($purse,0,1) != "P") return false;
		if( !preg_match("#^[0-9]{7,14}$#", substr($purse,1)) ) return false;	
	return $purse;
	}
	# Qiwi фильтрация
	public function qiwi_wallet($purse){
		if( !preg_match("#^[\+]{1}[7]{1}[9]{1}[\d]{9}$#",$purse) ) return false;
	return $purse;
	}
	# Яндекс фильтрация
	public function yandex_wallet($purse){
		if( !preg_match("#^41001[0-9]{7,11}$#",$purse) ) return false;
         return $purse;
	}
	# Visa фильтрация
	public function visa_wallet($purse){
		if( !preg_match("#^41001[0-9]{12,15}$#",$purse) ) return false;
         return $purse;
	}
	# FKwallet фильтрация
	public function fkwallet_wallet($purse){
		if( !preg_match("#^([F]{1}[\d]{5,10})$#",$purse) ) return false;
         return $purse;
	}
	# PerfectMoney фильтрация
	public function perfect_wallet($purse){
		if( !preg_match("#^([U]{1}[\d]{5,10})$#",$purse) ) return false;
         return $purse;
	}
	# Bitcoin фильтрация
	public function bitcoin_wallet($purse){
		if( !preg_match("#^[A-Za-z0-9]{32,62}$#",$purse) ) return false;
         return $purse;
	}
	# Litecoin фильтрация
	public function litecoin_wallet($purse){
		if( !preg_match("#^([ML]+|ltc1)[A-Za-z0-9]{28,43}$#",$purse) ) return false;
         return $purse;
	}
}
?>