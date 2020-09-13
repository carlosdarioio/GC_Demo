<?php

if(isset($_POST["nombre"])){	
	if(count($_POST)>0){
		$FindUser = new AlmacenData();
		$FindUser = AlmacenData::getByNombre($_POST["nombre"]);
		if(isset($FindUser->nombre))
		{			
			print "<script>window.location='index.php?view=NewuserError_El_usuario_Ya_existe';</script>";						
		}
		else
		{
			$user = new AlmacenData();
			$user->nombre = $_POST["nombre"];		
			$user->descripcion = $_POST["descripcion"];		
			$user->estado = 1;
			$user->add();			
		}

	print "<script>window.location='index.php?view=almacenes';</script>";
	}
}	
else
{	
	print "<script>window.location='index.php?view=almacenes';</script>";
	
}


?>