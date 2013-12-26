<?php
require_once('blp-load.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";

if(isset($_GET["id"]))
{
	if(isset($_GET["done"]))
		$btpl=BLPTPL.'/blp-deljob-done.tpl.php';
	else
		$btpl=BLPTPL.'/blp-deljob.tpl.php';
}

#serve Base page template
include BLPTPL."/blp-page.tpl.php";
?>
