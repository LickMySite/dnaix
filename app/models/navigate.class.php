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
    return $result;
  }
}