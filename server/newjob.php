<?php
require_once('blp-load.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
if(isset($_GET["done"]))
	$btpl=BLPTPL.'/blp-newjob-done.tpl.php';
else
	$btpl=BLPTPL.'/blp-newjob.tpl.php';

#serve Base page template
include BLPINC."/blp-page.tpl.php";
?>
