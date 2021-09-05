<?php

$err = "404";
$folder = "app";
$file = "init";
$file_path = "../".$folder."/".$file.".php";

if(file_exists($file_path))
{
	require $file_path;
}else{
	require $err.".html";
}