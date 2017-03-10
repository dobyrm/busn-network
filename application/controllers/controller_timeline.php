<?php
class Controller_Timeline extends Controller
{

	function __construct()
	{
		$this->model = new Model_Timeline();
		$this->view = new View();
	}

	function action_index()
	{

		if($_POST['okOgoloshenya']){
			
			//To BD
			$info = $this->getTimelineRead();

			//To email
			$this->getEmailTimeLineUsers($_POST['userRead']);

			Defaults::reDirect();
		}

		$this->view->generate('timeline_view.php', 'template_view.php', $data, $info);

	}

	function getTimelineRead()
	{
		return $this->model->getNewDeclaredValidData($_POST['OgoText'], $_POST['createdFrom'], $_POST['createdTo'], $_POST['userRead']);

	}

	function getEmailTimeLineUsers($userRead)
	{
		foreach ($userRead as $key => $val) 
		{
			$id_user_select .= $val .'\',\'';
		}

		$resMail = $this->model->getUsersSelectMail($id_user_select);

		foreach($resMail as $row)
        {
        	$emailUsersMail .= $row['email'].",";
        }
        Defaults::sendMail($emailUsersMail);
	}
	
}