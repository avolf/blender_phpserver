<?php
if(!isset($_POST["name"]) ||
!isset($_POST["start"]) ||
!isset($_POST["end"])) {
	echo "Error only usable as post!\n";
	echo "<br>";
	return;
}

$jobname=$_POST["name"];
$startframe=$_POST["start"];
$endframe=$_POST["end"];

if($jobname=="") {
	echo "No Job name set!\n";
	echo "<br>";
	return;
}
if($startframe=="") {
	echo "No Job start frame set!\n";
	echo "<br>";
	return;
}
if($endframe=="") {
	echo "No Job end frame set!\n";
	echo "<br>";
	return;
}

$jobid=$_GET["id"];
$job=BlpJob::createById($jobid,$blpdb);
$job->setName($jobname);
$job->setBegin($startframe);
$job->setEnd($endframe);
$job->write();
?>

Edited Job <?php echo $job->getId(); ?>.<br>
New name: <?php echo $job->getName(); ?><br>
New Start Frame: <?php echo $job->getBegin(); ?><br>
New End Frame: <?php echo $job->getEnd(); ?>

<br><br>
<a class="button" href="index.php">Done</a>