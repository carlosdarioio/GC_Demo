
<div class="row">
<div class="col-md-8">
      <h2 class="title">Nueva Venta</h2>
<form class="form-horizontal" role="form" method="post" action="./?action=AddtVTA" enctype="multipart/form-data">

  <div class="form-group">
    <label  class="col-lg-2 control-label">No. Referencia</label>
    <div class="col-lg-4">
      <input type="number" name="referencia" id="referencia" class="form-control" placeholder="100000112" required=true autocomplete="off">
    </div>
	
	 <label  class="col-lg-2 control-label">No Factura</label>
    <div class="col-lg-4">
      <input type="text" name="factura" id="factura" class="form-control" placeholder="002-005-01-00175546" required=true autocomplete="off">
    </div>
  </div>
  
  
  <div class="form-group">
  <!--
   <label  class="col-lg-2 control-label">Fecha</label>
    <div class="col-lg-4">
      <input type="date" name="fecha" id="fecha"  class="form-control" required>
    </div>-->
  
   <label  class="col-lg-2 control-label">Cliente <!--(registrara x aqui no ocuba base de dts--></label>
    <div class="col-lg-4">
      <input type="text" name="cliente" id="cliente"  class="form-control" required autocomplete="off">
    </div>
  </div>
  
   <div class="form-group">
   <label  class="col-lg-2 control-label">%ISV</label>
    <div class="col-lg-4">
      <input type="number" name="isv" id="isv"  class="form-control" placeholder="100000112" required=true value="15">
    </div>
	
	 <label  class="col-lg-2 control-label">c Status</label>
    <div class="col-lg-4">
      <input type="text" name="cstatus" id="cstatus"  class="form-control" placeholder="100000112" value="CL" readonly>
    </div>
  </div>
  
  
  <div class="form-group">
    <label  class="col-lg-2 control-label">SubTotal</label>
    <div class="col-lg-4">
      <input type="double" name="subtotal" id="subtotal" class="form-control" readonly>
    </div>
	<label  class="col-lg-2 control-label">Total</label>
    <div class="col-lg-4">
    <input type="number" name="total" id="total"  class="form-control"  placeholder="total" required>
    </div>
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <div class="form-group">
   <label  class="col-lg-2 control-label">Usuario</label>
    <div class="col-lg-4">
      <input type="text" name="usuario" id="usuario"  class="form-control" value="<?php echo UserData::getById($_SESSION['user_id'])->name;?>" readonly>
    </div>
  </div>

  
    <div class="form-group">
    
    <label  class="col-lg-2 control-label">Almacen</label>

	


	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="col-lg-4">
<input list="AllProveedors22" type="text" name="almacen_id" id="almacen_id" class="form-control" required=true autocomplete="off">
<datalist id="AllProveedors22">
<option value="">-- SELECCIONE --</option>
  <?php foreach(AlmacenData::getAll() as $p):?>   
    <option value="<?php echo $p->nombre; ?>" ><!--label="< ?php echo $p->name; ?>"-->	
  <?php endforeach; ?>
</datalist> 
    </div>
	
  </div>
  
  
  
    
   
  
  
  
  

  


  
 
  
  
 
  <!--Inicio AjContenido  -->

  <script>
  $("#total").change(function(){
	  //const isv=$('#isv').val();
	  //const subtotal=$('#subtotal');
	  if($('#isv').val()>0)
	  {
		  console.log('pasa');
		  $('#subtotal').val($('#total').val()-$('#total').val()*($('#isv').val()/100));
	  }else{console.log('no pasa');}
  //$('#subtotal').val('55');
});
  </script>

  
  

  
  

  
  <input type="hidden" name="status_id" value="1" >
  <input type="hidden" name="person_id" value="1" >
	

 
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Venta</button>
    </div>
  </div>
  <br>  
</form>
</div>
</div>