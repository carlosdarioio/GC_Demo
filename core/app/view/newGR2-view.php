<?php
$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();

$statuses = Status2Data::getAll();
$kinds = KindData::getAll();

?>

<div class="row">
<div class="col-md-8">
      <h2 class="title">Nueva Solicitud</h2>
<form class="form-horizontal" role="form" method="post" action="./?action=addticket" enctype="multipart/form-data">

  

  
    <div class="form-group">
    
    <label for="inputEmail1" class="col-lg-2 control-label">Departamento</label>
    <div class="col-lg-4">
<select name="category_id" id="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(CategoryData::getAll() as $p):?>
   <?PHP if($p->id!=30 and $p->id!=26 and $p->id!=24 and $p->id!=25 and $p->id!=15 and $p->id!=16):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
	<?php endif; ?>
  <?php endforeach; ?>

</select>
    </div>
	
  
  <!---pruebas---------------------------------------------------------------------------------------------------------------->
  <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<h2>Search/Filter Dropdown</h2>
<p>Click on the button to open the dropdown menu, and use the input field to search for a specific dropdown link.</p>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">About</a>
    <a href="#base">Base</a>
    <a href="#blog">Blog</a>
    <a href="#contact">Contact</a>
    <a href="#custom">Custom</a>
    <a href="#support">Support</a>
    <a href="#tools">Tools</a>
	<?php foreach(CategoryData::getAll() as $p):?>
   <?PHP if($p->id!=30 and $p->id!=26 and $p->id!=24 and $p->id!=25 and $p->id!=15 and $p->id!=16):?>
    <a href="#<?php echo $p->id; ?>"><?php echo $p->name; ?></a>
	<?php endif; ?>
  <?php endforeach; ?>
  </div>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
  <!---pruebas-------------------------------------------------------------------------------------------------------------------->
  
  
  
  

  
  <input type="hidden" name="status_id" value="1" >
  <input type="hidden" name="person_id" value="1" >
	
<!--  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-lg-10">
<select name="person_id" class="form-control" >
<option value="">-- SELECCIONE --</option>
  <?php //foreach(PersonData::getAll() as $p):?>
    <option value="<?php //echo $p->id; ?>"><?php// echo $p->name." ".$p->lastname; ?></option>
  <?php //endforeach; ?>
</select>
    </div>
  </div>
   
  --
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Asignar a</label>
    <div class="col-lg-10">
<select name="asigned_id" class="form-control" >
<option value="">-- SELECCIONE --</option>
  <?php foreach(UserData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  -->
 
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Solicitud</button>
    </div>
  </div>
  <br>
  <small class="lead">No utilizar los siguientes símbolos en su escritura: -, `, ~,< y > </small>
</form>
</div>


</div>



<hr>
<hr><br>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<input list="brow">
<datalist id="brow">
  <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist> 