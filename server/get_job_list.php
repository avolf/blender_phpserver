<?	
	$db=sqlite_open("blenderphp.db");
	$result=sqlite_query($db,"SELECT * from job_list");
	$count=sqlite_single_query($db,"SELECT count(name) from job_list");
	echo "<table border=\"1\" width=\"350\">";
	while($row=sqlite_fetch_array($result))
	{
		$cname = $row['name'];
		$startframe = $row['start'];
		$endframe = $row['end'];
		$framecount = $row['count'];
		echo "<tr><td>$cname</td><td>$startframe</td><td>$endframe</td><td>$framecount</td></tr><br>";
	}
	echo "</table><br>";
	
	echo "<br>Found $count different jobs.<br>";
	sqlite_close($db);
?>