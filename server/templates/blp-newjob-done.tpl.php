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

$b= new BlpJob($blpdb);
$b->setName($jobname);
$b->setBegin($startframe);
$b->setEnd($endframe);
if ($b->write())
	echo "Job successfully created<br>";
else
	echo "Job creation failed<br>";
?>