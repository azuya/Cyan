<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Admin {

	const MODULE = 'post';

	// $config = Kohana::$config->load('my_group');
	// $config->set('var', 'new_value');

	public function action_index()
	{

		// Get page number
		$query = $this->request->query();
		$page = isset($query['page']) ? $query['page'] : 0;
		$type = isset($query['type']) ? $query['type'] : NULL;

		// Limit & Offset
		$limit = $this->_config['ui_settings']['limit_items'];
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;

		// $posts = new Model_Post();
		$query = array(
			"type"		=> $type,
			"limit"		=> $limit,
			"offset"	=> $offset,
		);
		$data = Model_Post::load($query);

		$count = $data["count"];
		$posts = $data["items"];

		// Create the pagination object
		$pagination = Pagination::factory(array(
				'items_per_page'    => $this->_config['ui_settings']['limit_items'],
				'total_items'       => $count,
			));

		$this->template->content = View::factory(self::MODULE.'/index')
			->bind('contents', $posts)
			->set('item_count', $count)
			->set('query', $this->request->query())
			->set('pagination', $pagination);
	}

	public function action_view()
	{
		$post_id = $this->request->param('id');

		// $post = ORM::factory('post', $post_id);

		// Tutorial med att joina och hålla på:
		// http://www.geekgumbo.com/2011/05/24/kohana-3-orm-a-working-example/

		// Strul med ->with():
		// http://stackoverflow.com/questions/5685021/tables-not-joining-in-kohana-3-1-orm
		$post = Model_Post::loadByID($post_id);
		/*
		$post = ORM::factory('post')
		// ->with('post_data') // ->with('dept')->with('div')
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.content')
			->join('post_data', 'LEFT')
			->on('post_data.post_id', '=', 'post.id')
			->where('post.id', '=' , $post_id)
			->where('post_data.language', '=' , 1)
			->find();
		echo "<br><br><br>".Database::instance()->last_query;
		*/

		$view = new View('post/single');
		$view->set("content", $post);

		$this->template->set('content', $view);
	}

	// loads the new post form
	public function action_new()
	{
		$post = new Model_Post();
		$data = new Model_Post_Data();

		/*
		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('content', $post)
			->bind('breadcrumbs', $breadcrumbs)
			->set('query', $this->request->query());
		*/
		
		// Get post data
		// $data = $post->data->where('post_id', '=' , "")->find();

		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post/"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('post', $post)
			->bind('data', $data)
			->bind('breadcrumbs', $breadcrumbs)
			->set('query', $this->request->query());

	}

	// edit the post
	public function action_edit()
	{
		$post_id = $this->request->param('id');
		
		// Get post
		$post = new Model_Post($post_id);
		
		// Get post data
		$data = $post->data->where('post_id', '=' , $post_id)->find();

		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post/"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('post', $post)
			->bind('data', $data)
			->bind('breadcrumbs', $breadcrumbs)
			->set('query', $this->request->query());
	}

	// delete the post
	public function action_delete()
	{
		$post_id = $this->request->param('id');
		$post = new Model_Post($post_id);

		// Nonce ----------------------------------
		if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-delete-post-".$post_id)) { Nonce::nonce_error(); }
		// ----------------------------------------

		$post->delete();
		$this->redirect(self::MODULE);
	}

	// save the post
	public function action_post()
	{
		$post_id = $this->request->param('id');
		$post = new Model_Post($post_id);
		$data = $post->data->where('post_id', '=' , $post_id)->find();

		// Nonce ----------------------------------
		if ($post_id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-post-".$post_id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-post")) { Nonce::nonce_error(); }
		}
		// ----------------------------------------

		// Load the user information
		$user = Auth::instance()->get_user();

		$request_val = $this->request->post();

		// echo "<pre>";
		// print_r($request_val);
		// echo "</pre>";
		// echo "[".$request_val['type']."]";

		$post_val["author"]	= $user->id;
		$post_val["active"]	= ! empty($request_val['active']);
		$post_val["type"] 	= $request_val['type'];
		$post_val["star"] 	= $request_val['star'];

		// Only created
		if (!$post_id)
		{
			$post_val["created_date"] = date('Y-m-d H:i:s');
			$data_val["created_date"] = date('Y-m-d H:i:s');
		}
		else
		{
			$post_val["modified_date"] = date('Y-m-d H:i:s');
			$data_val["modified_date"] = date('Y-m-d H:i:s');
		}

		// echo "post_val<pre>";
		// print_r($post_val);
		// echo "</pre>";

		$data_val["title"]		= $request_val["title"];
		// $data_val["excerpt"] = $request_val["excerpt"];
		$data_val["content"]	= $request_val["content"];
		$data_val["author"]		= $user->id;
		$data_val["alias"]		= URL::title($request_val["title"], " ", true);

		$post->values($post_val); // populate $post object from $_POST array

		// echo "data_val<pre>";
		// print_r($data_val);
		// echo "</pre>";

		$data->values($data_val); // populate $data object from $_POST array

		$errors = array();

		try
		{
			$post->save(); // saves post to database
			
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
			
			// echo "ID: [".$post->id."]";

			$data_val["post_id"]  = $post->id;
			
			// echo "data_val<pre>";
			// print_r($data_val);
			// echo "</pre>";
	
			$data->values($data_val); // populate $data object from $_POST array
			$data->save(); // saves post to database

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";

			// echo "saved?";

			$this->redirect(self::MODULE);
		}

		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');

			$view = new View('post/edit');
			$view->set("post", $post);
			$view->set("data", $data);
			$view->set('errors', $errors);

			$this->template->set('content', $view);
		}

	}

	// Upload file
	public function action_upload()
	{
		$post_id = $this->request->param('id');
		
		// Get post
		$post = new Model_Post($post_id);
		
		// Get post data
		$data = $post->data->where('post_id', '=' , $post_id)->find();

		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post/"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/upload')
			// ->bind('post', $post)
			// ->bind('data', $data)
			->bind('breadcrumbs', $breadcrumbs)
			->set('query', $this->request->query());
	}

}