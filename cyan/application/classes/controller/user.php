<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base {

	const MODULE = 'user';

	public function action_index()
	{
		// Get page number
		$query = $this->request->query();
		$page = isset($query['page']) ? $query['page'] : 0;

		$user = ORM::factory('user'); // loads all post object from table

		// Count items
		$count = $user->reset(FALSE)->count_all(); // 'active', '=', 1

		// Get subset (limit)
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;
		$users = $user->limit($this->_config['ui_settings']['limit_items'])
			->offset($offset)
			->find_all();

		// Create the pagination object
		$pagination = Pagination::factory(array(
				'items_per_page'    => $this->_config['ui_settings']['limit_items'],
				'total_items'       => $count,
			));

		$this->template->content = View::factory(self::MODULE.'/index')
			->bind('contents', $users)
			->set('item_count', $count)
			->set('pagination', $pagination)
			->set('query', $this->request->query());

		$this->template->content = View::factory(self::MODULE.'/index')->bind('contents', $users);
	}

	public function action_view()
	{
		$user_id = $this->request->param('id');
		$user = new Model_User($user_id);

		$this->template->content = View::factory(self::MODULE.'/view')
			->bind('content', $user)
			->set('query', $this->request->query());
	}

	public function action_register()
	{
		$this->template->content = View::factory(self::MODULE.'/register')
			->bind('errors', $errors)
			->bind('message', $message);

		if (HTTP_Request::POST == $this->request->method())
		{
			try
			{
				
				// Normalise username_nice
				$_POST["username_nice"] = URL::title($_POST["username"], " ", true);
				$_POST["salt"]			= Text::random("alnum", 64);
				
				// Create the user using form values
				$user = ORM::factory('user')->create_user($_POST, array(
						'username',
						'username_nice',
						'password',
						'salt',
						'email'
					));

				// Grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));

				// Reset values so form is not sticky
				$_POST = array();

				// Set success message
				$message = "You have added user '{$user->username}' to the database";

				$this->redirect("login/");
			}

			catch (ORM_Validation_Exception $exception)
			{

				// Set failure message
				$message = 'There were errors, please see form below.';

				// Set errors using custom messages
				$errors = $exception->errors('models');
			}
		}
	}

    // loads the new content form
    public function action_new() {

        $user = new Model_User();

        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $content)
			->set('query', $this->request->query());

    }

	// edit the content
	public function action_edit()
	{
		$user_id = $this->request->param('id');
		$user = new Model_User($user_id);

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('content', $user)
			->set('query', $this->request->query());
	}

	// delete the content
	public function action_delete()
	{
		$user_id = $this->request->param('id');
		$user = new Model_User($user_id);
		$user->delete();
		$this->redirect(self::MODULE);
	}

	// save the content
	public function action_post() {

		if (HTTP_Request::POST == $this->request->method())
		{
			try
			{

				// Normalise username_nice
				$_POST["username_nice"] = URL::title($_POST["username"], " ", true);

				if ($_POST["username_nice"] == "") {
					$_POST["username_nice"] = URL::title($_POST["email"], " ", true);
				}

				$id = $this->request->param('id');
				
				$user = new Model_User($id);
				$user->values($_POST); // populate $type object from $_POST array
				$user->save(); // saves content to database
				
				$errors = array();
				
				/*
				// Create the user using form values
				$user = ORM::factory('user')->create_user($this->request->post(), array(
						'username',
						'username_nice',
						'password',
						'email',
						'active'
					));
				*/

				// Grant user login role
				// $user->add('roles', ORM::factory('role', array('name' => 'login')));

				// Reset values so form is not sticky
				$_POST = array();

				// Set success message
				$message = "You have added user '{$user->username}' to the database";

			}

			catch (ORM_Validation_Exception $exception)
			{

				// Set failure message
				$message = 'There were errors, please see form below.';

				// Set errors using custom messages
				$errors = $exception->errors('models');
			}
		}

		// $post_id = $this->request->param('id');
		// $posts = new Model_User($post_id);

		// $posts->values($_POST); // populate $posts object from $_POST array
		// $posts->save(); // saves content to database

		$this->redirect(self::MODULE);
	}

	// save the content
	public function action_confirm() {

		$get = $this->request->query();
		$token = isset($get['token']) ? $get['token'] : '';
		$uid = isset($get['uid']) ? $get['uid'] : '';

		// echo "token[" . $token ."]<br>";
		// echo "uid[" . $uid ."]<br>";

		// Count items
		$count = ORM::factory('user')
				->where('id', '=', $uid)
				->where('active', '=', 0)
				->where('activation_key', '=', $token)
				->count_all();

		// echo "count[".$count."]";

		if ($count == 1) {
			try
			{
				$user = new Model_User($uid);
				
				$user->active = TRUE;
				$user->activation_key = NULL;
				
				$user->save();
				
				// Set success message
				$message = "You have activated the user '{$user->username}'!";
	
			}
	
			catch (ORM_Validation_Exception $exception)
			{
	
				// Set failure message
				$message = 'There were errors, please see form below.';
	
				// Set errors using custom messages
				$errors = $exception->errors('models');
			}
		} else {

			// Set failure message
			$message = 'There were errors, please see form below.';
			
		}

		$this->redirect("login");
	}

	public function action_logout()
	{
		// Log user out
		Auth::instance()->logout();

		// Redirect to start page
		$this->redirect('');
	}

	public function action_profile()
	{
		$this->template->content = View::factory('user/profile')->bind('user', $user);

		// Load the user information
		$user = Auth::instance()->get_user();

		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			$this->redirect('login');
		}
	}

	// edit user fields
	public function action_fields()
	{
		$id = $this->request->param('id');
		$options = new Model_Option();
		$options->load("user_fields");

		$fields = unserialize($options);

		$this->template->content = View::factory(self::MODULE.'/fields')
			->bind('content', $fields)
			->set('query', $this->request->query());
	}

}