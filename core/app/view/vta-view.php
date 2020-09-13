<?php
	if(!isset($_GET["id"])){
		//$_GET["status"]= $_GET["status2"];
		$_GET["status"]= "1";
		}
$users = VTAData::getByIdmd5($_GET["id"]);	
 ?>
<div class="row">
<div class="col-md-8">
      <h2 class="title">Visualizando Venta</h2>
<div class="form-horizontal" >

  <div class="form-group">
    <label  class="col-lg-2 control-label">No. Referencia</label>
    <div class="col-lg-4">
      <input type="number" name="referencia" id="referencia" class="form-control" value="<?php echo $users->no_referencia;?>" readonly>
    </div>
	
	 <label  class="col-lg-2 control-label">No Factura</label>
    <div class="col-lg-4">
      <input type="text" name="factura" id="factura" class="form-control" value="<?php echo $users->no_factura;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
   <label  class="col-lg-2 control-label">Fecha</label>
    <div class="col-lg-4">
      <input type="text" name="fecha" id="fecha" value="<?php echo $users->fecha;?>" class="form-control" readonly>
    </div>
  
   <label  class="col-lg-2 control-label">Cliente <!--(registrara x aqui no ocuba base de dts--></label>
    <div class="col-lg-4">
      <input type="text" name="cliente" id="cliente"  class="form-control" value="<?php echo $users->id_cliente;?>" readonly>
    </div>
  </div>
  
   <div class="form-group">
   <label  class="col-lg-2 control-label">%ISV</label>
    <div class="col-lg-4">
      <input type="number" name="isv" id="isv"  class="form-control" placeholder="100000112" readonly value="<?php echo $users->isv;?>">
    </div>
	
	 <label  class="col-lg-2 control-label">c Status</label>
    <div class="col-lg-4">
      <input type="text" name="cstatus" id="cstatus"  class="form-control" placeholder="100000112" value="CL" readonly>
    </div>
  </div>
  
  
  <div class="form-group">
    <label  class="col-lg-2 control-label">SubTotal</label>
    <div class="col-lg-4">
      <input type="double" name="subtotal" id="subtotal" class="form-control" readonly value="<?php echo $users->subtotal;?>"> 
    </div>
	<label  class="col-lg-2 control-label">Total</label>
    <div class="col-lg-4">
    <input type="number" name="total" id="total"  class="form-control"  placeholder="total" readonly value="<?php echo $users->total;?>">
    </div>
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <div class="form-group">
   <label  class="col-lg-2 control-label">Usuario</label>
    <div class="col-lg-4">
      <input type="text" name="usuario" id="usuario"  class="form-control" value="<?php echo UserData::getById($users->id_usuario)->name;?>" readonly>
    </div>
  </div>

  <div class="form-group">
   <label  class="col-lg-2 control-label">Almacen</label>
    <div class="col-lg-4">
      <input type="text" name="almacen" id="almacen"  class="form-control" value="<?php echo AlmacenData::getById($users->idalmacen)->nombre;?>" readonly>
    </div>
  </div>
  
   
  <br>  
</div>
</div>
</div>