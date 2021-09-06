<?php 

function show($data)
{
	echo "<pre class='show'><b>";
	print_r($data);
	echo "<b></pre>";
}

function check_error()
{

	if(isset($_SESSION['error']) && $_SESSION['error'] != "")
	{
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
}

function esc($data)
{
	return addslashes($data);
}

function redirect($link)
{
	header("Location: " . ROOT . $link);
	die;
}

function clean_input($data) {
  $data = trim($data);
  $data = addslashes($data);
  $data = htmlentities($data, ENT_QUOTES, 'UTF-8');
 // $data = str_replace("<","",$data);
	#echo "<pre>";
	#print_r($data);
	#echo "</pre>";
  return $data;
}

function if_exists($data, $folder) {

	$sitefolder = "../app/views/" .$folder;
	$sitefile = glob($sitefolder . "*.php");
	$sitenames = $sitefolder . $data . ".php";
		if(in_array($sitenames, $sitefile)){
			return true;
		}
	}
	function parseURL()
	{

		$url = isset($_GET['url']) ? $_GET['url'] : "home";
		$url = htmlentities($url, ENT_QUOTES, 'UTF-8');
		return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL, FILTER_FLAG_PATH_REQUIRED));
 	}
	
	 function viewDir()
	 {
		 $arr = [];
		foreach(glob('../app/views/page/*', GLOB_ONLYDIR) as $dir) {
			
			$array[] = basename($dir);
return $array;
		}
					//$dir = array($dir);
			
	 }

