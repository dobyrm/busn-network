<?php
class Model_Timeline extends Model
{

	public function get_data_friends()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE `hidden` = '0'
			AND `id_user` > ".$_SESSION['auchUsersSetings']['id']." 
			OR  `id_user` < ".$_SESSION['auchUsersSetings']['id']." ");
	}
	
}