<?php
$jobid=blpGet("id");
$job=BlpJob::createById($jobid,$blpdb);
$job->read();
?>
Editing job <?php echo $job->getName() ?>:
<form action="editjob.php?done=1&id=<?php echo $jobid; ?>" method="post">
<p><table>
<tr><td>Job Name:</td><td><input type="text" name="name" value="<?php echo $job->getName(); ?>"/></td></tr>
<tr><td>Start Frame:</td><td><input type="text" name="start" value="<?php echo $job->getBegin(); ?>"/></td></tr>
<tr><td>End Frame:</td><td><input type="text" name="end" value="<?php echo $job->getEnd(); ?>"/></td></tr>
</table></p>
<p><input type="submit" /></p>
</form>
<a class="button" href="deljob.php?id=<?php echo $jobid; ?>">Delete</a>