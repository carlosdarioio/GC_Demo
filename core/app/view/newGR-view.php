
<div class="row">
<div class="col-md-8">
      <h2 class="title">Nueva Compra / Gasto</h2>
<form class="form-horizontal" role="form" method="post" action="./?action=AddtGR" enctype="multipart/form-data">

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="form-group">
    
    <label  class="col-lg-2 control-label">Clasificacion</label>
    <div class="col-lg-4">

<input list="AllColors" type="text" name="classif_id" id="classif_id" class="form-control" required=true autocomplete="off">
<datalist id="AllColors">
<option value="">-- SELECCIONE --</option>
  <?php foreach(GastosData::getAll() as $p):?>   
    <option value="<?php echo $p->nombre; ?>" ><!--label="< ?php echo $p->name; ?>"-->	
  <?php endforeach; ?>
</datalist> 

    </div>
	
	<!--<a href="#" onclick="AddValue()">ALOLA</a>-->
	<script type="text/javascript">	
	
	function AddValue(){
		//alola optener list drio value
  const Value = document.querySelector('#classif_id').value;

  if(!Value) return;
alert(Value);
  const Text = document.querySelector('option[value="' + Value + '"]').label;

  const option=document.createElement("option");
  option.value=Value;
  option.text=Text;

  //document.getElementById('Colors').appendChild(option);
}
	</script>



	
	
	
	
<label  class="col-lg-2 control-label">Proveedor</label>
    <div class="col-lg-4">
<input list="AllProveedors" type="text" name="proveedor_id" id="proveedor_id" class="form-control" required=true autocomplete="off">
<datalist id="AllProveedors">
<option value="">-- SELECCIONE --</option>
  <?php foreach(ProveedorsData::getAll() as $p):?>   
    <option value="<?php echo $p->nombre; ?>" ><!--label="< ?php echo $p->name; ?>"-->	
  <?php endforeach; ?>
</datalist> 
    </div>
	
  </div>
  
  
  
    
   <div class="form-group">
    <label  class="col-lg-2 control-label">No. Documento</label>
    <div class="col-lg-4">
      <input type="number" name="no_doc" id="no_doc" class="form-control" placeholder="100000112" required=true>
    </div>
	
	 <label  class="col-lg-2 control-label">Documento Fiscal</label>
    <div class="col-lg-4">
      <input type="text" name="doc_fiscal" id="doc_fiscal" class="form-control" placeholder="002-005-01-00175546" required=true autocomplete="off">
    </div>
  </div>
  
  
  
  
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  
   <div class="form-group">
   <label  class="col-lg-2 control-label">%ISV</label>
    <div class="col-lg-4">
      <input type="number" name="isv" id="isv"  class="form-control" placeholder="100000112" required=true value="15" autocomplete="off">
    </div>
  </div>
  
  
 
  <!--Inicio AjContenido  -->

  <div class="form-group">
    <label  class="col-lg-2 control-label">SubTotal</label>
    <div class="col-lg-4">
      <input type="double" name="subtotal" id="subtotal" required class="form-control" autocomplete="off">
    </div>
	<label  class="col-lg-2 control-label">Total</label>
    <div class="col-lg-4">
    <input type="number" name="total" id="total"  class="form-control"  placeholder="total" required autocomplete="off">
    </div>
  </div>
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

  
  
  <div class="form-group">
	
	<label  class="col-lg-2 control-label">Formas de Pago</label>
    <div class="col-lg-4">
	<input list="AllFMs" type="text" name="formas_de_pago" id="formas_de_pago" class="form-control" required autocomplete="off">
	<datalist id="AllFMs">
	<?php foreach(FormasDePagoData::getAll() as $p):?>   
    <option value="<?php echo $p->nombre;?>" label="<?php echo $p->descripcion; ?>"><!--label="< ?php echo $p->name; ?>"-->	
  <?php endforeach; ?>
	</datalist> 
    </div>
	
	<label  class="col-lg-2 control-label">Concepto</label>
    <div class="col-lg-4">
      <input type="text" name="concepto" id="concepto" class="form-control" required autocomplete="off">
    </div>
	 
	
  </div>
  
  
  
  
  <div class="form-group">
  <label  class="col-lg-2 control-label">Referencia</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" required autocomplete="off">
    </div>
  
    <label  class="col-lg-2 control-label">Factura <small>Adjuntar</small></label>
    <div class="col-lg-4">
      <input type="file" name="file[]" multiple="multiple">
    </div>
  </div>
  
  <!---pruebas--->
  <!---pruebas--->
  
  
  
  

  
  <input type="hidden" name="status_id" value="1" >
  <input type="hidden" name="person_id" value="1" >
	

 
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Compra / Gasto</button>
    </div>
  </div>
  <br>  
</form>
</div>
</div>