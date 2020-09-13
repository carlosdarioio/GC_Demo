<?php
class ProveedorsData {
	public static $tablename = "db_proveedor";

	public function ProveedorsData(){
		$this->id = "";
		$this->nombre = "";		
		$this->estado = 1;		
		$this->saldo = 0;		
		$this->fecha = "";		
		
		
	}
	
	

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,estado,saldo,fecha) ";
		$sql .= "value (\"$this->nombre\",1,$this->saldo,now())";
		Executor::doit($sql);
	}
	public static function getByNombre($id){
		$sql = "select * from ".self::$tablename." where nombre='$id'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorsData());
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",saldo=$this->saldo where id=$this->id";
		Executor::doit($sql);
	}
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorsData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1 order by nombre";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorsData());
	}
	
	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorsData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' and estado=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorsData());
	}
	
	


}

?>