<?php
require_once('blp-load.php');

#init DB
$blpdb=init_blphp_db();

$jobid=blpPost("id");
if (!$jobid) {
	echo "BLP-Error: No job id specified!";
	return;
}

print_r($_FILES);
print_r($_POST);


if ($_FILES["jobfile"]["error"] > 0)
{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
else
{
	$fname=$_FILES["jobfile"]["name"];
	$tempname=$_FILES["jobfile"]["tmp_name"];
	$ftype=$_FILES["jobfile"]["type"];
	$fsize=$_FILES["jobfile"]["size"];

	echo "Upload: " . $fname . "<br>\n";
	echo "Type: " . $ftype . "<br>\n";
	echo "Size: " . ($fsize / 1024) . " kB<br>\n";
	echo "Temp file: " . $tempname . "<br>\n";

	$job=BlpJob::createById($jobid,$blpdb);
	$job->read();

	$ftargetpath=$job->getJobFolder()."/". $fname;
	$oldjobfilename=$job->getFileName();
	$oldjobfilepath=$job->getJobFolder()."/".$oldjobfilename;


	move_uploaded_file($tempname, $ftargetpath);
	echo "Stored in: " . $ftargetpath."<br>\n";


	if($oldjobfilename!=$fname &&
	$oldjobfilename!="" &&
	file_exists($oldjobfilepath))
	{
		unlink($oldjobfilename);
	}
	$job->setFileName($fname);
	$job->write();
}
?>
