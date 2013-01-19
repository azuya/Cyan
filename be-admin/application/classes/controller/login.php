<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Base {

	public $template = 'template-clean';

	public function action_index()
	{
		// Load the user information
		$user = Auth::instance()->get_user();
		if ($user) {
			$this->redirect('admin/dashboard');
		}

		$this->template->content = View::factory('login/index')
			->bind('message', $message);

		if (HTTP_Request::POST == $this->request->method())
		{
			// Attempt to login user
			$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
			$user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);

			// If successful, redirect user
			if ($user)
			{
				$this->redirect('admin/dashboard');
			}
			else
			{
				$message = 'Login failed';
			}
		}

	}

}
