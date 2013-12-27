<?php

function blpPost($n){
	return (isset($_POST[$n]))?$_POST[$n]:false;
}

function blpGet($n){
	return (isset($_GET[$n]))?$_GET[$n]:false;
}

function blpMakeDir($path){
	$ret=mkdir($path, 0755, true);
	return $ret === true || is_dir($path);
}

function blpRemoveDir($dir) {
	$it = new RecursiveDirectoryIterator($dir);
	$files = new RecursiveIteratorIterator($it,
	             RecursiveIteratorIterator::CHILD_FIRST);
	foreach($files as $file) {
	    if ($file->getFilename() === '.' || $file->getFilename() === '..') {
	        continue;
	    }
	    if ($file->isDir()){
	        rmdir($file->getRealPath());
	    } else {
	        unlink($file->getRealPath());
	    }
	}
	rmdir($dir);
}

?>