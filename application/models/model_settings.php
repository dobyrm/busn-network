<?php
class Model_Settings extends Model
{

	public function get_valid_data_setings($name, $email, $posada, $education, $address, $skills, $note, $img)
	{

		if(empty($name)) 
            $info[] = WS_LANG_EMPTY_FORM;

        if(empty($email)) 
            $info[] = WS_LANG_EMPTY_EMAIL;          
        elseif(!Defaults::checkEmail($email)) 
            $info[] = WS_LANG_INVALID_EMAIL;

		if(empty($info))
        {
			$this->get_read_data_setings($name, $email, $posada, $education, $address, $skills, $note, $img);
			unset($_SESSION['auchUsersSetings']);

			$this->get_data_user_setings($_SESSION['userID']);

			Defaults::reDirect();
		}
		else
			return $info = Defaults::getInfo($info);
		
	}

	public function get_read_data_setings($name, $email, $posada, $education, $address, $skills, $note, $img)
	{

		if($img == NULL){
			return mysqlQuery("UPDATE `". WS_DBPREFIX . 'users_setings' ."`
		                    	SET `name`		= '". $name ."',
		                    		`email`		= '". $email ."',
		                    		`posada`	= '". $posada ."',
		                    		`education`	= '". $education ."',
		                    		`address`	= '". $address ."',
		                    		`skills`	= '". $skills ."',
		                    		`note`		= '". $note ."'
		                    	WHERE `id_user` = ". $_SESSION['userID'] .""
	                     	);
		}
		else{
			return mysqlQuery("UPDATE `". WS_DBPREFIX . 'users_setings' ."`
		                    	SET `name`		= '". $name ."',
		                    		`email`		= '". $email ."',
		                    		`posada`	= '". $posada ."',
		                    		`education`	= '". $education ."',
		                    		`address`	= '". $address ."',
		                    		`skills`	= '". $skills ."',
		                    		`note`		= '". $note ."',
		                    		`ava`		= '". $img ."'
		                    	WHERE `id_user` = ". $_SESSION['userID'] .""
	                     	);
		}
		

	}

	public function get_data_user_setings($id)
	{

		$dataUsersSetings = mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE id_user = ". $id ." ");
			if(mysqli_num_rows($dataUsersSetings) > 0){
				$dataUsersSetings = mysqli_fetch_assoc($dataUsersSetings);
			}
			

			$_SESSION['auch'] = 1;

			$_SESSION['auchUsersSetings']['id'] 		= $dataUsersSetings['id_user'];
			$_SESSION['auchUsersSetings']['name'] 		= $dataUsersSetings['name'];
			$_SESSION['auchUsersSetings']['email'] 		= $dataUsersSetings['email'];
			$_SESSION['auchUsersSetings']['posada'] 	= $dataUsersSetings['posada'];
			$_SESSION['auchUsersSetings']['education'] 	= $dataUsersSetings['education'];
			$_SESSION['auchUsersSetings']['address'] 	= $dataUsersSetings['address'];
			$_SESSION['auchUsersSetings']['skills'] 	= $dataUsersSetings['skills'];
			$_SESSION['auchUsersSetings']['note'] 		= $dataUsersSetings['note'];
			$_SESSION['auchUsersSetings']['ava'] 		= $dataUsersSetings['ava'];
			$_SESSION['auchUsersSetings']['position'] 	= $dataUsersSetings['position'];

	}

	public function get_valid_data_setings_pass($pass, $newPass, $succesPass)
	{
		
		$res = mysqlQuery("SELECT `pass` FROM `". WS_DBPREFIX . 'users' ."` WHERE id = ". $_SESSION['auchUsersSetings']['id'] ." ");

		if(mysqli_num_rows($res) > 0){
			$data = mysqli_fetch_assoc($res);
		}

		$passMd5 = md5($pass);

		if($data['pass'] != $passMd5){
			$info[] = WS_LANG_EMPTY_OLD_PASSWORD_INVALID;
		}

		if(empty($pass)) 
            $info[] = WS_LANG_EMPTY_PASSWORD;
        elseif(mb_strlen($pass, 'utf-8') < 4) 
            $info[] = WS_LANG_SHORT_PASSWORD; 

        if(empty($newPass)) 
            $info[] = WS_LANG_EMPTY_PASSWORD_NEW;
        elseif(mb_strlen($newPass, 'utf-8') < 4) 
            $info[] = WS_LANG_SHORT_PASSWORD;

        if($newPass != $succesPass)
        	$info[] = WS_LANG_EMPTY_PASSWORD_DO_NOT_MATCH;

		if(empty($info))
        {
			
			$this->get_read_data_setings_pass($newPass);
			return $infoSucces = WS_LANG_SUCCES;

		}
		else
			return $info = Defaults::getInfo($info);
	}

	public function get_read_data_setings_pass($pass)
	{
		return mysqlQuery("UPDATE `". WS_DBPREFIX . 'users' ."`
		                    	SET `pass`		= '". md5($pass) ."'
		                    	WHERE `id` = ". $_SESSION['userID'] .""
	                     	);
	}

}