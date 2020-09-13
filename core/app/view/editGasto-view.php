<?php $user = GastosData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Gasto</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateGasto" role="form">


	  <div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
		<div class="col-md-6">
		  <input type="text" name="nombre" value="<?php echo $user->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
		</div>
	  </div>  

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Gasto</button>
    </div>
  </div>
  <input type="hidden" id="catid" name="catid" value="<?php echo $_GET['catid'];?>">
</form>
	</div>
</div>
