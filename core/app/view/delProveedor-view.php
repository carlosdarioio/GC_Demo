<?php

if(count($_POST)>0){		
	$user = ProveedorsData::getById($_POST["delProveedorId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=proveedor';</script>";



}


?>