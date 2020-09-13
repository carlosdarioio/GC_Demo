<?php
class TicketData {
	public static $tablename = "ticket";
    

	public function TicketData(){
		$this->name = "";
		$this->final_state = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->delivery_date = "NOW()";
		$this->msj = "";
		$this->PyP="";
		
		
		$this->status_id=0;
		$this->TADid=-1;
	}

	//categorias
	public function getProject(){ return ProjectData::getById($this->project_id); }
	public function getPriority(){ return PriorityData::getById($this->priority_id); }
	public function getStatus(){ return Status2Data::getById($this->status_id); }
	
	public function getKind(){ return KindData::getById($this->kind_id); }
					//departamento
	public function getCategory(){ return CategoryData::getById($this->category_id); }
	
	//Obteniendo nombre completo de la perosona que creo el ticket
	public function getUser(){ return UserData::getById($this->user_id)->name." ".UserData::getById($this->user_id)->lastname; }


	public function add(){
		//$sql = "insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,person_id,asigned_id,file,created_at) ";
		//$sql .= "value (\"$this->title\",\"$this->description\",\"$this->category_id\",\"$this->project_id\",$this->priority_id,$this->user_id,$this->status_id,$this->kind_id,$this->person_id,$this->asigned_id,\"$this->file\",$this->created_at)";
		
		
		$sql = "insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,file,created_at,msj,PyP,asigned_id2,TADid) ";
		$sql .= "value (\"$this->title\",\"$this->description\",$this->category_id,$this->project_id,$this->priority_id,$this->user_id,$this->status_id,$this->kind_id,\"$this->file\",$this->created_at,\"$this->msj\",\"$this->PyP\",$this->asigned_id2,$this->TADid)";
		
		/*
		$sql2 = "insert into ticket_extra (Fecha,Lugar,Orden,Motorista,Vehiculo,Marca,Placa,Modelo,Anyo,Kilometraje) ";
		$sql2 .= "value (\"$this->Fecha\",\"$this->Lugar\",\"$this->Orden\",\"$this->Motorista\",\"$this->Vehiculo\",\"$this->Marca\",\"$this->Placa\",\"$this->Modelo\",\"$this->Anyo\",\"$this->Kilometraje\")";
		Executor::doit($sql2);
		*/
		
		return Executor::doit($sql);
		echo $sql;
	}
	
	public function addTarea(){
		$sql = "insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,file,created_at,msj,PyP,asigned_id2,TADid,delivery_date) ";
		$sql .= "value (\"$this->title\",\"$this->description\",$this->category_id,$this->project_id,$this->priority_id,$this->user_id,$this->status_id,$this->kind_id,\"$this->file\",$this->created_at,\"$this->msj\",\"$this->PyP\",$this->asigned_id2,$this->TADid,\"$this->delivery_date\")";		
		
		return Executor::doit($sql);
		echo $sql;
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto TicketData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",category_id=\"$this->category_id\",project_id=\"$this->project_id\",priority_id=\"$this->priority_id\",description=\"$this->description\",kind_id=\"$this->kind_id\",TADid=$this->TADid where id=$this->id";// 2018 alola quitaste ,updated_at=NOW() solo update cuando cambia de estado aqui solo cambia daos
		Executor::doit($sql);
	}
	
	public function update2(){
		if($this->asigned_id2=="Todos")
		{
			$this->asigned_id2=null;
		}
		$sql = "update ".self::$tablename." set priority_id=\"$this->priority_id\",kind_id=\"$this->kind_id\",status_id=\"$this->status_id\",asigned_id2=\"$this->asigned_id2\",updated_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}
	
		//2019 alola
	public function updStatus()
	{		
		$sql = "update ".self::$tablename." set status_id=\"$this->status_id\",updated_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}
	
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}
	
	public static function getByIdmd5($id){
//		SELECT * FROM `user` WHERE `password` != md5(1234)
		$sql = "select * from ".self::$tablename." where md5(id)='$id'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}
	
	public static function getByDepartamento($id){
		$sql = "select * from ".self::$tablename." where category_id=$id and status_id=1 order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());		
	}
	//2018 alola
	public static function getCountPendientesByUserId($id){
		//FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		$sql = "SELECT t1.id FROM ticket T1
		INNER JOIN status2 T2 ON T1.status_id=T2.id 
		INNER JOIN category_per T3 ON T1.category_id=T3.idcategory 
		where T3.idUser=$id and T2.final_state=0";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	
	public static function getTareaByUserId($id){		
		$sql = "SELECT T1.* FROM ticket T1
		INNER JOIN status2 T2 ON T1.status_id=T2.id 		
		where T1.user_id=$id and T1.category_id=30 and T2.final_state=0";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getTareaByAsignedId($id){		
		$sql = "SELECT T1.* FROM ticket T1
		INNER JOIN status2 T2 ON T1.status_id=T2.id 		
		where T1.asigned_id2=$id and T1.category_id=30 and T2.final_state=0";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getCountPendientesByUserSolicitante($id){
		//FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		$sql = "SELECT t1.id FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id 
		where T1.user_id=$id and T2.final_state=0";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	//2019
	public static function getCntTickByUserCat_per($id){
		//FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		$sql = "
		SELECT SUM(cant) cant,P.name FROM
		(
			SELECT SUM(cant) cant,T.n1,T.name FROM
				(
					SELECT count(T1.id) cant,T4.name as n1,T2.name FROM ticket T1
					INNER JOIN status2 T2 ON T1.status_id=T2.id
					INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
					INNER JOIN category T4 ON T3.idcategory=T4.id
					where T3.idUser=$id and T2.name!='Canceladas' and T2.name!='Terminada Conforme' group by T4.name,T2.name
				) AS T group by T.n1,T.name
		 ) AS P group by P.name order by cant";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getCntTickBySolicitante($id){
		//FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		$sql = "
		SELECT SUM(cant) cant,P.name FROM
		(
			SELECT SUM(cant) cant,T.n1,T.name FROM
				(
					SELECT count(T1.id) cant,T4.name as n1,T2.name FROM ticket T1
					INNER JOIN status2 T2 ON T1.status_id=T2.id					
					INNER JOIN category T4 ON T1.category_id=T4.id
					where T1.user_id=$id and T2.name!='Canceladas' group by T4.name,T2.name
				) AS T group by T.n1,T.name
		 ) AS P group by P.name";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	//2019 Obtener ultimos tickets creados de los deps permitidos pa ver osea
	public static function getLastTckByCatxUsrId($id){
		$sql="SELECT T1.* FROM ticket T1					
		INNER JOIN category_per T3 ON T1.category_id=T3.idcategory					
		INNER JOIN project T4 ON T1.project_id=T4.id
		INNER JOIN status2 T2 ON T2.id = t1.status_id
		LEFT join project_per T5 on T4.id=T5.idproject
		where T3.idUser=$id AND T2.name!='Canceladas' AND T1.category_id!=30
		AND ((T4.idcategory=T3.idcategory and T4.Raut=0) OR (T5.idUser=$id and T4.Raut=1))                     
		ORDER BY T1.created_at DESC
		LIMIT 10";					
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getLastTckByCatxSolicitante($id){
		//FROM ticket T1 INNER JOIN status2 T2 ON T1.status_id=T2.id INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		$sql = "
		SELECT T1.* FROM ticket T1										
					where T1.user_id=$id                     
                    ORDER BY T1.created_at DESC
					LIMIT 10";		 
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	
	
	
	
	public static function getRepeated($pacient_id,$medic_id,$date_at,$time_at){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and date_at=\"$date_at\" and time_at=\"$time_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}



	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename." order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	

	public static function getAllByStatus($s){
		$sql = "select * from ".self::$tablename." where status_id=$s order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getNotifByStatusAdmin($s){
		$sql = "select T1.* from ".self::$tablename." T1
		inner JOIN status2 T2 on T1.status_id=T2.id 
		where (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T1.category_id!=30 
		order by created_at desc limit 10 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	//*******************************
	public static function getNotifByStatusSup($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory				
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and (T3.idUser=$id)                 
				ORDER BY T1.created_at DESC limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getNotifByStatusUser($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
				INNER JOIN category T5 ON T1.category_id=T5.id
				INNER JOIN project T6 ON T1.project_id=T6.id
				LEFT join project_per T4 on T4.idproject=T1.project_id		
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T3.idUser=$id and ((T6.Raut=0) OR (T4.idUser=$id and T6.Raut=1))                
				ORDER BY T1.created_at DESC limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getNotifTareaByUserId($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
				INNER JOIN category T5 ON T1.category_id=T5.id
				INNER JOIN project T6 ON T1.project_id=T6.id
				LEFT join project_per T4 on T4.idproject=T1.project_id		
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T3.idUser=$id and ((T6.Raut=0) OR (T4.idUser=$id and T6.Raut=1))                
				ORDER BY T1.created_at DESC limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	public static function getNotifByStatusSolicitante($s,$id){		
		$sql = "select T1.* from ".self::$tablename." T1
		inner JOIN status2 T2 on T1.status_id=T2.id 
		where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T1.user_id=$id order by created_at desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}	
	
	public static function getNotifCalendTarByUsrId($id){
		date_default_timezone_set('America/Costa_Rica');
		$date = date('Y-m-d', time());
		$sql = "
		SELECT T1.* FROM ".self::$tablename." T1 
		WHERE T1.asigned_id2=$id
		AND T1.status_id!=-1 AND T1.category_id=30		
		AND T1.delivery_date >= DATE_ADD( '".$date."', INTERVAL 2 DAY ) 
		ORDER BY T1.delivery_date 
		ASC LIMIT 5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());//date(NOW())
	}
	
	
	/*
	SELECT T1.* FROM ticket T1 
WHERE T1.asigned_id2=938 AND T1.status_id!=-1 AND T1.category_id=30 AND  T1.delivery_date >= DATE_ADD( '2019-02-10', INTERVAL 1 DAY )
ORDER BY T1.delivery_date 
asc LIMIT 5
	*/
	//*******************************
	
	//2019
	public static function getAllByStatusAdmin($s){
		$sql = "select T1.* from ".self::$tablename." T1
		inner JOIN status2 T2 on T1.status_id=T2.id 
		where (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T1.category_id!=30 
		order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllByStatusSup($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory				
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T3.idUser=$id                 
				ORDER BY T1.created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllByStatusUser($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
				INNER JOIN category T5 ON T1.category_id=T5.id
				INNER JOIN project T6 ON T1.project_id=T6.id
				LEFT join project_per T4 on T4.idproject=T1.project_id		
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T3.idUser=$id and ((T6.Raut=0) OR (T4.idUser=$id and T6.Raut=1))                
				ORDER BY T1.created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllTareaByUserId($s,$id){
		$sql = "SELECT T1.* FROM ".self::$tablename." T1
				inner JOIN status2 T2 on T1.status_id=T2.id 	
				INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
				INNER JOIN category T5 ON T1.category_id=T5.id
				INNER JOIN project T6 ON T1.project_id=T6.id
				LEFT join project_per T4 on T4.idproject=T1.project_id		
				where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T2.name!='Terminada conforme' and T3.idUser=$id and ((T6.Raut=0) OR (T4.idUser=$id and T6.Raut=1))                
				ORDER BY T1.created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	
	public static function getAllByStatusSolicitante($s,$id){		
		$sql = "select T1.* from ".self::$tablename." T1
		inner JOIN status2 T2 on T1.status_id=T2.id 
		where T1.category_id!=30 and (T2.name='$s' or '*'='$s') and T1.user_id=$id order by created_at desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getLastTkChangesByUserId($id){		
		$sql="SELECT T1.*,T7.iduserasig as asig FROM ticket T1
		INNER JOIN status2history T7 ON T1.id=T7.idticket					
		inner JOIN status2 T2 on T1.status_id=T2.id 	
		INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
		INNER JOIN category T5 ON T1.category_id=T5.id
		INNER JOIN project T6 ON T1.project_id=T6.id
		LEFT join project_per T4 on T4.idproject=T1.project_id		
		where T3.idUser=$id and ((T6.Raut=0) OR (T4.idUser=$id and T6.Raut=1))  and T2.name!='Abiertas' and T2.name!='Canceladas'
		group by T1.id
		ORDER BY DATE_FORMAT(T1.Updated_at, '%Y-%m-%d') DESC
		limit 5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	
	/*
SELECT T1.* FROM ticket T1
INNER JOIN status2history T7 ON T1.id=T7.idticket					
inner JOIN status2 T2 on T1.status_id=T2.id 	
INNER JOIN category_per T3 ON T1.category_id=T3.idcategory
INNER JOIN category T5 ON T1.category_id=T5.id
INNER JOIN project T6 ON T1.project_id=T6.id
LEFT join project_per T4 on T4.idproject=T1.project_id		
where T3.idUser=585 and ((T6.Raut=0) OR (T4.idUser=585 and T6.Raut=1))                
ORDER BY T7.fecha DESC
limit 5
	*/
	
	
	
					
					
	
		
	
	public static function getAllByStatus_10($s){
		$sql = "select * from ".self::$tablename." where status_id=$s order by created_at desc";//2018  limit 10
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	//2018
	public static function getAllAdmin($s){
		$sql = "select * from ".self::$tablename." order by created_at desc";//2018  limit 10
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
											//busqueda por status e id
	public static function getAllByStatusNUMERACION($s,$num){
		//por auqi vas buscando como usar la numreacion
		//xampp: select * from ticket where id <= 110 and status_id=1 order by created_at desc LIMIT 5
		$sql = "select * from ".self::$tablename." where status_id=$s and id<=$num order by created_at desc";//2018  limit 10
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	//btn btn-secondary
	public static function getAllByStatusSESSION($s,$dep){
		//select para encargados de atender sol
		$sql = "select * from ".self::$tablename." where status_id=$s order by created_at desc ";//2018 limit 10 //2019 quitaste and category_id=$dep
		//select pa solicitante solo ven sus sol
		if($dep==99){
		$sql = "select * from ".self::$tablename." where user_id=$_SESSION[user_id] order by created_at desc";	// limit 10
			
		}				
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	/*Per*/
	////anotar__ kind 1 es admin, 2 usuario, 3 supervisor, 99 solicitante
	public static function getAllByStatusSESSIONPer($s,$dep){
		//select para encargados de atender sol
		//$sql = "select * from ".self::$tablename." where status_id=$s and category_id=$dep order by created_at desc limit 10";
		$sql = "select * from ticket where (status_id=$s and category_id=$dep) AND (asigned_id2 IS NULL or asigned_id2=$_SESSION[user_id]) order by created_at desc ";//limit 10
		
		
		if($dep==99){
		$sql = "select * from ".self::$tablename." where status_id=$s and user_id=$_SESSION[user_id] order by created_at desc ";	//limit 10
			
		}	

		if($dep==16){
		$sql = "select * from ".self::$tablename." order by created_at desc ";	//limit 10
			
		}			
		//select pa admin falta
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	/*Fin Per*/
	
	public static function getAllByStatusSESSION2($s,$dep){
		//select para encargados de atender sol
		$sql = "select * from ".self::$tablename." where status_id=$s and category_id=$dep order by created_at desc";
		//select pa solicitante solo ven sus sol
		if($dep==99){
		$sql = "select * from ".self::$tablename." where status_id=$s and user_id=$_SESSION[user_id] order by created_at desc";	
			
		}			
		//select pa admin falta
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllByStatusSESSIONNUMERACION($s,$dep,$num){
		//select para encargados de atender sol
		$sql = "select * from ".self::$tablename." where status_id=$s and category_id=$dep and id<=$num order by created_at desc limit 10";
		//select pa solicitante solo ven sus sol
		if($dep==99){
		$sql = "select * from ".self::$tablename." where status_id=$s and user_id=$_SESSION[user_id] and id<=$num order by created_at desc limit 10";	
			
		}			
		//select pa admin falta
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	             //  obteniendo sol por tipo de solicitud para rrhh
	public static function getAllByProject($s,$TipoSol){
		$sql = "select * from ".self::$tablename." where status_id=$s and project_id=$TipoSol order by created_at desc ";//limit 10
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllByProject246($s,$TipoSol){
		$sql = "select * from ".self::$tablename." where status_id=$s and project_id=$TipoSol order by created_at desc";
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getAllByProjectNumeracion($s,$TipoSol,$num){
		$sql = "select * from ".self::$tablename." where status_id=$s and project_id=$TipoSol and id<=$num order by created_at desc limit 10";
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where status_id=1 order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getOneById(){
		$sql = "select id from ".self::$tablename." order by id desc limit 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	public static function getGroupByDate($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	                             //Agrupando por fecha y departamento
	public static function getGraficarHistorial($start,$end,$cat){
  $sql = "select count(*) as s from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and category_id=$cat order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getGroupByDateAndSolicitante($start,$end,$id){
  $sql = "select count(*) as s from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and user_id=$id order by created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


}

?>