<?

function require_blphp_db()
{
	define( 'RPATH',  dirname(__FILE__) . '/' );
	define( 'BLPINC', 'include' );

	global $blpdb;

	require_once( RPATH . BLPINC . '/blp-db.php' );
	require_once( RPATH . '/blp-config.php' );
	
	if ( isset( $blpdb ) )
		return;

	if (DB_TYPE == 'sqlite2')
		$blpdb = new BlpDB( DB_TYPE, DB_NAME);
	else
		$blpdb = new BlpDB(  DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD  );
};


?>