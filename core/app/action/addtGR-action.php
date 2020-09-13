<?php
$r = new CGData();
$r->clasificacion_id = GastosData::getByNombre($_POST["classif_id"])->id;				
echo "clasificacion_id ".$r->clasificacion_id ;
$r->proveedor_id = ProveedorsData::getByNombre($_POST["proveedor_id"])->id;		
//$r->fecha = -1;		
$r->numero_documento = $_POST["no_doc"];		
$r->documento_fiscal = $_POST["doc_fiscal"];
$r->impuesto = $_POST["isv"];		
echo "<br> total ".$_POST["total"];
$r->total = floatval($_POST["total"]);
$r->saldo = ProveedorsData::getByNombre($_POST["proveedor_id"])->saldo;		
$r->id_forma_de_pago =FormasDePagoData::getByNombre($_POST["formas_de_pago"])->id;
$r->concepto = nl2br(str_replace('"', '\\\'', $_POST["concepto"]));	
$r->referencia = nl2br(str_replace('"', '\\\'', $_POST["referencia"]));



$total = count($_FILES['file']['name']);
$r->file ='';
$namefil='';
// Loop through each file
for( $i=0 ; $i < $total ; $i++ )
{

  //Get the temp file path
  $tmpFilePath = $_FILES['file']['tmp_name'][$i];
 
  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "./storage/tickets/".$_FILES['file']['name'][$i];   
	
	//Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here
	 

    }
  }
  //echo $_FILES['file']['name'][$i];
  $namefil = $namefil.$_FILES['file']['name'][$i].'ZxxZ';
  echo $namefil."<br>";
}
echo $namefil." mmxsi";
$r->file =$namefil;
echo "<br>last ".$r->file;

//--fin file-----------------------------------------



$r->add();


Core::redir("./index.php?view=NewGR");//openticket

?>