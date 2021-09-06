<?php

Class Router extends Controller
{
	public function index($url)
	{
		$data['page_title'] = parseURL();

		if(isset($data['page_title'][1])){
			if(if_exists($data['page_title'][1], 'page/'.$data['page_title'][0].'/') != true)
			{
				$index = '404';
			}else{
				$index = 'index';
				$Navbar = $this->load_model('Navigate');
				$nav_data = $Navbar->navbar();
				$data['nav_data'] = $nav_data;
			}
		}else{

			$dir = glob('../app/views/page/*', GLOB_ONLYDIR);
			//$dir = array(basename($dir));
			show($dir);
			if(if_exists($data['page_title'][0], 'page/') != true && in_array("../app/views/page/".$data['page_title'][0],$dir) != true)
			{show('regsaergsertgweaghwrtheweht whwwh');
				$index = '404';
			}else{
				$index = 'index';
				$Navbar = $this->load_model('Navigate');
				$nav_data = $Navbar->navbar();
				$data['nav_data'] = $nav_data;
			}
		}
				$this->view($index, $data);
		}
		

}