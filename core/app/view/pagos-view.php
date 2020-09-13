<div class="row">
	<div class="col-md-12">
      <h2 class="title">FormasDePago</h2>
	<?php
	$formasDePago= array();	
	$formasDePago = FormasDePagoData::getAll();		
	?>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class='fa fa-user'></i> Nueva Forma De Pago
              </button>
	<br><br>
	
	<?php
		$formasDePago = FormasDePagoData::getAll();
		if(count($formasDePago)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table ID="DataTable" class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Estado</th>			
			<th></th>
			</thead>
			<?php
			foreach($formasDePago as $user){
				?>
				<tr>
				<td style="text-align:center"><?php echo $user->nombre; ?></td>
				<td style="text-align:center"><?php echo $user->descripcion; ?></td>
				<td>
					<?php if($user->estado):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>				
				<td style="width:180px;">

<a href="#" class="btn btn-warning btn-xs" onclick="UpdateFormasDePago('<?php echo $user->nombre;?>','<?php echo $user->id;?>','<?php echo $user->descripcion;?>')" data-toggle="modal" data-target="#modal-default3" >Editar </a>
<a href="#" class="btn btn-info btn-xs" onclick="DelFormasDePago('<?php echo $user->nombre;?>','<?php echo $user->id;?>','<?php echo $user->descripcion;?>')" data-toggle="modal" data-target="#modal-default2">Borrar </a><!--index.php?view=deleteuser&id=<?php //echo $user->id;?>"-->

				</td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			<?php
		}else{
			
			echo "<h1> Sin Pagos </h1>";
		}


		?>
	<script type="text/javascript">
		$(document).ready(function () {
           $('#DataTable').DataTable();	   		   
       });		
	   
	   function UpdateFormasDePago(nombre,id,desc)
	   {
		
		$('#upd_nombre').val(nombre);	
		$('#upd_DescPago').val(desc);			
		   $('#upd_pago_id').val(id);	   		   
	   }
	   
	   function DelFormasDePago(nombre,id,desc)
	   {
		   $('#delNamePago').val(nombre);	   
		   $('#delDescPago').html(desc);	
		   $('#delPagoId').val(id);	    
	   }
	   
	</script>
</div>
</div>


 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addFPago" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear Forma De Pago</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nueva Forma De Pago</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required=true>
			</div>
		  </div>		  
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
			<div class="col-md-6">
			  <textarea class="form-control" rows="3" placeholder="descripcion ..." name="descripcion" class="form-control" id="descripcion" required=true></textarea>
			</div>
		  </div>
		  
		  

		  
		
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar Pago</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		
		
		<div class="modal fade" id="modal-default2">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delPago" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Pago</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar el Pago:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="delNamePago" class="form-control" id="delNamePago" readonly=true>
			</div>
			
			
		  </div>

<div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
			<div class="col-md-6">
			  <textarea class="form-control" rows="3" placeholder="descripcion ..." name="delDescPago" class="form-control" id="delDescPago" readonly=true></textarea>
			</div>
			
			
		  </div>	
		  
			<input type="hidden" id="delPagoId" name="delPagoId" value="">
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		<div class="modal fade" id="modal-default3">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateFPago" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Forma De Pago</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editando Forma De Pago:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="upd_nombre" class="form-control" id="upd_nombre" required=true>
			</div>
			
			
		  </div>

			<div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
			<div class="col-md-6">
			  <textarea class="form-control" rows="3" placeholder="descripcion ..." name="upd_DescPago" class="form-control" id="upd_DescPago" required=true></textarea>
			</div>
			
			
		  </div>		  
			<input type="hidden" id="upd_pago_id" name="upd_pago_id" value="">
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->