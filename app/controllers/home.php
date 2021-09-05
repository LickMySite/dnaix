<?php

Class Home extends Controller
{
	public function index($url)
	{
		$URLS = parseURL();

		$data['page_title'] = $URLS;

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
			if(if_exists($data['page_title'][0], 'page/') != true)
			{
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