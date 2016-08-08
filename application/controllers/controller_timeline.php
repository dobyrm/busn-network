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

		$this->view->generate('timeline_view.php', 'template_view.php', $data, $info);

	}
	
}