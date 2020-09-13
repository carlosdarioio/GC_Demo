<div class="row">
	<div class="col-md-12">
      <h2 class="title">Almacenes</h2>
	<?php
	$almacenes= array();	
	$almacenes = AlmacenData::getAll();		
	?>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class='fa fa-user'></i> Nuevo Almacen
              </button>
	<br><br>
	
	<?php
		$almacenes = AlmacenData::getAll();
		if(count($almacenes)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table ID="DataTable" class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Estado</th>			
			<th></th>
			</thead>
			<?php
			foreach($almacenes as $user){
				?>
				<tr>
				<td style="text-align:center"><?php echo $user->nombre; ?></td>
				<td>
					<?php if($user->estado):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>				
				<td style="width:180px;">

<a href="#" class="btn btn-warning btn-xs" onclick="UpdateAlmacen('<?php echo $user->nombre;?>','<?php echo $user->id;?>','<?php echo $user->descripcion;?>')" data-toggle="modal" data-target="#modal-default3" >Editar </a>
<a href="#" class="btn btn-info btn-xs" onclick="DelAlmacen('<?php echo $user->nombre;?>','<?php echo $user->id;?>','<?php echo $user->descripcion;?>')" data-toggle="modal" data-target="#modal-default2">Borrar </a><!--index.php?view=deleteuser&id=<?php //echo $user->id;?>"-->

				</td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			<?php
		}else{
			
			echo "<h1>Shop Sin almacenes </h1>";
		}


		?>
	<script type="text/javascript">
		$(document).ready(function () {
           $('#DataTable').DataTable();	   		   
       });		
	   
	   function UpdateAlmacen(nombre,id,descripcion)
	   {
		
		$('#upd_nombre').val(nombre);	   
		$('#upd_user_id').val(id);	
		$('#upd_descripcion').val(descripcion);   		   
	   }
	   
	   function DelAlmacen(nombre,id,descripcion)
	   {
		   $('#NameAlmacen').val(nombre);	   
		   $('#delAlmacenId').val(id);	    
	   }
	</script>
</div>
</div>


 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addAlmacen" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear Almacen</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nuevo Almacen</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required=true>
			</div>
		  </div>

			<div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
			<div class="col-md-6">
			  <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Nombre" required>
			</div>
		  </div>		  
		
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar Almacen</button>
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delAlmacen" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Almacen</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar el Almacen:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="NameAlmacen" class="form-control" id="NameAlmacen" readonly=true>
			</div>
		  </div>		  		 
			<input type="hidden" id="delAlmacenId" name="delAlmacenId" value="">
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateAlmacen" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Almacen</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editando el Almacen:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="upd_nombre" class="form-control" id="upd_nombre" required=true>
			</div>
		  </div>	

			<div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
			<div class="col-md-6">
			  <input type="text" name="upd_descripcion" class="form-control" id="upd_descripcion" placeholder="Descripcion" required>
			</div>
		  </div>			  
			<input type="hidden" id="upd_user_id" name="upd_user_id" value="">
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