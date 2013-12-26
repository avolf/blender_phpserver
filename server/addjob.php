<?php
require_once('blp-load.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
$btpl=BLPTPL.'/blp-addjob.tpl.php';

#serve Base page template
include BLPINC."/blp-page.tpl.php";
?>
