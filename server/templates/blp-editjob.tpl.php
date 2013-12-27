Job List: <br><br>
<?php
$njobs=$blpdb->getNumJobs();
$table= new BlpJobTable($blpdb);
$table->setShowId(true);
$table->setShowFname(true);
$table->setShowEdit(true);
$table->renderAll();
?>
<br>
There are now <?php echo $njobs ?> jobs stored in the DB<br>
