<?php
/*
*Стандарти
*/

class Defaults
{

    static function logout()
    {
    	if(isset($_GET['exit']))
    	{
            Defaults::delCookieAndSession();
			#redirect
			header('Location: /');
			exit;
		}
    }

    function delCookieAndSession()
    {
        setcookie ("login", "", time()+7*24*60*60);
        setcookie ("pass", "", time()+7*24*60*60);
        setcookie ("auch", "", time()+7*24*60*60);
        setcookie ("auchUsersId", "", time()+7*24*60*60);
        setcookie ("userID", "", time()+7*24*60*60);
        session_destroy();
    }

    function get_data_user_setingsCookie($id)
    {
        
        $dataUsersSetings = mysqlQuery("SELECT * FROM `". WS_DBPREFIX . 'users_setings' ."` WHERE id_user = ". $id ." ");
            if(mysqli_num_rows($dataUsersSetings) > 0){
                $dataUsersSetings = mysqli_fetch_assoc($dataUsersSetings);
            }

            $_SESSION['auchUsersSetings']['id']         = $dataUsersSetings['id_user'];
            $_SESSION['auchUsersSetings']['name']       = $dataUsersSetings['name'];
            $_SESSION['auchUsersSetings']['email']      = $dataUsersSetings['email'];
            $_SESSION['auchUsersSetings']['posada']     = $dataUsersSetings['posada'];
            $_SESSION['auchUsersSetings']['education']  = $dataUsersSetings['education'];
            $_SESSION['auchUsersSetings']['address']    = $dataUsersSetings['address'];
            $_SESSION['auchUsersSetings']['skills']     = $dataUsersSetings['skills'];
            $_SESSION['auchUsersSetings']['note']       = $dataUsersSetings['note'];
            $_SESSION['auchUsersSetings']['ava']        = $dataUsersSetings['ava'];
            $_SESSION['auchUsersSetings']['position']   = $dataUsersSetings['position'];

            $_SESSION['userId'] = $dataUsersSetings['id_user'];

    }

    function checkEmail($to)   
    {   
        if(function_exists('filter_var'))  
            return filter_var($to, FILTER_VALIDATE_EMAIL); 
        else 
            return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $to); 
    } 
    
    function getInfo($info)
    {
        if(count($info))
            return implode('<br>', $info);
        else
            return '&nbsp;';
    }

    function reDirect()
    {
        header('location: '. str_replace("/index.php", "", $_SERVER['HTTP_REFERER']));
        exit();
    }
}