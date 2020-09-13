<?php
//Clasificacion 
class AlmacenData {
	public static $tablename = "db_almacen";

	public function AlmacenData(){
		$this->id = "";
		$this->nombre = "";
		$this->descripcion = "";
		$this->estado = 1;		
		
	}
	
	

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,estado,descripcion) ";
		$sql .= "value (\"$this->nombre\",1,\"$this->descripcion\")";
		Executor::doit($sql);
	}
	public static function getByNombre($id){
		$sql = "select * from ".self::$tablename." where nombre='$id' and estado=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AlmacenData());
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
	
	public function inactive(){
		$sql = "update ".self::$tablename." set estado=0 where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\" where id=$this->id";
		Executor::doit($sql);
	}
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AlmacenData());
	}
	
	public static function getByIdMany($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlmacenData());
	}	
	

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1 order by nombre";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlmacenData());
	}
	
	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlmacenData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' and estado=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlmacenData());
	}
	
	


}

?>