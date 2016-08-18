<?php
class Model_Friend extends Model
{
	
	public function get_data()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."`, `". WS_DBPREFIX . 'users' ."` 
			WHERE ". WS_DBPREFIX . 'users_setings' .".id_user = ". (int)$_GET['id'] ." 
			AND ". WS_DBPREFIX . 'users' .".id = ". WS_DBPREFIX . 'users_setings' .".id_user");
	}

}