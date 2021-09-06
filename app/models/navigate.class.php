<?php

Class Navigate
{
  public function navbar()
  {
    $sitefolder = "../app/views/page/";
		$sitefiles = glob($sitefolder . "*.php");
		$pages = str_replace($sitefolder,'',$sitefiles);
    $pages = str_replace('.php','',$pages);

    $result = '';
  

    foreach ($pages as $page)
    {
      $result .= '

      <li class="nav">
        <a href="'.ROOT.$page.'" class="link">'.ucwords($page). '</a>
      </li>

      ';
    }

    $sitefolder = "../app/views/page/projects/";
    $sitefiles = glob($sitefolder . "*.php");
		$pages = str_replace($sitefolder,'',$sitefiles);
    $pages = str_replace('.php','',$pages);

    

    foreach ($pages as $page)
    {
      $result .= '

      <li class="nav">
        <a href="'.ROOT."projects/".$page.'" class="link" style="color:blue;">'.ucwords($page). '</a>
      </li>

      ';
    }
 
		foreach(glob('../app/views/page/*', GLOB_ONLYDIR) as $dir) {
			$dir = basename($dir);

      $result .= '
      <li class="nav">
        <a href="'.ROOT.$dir.'/" class="link" style="color:blue;">'.ucwords($dir). '</a>
      </li>
        ';

    }

    return $result;
  }

  
}