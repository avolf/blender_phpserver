<?php
class BlpDB extends PDO
{
	private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
	private $port;

	public function __construct($engine,$host,$port,$database,$user,$pass){
		$this->engine=$engine;
		$this->host=$host;
		$this->port=$port;
		$this->database=$database;
		$this->user=$user;
		$this->pass=$pass;
		$dns = $this->engine.":host=".$this->host.";port=".$this->port.";dbname=".$this->database;
		#echo "Opening server DB<br>$dns<br>";
		#echo "pass $pass<br>";
		#echo "user $user<br>";
        parent::__construct( $dns, $this->user, $this->pass );
    }

	public function __construct2($engine,$database){
		$this->engine=$engine;
		$this->database=$database;
		$dns = $this->engine.':'.$this->database;
		echo "Opening local DB<br>$dns<br>";
        parent::__construct( $dns );
    }

	public function initDB() {
		try {
			mkdir(RPATH."jobs");
			$j=new BlpJob($this);
			$query = $j->createTable();

			$stmt  = $this->prepare($query);
			echo "$query<br>\n";
			if($stmt->execute() !== false)
				echo 'The DB table job_list is created<br>';
			else
				echo 'The DB table job_list creation failed<br>';
		}
			catch (PDOException $e) { echo $e->getMessage();
		}
	}

	public function deleteDB(){
		$jobids=$this->getJobIDList();
		foreach($jobids as $id) {
			$j=BlpJob::createById($id,$this);
			$j->read();
			$j->delete();
		}
		deleteTable($this,BlpJob::tableName());

		$jobspath=RPATH."jobs";
		if (file_exists($jobspath)) blpRemoveDir($jobspath);
	}

	public function getNumJobs() {
		$query = "SELECT count(name) from job_list";
		$stmt  = $this->prepare($query);
		$stmt->execute();
		$count = $stmt->fetchColumn(0);
		return $count;
	}

	public function getJobList() {
		$query = "SELECT * from job_list";
		$stmt  = $this->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		return $rows;
	}

	public function getJobIDList() {
		$query = "SELECT id from job_list";
		$stmt  = $this->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		$ids=array();
		foreach($rows as $row) {
			$ids[]=$row['id'];
		}
		return $ids;
	}
}

?>