<?php
class ImagesData {
	public static $tablename = "images";

	public function ImagesData(){
		$this->id = "";		
		$this->name = "";
		$this->imagesid = 0;
		$this->code = "";
		
	}

	public function addVote(){
		$sql = "insert into imagesvote (code,imagesid) ";
		$sql .= "value (\"$this->code\",$this->imagesid)";
		return Executor::doit($sql);
	}
	
	
	public function delImage()
	{
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public function updateImage(){
		$sql = "update ".self::$tablename." set name=\"$this->c\",imagesid=$this->imagesid";
		Executor::doit($sql);
	}

	public static function getImageById($id){
		
		$sql = "select * from ".self::$tablename." where id=$id";
		
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImagesData());
	}
	
	public static function getVoteByCode($id){
		
		$sql = "select * from imagesvote where code=$id";
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImagesData());
	}
	
	public static function getVoteByCodeAndImageId($id,$imagesid){
		
		$sql = "select * from imagesvote where code=$id and imagesid=$imagesid";		
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImagesData());
	}
	
	
	
	public static function getCountByImageId($id){
		
		$sql = "select id from imagesvote where imagesid=$id";		
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImagesData());
	}
	
	

	public static function getAll(){
		$sql = "select * from ".self::$tablename." ORDER by rand()";// LIMIT 50
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImagesData());

	}
	
	public static function getTopCount(){
		$sql = "select count(id) as id,imagesid from imagesvote group by imagesid order by count(id) desc limit 3 ";// LIMIT 50
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImagesData());

	}
	
	
	


}

?>