<div class="row">
	<div class="col-md-12">
      <h2 class="title">Gastos</h2>
	<?php
	$gastos= array();	
	$gastos = GastosData::getAll();		
	?>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class='fa fa-user'></i> Nuevo Gasto
              </button>
	<br><br>
	
	<?php
		$gastos = GastosData::getAll();
		if(count($gastos)>0){
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
			foreach($gastos as $user){
				?>
				<tr>
				<td style="text-align:center"><?php echo $user->nombre; ?></td>
				<td>
					<?php if($user->estado):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>				
				<td style="width:180px;">

<a href="#" class="btn btn-warning btn-xs" onclick="UpdateGasto('<?php echo $user->nombre;?>','<?php echo $user->id;?>')" data-toggle="modal" data-target="#modal-default3" >Editar </a>
<a href="#" class="btn btn-info btn-xs" onclick="DelGasto('<?php echo $user->nombre;?>','<?php echo $user->id;?>')" data-toggle="modal" data-target="#modal-default2">Borrar </a><!--index.php?view=deleteuser&id=<?php //echo $user->id;?>"-->

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
	   
	   function UpdateGasto(nombre,id)
	   {
		
		$('#upd_nombre').val(nombre);	   
		   $('#upd_user_id').val(id);	   		   
	   }
	   
	   function DelGasto(nombre,id)
	   {
		   $('#NameGasto').val(nombre);	   
		   $('#delGastoId').val(id);	    
	   }
	</script>
</div>
</div>


 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addGasto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear Gasto</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nuevo Gasto</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required=true>
			</div>
		  </div>		  		 
		
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar Gasto</button>
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delGasto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Gasto</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar el Gasto:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="NameGasto" class="form-control" id="NameGasto" readonly=true>
			</div>
		  </div>		  		 
			<input type="hidden" id="delGastoId" name="delGastoId" value="">
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
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateGasto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Gasto</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editando el Gasto:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			<div class="col-md-6">
			  <input type="text" name="upd_nombre" class="form-control" id="upd_nombre" required=true>
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