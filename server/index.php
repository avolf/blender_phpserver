Alex's blenderphp server<br><br>
Job List:
<?
require_once('load-db.php');
$blpdb=init_blphp_db();

$njobs=$blpdb->getNumJobs();
$rows=$blpdb->getJobList();
$ids=$blpdb->getJobIDList();
foreach($ids as $id) {
	echo $id['id'];
	echo " ";
}

echo "<table border=\"1\" width=\"350\">";
foreach($rows as $row) {
	$id = $row['id'];
	$cname = $row['name'];
	$startframe = $row['start'];
	$endframe = $row['end'];
	echo "<tr><td>$id</td><td>$cname</td><td>$startframe</td><td>$endframe</td></tr><br>";
}
echo "</table><br>";
	
echo "<br>There are now $njobs jobs stored in the DB<br>";
?>
If you see this the server is working!