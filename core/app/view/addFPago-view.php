<?php

if(isset($_POST["nombre"])){	
	if(count($_POST)>0){
		$FindUser = new FormasDePagoData();
		$FindUser = FormasDePagoData::getByNombre($_POST["nombre"]);
		if(isset($FindUser->nombre))
		{			
			print "<script>window.location='index.php?view=NewuserError_Forma_DePago_Ya_existe';</script>";						
		}
		else
		{
			$user = new FormasDePagoData();
			$user->nombre = $_POST["nombre"];
			$user->descripcion = $_POST["descripcion"];			
			$user->estado = 1;
			$user->add();			
		}

	print "<script>window.location='index.php?view=pagos';</script>";
	}
}	
else
{	
	print "<script>window.location='index.php?view=pagos';</script>";
	
}


?>