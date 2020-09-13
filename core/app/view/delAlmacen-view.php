<?php

if(count($_POST)>0){		
	$user = AlmacenData::getById($_POST["delAlmacenId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=almacenes';</script>";



}


?>