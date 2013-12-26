<table border=\"1\" width=\"350\">
<?php
$njobs=$blpdb->getNumJobs();
$rows=$blpdb->getJobList();
$ids=$blpdb->getJobIDList();

foreach($ids as $id) {
	$j= BlpJob::createByID($id['id'],$blpdb);
	$j->read();
	echo "<tr>".
	"<td>".$j->getId()."</td>".
	"<td>".$j->getName()."</td>".
	"<td>".$j->getBegin()."</td>".
	"<td>".$j->getEnd()."</td>";
	if (isset($jobtableeditable)){
		echo "<td><a href=\"editjob.php?id=".$j->getId()."\">edit</td>";
	}
	echo "</tr>";
}
?>
</table>