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
	
	public function __construct2($id,$db){
		$this->id=$id;
		$this->db=$db;
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
	
	public function read(){
		$query = "SELECT * from ".$this->__tableName()."WHERE id=".$this->id;
		$stmt  = $this->db->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		$this->__read($rows[0]);
	}
	
	public function write(){
		if ($this->isnew) {
			$query="INSERT INTO ".$this->__tableName()." ".$this->__write();
			#echo "$query<br>";
			$stmt  = $this->db->prepare($query);
			$ret = $stmt->execute();
			$this->id=$this->db->lastInsertId();
			#echo "Last inserted id ".$this->id."<br>\n";
			return $ret;
		} else {
			$query="UPDATE ".$this->__tableName()." ".__write()."WHERE id=".$this->id;
			$stmt  = $this->db->prepare($query);
			return $stmt->execute();
		}
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