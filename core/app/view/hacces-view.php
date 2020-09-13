
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Accesos</h2>
	<?php
	$users= array();		
	?>
	<a href="#" class="btn btn-default" onclick="p()"><i class='fa fa-user'></i> Nuevo Acceso</a>
	<script >function p(){alert('Pendiente');} </script>
	<br><br>
	<?php
		$users = HerramientasData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table ID="DataTable" class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>			
			<th>url</th>
			<th>Activo</th>			
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>				
				<td><?php echo $user->url; ?></td>
				<td>
					<?php if($user->active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>				
				<td style="width:180px;">				
				<a href="index.php?view=editUserhaccess&id=<?php echo $user->id;?>" class="btn btn-info btn-xs">Usuarios</a>								
				</td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			<?php
		}else{
			// no hay usuarios
			echo "<h1>Dep Sin Usuarios </h1>";
		}

		?>
	<script type="text/javascript">
		$(document).ready(function () {
           $('#DataTable').DataTable();
       });		
	</script>
</div>
</div>
