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

	public function runQuery($q){
		$stmt = $this->db->prepare($q);
		return $stmt->execute();
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
		$ret=$this->runQuery($query);
		$this->id=$this->db->lastInsertId();
		return $ret;
	}

	public function update(){
		$query="UPDATE ".$this->__tableName()." SET ".$this->__update()." WHERE id=".$this->id;
		#echo $query."<br>";
		return $this->runQuery($query);
	}

	public function delete(){
		$query="DELETE FROM ".$this->__tableName()." WHERE id=".$this->id;
		return $this->runQuery($query);
	}

	public function getMaxRowid(){
		$query="SELECT max(rowid) FROM ".$this->__tableName();
		$result=$this->runQuery($query)->fetch();
		$maxrid=$result[0];
		if($maxrid=="") $maxrid=0;
		return $maxrid;
	}
}

?>