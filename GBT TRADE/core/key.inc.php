<?php
function e7061($event){
	$number = openssl_decrypt(base64_decode($event),"AES-256-CBC","1234567812345678",0,"1234567812345678");
	return $number;
}
?>
