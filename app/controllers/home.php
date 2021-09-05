<?php

Class Home extends Controller
{
	public function index($path)
	{
		$data['page_title'] = strtolower($path);

			$Navbar = $this->load_model('Navigate');
			$nav_data = $Navbar->navbar();
			$data['nav_data'] = $nav_data;

			$this->view("index", $data);
	}


}