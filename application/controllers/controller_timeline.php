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

		/*if($_POST['serValue'])
			$data = $this->model->get_ser($_POST['serValue']);
		else
			$data = $this->model->get_data_friends();*/

		$this->view->generate('timeline_view.php', 'template_view.php', $data);

	}
	
}