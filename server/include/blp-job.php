<?php
class BlpJob extends BlpItem
{
	private $name;
	private $begin;
	private $end;
	private $size;
	
	public function __construct($db){
		parent::__construct($db);
	}
	
	public function __construct2($id,$db){
		parent::__construct2($id,$db);
	}
	
	private function updateSize(){	
		$size = $this->end-$this->begin;
	}
	
	public function __tableName(){
		return "job_list";
	}
	
	public function __read($row){
		$this->name = $row['name'];
		$this->begin = $row['start'];
		$this->end = $row['end'];
		updateSize();
	}
	
	public function __write(){
		$query = "(id,name,start,end) VALUES ("
		.$this->id.",'"
		.$this->name."',"
		.$this->begin.","
		.$this->end.")";
		return $query;
	}
	
	public function getName(){
		return $this->name;
	}
	public function getBegin(){
		return $this->begin;
	}
	public function getEnd(){
		return $this->end;
	}
	public function getSize(){
		return $this->end;
	}
	public function setName($i){
		$this->name=$i;
	}
	public function setBegin($i){
		$this->begin=$i;
	}
	public function setEnd($i){
		$this->end=$i;
	}
}
?>