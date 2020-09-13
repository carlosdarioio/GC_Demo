<?php

if(count($_POST)>0){		
	$user = FormasDePagoData::getById($_POST["delPagoId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=pagos';</script>";



}


?>