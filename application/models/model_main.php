<?php
class Model_Main extends Model
{
	
	public function getDataTimeline()
	{	

		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'timeline' ."`,`". WS_DBPREFIX . 'users_setings' ."`
			WHERE ". WS_DBPREFIX . 'timeline' .".id_user_pub = ". WS_DBPREFIX . 'users_setings' .".id_user");
	
	}

}