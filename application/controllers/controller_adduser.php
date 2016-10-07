<?php
class Controller_Adduser extends Controller
{
	public $img = '';

	function __construct()
	{
		$this->model = new Model_Adduser();
		$this->view = new View();
	}

	function action_index()
	{	


		if($_POST['addUser'])
		{
			$info = $this->action_form_valid_data();
		}
		$this->view->generate('adduser_view.php', 'template_view.php', $data, $info);

	}

	function action_form_valid_data()
	{	
		return $this->model->get_valid_data($_POST['login'], $_POST['pass'], $_POST['name'], $_POST['posada'], $_POST['position'], $_POST['serFac'], $_POST['serKaf']);
	}
	
}