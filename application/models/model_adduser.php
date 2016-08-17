<?php
class Model_Adduser extends Model
{

	public function get_valid_data_login_db($login)
	{
		$res = mysqlQuery("SELECT `login` FROM `". WS_DBPREFIX . 'users' ."`");
		while($row = mysqli_fetch_assoc($res))
		{
			if ($row['login'] == $login)
				return true;
			else
				return false;
		}
	}

	public function get_valid_data($login, $pass, $name, $posada, $position)
	{
		
		if($this->get_valid_data_login_db($login) == true)
			$info[] = WS_LANG_INVALID_SAME_LOGINS;

		if(empty($pass)) 
            $info[] = WS_LANG_EMPTY_PASSWORD;
        elseif(mb_strlen($pass, 'utf-8') < 4) 
            $info[] = WS_LANG_SHORT_PASSWORD;

        if(empty($name)) 
            $info[] = WS_LANG_EMPTY_NAME;

        if(empty($posada)) 
            $info[] = WS_LANG_EMPTY_POSADA;

        if(empty($position)) 
            $info[] = WS_LANG_EMPTY_POSITION;

		if(empty($info))
        {
			
			$this->get_read_data($login, $pass, $name, $posada, $position);
			return $infoSucces = WS_LANG_SUCCES_ADD_USER;

		}
		else
			return $info = Defaults::getInfo($info);
	}

	public function get_read_data($login, $pass, $name, $posada, $position)
	{
		mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'users' ."`
		                    	SET `login`		= '". $login ."',
		                    		`pass`		= '". md5($pass) ."',
		                    		`dataentry`	= NOW()"
	                     	);

		$this->get_read_position($name, $posada, $position);

	}

	public function get_read_position($name, $posada, $position)
	{
		$maxIdMess = $this->get_data_end_row();

		//$_SESSION['s'] = $maxIdMess;

		return mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'users_setings' ."`
		                    	SET `id_user`	= 	'". $maxIdMess ."',
		                    		`name`		=	'". $name ."',
		                    		`email`		=	'',
		                    		`posada`	=	'". $posada ."',
		                    		`education`	=	'',
		                    		`address`	=	'',
		                    		`skills`	=	'',
		                    		`note`		=	'',
		                    		`ava`		=	'". WS_HOST ."assets/image/users/ava/noAva.jpg',
		                    		`position`	= 	'". $position ."',
		                    		`hidden`	=	'0'"
	                     	);
	}

	public function get_data_end_row()
	{
		$query =  mysqlQuery("SELECT max(id) FROM `". WS_DBPREFIX . 'users' ."`");

        if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_assoc($query);
		}	
		foreach ($data as $key => $value) {
			return $value;
		}
	}

}