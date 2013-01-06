<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Base {

	public function action_index()
	{
		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			$this->redirect('user/login');
		}
	}

}
