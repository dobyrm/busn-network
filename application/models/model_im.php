<?php
class Model_Main extends Model
{
	
	/*public function get_data_message()
	{	
		return  mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'im' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'im' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND ". WS_DBPREFIX . 'im' .".id_user_a != ".$_SESSION['auchUsersSetings']['id']."
			GROUP BY id, id_mess
			ORDER BY ". WS_DBPREFIX . 'im' .".id_mess DESC");
	}*/

	public function get_data_message()
	{	
		return  mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'im' ."`,`". WS_DBPREFIX . 'dialogs' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'dialogs' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND ". WS_DBPREFIX . 'dialogs' .".id_end_mess = ". WS_DBPREFIX . 'im' .".id_mess
			AND ". WS_DBPREFIX . 'dialogs' .".id_user_b = ".$_COOKIE["userID"]."
			ORDER BY ". WS_DBPREFIX . 'dialogs' .".id DESC");
	}

	public function get_data_delete_message($id)
	{

		mysqlQuery("DELETE FROM `". WS_DBPREFIX . 'im' ."`
                    WHERE `id_dialog` = ". (int)$id
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
            return Defaults::reDirect();
        else
            return WS_LANG_FATAL_ERROR;
		
	}

}