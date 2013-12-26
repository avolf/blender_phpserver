<br>
Job List:
<?php
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
	$startframe = $row['fstart'];
	$endframe = $row['fend'];
	echo "<tr><td>$id</td><td>$cname</td><td>$startframe</td><td>$endframe</td></tr><br>";
}
echo "</table><br>";
	
echo "<br>There are now $njobs jobs stored in the DB<br>";
?>
If you see this the server is working!