<?php

$path = $_SERVER['REQUEST_SCHEME'] . "://". $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT', $path);
define('ASSETS', $path . "resources/assets/");

$folder = "../app/core/";
$files = array("config","functions","database","controller","setting.class","app");
$all = glob($folder."*.php");

foreach ($files as $file)
{
	if(in_array($folder . $file . ".php", $all))
	{
		require_once $folder . $file . ".php";
	}else{
		echo $file. " file not found!<br>";
	}
}

$app = new App();