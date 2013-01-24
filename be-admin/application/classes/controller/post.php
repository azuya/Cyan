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
		$data = array(
			"type"  => $type,
			"limit"  => $limit,
			"offset" => $offset,
		);
		$posts = Model_Post::load($data);

		/*
		// $post = ORM::factory('post'); // loads all post object from table
		$post = ORM::factory('post')
			// ->with('post_data') // ->with('dept')->with('div')
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.content')
			->join('post_data', 'LEFT')
			->on('post_data.post_id', '=', 'post.id')
			// ->where('post_data.language', '=' , 1)
			->find_all();

		// Count items
		if ($type['type'])
		{
			$count = $post->reset(FALSE)
				->where('type', '=', $query['type'])
				->count_all(); // 'active', '=', 1
		}
		else
		{
			// $count = $post->reset(FALSE)
			//	->count_all(); // 'active', '=', 1
			$count = $post->count(); // 'active', '=', 1
			echo "count[$count]";

		}

		// Get subset (limit)
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;

		if ($type['type'])
		{
			$posts = $post->limit($this->_config['ui_settings']['limit_items'])
						->where('type', '=', $query['type'])
						->order_by('title', 'asc')
						->offset($offset)
						->find_all();
		}
		else
		{
			$posts = $post->limit($this->_config['ui_settings']['limit_items'])
						->offset($offset)
						->order_by('title', 'asc')
						->find_all();
		}
		*/




		$count = $posts["count"];
		$posts = $posts["items"];

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

		// Create the pagination object
		Breadcrumbs::add(Breadcrumb::factory()->set_title(__("Content"))->set_url("admin/post"));
		// Breadcrumbs::add(Breadcrumb::factory()->set_title("En till här")->set_url("http://www.bobolo.se/"));
		Breadcrumbs::add(Breadcrumb::factory()->set_title("Crumb 2"));
		$breadcrumbs = Breadcrumbs::render();

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('content', $post)
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
		$data = $post->datas->where('post_id', '=' , $post_id)->find();

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

		// Nonce ----------------------------------
		if ($post_id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-post-".$post_id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-post")) { Nonce::nonce_error(); }
		}
		// ----------------------------------------

		// Load the user information
		$user = Auth::instance()->get_user();

		$values = $this->request->post();
		$values["author"]  = $user->id;
		$values["active"]  = ! empty($values['active']);

		// Only created
		if (!$post_id)
		{
			$values["created_date"] = date('Y-m-d H:i:s');
		}
		else
		{
			$values["modified_date"] = date('Y-m-d H:i:s');
		}

		$post->values($values); // populate $posts object from $_POST array
		$errors = array();

		try
		{
			$post->save(); // saves post to database
			$this->redirect(self::MODULE);
		}

		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');

			$view = new View('post/edit');
			$view->set("content", $post);
			$view->set('errors', $errors);

			$this->template->set('content', $view);
		}

	}

}