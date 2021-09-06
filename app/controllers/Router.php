<?php

Class Router extends Controller
{
	public function index()
	{
		
		$Navbar = $this->load_model('Navigate');
		$nav_data = $Navbar->navbar();
		$data['nav_data'] = $nav_data;

		$url = parseURL();
		$data['page_title'] = end($url);

		$testPath = array_reduce($url,'urlPath');

				if(is_dir("../app/views/page/".$testPath)){
					$data['page'] = "page".$testPath."/index";
				}else{
					$data['page'] = "page".$testPath;
				}
		$this->view('index', $data);
		}
}