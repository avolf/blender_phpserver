<?php

class BlpJobTable {
	private $db;
	private $showedit;
	private $showid;
	private $showdescr;
	
	public function __construct($db) {
		$this->db=$db;
		$this->showDescr=true;
		$this->showId=false;
		$this->showEdit=false;
	}
	
	public function render() {
		include BLPTPL.'/blp-jobtable.tpl.php';
	}
	
	public function setShowEdit($b) {
		$this->showEdit=$b;
	}
	
	public function setShowId($b) {
		$this->showId=$b;
	}
	
	public function setShowDescr($b) {
		$this->showDescr=$b;
	}
}

?>