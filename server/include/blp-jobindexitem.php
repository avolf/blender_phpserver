<?php

class BlpJobIndexItem extends BlpItem
{
	private $jobid;

	public function __construct($db,$jobid){
		parent::__construct($db);
		$this->$jobid;
	}

	public static function create($db, $jobid){
		 $instance = new self($db, $jobid);
		 return $instance;
	}

	public function tableName(){
		return "JOBFRAMES".$this->jobid;
	}

	public function __tableName(){
		return $this->tableName();
	}

	public function __tableDef(){
		$q="(".
		"id INT AUTO_INCREMENT PRIMARY KEY, ".
		"name varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL UNIQUE, ".
		"fstart int NOT NULL, ".
		"fend int NOT NULL, ".
		"fileName varchar(64) CHARACTER SET utf8 COLLATE utf8_bin, ".
		"cdate datetime NOT NULL ".
		")";
		return $q;
	}

	public function __read($row){
		$this->name = $row['name'];
		$this->begin = $row['fstart'];
		$this->end = $row['fend'];
		$this->fileName = $row['fileName'];
		$this->creationDate = $row['cdate'];
		$this->updateSize();
	}

	public function __insert(){
		$query = "(name,fstart,fend,fileName,cdate) VALUES ('"
		.$this->name."',"
		.$this->begin.","
		.$this->end.","
		."'".$this->fileName."'".","
		."NOW()"
		.")";
		return $query;
	}

	public function __update(){
		$query = "name='".$this->name."', ".
		"fstart=".$this->begin.", ".
		"fend=".$this->end.", ".
		"fileName='".$this->fileName."'";
		return $query;
	}
}

?>
