<?php
class Controller_Friends extends Controller
{

	function __construct()
	{
		$this->model = new Model_Friends();
		$this->view = new View();
	}

	function action_index()
	{

		if($_POST['serValue'])
			$data = $this->model->get_ser($_POST['serValue']);
		else
			$data = $this->model->get_data_friends();

		$this->view->generate('friends_view.php', 'template_view.php', $data, $info);

	}
	
}