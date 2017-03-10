<?php
class Controller_Editadmuser extends Controller
{
	function __construct()
	{
		$this->model = new Model_Editadmuser();
		$this->view = new View();
	}

	function action_index()
	{

		if($_POST['editAdmformUser']){
			$info = $this->action_form_valid_data_edit_user();
		}

		if($_POST['dellAdmformUser']){
			$info = $this->model->action_form_dell_user($_GET['id']);
		}

		if($_POST['serValue'])
			$data = $this->model->get_ser($_POST['serValue']);
		else
			$data = $this->model->get_data_friends();

		if(isset($_GET['id'])){
			$data = $this->model->get_data_to_form();
			$this->view->generate('editadmformuser_view.php', 'template_view.php', $data, $info);
		}
		else{
			$this->view->generate('editadmuser_view.php', 'template_view.php', $data, $info);
		}
	}
	function action_form_valid_data_edit_user()
	{	
		return $this->model->get_valid_data_model($_POST['login'], $_POST['name'], $_POST['posada'], $_POST['serFac'], $_POST['serKaf'], $_POST['position'], $_POST['pass']);
	}
}
