<?php

if(isset($_POST["nombre"])){	
	if(count($_POST)>0){
		$FindUser = new GastosData();
		$FindUser = GastosData::getByNombre($_POST["nombre"]);
		if(isset($FindUser->nombre))
		{			
			print "<script>window.location='index.php?view=NewuserError_El_usuario_Ya_existe';</script>";						
		}
		else
		{
			$user = new GastosData();
			$user->nombre = $_POST["nombre"];		
			$user->estado = 1;
			$user->add();			
		}

	print "<script>window.location='index.php?view=gastos';</script>";
	}
}	
else
{	
	print "<script>window.location='index.php?view=gastos';</script>";
	
}


?>