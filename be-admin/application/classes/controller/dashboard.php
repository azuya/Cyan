<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Admin {

	public function action_index() {
		
		// $this->response->body('hello, world!');

		// $this->redirect('user/login');

        // $view = new View('dashboard/index');
        // $this->response->body($view);
        
        // Load the user information
        $user = Auth::instance()->get_user();

        // if a user is not logged in, redirect to login page
        if (!$user) {
            $this->redirect('user/login');
        }

        $this->template->content = View::factory('dashboard/index');
	}
	
	public function action_another() {
        $this->response->body('added another action...');
        // $this->template->content = View::factory('article/edit')->bind('article', $article);
    }

}