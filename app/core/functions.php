<?php 

function show($data)
{
	echo "<pre class='show'><b>";
	print_r($data);
	echo "<b></pre>";
}

function msg()
{
	if(isset($_SESSION['msg']) && $_SESSION['msg'] != "")
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
}
function say($data)
{
	if(isset($data) && $data != "")
	{
		$data = htmlentities($data, ENT_QUOTES, 'UTF-8');
		echo $data;
		unset($data);
	}
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
	$data = filter_var($data, FILTER_SANITIZE_STRING);
  $data = trim($data);
  $data = addslashes($data);
  $data = htmlentities($data, ENT_QUOTES, 'UTF-8');
	$data = strtolower($data);
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
		$url = strtolower($url);
		return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL, FILTER_FLAG_PATH_REQUIRED));
 	}
	

	 function urlPath($a, $b)
	 {
		return $a . '/' . $b;
	 }

	 function list_folders(){
		$url = parseURL();
		$path = implode('/', $url);
		
		$dirs = array_filter(glob('../app/views/'.$path.'/*', GLOB_ONLYDIR), 'is_dir');
		$dirs = str_replace("../app/views/".$path."/","",$dirs);
		$result ='';

		foreach($dirs as $dir)
		{
			$result .= '<option value="'.$dir.'">'.$dir.'</option>';
		}
		return $result;
	 }



	 function li_files_folders($dir){


		 $list = scandir($dir);

		 unset($list[array_search('.', $list, true)]);
		 unset($list[array_search('..', $list, true)]);
		
		 //prevent empty list
		 if(count($list) < 1)
		 	return;

			echo '<ol>';

			foreach($list as $item)
			{
				
				if(!is_dir($dir. '/' .$item)) {
					
					echo '<li><a href="'.str_replace(".php","",$item).'">'.str_replace(".php","",$item).'</a>';
				}

				if(is_dir($dir. '/' .$item)) {

					echo '<li><em>'.ucwords($item).'</em></li>';
					li_files_folders($dir. '/' .$item);
				
				}
				echo '</li>';
			}
			echo '</ol>';
	 }

function pageInFolder($path, $file){

	$myPage = fopen($path. '/' .$file.'.php', 'w')
	or die('Unable to create page!');
	
	$dir = explode("/", filter_var(trim($path,"/"),FILTER_SANITIZE_URL, FILTER_FLAG_PATH_REQUIRED));
	$dir = end($dir);

 $txt = '
 <form method="POST">
  <label for="folder_list">Choose a folder:</label>
    <select id="folder_list" name="folder_list">
    <option value="<?= isset($_REQUEST["folder_list"]) ? $_REQUEST["folder_list"] : "";?>"><?= isset($_REQUEST["folder_list"]) ? $_REQUEST["folder_list"] : "";?></option>
		<?=list_folders();?>
    </select>
  <label for="page_name">Page Name: </label>
    <input type="text" name="page_name" value="<?= isset($_REQUEST["page_name"]) ? $_REQUEST["page_name"] : "";?>">
		<input type="submit">
</form>

<p style="font-size:18px;color:green;"><?php msg() ?></p>
<p style="font-size:18px;color:red;"><?php check_error() ?></p>
 
 ';
 fwrite($myPage, $txt);
 fclose($myPage);

}

function pageTitle($path)
{
	$file = explode("/", filter_var(trim($path,"/"),FILTER_SANITIZE_URL, FILTER_FLAG_PATH_REQUIRED));
	$pageTitle = array_pop($file);
	$folder = end($file);

	if(file_exists('../app/views/'. $path. '.php'))
	{
		return say('This is the '.$pageTitle. ' page of the '.$folder. ' folder.');
	}
	
	$file = implode("/",$file);
	if(is_dir('../app/views/'. $file)){
		return say('There is no '.$pageTitle. ' page in the '.$folder. ' folder!');
	}

	return say('There is no '.$pageTitle. 'page or '.$folder. ' folder!');

}