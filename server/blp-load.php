<?php
function init_blphp_db()
{
	define('RPATH',dirname(__FILE__).'/');
	define('BLPINC',RPATH.'include' );
	define('BLPCFG',RPATH.'config' );
	define('BLPTPL',RPATH.'templates' );

	require_once(BLPINC.'/blp-db.php');
	require_once(BLPINC.'/blp-dbitem.php');
	require_once(BLPINC.'/blp-job.php');
	require_once(BLPCFG.'/blp-config.php');
	
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