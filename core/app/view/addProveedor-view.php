<?php

if(isset($_POST["addnombre"])){	
	if(count($_POST)>0){
		$FindUser = new ProveedorsData();
		$FindUser = ProveedorsData::getByNombre($_POST["addnombre"]);
		if(isset($FindUser->addnombre))
		{			
			print "<script>window.location='index.php?view=NewuserError_El_Proveedor_Ya_existe';</script>";						
		}
		else
		{
			$user = new ProveedorsData();
			$user->nombre = $_POST["addnombre"];		
			$user->saldo = 0;		
			$user->estado = 1;
			$user->add();			
		}

	print "<script>window.location='index.php?view=proveedor';</script>";
	}
}	
else
{	
	print "<script>window.location='index.php?view=proveedor';</script>";
	
}


?>