<div class="row">
	<div class="col-md-12">
      <h2 class="title">Proveedors</h2>
	<?php
	$proveedors= array();	
	$proveedors = ProveedorsData::getAll();		
	?>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class='fa fa-user'></i> Nuevo Proveedor
              </button>
	<br><br>
	
	<?php
		$proveedors = ProveedorsData::getAll();
		if(count($proveedors)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table ID="DataTable" class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Saldo</th>			
			<th>Estado</th>			
			<th></th>
			</thead>
			<?php
			foreach($proveedors as $user){
				?>
				<tr>
				<td style="text-align:center"><?php echo $user->nombre; ?></td>
				<td style="text-align:center"><?php echo $user->saldo; ?></td>				
				<td>
					<?php if($user->estado):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>				
				<td style="width:180px;">

<a href="#" class="btn btn-warning btn-xs" onclick="UpdateProveedor('<?php echo $user->nombre;?>','<?php echo $user->id;?>','<?php echo $user->saldo;?>')" data-toggle="modal" data-target="#modal-default3" >Editar </a>
<a href="#" class="btn btn-info btn-xs" onclick="DelProveedor('<?php echo $user->nombre;?>','<?php echo $user->id;?>')" data-toggle="modal" data-target="#modal-default2">Borrar </a>

				</td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			<?php
		}else{
			
			echo "<h1>Dep Sin Usuarios </h1>";
		}


		?>
	<script type="text/javascript">
		$(document).ready(function () {
           $('#DataTable').DataTable();	   		   
       });		
	   
	   function UpdateProveedor(nombre,id,saldo)
	   {
		
		$('#upd_nombre').val(nombre);	   
		$('#upd_prov_id').val(id);	   		   
		$('#updsaldo').val(saldo);	   		   
	   }
	   
	   function DelProveedor(nombre,id)
	   {
		   
		   $('#delNameProveedor').val(nombre);	   
		   $('#delProveedorId').val(id);	    
	   }
	</script>
</div>
</div>


 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addProveedor" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear Proveedor</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nuevo Proveedor</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="addnombre" class="form-control" id="addnombre" placeholder="Nombre" required=true>
			</div>
		  </div>
		 <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Saldo</label>
			<div class="col-md-6">
			  <input type="text" name="addsaldo" class="form-control" id="addsaldo" value="0" readonly=true>
			</div>
		  </div>			  
		
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delProveedor" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Proveedor</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar el Proveedor:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="delNameProveedor" class="form-control" id="delNameProveedor" readonly=true>
			</div>
		  </div>		  		 
			<input type="hidden" id="delProveedorId" name="delProveedorId" value="">
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateProveedor" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Proveedor</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editando el Proveedor:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="upd_nombre" class="form-control" id="upd_nombre" required=true>
			</div>
		  </div>	
		 <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Saldo</label>
			<div class="col-md-6">
			  <input type="text" name="updsaldo" class="form-control" id="updsaldo" readonly=true>
			</div>
		  </div>			  
			<input type="hidden" id="upd_prov_id" name="upd_prov_id" value="">
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