<?php
class Model_Message extends Model
{
	public $whereIdDialog;

	
	public function __construct()
    {
       $this->whereIdDialog = $_SESSION['auchUsersSetings']['id'].$_GET['id'];        
    }
	
	public function get_data_message()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user");
	}

	public function get_data_dialog()
	{	

		return mysqlQuery("SELECT `id_mess`, `id_user_a`, `id_user_b`, `text`, `id_dialog`, `data`, `id_user`, `name`, `ava` FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE 	". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND 	". WS_DBPREFIX . 'message' .".id_dialog = ". $this->whereIdDialog ." 
			ORDER BY id_mess");

	}

	public function get_new_message($message)
	{

		if(empty($message)) 
            $info[] = WS_LANG_EMPTY_TEXT;

		if(empty($info))
        {
        	$a = mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'message' ."`
                     SET 	`id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                     		`id_user_b` = '". $_GET['id'] ."',
                         	`text`   	= '". $message ."',
                         	`id_dialog`	= '". $_SESSION['auchUsersSetings']['id'].$_GET['id']  ."',
                         	`data` 		= NOW()"
                     );

        	$b = mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'message' ."`
                     SET 	`id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                     		`id_user_b` = '". $_GET['id'] ."',
                         	`text`   	= '". $message ."',
                         	`id_dialog`	= '". $_GET['id'].$_SESSION['auchUsersSetings']['id']  ."',
                         	`data` 		= NOW()"
                     );
        	return $a.$b;
        }

	}

}