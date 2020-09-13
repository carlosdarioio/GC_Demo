<?php
class UserData {
	public static $tablename = "user";

	public function UserData(){
		$this->id = "";
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "1";
		$this->created_at = "NOW()";
		$this->idProject = "";
		//
		
	}
	
	

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,username,password,is_active,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->is_active,$this->kind,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",lastname=\"$this->lastname\",username=\"$this->username\",is_active=$this->is_active,kind=$this->kind where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
	
	public static function getByIdMany($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	public static function getByUsername($id){
		$sql = "select * from ".self::$tablename." where username='$id'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	
	//2019
	public static function getBynotKind($kind){
		$sql = "select * from ".self::$tablename." where kind!=$kind and is_active=1 and id!=4 and id!=1 order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	

/*

*/

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where is_active=1 and name not like 'Nombre%' order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	
	


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	
 
	
	/**/


}

?>