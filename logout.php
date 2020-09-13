<?php
session_start();
	unset($_SESSION['user_id']);
session_destroy();
if(isset($_GET["RPTWW"])){
	unset($_SESSION["Note"]);

		print "<script>window.location='./?view=pacientlogin&Note=Anonimo';</script>";	

}else{
	
				print "<script>window.location='./?view=pacientlogin';</script>";	
		

}
//print "<script>window.location='./';</script>";


?>