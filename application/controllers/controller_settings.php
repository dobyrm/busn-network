<?php
class Controller_Settings extends Controller
{
	public $img = '';

	function __construct()
	{
		$this->model = new Model_Settings();
		$this->view = new View();
	}

	function action_index()
	{	

		if($_POST['readMySeting'])
		{
			    
            if($_FILES['file']['error'] === 0)
            {
                
                $upload = new WS_Upload_Img($lang_file_error);
                
                if($error = $upload -> uploadFile('file', 'assets/image/users/ava/'))
                   $infoImg[] = $error;

                $this->img = $upload -> new_name;

            } 

			$info = $this->action_form_valid_data_setings();
			
		}

		$this->view->generate('settings_view.php', 'template_view.php', $data, $info);

	}

	function action_form_valid_data_setings()
	{	
		return $this->model->get_valid_data_setings($_POST['name'], $_POST['email'], $_POST['posada'], $_POST['education'], $_POST['address'], $_POST['skills'], $_POST['note'], $this->img);
	}
	
}