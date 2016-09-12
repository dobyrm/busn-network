<?php
//подключаем файлы ядра
require_once 'config.php';
require_once 'core/ua.php';
require_once 'core/mysql.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/defaults.php';
require_once 'core/ws_upload_img.php';
/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

	Defaults::logout();

require_once 'core/route.php';

if(WS_SITE_STOP == 1)
	Route::SiteStop();
elseif(isset($_SESSION['auch']) OR isset($_COOKIE["auch"]) AND isset($_COOKIE["login"])){
	Defaults::get_data_user_setingsCookie($_COOKIE["auchUsersId"]);
	Route::start(); //запускаем маршрутизатор
}
else
	Route::enter();
//unset($_SESSION['auch']);