<?php

class Controller_Stop extends Controller
{
	
	function action_index()
	{
		$this->view->generate('siteStop_view.php', 'mainStop_view.php');
	}

}
