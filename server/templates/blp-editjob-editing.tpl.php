<?php
$isdone=blpGet("done");
if($isdone) {
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
}

$jobid=blpGet("id");
$job=BlpJob::createById($jobid,$blpdb);
$job->read();
?>
Editing job <?php echo $job->getName() ?>:
<form action="editjob.php?done=1&id=<?php echo $jobid; ?>" method="post">
<p><table>
<tr><td>Job Name:</td><td><input type="text" name="name" value="<?php echo $job->getName(); ?>"/></td></tr>
<tr><td>Start Frame:</td><td><input type="text" name="start" value="<?php echo $job->getBegin(); ?>"/></td></tr>
<tr><td>End Frame:</td><td><input type="text" name="end" value="<?php echo $job->getEnd(); ?>"/></td></tr>
</table></p>
<?php
if($isdone) {
	echo "Edited Job ".$job->getId()."<br>".
	"New name: ".$job->getName()."<br>".
	"New Start Frame: ".$job->getBegin()."<br>".
	"New End Frame: ".$job->getEnd()."<br>";
}
?>
<p><input type="submit" /></p>
</form>
<form action="uploadJobFile.php?id=<?php echo $jobid; ?>" method="post" enctype="multipart/form-data">
<label for="file">Upload file:</label>
<input type="file" name="file" id="file">
<input type="submit" name="submit" value="Submit">
</form>
<a class="button" href="deljob.php?id=<?php echo $jobid; ?>">Delete</a>