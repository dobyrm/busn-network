<?php
class Model_Editadmuser extends Model
{
	public function get_data_friends()
	{
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE `hidden` = '0'
			AND `id_user` > ".$_SESSION['auchUsersSetings']['id']."
			OR  `id_user` < ".$_SESSION['auchUsersSetings']['id']." ");
	}

	public function get_ser($ser)
	{
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE `name` LIKE '%" . $ser . "%'
			AND `hidden` = '0'");
	}

	public function get_data_to_form()
	{
		return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."`, `". WS_DBPREFIX . 'users' ."`
			WHERE ". WS_DBPREFIX . 'users_setings' .".id_user = ". (int)$_GET['id'] ."
			AND ". WS_DBPREFIX . 'users' .".id = ". WS_DBPREFIX . 'users_setings' .".id_user");
	}

	public function get_valid_data_login_db($login)
	{
		$res = mysqlQuery("SELECT `id`, `login` FROM `". WS_DBPREFIX . 'users' ."`");
		while($row = mysqli_fetch_assoc($res))
		{
			foreach ($row as $key => $val){
				if($val == $_GET['id']){
					return false;
				}
				if($val == $login){
					return true;
				}
			}
		}
	}

	public function get_valid_data_model($login, $name, $posada, $serFac, $serKaf, $position, $pass)
	{
		if(empty($login)) 
            $info[] = WS_LANG_EMPTY_LOGIN;
       	
       	if($this->get_valid_data_login_db($login) == true)
			$info[] = WS_LANG_INVALID_SAME_LOGINS;

		if($pass > 0){
			if(mb_strlen($pass, 'utf-8') < 4) 
	            $info[] = WS_LANG_SHORT_PASSWORD;
        }

        if(empty($name)) 
            $info[] = WS_LANG_EMPTY_NAME;

        if(empty($posada)) 
            $info[] = WS_LANG_EMPTY_POSADA;

        if(empty($serFac)) 
            $info[] = WS_LANG_EMPTY_SERFAC;

        if(empty($serKaf)) 
            $info[] = WS_LANG_EMPTY_SERKAF;

        if(empty($position))
            $info[] = WS_LANG_EMPTY_POSITION;

		if(empty($info))
        {
			$this->get_read_data_edit_user_admin_model($login, $name, $posada, $serFac, $serKaf, $position, $pass);
			return $infoSucces = WS_LANG_SUCCES_EDIT_USER;
		}
		else
			return $info = Defaults::getInfo($info);
		
	}

	public function get_read_data_edit_user_admin_model($login, $name, $posada, $serFac, $serKaf, $position, $pass)
	{

		if($pass == NULL){
			$table_users =  mysqlQuery("UPDATE `". WS_DBPREFIX . 'users' ."`
		                    	SET `login`		= '". $login ."'
		                    	WHERE `id` = ". (int)$_GET['id'] .""
	                     	);
			$table_users_setings =  mysqlQuery("UPDATE `". WS_DBPREFIX . 'users_setings' ."`
		                    	SET `name`		= '". $name ."',
		                    		`posada`	= '". $posada ."',
		                    		`serFac`	= '". $serFac ."',
		                    		`serKaf`	= '". $serKaf ."',
		                    		`position`	= '". $position ."'
		                    	WHERE `id_user` = ". (int)$_GET['id'] .""
	                     	);

			return $table_users.$table_users_setings;

		}
		else{
			$table_users =  mysqlQuery("UPDATE `". WS_DBPREFIX . 'users' ."`
		                    	SET `login`		= '". $login ."',
		                    		`pass`		= '". md5($pass) ."'
		                    	WHERE `id` = ". (int)$_GET['id'] .""
	                     	);
			$table_users_setings =  mysqlQuery("UPDATE `". WS_DBPREFIX . 'users_setings' ."`
		                    	SET `name`		= '". $name ."',
		                    		`posada`	= '". $posada ."',
		                    		`serFac`	= '". $serFac ."',
		                    		`serKaf`	= '". $serKaf ."',
		                    		`position`	= '". $position ."'
		                    	WHERE `id_user` = ". (int)$_GET['id'] .""
	                     	);

			return $table_users.$table_users_setings;
		}

	}

	public function action_form_dell_user($id)
	{

		mysqlQuery("DELETE FROM `". WS_DBPREFIX . 'users' ."`
                    WHERE `id` = ". (int)$id
                     ); 
		mysqlQuery("DELETE FROM `". WS_DBPREFIX . 'users_setings' ."`
                    WHERE `id_user` = ". (int)$id
                     );
     
        if(mysqli_affected_rows(DB::$link) > 0)
            header('Location: /editadmuser');
        else
            return WS_LANG_FATAL_ERROR;
		
	}

}
