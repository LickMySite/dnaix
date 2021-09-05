<?php 

/*set your website title*/

define('WEBSITE_TITLE', 'Site Title');

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','site_main');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');

define('THEME','');

/*protocal type http or https*/
define('PROTOCAL','http');

define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}