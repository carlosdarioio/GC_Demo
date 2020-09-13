<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = FormasDePagoData::getById($_POST["upd_pago_id"]);
	$user->nombre = $_POST["upd_nombre"];
	$user->descripcion = $_POST["upd_DescPago"];
	$user->update();

	


print "<script>window.location='index.php?view=pagos';</script>";



}


?>