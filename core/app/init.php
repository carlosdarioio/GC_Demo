<?php

if(isset($_SESSION["user_id"])){
	Core::$user = UserData::getById($_SESSION["user_id"]);
}
if(!isset($_GET["action"])){

	Module::loadLayout("index");
}else{
	Action::load($_GET["action"]);
}

?>