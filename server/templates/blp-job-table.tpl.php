<table border=\"1\" width=\"350\">
<?php
$njobs=$blpdb->getNumJobs();
$rows=$blpdb->getJobList();
$ids=$blpdb->getJobIDList();

foreach($ids as $id) {
	$j= BlpJob::createWID($id['id'],$blpdb);
	$j->read();
	echo $j->getDescriptionRow();
}
?>
</table>