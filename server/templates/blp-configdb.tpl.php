<?php
require_once('blp-load.php');
$blpdb=init_blphp_db();

$initdb=intval(blpGet("initdb"));
$deldb=intval(blpGet("deldb"));
$phpinfo=intval(blpGet("phpinfo"));

$exists=tableExists($blpdb,"job_list");
if ($exists===true) echo "A DB seems to be present.<br>";
else {
	echo "DB was not found!<br>";
	print_r($exists,true);
	$exists=false;
}

if ((!$exists)&&$initdb) {
	echo "Initializing DB...<br>\n";
	$blpdb->initDB();
	$exists=true;
	echo "Creating dummy Job...<br>\n";
	$b= new BlpJob($blpdb);
	$b->setName("testjob");
	$b->setBegin(1);
	$b->setEnd(2);
	$b->write();
}

if ($exists&&$deldb===2) {
	echo "Deleteing the DB....";
	$blpdb->deleteDB();
	echo "DELETED<br>";
	$exists=false;
}
if (!$exists)
	echo '<a class="button" href="configdb.php?initdb=1">Init DB</a> ';
if ($exists)
	echo '<a class="button" href="configdb.php?deldb=1">Delete DB</a> ';
if ($deldb===1)
	echo '<a class="button" href="configdb.php?deldb=2">Really?</a><br>';
?>
<br>
<br>
<a class="button" href="configdb.php?phpinfo=1">PHP Info</a><br>
<br>
<?php
if ($phpinfo===1)
	phpinfo();
?>


