<?php
class Model_Main extends Model
{
	
	public function get_data_message()
	{	
		return  mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'message' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'message' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND ". WS_DBPREFIX . 'message' .".id_user_b = ".$_SESSION['auchUsersSetings']['id']."
			ORDER BY ". WS_DBPREFIX . 'message' .".id_mess DESC");
	}

	public function get_data_delete_message($id)
	{

		mysqlQuery("DELETE FROM `". WS_DBPREFIX . 'message' ."`
                    WHERE `id_mess` = ". (int)$id
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
            return Defaults::reDirect();
        else
            return WS_LANG_FATAL_ERROR;
		
	}

}