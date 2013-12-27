<?php
require_once('blp-load.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
if(blpGet("done"))
	$btpl=BLPTPL.'/blp-newjob-done.tpl.php';
else
	$btpl=BLPTPL.'/blp-newjob.tpl.php';

#serve Base page template
include BLPTPL.'/blp-page.tpl.php';
?>
