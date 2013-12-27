<?php

$jobid=blpGet("id");
if (!$jobid) {
	echo "No job id specified!";
	return;
}

if ($_FILES["file"]["error"] > 0)
{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
else
{
	$fname=$_FILES["file"]["name"];
	$tempname=$_FILES["file"]["tmp_name"];
	$ftype=$_FILES["file"]["type"];
	$fsize=$_FILES["file"]["size"];

	echo "Upload: " . $fname . "<br>";
	echo "Type: " . $ftype . "<br>";
	echo "Size: " . ($fsize / 1024) . " kB<br>";
	echo "Temp file: " . $tempname . "<br>";

	$job=BlpJob::createById($jobid,$blpdb);
	$job->read();

	$ftargetpath=$job->getJobFolder()."/". $fname;

	#if (file_exists($ftargetpath))
	#{
	#	echo $fname . " already exists. ";
	#}

	move_uploaded_file($tempname, $ftargetpath);
	echo "Stored in: " . $ftargetpath;
	$oldjobfilename=$job->getJobFolder()."/".$job->getFileName();
	if($job->getFileName()!=$fname && $job->getFileName()!="" && file_exists($oldjobfilename))
	{
		unlink($oldjobfilename);
		$job->setFileName($fname);
		$job->write();
	}
}
?>
<br><br>
<a class="button" href="editjob.php?id=<?php echo $jobid; ?>">Done</a>