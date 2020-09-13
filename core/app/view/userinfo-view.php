<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Usuario</h2>

		<div class="form-horizontal">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-md-6">
	  <label for="inputEmail1" class="form-control"><?php echo $user->name;?></label>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
    <div class="col-md-6">
	<label for="inputEmail1" class="form-control"><?php echo $user->lastname;?></label>

    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
    <div class="col-md-6">
	<label for="inputEmail1" class="form-control"><?php echo $user->username;?></label>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Correo interno</label>
    <div class="col-md-6">      
	 <label for="inputEmail1" class="form-control"><?php echo $user->email;?></label>
    </div>
  </div>

 
<?php 

$tp=UserData::getById($_SESSION["user_id"])->kind;

?>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <small class="help-block">
	Informacion del usuario
    </small>
	
	</div>
  </div>
  
  </div>

	</div>
</div>
