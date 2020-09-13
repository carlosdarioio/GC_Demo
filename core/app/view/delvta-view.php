<?php

if(count($_POST)>0){		
	$user = VTAData::getById($_POST["deVTAId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=home';</script>";



}


?>