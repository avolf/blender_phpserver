<?php

class BlpJobTable {
	private $db;
	private $showEdit;
	private $showId;
	private $showCdate;
	private $showFname;
	private $showSize;
	private $showDescr;

	public function __construct($db) {
		$this->db=$db;
		$this->showDescr=true;
		$this->showId=false;
		$this->showEdit=false;
		$this->showCdate=true;
		$this->showFname=false;
		$this->showSize=true;
	}

	public function render() {
		include 'blp-jobtable.tpl.php';
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
	public function setShowCtime($t) {
		$this->showCdate=$t;
	}

	public function setShowFname($fn) {
		$this->showFname=$fn;
	}
}

?>