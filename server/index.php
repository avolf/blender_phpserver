<?php
require_once('blp-load.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
$btpl=BLPTPL.'/blp-index.tpl.php';

#serve Base page template
include BLPTPL."/blp-page.tpl.php";
?>
