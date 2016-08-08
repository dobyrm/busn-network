<?php
/*
*Захист доступу для файлів які підключаються не через ядро
*/
class Protection
{

	static function start()
	{
		if(!defined('WS_KEY'))
	    {
	       header("HTTP/1.1 404 Not Found");     
	       Protection::ErrorPage404();
	    }		
	}

	function ErrorPage404()
	{
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.WS_HOST.'404');
    }

}