<?php
/*
*Стандарти
*/

class Defaults
{

    static function logout()
    {
    	if(isset($_GET['exit']))
    	{
			session_destroy(); 
			#redirect
			header('Location: /');
			exit;
		}
    }

    function checkEmail($to)   
    {   
        if(function_exists('filter_var'))  
            return filter_var($to, FILTER_VALIDATE_EMAIL); 
        else 
            return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $to); 
    } 
    
    function getInfo($info)
    {
        if(count($info))
            return implode('<br>', $info);
        else
            return '&nbsp;';
    }

    function reDirect()
    {
        header('location: '. str_replace("/index.php", "", $_SERVER['HTTP_REFERER']));
        exit();
    }
}