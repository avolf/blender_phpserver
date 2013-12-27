<?php
class BlpJob extends BlpItem
{
	private $name;
	private $begin;
	private $end;
	private $size;
	private $fileName;
	private $creationDate;

	public function __construct($db){
		parent::__construct($db);
	}

	public static function create($db){
		 $instance = new self($db);
		 return $instance;
	}

	public static function createByID($id, $db){
		 $instance = new self($db);
		 $instance->setID($id);
		 return $instance;
	}

	public function insert(){
		$ret = parent::insert();
		#initialisation here...
		$this->createJobFolder();
		return $ret;
	}

	public function delete(){
		$ret = parent::delete();
		$this->removeJobFolder();
		return $ret;
	}

	public function getJobFolderRel(){
		return "jobs/"."job".$this->id;
	}

	public function getJobFolder(){
		$f=RPATH.$this->getJobFolderRel();
		return $f;
	}

	public function getFilePath(){
		return $this->getJobFolder()."/".$this->getFileName();
	}

	public function getFileLink(){
		return $this->getJobFolderRel()."/".$this->getFileName();
	}

	public function createJobFolder(){
		return blpMakeDir($this->getJobFolder());
	}

	public function removeJobFolder(){
		$f=$this->getJobFolder();
		if (file_exists($f)) return blpRemoveDir($this->getJobFolder());
		return false;
	}

	private function updateSize(){
		$this->size = ($this->end)-($this->begin);
	}

	public function __tableName(){
		return "job_list";
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

	public function getId(){ return $this->id; }
	public function getName(){ return $this->name; }
	public function getBegin(){	return $this->begin; }
	public function getEnd(){ return $this->end; }
	public function getSize(){ return $this->size; }
	public function getFileName(){ return $this->fileName; }
	public function getCdate(){ return $this->creationDate; }

	public function setName($i){ $this->name=$i; }
	public function setBegin($i){
		$this->begin=$i;
		$this->updateSize();
	}
	public function setEnd($i){
		$this->end=$i;
		$this->updateSize();
	}
	public function setFileName($f){
		$this->fileName=$f;
	}
}
?>