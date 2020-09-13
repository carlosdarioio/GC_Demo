<?php
$r = new VTAData();

			//x aqui vas pasar no_referencia,no_factura a string y probar post vta
		$r->no_referencia=$_POST["referencia"];
		$r->no_factura=$_POST["factura"];
		//$r->fecha=date('Y-m-d', strtotime($_POST["fecha"]));
		$r->id_cliente=$_POST["cliente"];
		$r->subtotal=floatval($_POST["subtotal"]);
		$r->isv=floatval($_POST["isv"]);
		$r->total=floatval($_POST["total"]);
		$r->saldo=floatval($_POST["referencia"]);
		$r->status=$_POST["cstatus"];
		$r->idalmacen=AlmacenData::getByNombre($_POST["almacen_id"])->id;
		$r->id_usuario=$_SESSION['user_id'];

$r->add();
Core::redir("./index.php?view=newvta");//openticket || NewGR

?>