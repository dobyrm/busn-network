<?php
/*
*Перевірка доступу до сайту
*/
	require_once 'application/core/protection.php';
	Protection::start();


	define('WS_SITE_STOP', '0');
///////////////////////////////////////////////////////////////
//                OPTIONS OF CONNECTION WITH A DB
//                  НАСТРОЙКА ЗЄДНАННЯ З БД
///////////////////////////////////////////////////////////////
	define('WS_DBPREFIX', 'bu_'); 
	define('WS_DBSERVER', 'localhost'); 
	define('WS_DBUSER', 'root');     
	define('WS_DBPASSWORD', '');
	define('WS_DATABASE', 'db_busn');

/////////////////////////////////////////////////////////
/*
*Устанавливает физический путь до корневой директории скрипта
*/
    define('WS_ROOT', str_replace('\\', '/', dirname(__FILE__)));

/*
*Устанавливает путь до корневой директории скрипта
*по протоколу HTTP
*/
    define('WS_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/');