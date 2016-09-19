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

		if($_POST['okOgoloshenya'])
			$info = $this->getTimelineRead();

		$this->view->generate('timeline_view.php', 'template_view.php', $data, $info);

	}

	function getTimelineRead()
	{

		return $this->model->getNewDeclaredValidData($_POST['OgoText'], $_POST['createdFrom'], $_POST['createdTo'], $_POST['userRead']);
		//Defaults::reDirect();

	}
	
}