<?php
class CGData {
	public static $tablename = "db_compras_y_gastos";
//id,clasificacion_id,proveedor_id,fecha,
//numero_documento,documento_fiscal,impuesto,
//total,saldo,id_forma_de_pago,referencia,concepto
	public function CGData(){
		$this->id = "";
		$this->clasificacion_id = -1;		
		
		$this->proveedor_id = -1;		
		$this->fecha = -1;		
		$this->numero_documento = "";		
		$this->documento_fiscal = "";		
		$this->impuesto = -1;		
		$this->total = -1;		
		$this->saldo = -1;		
		$this->id_forma_de_pago = -1;		
		$this->referencia = "";
		$this->concepto = "";
		$this->estado = 1;
		$this->file = "";		
		
		
	}
	
	public static function getCountGC(){		
		$sql = "SELECT t1.id FROM ".self::$tablename." T1
		INNER JOIN db_proveedor T2 ON T1.proveedor_id=T2.id 
		INNER JOIN db_formas_de_pago T3 ON T1.id_forma_de_pago=T3.id 
		where MONTH(T1.fecha) = MONTH(CURRENT_DATE()) AND YEAR(T1.fecha) = YEAR(CURRENT_DATE()) and T2.estado=1 and T3.estado=1 and T1.estado=1 ";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}
	
	public static function getLastCG(){		
		$sql = "SELECT T1.id,T4.nombre as Clasificacion,T2.nombre as Proveedor, T3.nombre as FormasDePago,T1.numero_documento,T1.total FROM ".self::$tablename." T1
		INNER JOIN db_proveedor T2 ON T1.proveedor_id=T2.id 
		INNER JOIN db_formas_de_pago T3 ON T1.id_forma_de_pago=T3.id 
		INNER JOIN db_clasificaciones_gastos T4 ON T1.clasificacion_id = T4.id
		where T2.estado=1 and T3.estado=1 and T1.estado=1 order by T1.id desc LIMIT 5";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}
	
	public static function getGraficarHistorial($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\"  order by fecha DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}
	
	public static function getByIdmd5($id){
		$sql = "select * from ".self::$tablename." where md5(id)='$id'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CGData());
	}
	
	public function inactive(){
		$sql = "update ".self::$tablename." set estado=0 where id=$this->id";
		Executor::doit($sql);
	}

	

	public function add(){
		$sql = "insert into ".self::$tablename." (clasificacion_id,proveedor_id,fecha,numero_documento,documento_fiscal,impuesto,total,saldo,id_forma_de_pago,referencia,concepto,file,estado) ";
		$sql .= "value ($this->clasificacion_id,$this->proveedor_id,NOW(),\"$this->numero_documento\",\"$this->documento_fiscal\",$this->impuesto,$this->total,$this->saldo,$this->id_forma_de_pago,\"$this->referencia\",\"$this->concepto\",\"$this->file\",1)";
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
	
	

	public function update(){
		$sql = "update ".self::$tablename." set clasificacion_id=$this->clasificacion_id,proveedor_id=$this->proveedor_id,numero_documento=\"$this->numero_documento\",concepto=\"$this->concepto\",file=\"$this->file\" where id=$this->id";
		Executor::doit($sql);
	}
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CGData());
	}
	
	

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id";//where  estado=1
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}
	
	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where referencia like '%$q%' ";//and estado=1
		$query = Executor::doit($sql);
		return Model::many($query[0],new CGData());
	}
	
	


}

?>