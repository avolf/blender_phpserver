<?
//SQLite Database test query
if(!isset($_GET["job"] )) {
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
$jobname=$_GET["job"];
$startframe=$_GET["start"];
$endframe=$_GET["end"];
$framecount=$endframe-$startframe;

$db=sqlite_open("blenderphp.db");
$jobname=$_GET["job"];

$check=sqlite_single_query($db,"SELECT count(name) from job_list WHERE name='".$jobname."'");
if ($check!=0) {
	echo "Job ".$jobname." already exists!<br>";
	return;
}

echo "Creating job ".$jobname." !<br>";

echo $check;
$qerr="INSERT INTO job_list VALUES ('"
.$jobname."',"
.$startframe.","
.$endframe.","
.$framecount.")";
echo "<br>$qerr<br>";
sqlite_query($db, $qerr ,$sqliteerror);
echo "<br>Job successfully created<br>";

sqlite_close($db);


?>