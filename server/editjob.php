<?php
require_once('blp-load.php');
require_once(BLPINC.'/blp-jobtable.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";

if(blpGet("id"))
{
	$btpl=BLPTPL.'/blp-editjob-editing.tpl.php';
}
else
	$btpl=BLPTPL.'/blp-editjob.tpl.php';

#serve Base page template
include BLPTPL.'/blp-page.tpl.php';
?>
