<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Usuario</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateuser" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email interno*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
	  <p class="help-block">Escribir email interno</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>
<?php 

$tp=UserData::getById($_SESSION["user_id"])->kind;
//if($_SESSION["user_id"])
	//si es administrador
if($tp==1){
?>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
<select name="kind" class="form-control" required>
    <option value="">-- SELECCIONE --</option>    
    <option value="2">Gastos y compras</option>
	<option value="3">Ventas</option>
	<option value="1">Adminstrador</option>
</select> 
   </div>
  </div>
  
  

  <?php 

}else{
	?>
	<input type="hidden" name="kind" value="<?php echo UserData::getById($_GET["id"])->kind;?>">
	<input type="hidden" name="idc" value="<?php echo $_GET["catid"];?>">
<?php } ?>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </div>
  </div>
  <input type="hidden" id="catid" name="catid" value="<?php echo $_GET['catid'];?>">
</form>
	</div>
</div>
