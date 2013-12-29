<?php
require_once('blp-load.php');
require_once(BLPINC.'/blp-jobtable.php');

#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
$btpl=BLPTPL.'/blp-uploadjob.tpl.php';

#serve Base page template
include BLPTPL."/blp-page.tpl.php";
?>
