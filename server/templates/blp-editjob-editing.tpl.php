<?php
$jobid=$_GET["id"];
$job=BlpJob::createById($jobid,$blpdb);
$job->read();
?>
Editing job <?php echo $job->getName() ?>:
<form action="editjob.php?done=1&id=<?php echo $jobid; ?>" method="post">
 <p>Job Name: <input type="text" name="name" value="<?php echo $job->getName(); ?>"/></p>
 <p>Start Frame: <input type="text" name="start" value="<?php echo $job->getBegin(); ?>"/></p>
 <p>End Frame: <input type="text" name="end" value="<?php echo $job->getEnd(); ?>" /></p>
 <p><input type="submit" /></p>
</form>