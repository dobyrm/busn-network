<?php
class Controller_Enter extends Controller
{

	function __construct()
	{
		$this->model = new Model_Enter();
		$this->view = new View();
	}

	function action_index()
	{	

		if($_POST['enter']){
			$valid_data = $this->action_form_valid_data();
		}

		$this->view->generate('enter_view.php', 'template_view.php', $valid_data);
	}

	function action_form_valid_data()
	{	
		return $valid_data = $this->model->get_valid_data($_POST['login'], $_POST['pass']);
	}

}