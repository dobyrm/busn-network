<?php
class Model_Dialog extends Model
{
	public $whereIdDialog;

	
	public function __construct()
    {
       $this->whereIdDialog = $_SESSION['auchUsersSetings']['id'].$_GET['id'];        
    }
	
	public function get_data_message()
	{	
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'im' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE ". WS_DBPREFIX . 'im' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user");
	}

	public function get_data_dialog()
	{	

		return mysqlQuery("SELECT `id_mess`, `id_user_a`, `id_user_b`, `text`, `id_dialog`, `data`, `id_user`, `name`, `ava` FROM `". WS_DBPREFIX . 'im' ."`,`". WS_DBPREFIX . 'users_setings' ."` 
			WHERE 	". WS_DBPREFIX . 'im' .".id_user_a = ". WS_DBPREFIX . 'users_setings' .".id_user 
			AND 	". WS_DBPREFIX . 'im' .".id_dialog = ". $this->whereIdDialog ." 
			ORDER BY id_mess");
	}

	public function get_data_end_row()
	{
		$query =  mysqlQuery("SELECT max(id_mess) FROM `". WS_DBPREFIX . 'im' ."`");

        if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_assoc($query);
		}	
		foreach ($data as $key => $value) {
			return $value;
		}
	}

	public function get_new_message($message)
	{

		if(empty($message)) 
            $info[] = WS_LANG_EMPTY_TEXT;

		if(empty($info))
        {
        	$a = mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'im' ."`
                     SET 	`id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                     		`id_user_b` = '". $_GET['id'] ."',
                         	`text`   	= '". $message ."',
                         	`id_dialog`	= '". $_SESSION['auchUsersSetings']['id'].$_GET['id']  ."',
                         	`data` 		= NOW()"
                     );

        	$b = mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'im' ."`
                     SET 	`id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                     		`id_user_b` = '". $_GET['id'] ."',
                         	`text`   	= '". $message ."',
                         	`id_dialog`	= '". $_GET['id'].$_SESSION['auchUsersSetings']['id']  ."',
                         	`data` 		= NOW()"
                     );


        	$maxIdMess = $this->get_data_end_row();

        	$query =  mysqlQuery("SELECT `id_user_a`, `id_user_b` FROM `". WS_DBPREFIX . 'dialogs' ."`
        			WHERE id_user_a = '". $_SESSION['auchUsersSetings']['id'] ."' 
        			AND   id_user_b = '". $_GET['id'] ."'");

        	if(mysqli_num_rows($query) > 0)
        	{
        		
                $updateDialogs = mysqlQuery("UPDATE `". WS_DBPREFIX . 'dialogs' ."`
                            SET `id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                                `id_user_b` = '". $_GET['id'] ."',
                                `id_end_mess`       = '". $maxIdMess ."'
                    WHERE `id_user_a` = ". $_SESSION['userID'] ." AND `id_user_b` = ". $_GET['id'] .""
                     );

        	}
        	else
        	{
        		
                $insertDialogs = mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'dialogs' ."`
                            SET `id_user_a` = '". $_SESSION['auchUsersSetings']['id'] ."',
                                `id_user_b` = '". $_GET['id'] ."',
                                `id_end_mess`       = '". $maxIdMess ."'"
                     );

        	}

        	return $a.$b;
        }

	}

}