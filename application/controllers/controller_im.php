<?php
class Controller_Im extends Controller
{

	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{

		if($_POST['deleteMessage'])
			$info = $this->model->get_data_delete_message($_POST['dialogID']);

		$data = $this->model->get_data_message();

		$this->view->generate('im_view.php', 'template_view.php', $data, $info);

	}
	
}