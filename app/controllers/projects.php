<?php

Class Projects extends Controller
{
public function index($path)
	{
		$data['page_title'] = 'projects/'.strtolower($path);

			$Navbar = $this->load_model('Navigate');
			$nav_data = $Navbar->navbar();
			$data['nav_data'] = $nav_data;

      show($data['page_title']);
			$this->view("projects/test", $data);
	}
}