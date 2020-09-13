	<?php
	///if(!isset($_GET["status"]) and !isset($_GET["status2"]) and !isset($_GET["status_id"]) ){ Core::alert("Error!"); Core::redir("./");}
	//si es busqueda copiamos el status2 pasado por el form
	if(!isset($_GET["status"])){
		//$_GET["status"]= $_GET["status2"];
		$_GET["status"]= "*";
		}
$users = CGData::getAll();			
$u2 = UserData::getById($_SESSION["user_id"]);	
	?>
	<div class="">
	<div class="row">
	<div class="col-md-12">

	<h2 class="title">Compras y gastos</h2>

   
	<a href="./index.php?view=newGR" class="btn btn-info">Nueva Compra / Gasto</a>
	
	<br><br>

	

	<?php
	if(count($users)>0){
			$_SESSION["report_data"] = $users;	
				?>
							
	
	
				
				<div class="box box-primary">
				<div id="ChangeContent">
				<table id="DataTable" class="table table-bordered table-hover" >
				<thead>
				<th>#</th>
				<th>Clasificacion</th>
				<th>Proveedor</th>				
				<th>GC</th>
				<th>doc fiscal</th>
				<th>numero de doc</th>
				<th>Total</th>				
				<!--<th>Creado Por</th>-->
				<th>Fecha</th>
				
				<th></th>
				</thead>
				<?php
				
				foreach($users as $user){
					
						$formasDePagoDatas = GastosData::getAll();
						$priorities = ProveedorsData::getAll();
						$dep = FormasDePagoData::getAll();
					
					$formasDePagoData  = FormasDePagoData::getById($user->id_forma_de_pago);
					$proveedordata  = ProveedorsData::getById($user->proveedor_id);
					$gastosData = GastosData::getById($user->clasificacion_id);
					$Xuser=$u2;
					
					//si medic id ) reporte de incidente y id igual a 3,589 o  738 que lo oculte
					if(($formasDePagoData->id==10 and  $_SESSION["user_id"]!=3 and  $_SESSION["user_id"]!=589 and  $_SESSION["user_id"]!=738) or $formasDePagoData->id!=10):
					
					?>
					<tr>
					<td><a href='./?view=openticket&id=<?php echo md5($user->id);?>'><?php echo $user->id; ?></a></td>
					
					<td><?php echo $formasDePagoData->nombre; ?></td>
					<td><?php echo $proveedordata->nombre; ?></td>					
					<td><?php echo $gastosData->nombre; ?></td>				
					
					<td><?php echo $user->documento_fiscal; ?></td>	
					<td><?php echo $user->numero_documento; ?></td>	
					<td><?php echo $user->total; ?></td>	
					
					<!--<td>< ?php  echo $Xuser->name." ".$Xuser->lastname;?></td>-->
					<td><?php echo date('Y-m-d', strtotime(date($user->fecha))); ?></td>
					
					
					
					
					
					
					
					<td style="width:180px;">
					
					<a href="index.php?action=delticket&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

					
					
					</td>
					</tr>
					<?php
					endif;
				}
				?>
				
				</table>				
				<a href="./report/reportsClientes-xlsx.php?status=<?php echo $_GET['status'];?>" class="btn btn-default">Descargar en Excel (.xlsx)</a>
					
				 </div>				
				</div>
				<?php
			}else{echo "<p class='alert alert-danger'>No hay Solicitudes</p>";}				
			?>			
					 <!-- sCRIPT PAl loggin-->
					 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script type="text/javascript"> 
				
		function alola(p){alert('fin'+p);}   
		
		
		$(document).ready(function () {
           $('#DataTable').DataTable(
		   {
			"lengthMenu": [[25, 100, -1], [25, 100, "All"]]  ,
			"order": [[ 0, "desc" ]] //or asc 
    
			}						);
       });		
	   
	   
	   ('#exemple').DataTable({
    "order": [[ 3, "desc" ]], //or asc 
    "columnDefs" : [{"targets":3, "type":"date-eu"}],
		});
	   
	</script><!-- Fin sCRIPT PAl loggin-->

	</div>
	</div>
	</div>
