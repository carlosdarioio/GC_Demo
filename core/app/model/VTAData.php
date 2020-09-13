<?php
class VTAData {
	public static $tablename = "db_ventas";
	public function VTAData(){
		$this->id=-1;
		$this->no_referencia=-1;
		$this->no_factura=-1;
		$this->fecha="";
		$this->id_cliente="";
		$this->subtotal=-1;
		$this->isv=-1;
		$this->total=-1;
		$this->saldo=-1;
		$this->status=-1;
		$this->idalmacen=-1;
		$this->id_usuario=-1;
		
		
	}
	
	public static function getCountGC(){		
		$sql = "SELECT t1.id FROM ".self::$tablename." T1
		where MONTH(T1.fecha) = MONTH(CURRENT_DATE()) AND YEAR(T1.fecha) = YEAR(CURRENT_DATE()) ";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}
	
	public static function getLastVta(){		
		$sql = "SELECT T1.id,T1.no_referencia,T1.no_factura,T1.total,T2.nombre,T3.name FROM ".self::$tablename." T1
		INNER JOIN db_almacen T2 ON T1.idalmacen=T2.id 
		INNER JOIN user T3 ON T1.id_usuario=T3.id 		
		order by T1.id desc ";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}
	
	public static function getGraficarHistorial($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\"  order by fecha DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}
	
	public static function getByIdmd5($id){
		$sql = "select * from ".self::$tablename." where md5(id)='$id'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VTAData());
	}
	
	public function inactive(){
		$sql = "update ".self::$tablename." set estado=0 where id=$this->id";
		Executor::doit($sql);
	}

	
//INSERT INTO db_ventas (id, ) VALUES (NULL, '99', '99', '2020-09-08 12:04:31', '99', '99', '99', '99', '99', 'c satus', '1', '1');
	public function add(){
		$sql = "insert into ".self::$tablename." (no_referencia, no_factura, fecha, id_cliente, subtotal, isv, total, saldo, status, idalmacen, id_usuario) ";
		$sql .= "value (\"$this->no_referencia\",\"$this->no_factura\",Now(),";
		$sql .="\"$this->id_cliente\",$this->subtotal,$this->isv,$this->total,$this->saldo,\"$this->status\",$this->idalmacen,\"$this->id_usuario\")";
		echo $sql;
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
	
	
/*
	public function update(){
		$sql = "update ".self::$tablename." set clasificacion_id=$this->clasificacion_id,proveedor_id=$this->proveedor_id,numero_documento=\"$this->numero_documento\",concepto=\"$this->concepto\",file=\"$this->file\" where id=$this->id";
		Executor::doit($sql);
	}*/
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VTAData());
	}
	
	

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id";//where  estado=1
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}
	
	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where referencia like '%$q%' ";//and estado=1
		$query = Executor::doit($sql);
		return Model::many($query[0],new VTAData());
	}
	
	


}

?>