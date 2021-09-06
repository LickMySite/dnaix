<?php

$init = '../app/init.php';

if(file_exists($init))
{
	$app_path = require_once $init;
	return $app_path;
}else{
	$err_path = require_once '404.php';
	return $err_path;
}