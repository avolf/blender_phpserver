<?php
//SQL Database initialization
require_once('blp-load.php');
$blpdb=init_blphp_db();

echo "Initializing DB...<br>\n";
$blpdb->initDB();
echo "Creating dummy Job...<br>\n";
$b= new BlpJob($blpdb);
$b->setName("TestName");
$b->setBegin(1);
$b->setEnd(21);
$b->write();

echo "Query job contents dummy Job...<br>\n";
$query = "SELECT * from job_list";
$stmt  = $blpdb->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll();

echo "<br>\n";
foreach($rows as $row) {
print_r($row);
echo "<br>";
}
?>