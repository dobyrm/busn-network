<?php
class Controller_dialog extends Controller
{

	function __construct()
	{
		$this->model = new Model_dialog();
		$this->view = new View();
	}

	function action_index()
	{	

		if($_POST['newMessage']){
			$this->action_new_message();
		}

		$data = $this->model->get_data_dialog();
		$this->view->generate('dialog_view.php', 'template_view.php', $data);

	}

	function action_new_message()
	{	
		$this->model->get_new_message($_POST['message']);
		Defaults::reDirect();
	}
}