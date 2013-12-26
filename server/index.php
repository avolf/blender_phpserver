<?php
require_once('blp-loaddb.php');
#init DB
$blpdb=init_blphp_db();

#init Templates
$htpl="";
$btpl="index.tpl.php";

#serve Base page template
include "include/blp-page.tpl.php";
?>
