<?php
$jobid=$_GET["id"];

if($jobid=="") {
	echo "No Job ID set!\n";
	echo "<br>";
	return;
}

$job=BlpJob::createById($jobid,$blpdb);
$job->read();
$joid=$job->getId();
$jobname=$job->getName();
$job->delete();
echo "Deleted Job $jobid - $jobname!"; 
?>
<br><br>
<a class="button" href="index.php">Done</a>
