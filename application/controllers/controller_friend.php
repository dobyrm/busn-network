<?php
class Controller_Friend extends Controller
{

	function __construct()
	{
		$this->model = new Model_Friend();
		$this->view = new View();
	}

	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('friend_view.php', 'template_view.php', $data);
	}
}