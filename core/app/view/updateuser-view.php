<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->kind = $_POST["kind"];
	$user->is_active=$is_active;
	//
	//$user->idcategory = $_POST["idc"];
	
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
//print "<script>alert('Se ha actualizado el password');</script>";

	}
$tp2=UserData::getById($_SESSION["user_id"]);
if($tp2->kind==1 )
{
print "<script>window.location='index.php?view=users';</script>";
}

else
{
print "<script>window.location='index.php?view=home';</script>";	
}

}


?>