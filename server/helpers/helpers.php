<?php

function blpPost($n){
	return (isset($_POST[$n]))?$_POST[$n]:false;
}

function blpGet($n){
	return (isset($_GET[$n]))?$_GET[$n]:false;
}

function blpMakeDir($path){
   $ret = mkdir($path); // use @mkdir if you want to suppress warnings/errors
   return $ret === true || is_dir($path);
}

?>