<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = GastosData::getById($_POST["upd_user_id"]);
	$user->nombre = $_POST["upd_nombre"];
	$user->is_active=$is_active;
	
	$user->update();

	
//$tp2=GastosData::getById($_SESSION["upd_user_id"]);

print "<script>window.location='index.php?view=gastos';</script>";



}


?>