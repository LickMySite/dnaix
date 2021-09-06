<?php

$path = $_SERVER['REQUEST_SCHEME'] . "://". $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);

define('ROOT', $path);
define('ASSETS', $path . "resources/assets/");

$cores = 
	array(
		"config",
		"functions",
		"database",
		"controller",
		"setting.class",
		"app"
	);

	$core_folder = "../app/core/";
	$core_files = glob($core_folder."*.php");

foreach ($cores as $core)
{
	if(in_array($core_folder . $core . ".php", $core_files))
	{
		require_once $core_folder . $core . ".php";
	}else{
		$err = print_r("<b>".$core."</b> file not found!<br>Check <em>init.php</em> file or <em>Core</em> folder");
		return $err;
	}
}

$app = new App();