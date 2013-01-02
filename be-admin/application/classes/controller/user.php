<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_User extends Controller_Template {
 
	public $template = 'template-admin';
    const MODULE = 'user';

    public function action_index() {
        $contents = ORM::factory('user')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $posts); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')->bind('contents', $contents);
    }
 
    public function action_new() {
        $this->template->content = View::factory(self::MODULE.'/new')
            ->bind('errors', $errors)
            ->bind('message', $message);
             
        if (HTTP_Request::POST == $this->request->method()) {           
            try {
         
                // Create the user using form values
                $user = ORM::factory('user')->create_user($this->request->post(), array(
                    'username',
                    'password',
                    'email'            
                ));
                 
                // Grant user login role
                $user->add('roles', ORM::factory('role', array('name' => 'login')));
                 
                // Reset values so form is not sticky
                $_POST = array();
                 
                // Set success message
                $message = "You have added user '{$user->username}' to the database";
                 
            } catch (ORM_Validation_Exception $e) {
                 
                // Set failure message
                $message = 'There were errors, please see form below.';
                 
                // Set errors using custom messages
                $errors = $e->errors('models');
            }
        }
    }

	/*     
    // loads the new content form
    public function action_new() {

        $this->template->content = View::factory(self::MODULE.'/new')
            ->bind('errors', $errors)
            ->bind('message', $message);
             
        $content = new Model_User();
         
        //$view = new View('content/edit');
        //$view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);

    }
    */
     
    // edit the content
    public function action_edit() {
        $content_id = $this->request->param('id');
        $content = new Model_User($content_id);
 
        // $view = new View('content/edit');
        // $view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);
    }
 
    // delete the content
    public function action_delete() {
        $content_id = $this->request->param('id');
        $content = new Model_User($content_id);
        $content->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post() {

        if (HTTP_Request::POST == $this->request->method()) {           
            try {
         
                // Create the user using form values
                $user = ORM::factory('user')->create_user($this->request->post(), array(
                    'username',
                    'password',
                    'email'            
                ));
                 
                // Grant user login role
                $user->add('roles', ORM::factory('role', array('name' => 'login')));
                 
                // Reset values so form is not sticky
                $_POST = array();
                 
                // Set success message
                $message = "You have added user '{$user->username}' to the database";
                 
            } catch (ORM_Validation_Exception $e) {
                 
                // Set failure message
                $message = 'There were errors, please see form below.';
                 
                // Set errors using custom messages
                $errors = $e->errors('models');
            }
        }

        $content_id = $this->request->param('id');
        $posts = new Model_User($content_id);
        
        $_POST["username_nice"] = URL::title($_POST["username"], " ", true);
        
        $posts->values($_POST); // populate $posts object from $_POST array
        $posts->save(); // saves content to database
         
        $this->redirect(self::MODULE);
    }
 
    public function action_login() {
        $this->template->content = View::factory(self::MODULE.'/login')
            ->bind('message', $message);
             
        if (HTTP_Request::POST == $this->request->method())
        {
            // Attempt to login user
            $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
            $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
             
            // If successful, redirect user
            if ($user)
            {
                $this->redirect('dashboard');
            } 
            else
            {
                $message = 'Login failed';
            }
        }
    }
     
    public function action_logout() {
        // Log user out
        Auth::instance()->logout();
         
        // Redirect to login page
        $this->redirect('');
    }
 
    public function action_profile() {
        $this->template->content = View::factory('user/profile')->bind('user', $user);
         
        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user) {
            $this->redirect('user/login');
        }
    }
 
}