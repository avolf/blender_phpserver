Job List:<br><br>
<?php 
$njobs=$blpdb->getNumJobs();
$table= new BlpJobTable($blpdb);
$table->setShowId(true);
$table->render();
?>
<br>
There are now <?php echo $njobs ?> jobs stored in the DB.