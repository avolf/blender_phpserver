<?php

$jobid=blpGet("id");

if(!$jobid) {
	echo "No Job ID set!\n";
	echo "<br>";
	return;
}

$job=BlpJob::createById($jobid,$blpdb);
$job->read();
?>
Delete Job <?php echo $job->getId(); ?>?.<br>
Job name: <?php echo $job->getName(); ?><br>
Job Start Frame: <?php echo $job->getBegin(); ?><br>
Job End Frame: <?php echo $job->getEnd(); ?><br><br>

<a class="button" href="deljob.php?id=<?php echo $jobid; ?>&done=1">Yes</a>
<a class="button" href="index.php">No</a>
