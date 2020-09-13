<?php

if(count($_POST)>0){		
	$user = CGData::getById($_POST["deGCId"]);	
	$user->inactive();
print "<script>window.location='index.php?view=home';</script>";



}


?>