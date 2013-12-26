<br>
Job List:<br><br>
<table border=\"1\" width=\"350\">
<?php
$njobs=$blpdb->getNumJobs();
$rows=$blpdb->getJobList();
$ids=$blpdb->getJobIDList();

foreach($ids as $id) {
	$j=new BlpJob($id['id'],$blpdb);
	$j->read();
	echo $j->getDescriptionRow();
}
?>
</table><br>
	
<br>There are now <?php echo $njobs ?> jobs stored in the DB<br>
If you see this the server is working!