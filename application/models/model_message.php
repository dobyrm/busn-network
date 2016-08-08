<?php
class Model_Message extends Model
{
	
	public function get_data_message()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user");
	}

	public function get_data_dialog()
	{	
		$where 	= $_SESSION['auchUsersSetings']['id'].$_GET['id'];
		$whereR = $_GET['id'].$_SESSION['auchUsersSetings']['id'];

		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE 	". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND 	". WS_DBPREFIX . 'message' .".id_dialog = ". $where ." ");
	}

	public function get_data_dialog_out()
	{	
		$where 	= $_SESSION['auchUsersSetings']['id'].$_GET['id'];
		$whereR = $_GET['id'].$_SESSION['auchUsersSetings']['id'];

		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE 	". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND 	". WS_DBPREFIX . 'message' .".id_dialog = ". $whereR ." ");
	}

	public function get_new_message($message)
	{

		if(empty($message)) 
            $info[] = WS_LANG_EMPTY_TEXT;

		if(empty($info))
        {
        	return mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'message' ."`
                     SET 	`id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                     		`id_user_b` = '". $_GET['id'] ."',
                         	`text`   	= '". $message ."',
                         	`id_dialog`	= '". $_SESSION['auchUsersSetings']['id'].$_GET['id']  ."',
                         	`data` 		= NOW()"
                     );
        }

	}

}