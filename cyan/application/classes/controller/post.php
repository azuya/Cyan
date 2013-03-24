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
			
			"join"		=> array("users", "types"),
		);
		$items = Model_Post::load($query);

		$count = $items["count"];
		$posts = $items["items"];

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

		// Get type data
        $type = new Model_Type(Arr::get($_GET, 'type', '0'));
        $type->fields = isset($type->fields) ? unserialize($type->fields) : '';

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
			->bind('type', $type)
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
		
		// Get post meta
		$meta = $post->meta->where('post_id', '=' , $post_id)->find_all();
		// echo "<pre>";
		// print_r($meta);
		// echo "</pre>";
		
		$meta_objects = array();
		foreach ($meta as $obj)
		{
			// echo "<pre>".$obj->key."=".$obj->value."</pre>";
			$meta_objects[$obj->key] = $obj->value;
		}      
		
		// echo "<pre>";
		// print_r($meta_objects);
		// echo "</pre>";
		
		// Get type
        $type = new Model_Type($post->type);
        $type->fields = isset($type->fields) ? unserialize($type->fields) : '';
        
		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post/"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('post', $post)
			->bind('data', $data)
			->bind('type', $type)
			->bind('meta', $meta_objects)
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

		// Load the user information
		$user = Auth::instance()->get_user();

		// Nonce ----------------------------------
		if ($post_id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-post-".$post_id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-post")) { Nonce::nonce_error(); }
			$post_val["author"]	= $user->id;
		}
		// ----------------------------------------

		$request_val = $this->request->post();

		// echo "<pre>";
		// print_r($request_val);
		// echo "</pre>";
		// echo "[".$request_val['type']."]";

		$post_val["active"]	= ! empty($request_val['active']);
		$post_val["type"] 	= $request_val['type'];
		$post_val["star"] 	= $request_val['star'];

		// Get type data
        $type = new Model_Type($post_val["type"]);
        $type->fields = isset($type->fields) ? unserialize($type->fields) : '';

		// Only created
		if (!$post_id)
		{
			$post_val["created_date"] = date('Y-m-d H:i:s');
			$data_val["created_date"] = date('Y-m-d H:i:s');
		}

		$post_val["modified_date"] = date('Y-m-d H:i:s');
		$data_val["modified_date"] = date('Y-m-d H:i:s');
		$post_val["modified_by"] = $user->id;
		$data_val["modified_by"] = $user->id;

		$data_val["title"]		= isset($request_val["title"]) ? $request_val["title"] : '';
		$data_val["excerpt"]	= isset($request_val["excerpt"]) ? $request_val["excerpt"] : '';
		$data_val["body"]		= isset($request_val["body"]) ? $request_val["body"] : '';
		$data_val["author"]		= $user->id;
		$data_val["alias"]		= URL::title($request_val["title"], "-", true);

		$post->values($post_val);
		$data->values($data_val);

		// Put the rest in meta
		// echo "<pre>";
		// print_r(array_keys($post_val));
		// echo "</pre>";
		
		// echo "<pre>";
		// print_r(array_keys($data_val));
		// echo "</pre>";
		
		$meta_val = $request_val;
		
		foreach (array_keys($post_val) as $key) {
			unset($meta_val[$key]);
		}
		
		foreach (array_keys($data_val) as $key) {
			unset($meta_val[$key]);
		}
		
		// Remove others
		unset($meta_val["_benonce"]);
		unset($meta_val["submit"]);
		
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

			/*
			// Remove old meta tags
			$query_delete = DB::delete('post_meta')->where('post_id', '=', $post->id);
			echo "$query_delete<br>";
			$result = $query_delete->execute();

			$query_insert = DB::insert('post_meta', array('post_id', 'key', 'value'))->values(array($post->id, 'fred', 'p@5sW0Rd'));
			echo "$query_insert<br>";
			// $result = $query_insert->execute();
			*/
			
			// echo "meta_val för post_id: $post_id<pre>";
			// print_r($meta_val);
			// echo "</pre>";

			$query_delete = DB::delete('post_meta')->where('post_id', '=', $post->id);
			// echo "$query_delete<br>";
			$result = $query_delete->execute();

			foreach($meta_val as $key => $value) {
				
				if ($value != "") {
					
					$meta = $post->meta->where('post_id', '=' , $post_id)->where('key', '=' , $key)->find();
					// echo "<pre>";
					// print_r($meta);
					// echo "</pre>";
					// echo Database::instance()->last_query;
					
					$meta_key_value = array(
						"site_id"	=> 0,
						"post_id"	=> $post->id,
						"key"		=> $key,
						"value"		=> $value,
					);
					
					// echo "Insert... $key=$value<br>";
					// $query_insert = DB::insert('post_meta', array('post_id', 'key', 'value'))->values(array($post->id, trim($key), trim($value)));
					// echo "$query_insert<br>";
					// $result = $query_insert->execute();

					$meta->values($meta_key_value); // populate $data object from $_POST array
					$meta->save(); // saves post to database
					// echo Database::instance()->last_query;
				}
		
				// $meta = $post->meta->where('post_id', '=' , $post_id)->where('key', '=' , $key)->find();
				// $meta->values($meta_key_value);
				// $meta->save();
				
			}
			// echo Database::instance()->last_query;
			
			// echo "<p>dies...</p>";
			// die();
	
			// echo "saved?";

			$this->redirect(self::MODULE);
		}

		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');

			echo "<pre>";
			print_r($errors);
			echo "</pre>";

			$view = new View('post/edit');
			$view->bind("post", $post);
			$view->bind("data", $data);
			$view->bind('type', $type);
			// $view->set("meta", $meta);
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