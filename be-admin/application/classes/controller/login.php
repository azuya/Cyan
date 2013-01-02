<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Template {
	public $template = 'template-admin';

	public function action_index() {
        $this->template->content = View::factory('user/login')->bind('user', $user);
         
        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user) {
            $this->redirect('user/login');
        }
	}

}
