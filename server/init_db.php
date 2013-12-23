<?
//SQLite Database initialization

$count=0;
$db=sqlite_open("blenderphp.db");
@sqlite_query($db,"CREATE TABLE job_list (name varchar(32), start int, end int, count int)",$sqliteerror);
echo "DB initialized, error was ".$sqliteerror."<br>";
sqlite_close($db);
?>