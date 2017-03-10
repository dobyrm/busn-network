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

    function sendMail($dataMail)
    {
        /*
        $subject = $subject."<a href='".WS_HOST."'>".WS_HOST."</a>";
        $message = $message."<a href='".WS_HOST."'>".WS_HOST."</a>";
        $headers = 'From: bukuniver@bukuniver.edu.ua' . "\r\n" .
        'Reply-To: bukuniver@bukuniver.edu.ua' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($dataMail, $subject, $message, $headers);
        */
        $to = $dataMail; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = WS_LANG_MAIL_TL_SUB; //Загаловок сообщения
        $mess = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>                      
                        <p>'.WS_LANG_MAIL_TL_MES.'<a href='.WS_HOST.'>'.WS_HOST.'</a></p>                        
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: bukuniver@bukuniver.edu.ua\r\n"; //Наименование и почта отправителя
        $headers = iconv("UTF-8", "CP1251", $headers);
        mail($to, $subject, $mess, $headers); //Отправка письма с помощью функции mail
    }
}