<?php
class BlpItem
{
	protected $id;
	private $db;
	private $isnew;

	public function __construct($db){
		$this->db=$db;
		$this->isnew=true;
	}

	protected function setID($id){
		$this->id=$id;
		$this->isnew=false;
	}

	public function __tableName(){
		return "NONE";
	}

	public function __read($row){
		return;
	}

	public function __insert(){
		return;
	}

	public function __update(){
		return;
	}

	public function __tableDef(){
		return;
	}

	public function read(){
		$query = "SELECT * from ".$this->__tableName()." WHERE id=".$this->id;
		#echo $query."<br>";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch();
		$this->__read($row);
	}

	public function write(){
		return ($this->isnew)?$this->insert():$this->update();
	}

	public function createTable(){
		return "CREATE TABLE ".$this->__tableName()." ".$this->__tableDef();
	}

	public function insert(){
		$query="INSERT INTO ".$this->__tableName()." ".$this->__insert();
		$stmt=$this->db->prepare($query);
		$ret=$stmt->execute();
		$this->id=$this->db->lastInsertId();
		return $ret;
	}

	public function update(){
		$query="UPDATE ".$this->__tableName()." SET ".$this->__update()." WHERE id=".$this->id;
		$stmt=$this->db->prepare($query);
		return $stmt->execute();
	}

	public function delete(){
		$query="DELETE FROM ".$this->__tableName()." WHERE id=".$this->id;
		$stmt=$this->db->prepare($query);
		$ret=$stmt->execute();
		return $ret;
	}

	public function getMaxRowid(){
		$query="SELECT max(rowid) FROM ".$this->__tableName();
		$stmt  = $this->db->prepare($query);
		$stmt->execute();
		$result=$stmt->fetch();
		$maxrid=$result[0];
		if($maxrid=="") $maxrid=0;
		return $maxrid;
	}
}