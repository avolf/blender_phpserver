<?
class BlpJob
{
	private $id;
	private $name;
	private $begin;
	private $end;
	private $size;
	
	public function __construct($id){
		$this->id=$id;
	}
}

class BlpDB extends PDO
{
	private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
	
	public function __construct($engine,$database){
		$this->engine=$engine;
		$this->database=$database;
		$dns = $this->engine.':'.$this->database;
		#echo "Opened DB<br>$dns<br>";
        parent::__construct( $dns );
    } 
	
	public function __construct2($engine,$host,$database,$user,$pass){
		$this->engine=$engine;
		$this->host=$host;
		$this->database=$database;
		$this->user=$user;
		$this->pass=$pass;
		$dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
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
}

?>