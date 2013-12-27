<?php
echo "<table border=\"1\" width=\"450\">";

$db=$this->db;
$njobs=$db->getNumJobs();
$ids=$db->getJobIDList();

if ($this->showDescr){
	echo "<tr>";
	if ($this->showId){
		echo "<td>id</td>";
	}
	echo "<td>Name</td><td>Begin</td><td>End</td>";
	if ($this->showSize){
		echo "<td>Frames</td>";
	}
	if ($this->showFname){
		echo "<td>File</td>";
	}
	if ($this->showCdate){
		echo "<td>Date</td>";
	}
	if ($this->showEdit){
		echo "<td>-</td>";
	}
	echo "</tr>";
}
foreach($ids as $id) {
	$j= BlpJob::createByID($id['id'],$db);
	$j->read();
	echo "<tr>";
	if ($this->showId){
		echo "<td>".$j->getId()."</td>";
	}
	echo "<td>".$j->getName()."</td>".
	"<td>".$j->getBegin()."</td>".
	"<td>".$j->getEnd()."</td>";
	if ($this->showSize){
		echo "<td>".$j->getSize()."</td>";
	}
	if ($this->showFname){
		$fn=$j->getFileName();
		echo "<td>".(($fn=="")?"--":$fn)."</td>";
	}
	if ($this->showCdate){
		echo "<td>".$j->getCdate()."</td>";
	}
	if ($this->showEdit){
		echo "<td><a href=\"editjob.php?id=".$j->getId()."\">edit</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>