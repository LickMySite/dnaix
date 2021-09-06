<?php 

Class Controller
{

	public function view($url,$data = [])
	{
 		if(is_array($data)){
 			extract($data);
		}

		if(file_exists("../app/views/" . THEME . $url . ".php"))
		{
			include_once "../app/views/" . THEME . $url . ".php";
		}else{
			include_once "../app/views/" . THEME . "404.php";
		}
	}

	public function load_model($model)
	{

		if(file_exists("../app/models/" . THEME . strtolower($model) . ".class.php"))
		{
			include_once "../app/models/" . THEME . strtolower($model) . ".class.php";
			return $a = new $model();
		}

		return false;
	}


}