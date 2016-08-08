<?php
class Model_Friends extends Model
{
	
	public function get_data_friends()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE `id_user` > ".$_SESSION['auchUsersSetings']['id']." OR  `id_user` < ".$_SESSION['auchUsersSetings']['id']." ");
	}

	public function get_ser($ser)
	{
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE `name` LIKE '%" . $ser . "%' ");
	}
	
}