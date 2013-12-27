<?php
$jobname=blpPost("name");
$startframe=blpPost("start");
$endframe=blpPost("end");

if($jobname=="") {
	echo "No Job name set!<br>\n";
	return;
}
if($startframe=="") {
	echo "No Job start frame set!<br>\n";
	return;
}
if($endframe=="") {
	echo "No Job end frame set!<br>\n";
	return;
}

$b= new BlpJob($blpdb);
$b->setName($jobname);
$b->setBegin($startframe);
$b->setEnd($endframe);
if ($b->write())
	echo "Job successfully created!";
else
	echo "Job creation failed!";
?>
<br><br>
<a class="button" href="index.php">Done</a>