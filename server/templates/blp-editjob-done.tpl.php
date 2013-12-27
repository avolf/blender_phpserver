<?php
$jobname=blpPost("name");
$startframe=blpPost("start");
$endframe=blpPost("end");

if(!$jobname) {
	echo "No Job name set!<br>\n";
	return;
}
if(!$startframe) {
	echo "No Job start frame set!<br>\n";
	return;
}
if(!$endframe) {
	echo "No Job end frame set!<br>\n";
	return;
}

$jobid=blpGet("id");
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