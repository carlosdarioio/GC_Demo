<div class="row">
	<div class="col-md-12">
      <h2 class="title">Usuarios</h2>
	<?php
	$users= array();	
	
	?>
	<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Usuario</a>
	<br><br>
	<?php
		$users = UserData::getAll();
		if(count($users)>0){			
			?>
			<div class="box box-primary">
			<table ID="DataTable" class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<!--<th>Email</th> -->
			<th>Usuario</th>
			<th>Activo</th>
			<th>Nivel</th><!-- iba tipo-->
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<!--<td><?php echo $user->email; ?></td>-->
				<td><?php echo $user->username; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php					
					if($user->kind==1):
					$catg='GG';
					elseif($user->kind==2):
					$catg='Gastos y Compras';
					else:
					$catg='Ventas';
					endif;					
					echo $catg;
					
					?>					
				</td>
				<td style="width:180px;">
				

<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>

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
