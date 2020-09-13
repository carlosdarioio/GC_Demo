<?php

if(count($_POST)>0){
	$is_active=0;	
	$user = ProveedorsData::getById($_POST["upd_prov_id"]);
	$user->nombre = $_POST["upd_nombre"];
	$user->update();

	


print "<script>window.location='index.php?view=proveedor';</script>";



}


?>