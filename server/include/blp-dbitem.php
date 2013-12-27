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
	
	public function __write(){
		return;
	}
	
	public function __update(){
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
		if ($this->isnew) {
			return $this->firstWrite();
		} else {
			$query="UPDATE ".$this->__tableName()." SET ".$this->__update()." WHERE id=".$this->id;
			$stmt=$this->db->prepare($query);
			return $stmt->execute();
		}
	}
	
	public function firstWrite(){
		$query="INSERT INTO ".$this->__tableName()." ".$this->__write();
		$stmt=$this->db->prepare($query);
		$ret=$stmt->execute();
		$this->id=$this->db->lastInsertId();
		return $ret;
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