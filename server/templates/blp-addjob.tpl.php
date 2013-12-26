<?php
//SQLite Database test query
if(!isset($_GET["name"] )) {
	echo "No Job name set!\n";
	echo "<br>";
	return;
}
if(!isset($_GET["start"] )) {
	echo "No Job start frame set!\n";
	echo "<br>";
	return;
}
if(!isset($_GET["end"] )) {
	echo "No Job end frame set!\n";
	echo "<br>";
	return;
}
$jobname=$_GET["name"];
$startframe=$_GET["start"];
$endframe=$_GET["end"];

$b= new BlpJob($blpdb);
$b->setName($jobname);
$b->setBegin($startframe);
$b->setEnd($endframe);
if ($b->write())
	echo "<br>Job successfully created<br>";
else
	echo "<br>Job creation failed<br>";
?>