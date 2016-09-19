<?php
class Model_Timeline extends Model
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

	public function getNewDeclaredValidData($OgoText, $createdFrom, $createdTo, $userRead)
	{
		if(empty($userRead)) 
            $info[] = WS_LANG_EMPTY_USERREAD;

		if (isset($userRead)) {
			foreach ($userRead as $key => $val) 
			{
				$id_user_select .= $val .';';
			}
		}

		if(empty($OgoText)) 
            $info[] = WS_LANG_EMPTY_DECLARED;

        if(empty($createdFrom)) 
            $info[] = WS_LANG_EMPTY_CREATEFROM;

        if(empty($createdTo)) 
            $info[] = WS_LANG_EMPTY_CREATETO;

        if(empty($info))
        {
			$this->get_read_data($id_user_select, $OgoText, $createdFrom, $createdTo);
			Defaults::reDirect();
		}
		else
			return $info = Defaults::getInfo($info);
	}

	public function get_read_data($id_user_select, $OgoText, $createdFrom, $createdTo)
	{

			return	mysqlQuery("INSERT INTO `". WS_DBPREFIX . 'timeline' ."`
                     SET 	`id_user_pub` 		= '". $_SESSION['userId'] ."',
                     		`id_user_select` 	= '". $id_user_select ."',
                         	`declared`   		= '". escapeString($OgoText) ."',
                         	`date_in`   		= '". $createdFrom ."',
                         	`date_out`   		= '". $createdTo ."',
                         	`data` 				= NOW()"
                     );
	}
	
}