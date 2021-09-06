<?php

Class Create extends Controller
{
	public function index()
	{
		
		if($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$dir = $this->load_model("Dirfile");

			if(isset($_REQUEST['folder_name']))
			{
				$dir->dir($_POST);
			}
			if(isset($_REQUEST['page_name']) || isset($_REQUEST['folder_list']))
			{
				$dir->file($_POST);
			}
			
		}

		$Navbar = $this->load_model('Navigate');
		$nav_data = $Navbar->navbar();
		$data['nav_data'] = $nav_data;

		$url = parseURL();
		$data['page_title'] = end($url);

		$testPath = array_reduce($url,'urlPath');

				if(is_dir("../app/views".$testPath)){
					$data['page'] = $testPath."/index";
				}else{
					$data['page'] = $testPath;
				}

		$this->view('create/index', $data);
	}
}