<?php
$gc  = CGData::getByIdmd5($_GET["id"]);
$user = UserData::getById($_SESSION['user_id']);
$gastos_claf = GastosData::getById($gc->clasificacion_id);
$proveedor=ProveedorsData::getById($gc->proveedor_id);
$formasDePago=FormasDePagoData::getById($gc->id_forma_de_pago);
$u3 = UserData::getById($_SESSION["user_id"]);
?>

<div class="">
<div class="row">
<div class="col-md-12">
<button onclick="goBack()">Atras</button>
<h3></h3>



 
		<div class="row">
			<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-info"></i>
              <h3 class="box-title"> GC # <?php echo $gc->numero_documento; ?></h3>
			  

<script>
function goBack() {
  window.history.back();
}
</script>
            </div>
            <div class="box-body chat" id="chat-box">
              <div class="item">
<br><br>

			

 		
    
<div class="form-group">
	<label  class="col-lg-2 control-label">Claficacion</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gastos_claf->nombre;?>" readonly>
    </div>
	
	
	<label  class="col-lg-2 control-label">Proveedor</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $proveedor->nombre;?>" readonly>
    </div>
	
	
	</div>
	
	
	<div class="form-group">
	<label  class="col-lg-2 control-label">NO. Documento:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gc->numero_documento;?>" readonly>
    </div>
	
	
	<label  class="col-lg-2 control-label">Documento fiscal:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gc->documento_fiscal;?>" readonly>
    </div>
	
	
	</div>
	
	<div class="form-group">
	<label  class="col-lg-2 control-label">Total:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gc->total;?>" readonly>
    </div>
	
	
	<label  class="col-lg-2 control-label">Forma de pago:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $formasDePago->nombre;?>" readonly>
    </div>
	
	
	</div>
	
	<div class="form-group">
	<label  class="col-lg-2 control-label">Concepto:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gc->concepto;?>" readonly>
    </div>
	
	
	<label  class="col-lg-2 control-label">Referenca:</label>
    <div class="col-lg-4">
      <input type="text" name="referencia" id="referencia" class="form-control" value="<?php echo $gc->referencia;?>" readonly>
    </div>
	
	
	</div>



			<div class="form-group">
			
                <?php if($gc->file!=""):
				$fila=explode("ZxxZ",$gc->file);
				if(count($fila)!=0)
				{
				foreach($fila as $value)
				{	
						if($value!=""){
				?>
				
                <div class="attachment">
				 <label  class="col-lg-3 control-label">Factura Adjunta :</label>
                  <small class="filename col-lg-1">
                    <a href='./storage/tickets/<?php echo $value; ?>' target="_blank"><i class='fa fa-file-o'></i> <?php echo $value;?></a>
                  </small>
                </div>
				<?php } }} endif; ?>
              </div>
        </div>
		  
		  
		  
		  
            </div>

          </div><!--Fib box-primary-->	
          </div><!--Fin col-md-8 -->
       
		  

          </div>
		  
	
		  

</div>
</div>
</div>
