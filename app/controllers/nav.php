<?php

Class Nav extends Controller
{
	public function index()
	{
		$User = $this->load_model('User');

		$user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;

		}

		$thisurl = $_GET['url'];
 	 	$data['page_title'] = filter_var(trim($thisurl,"/"),FILTER_SANITIZE_URL);

			$sitefolder = "../app/views/page/";
			$sitefiles = glob($sitefolder . "*.php");
			$sitenames = $sitefolder . $data['page_title'] . ".php";

				if(!in_array($sitenames, $sitefiles)){
					$data['page_title'] = "404";
				}
				$this->view("layout/nav",$data);
	}

}