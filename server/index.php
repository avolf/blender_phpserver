Alex's blenderphp server<br><br>
Job List:
<?
include 'load-db.php';

require_blphp_db();

$njobs=$blpdb->getNumJobs();
$rows=$blpdb->getJobList();

echo "<table border=\"1\" width=\"350\">";
foreach($rows as $row) {
	$cname = $row['name'];
	$startframe = $row['start'];
	$endframe = $row['end'];
	$framecount = $row['count'];
	echo "<tr><td>$cname</td><td>$startframe</td><td>$endframe</td><td>$framecount</td></tr><br>";
}
echo "</table><br>";
	
echo "<br>There are now $njobs jobs stored in the DB<br>";
?>
If you see this the server is working!