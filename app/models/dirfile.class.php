<?php 

Class Dirfile 
{
	private $error = "";
	private $msg = "";

	public function dir($POST)
	{
		$url = parseURL();
				//checks & removes if index is showing in URL
				if(end($url) == 'index'){
					array_pop($url);
				}
		$urlPath = implode('/',$url);

		if(count($url) == 1){
			$path = '../app/views/create/new/';
		}
		if(count($url) != 1){
			$path = '../app/views/'.$urlPath. '/';
		}

		$data = array();
		$data['dir'] = clean_input($POST['folder_name']);
			if(strlen($data['dir']) < 3 || strlen($data['dir']) > 10)
			{
				$this->error .= 'Folder name must be between 3-10 characters long.<br>';
			}

			if($this->error === ""){
				if(!ctype_lower($data['dir']) && !preg_match("/^[a-z]+/",$data['dir']))
				{
				$this->error .= 'Please enter valid folder name!<br>';
				}
			}

			if($this->error === ""){
				if(is_dir($path.$data['dir']))
				{
					$this->error .= 'The folder name <em>'.$data['dir'].'</em> already exists!';
				}
			}
			//show($url);
			//$urlw = explode("/", filter_var(trim($path,"/"),FILTER_SANITIZE_URL, FILTER_FLAG_PATH_REQUIRED));
			//show($pathArray);

			if($this->error === ""){



				array_shift($url);
				array_shift($url);
				$urlNew = implode('/',$url);
				if($urlNew != ''){
					$urlNew = '/' . $urlNew;
					//$createNew = '';
				}
			//show($urlPath);
				mkdir($path.$data['dir']);
				
				//uses custom function to create page in folder
				pageInFolder($path.$data['dir'], 'index');

				//can use redirect insted of msg
				//redirect(ROOT.'create/new' .$urlNew. '/' .$data['dir']);

				$this->msg .= '
					<p>Go to the index page of the new folder named <a href="'.ROOT.'create/new'.$urlNew.'/'.$data['dir'].'">'.$data['dir'].'</a></p>
					';

				return $_SESSION['msg'] = $this->msg;
			}

			return $_SESSION['error'] = $this->error;
			
		
  }

  public function file($POST)
	{
		//create page
		$url = parseURL();

		if(end($url) == 'index'){
			array_pop($url);
			$url = implode('/',$url);
			
		}else{
			$url = implode('/',$url);
		}

		$path = '../app/views/'.$url. '/';
		$data = array();
		$data['file'] = clean_input($POST['page_name']);
		$data['dir'] = clean_input($POST['folder_list']);

		if(strlen($data['dir']) < 3 || strlen($data['dir']) > 10)
		{
			$this->error .= 'Folder name must be between 3-10 characters long.<br>';
		}

		if(strlen($data['file']) < 3 || strlen($data['file']) > 10)
		{
			$this->error .= 'Page name must be between 3-10 characters long.<br>';
		}


		if($this->error === ""){
			if(!ctype_lower($data['dir']) && !preg_match("/^[a-z]+/",$data['dir']))
			{
			$this->error .= 'Please enter valid folder name!<br>';
			}
		}

		if($this->error === ""){
			if(!ctype_lower($data['file']) && !preg_match("/^[a-z]+/",$data['file']))
			{
			$this->error .= 'Please enter valid file name!<br>';
			}
		}

		if($this->error === ""){
			if(!is_dir($path.$data['dir']))
			{
				$this->error .= 'The folder name <em>'.$data['dir'].'</em> doesn\'t exist!';
			}
		}

		if($this->error === ""){
			if(file_exists($path.$data['dir']. '/' .$data['file'].'.php'))
			{
				$this->error .= 'a page named <em>'.$data['file'].'</em> already exists in the <em>'.$data['dir'].'</em> folder!';
			}
		}

		if($this->error === ""){
			//uses custom function to create page in folder
			pageInFolder($path.$data['dir'], $data['file']);
			redirect($url. '/' .$data['dir']. '/' .$data['file']);

		}
		return $_SESSION['error'] = $this->error;
		
	}	
}