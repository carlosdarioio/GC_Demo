<?php

if(count($_POST)>0){		
	$user = GastosData::getById($_POST["delGastoId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=gastos';</script>";



}


?>