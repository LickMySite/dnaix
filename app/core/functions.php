<?php 

function show($data)
{
	echo "
	<pre class='show'><b>";
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
  $data = str_replace("<","",$data);
	#echo "<pre>";
	#print_r($data);
	#echo "</pre>";
  return $data;
}

