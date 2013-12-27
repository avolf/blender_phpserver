<?php
//SQL Database initialization
require_once('blp-load.php');
$blpdb=init_blphp_db();

$initdb=intval(blpGet("initdb"));
$deletedb=intval(blpGet("deletedb"));
$checkdb=true;
if ($initdb||$deletedb) $checkdb=false;

if ($initdb) {
	echo "Initializing DB...<br>\n";
	$blpdb->initDB();
	#echo "Creating dummy Job...<br>\n";
	#$b= new BlpJob($blpdb);
	#$b->setName("TestName");
	#$b->setBegin(1);
	#$b->setEnd(2);
	#$b->write();
}

if ($checkdb) {
	$exists=tableExists($blpdb,"job_list");
	if ($exists===true) echo "A DB seems to be present.<br>";
	else {
		echo "DB was not found!<br>";
		print_r($exists,true);
	}
}

if ($deletedb===1) {
	echo "Intent to delete the DB.<br>";
}

if ($deletedb===2) {
	echo "Deleteing the DB.<br>";
}
?>
<a class="button" href="configdb.php?initdb=1">Init DB</a>
<a class="button" href="configdb.php?deletedb=1">Delete DB</a>
<?php
if ($deletedb===1) {
	echo "<a class=\"button\" href=\"configdb.php?deletedb=2\">Really?</a><br>";
}
?>
<br>

