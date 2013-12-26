<?php
function init_blphp_db()
{
	define('RPATH',dirname(__FILE__).'/');
	define('BLPINC','include' );

	require_once(RPATH.BLPINC.'/blp-db.php');
	require_once(RPATH.BLPINC.'/blp-dbitem.php');
	require_once(RPATH.BLPINC.'/blp-job.php');
	require_once(RPATH.'/blp-config.php');
	
	#echo "DB_TYPE ";
	#echo DB_TYPE;
	#echo "<br>\n";
	
	if (DB_TYPE == 'sqlite2') {
		#echo "Opening SQLite2 DB";
		$blpdb=new BlpDB(DB_TYPE,DB_NAME);
	}
	else {
		#echo "Opening server DB<br>\n";
		$blpdb=new BlpDB(DB_TYPE,DB_HOST,DB_PORT,DB_NAME,DB_USER,DB_PASSWORD);
	}
	
	return $blpdb;
};
?>