<?php

/*
* Встановлюємо кодіровку
*/
	header("Content-Type: text/html; charset=utf-8");

/*
* Встановлюємо рівень помилок
*/
	ini_set('display_errors', 1);

/*
* Стартуємо сесії
*/
	session_start(); 

/** 
* Устанавливаем ключ-константу 
*/    
	define('WS_KEY', true);

require_once 'application/bootstrap.php';