<?php
class Model_Enter extends Model
{
	
	public function get_data()
	{	
		//return mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'page' ."` WHERE page = 'main'");
	}

	public function get_valid_data($login, $pass)
	{
		if(empty($pass)) 
            $info[] = WS_LANG_EMPTY_PASSWORD;
        elseif(mb_strlen($pass, 'utf-8') < 4) 
            $info[] = WS_LANG_SHORT_PASSWORD;  
            
        if(empty($login)) 
            $info[] = WS_LANG_EMPTY_EMAIL;

        if(empty($info))
        {
        	return $this->get_enter_valid_db($login, md5($pass));
        }
        else
			return $info = Defaults::getInfo($info);
	}

	public function get_enter_valid_db($login, $pass)
	{
		$res = mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users' ."` WHERE login = '$login' AND pass = '$pass'");

		if(mysqli_num_rows($res) > 0){
			$data = mysqli_fetch_assoc($res);
		}

		if($data['login'] == $login AND $data['pass'] == $pass){

			mysqlQuery("UPDATE `". WS_DBPREFIX . 'users' ."`
                    	SET  `dataentry` 	= NOW()
                    	WHERE login 		= '$login' AND pass = '$pass'"
                    );

			$_SESSION['userID'] = $data['id'];
			setcookie("userID", $data['id'], time()+7*24*60*60);
			
			$this->get_data_user_setings($data['id']);
		}
        else
        {
        	$info[] = WS_USERS_NOT_DB;
			return $info = Defaults::getInfo($info);
        }
	}

	public function get_data_user_setings($id)
	{

		$dataUsersSetings = mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE id_user = ". $id ." ");
			if(mysqli_num_rows($dataUsersSetings) > 0){
				$dataUsersSetings = mysqli_fetch_assoc($dataUsersSetings);
			}
			

			$_SESSION['auch'] = 1;
				setcookie("auch", $_SESSION['auch'], time()+7*24*60*60);

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

			$_SESSION['userId'] = $dataUsersSetings['id_user'];
			setcookie("userID", $dataUsersSetings['id_user'], time()+7*24*60*60);

			setcookie("auchUsersId", $_SESSION['auchUsersSetings']['id'], time()+7*24*60*60);

			header('Location: /');

	}

}