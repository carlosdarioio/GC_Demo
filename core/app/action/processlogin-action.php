<?php

if(Session::getUID()=="") {
$user = $_POST['username'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";

$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if($found==true) {
	$_SESSION['user_id']=$userid ;
	print "Cargando ... $user";
	if(isset($_SESSION["Note"])):
		if($_SESSION["Note"]!=""):
	print "<script>window.location='index.php?view=ReporteDeInc';</script>";
	    endif;
	endif;
	if($_POST['viw']!="" and $_POST['idd']!=""):
		print "<script>window.location='?view=".$_POST['viw']."&id=".$_POST['idd']."';</script>";
	endif;
$k=UserData::getById($_SESSION['user_id'])->kind;
	if($k==99) {
	print "<script>window.location='index.php?view=home2';</script>";
	
	}else {
	print "<script>window.location='index.php?view=home';</script>";	
		}
		
}else {
	if(isset($_POST["Note"])):
	print "<script>window.location='index.php?view=login&Note=Anonimo';</script>";
	endif;
	
	if($_POST['viw']!="" and $_POST['idd']!=""):
		print "<script>window.location='?view=".$_POST['viw']."&id=".$_POST['idd']."';</script>";
	endif;
	print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}
?>