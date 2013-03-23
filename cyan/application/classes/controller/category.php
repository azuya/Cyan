<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Category extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'category';
     
    public function action_index()
    {
		// Get page number
		$query = $this->request->query();
		$page = isset($query['page']) ? $query['page'] : 0;
		$category = isset($query['category']) ? $query['category'] : NULL;

		// Limit & Offset
		$limit = $this->_config['ui_settings']['limit_items'];
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;

		// $categories = new Model_Post();
		$query = array(
			"category"	=> $category,
			"limit"		=> $limit,
			"offset"	=> $offset,
		);
		$items = Model_Category::load($query);

		$count = $items["count"];
		$categories = $items["items"];

		// Create the pagination object
		$pagination = Pagination::factory(array(
				'items_per_page'    => $this->_config['ui_settings']['limit_items'],
				'total_items'       => $count,
			));

		$this->template->content = View::factory(self::MODULE.'/index')
			->bind('contents', $categories)
			->set('item_count', $count)
			->set('query', $this->request->query())
			->set('pagination', $pagination);
    }
     
	// loads the new category form
	public function action_new()
	{
		$category = new Model_Category();
		$data = new Model_Category_Data();

		$category_objects = ORM::factory('category')->where('id', '!=' , $category->id)->find_all();
		$categories[] = array();
		$categories[0] = "– ".__("None"." –");
		foreach ($category_objects as $c) {
			$categories[$c->id] = $c->title;
		}

		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('category', $category)
			->set('categories', $categories)
			->set('query', $this->request->query());

	}
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $category = new Model_Category($id);

        // Other categories
		$category_objects = ORM::factory('category')->where('id', '!=' , $category->id)->find_all();
		$categories[] = array();
		$categories[0] = "– ".__("None"." –");
		foreach ($category_objects as $c) {
			$categories[$c->id] = $c->title;
		}

		// Content types
		$types_objects = ORM::factory('type')->find_all();
		$types[] = array();
		$types[0] = "– ".__("All"." –");
		foreach ($types_objects as $t) {
			$types[$t->id] = $t->name;
		}

        $this->template->content = View::factory(self::MODULE.'/edit')
			->bind('category', $category)
			->set('categories', $categories)
			->set('types', $types)
        	->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $category = new Model_Category($id);
 
		// Nonce ----------------------------------
		if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-delete-category-".$id)) { Nonce::nonce_error(); }
		// ----------------------------------------

        $category->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
		$id = $this->request->param('id');
		$category = new Model_Category($id);
		// $data = $category->data->where('category_id', '=' , $id)->find();

		// Nonce ----------------------------------
		if ($id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-category-".$id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-category")) { Nonce::nonce_error(); }
		}
		// ----------------------------------------

		// Load the user information
		$user = Auth::instance()->get_user();

		$request_val = $this->request->post();
		
		$data_val["parent_id"]	= isset($request_val["parent_id"])		? $request_val["parent_id"]			: 0;
		$data_val["title"]		= isset($request_val["title"])			? $request_val["title"]				: '';
		$data_val["description"]= isset($request_val["description"])	? $request_val["description"]		: '';
		$data_val["alias"]		= ($request_val["alias"])				? $request_val["alias"]				: URL::title($request_val["title"], "-", true);

		$category->values($data_val);
		// $data->values($data_val);

		try
		{
			$category->save(); // saves post to database
			
			// echo "<pre>";
			// print_r($category);
			// echo "</pre>";
			
			// echo "ID: [".$category->id."]";

			// $data_val["category_id"]  = $category->id;
			
			// echo "data_val<pre>";
			// print_r($data_val);
			// echo "</pre>";
	
			// $data->values($data_val); // populate $data object from $_POST array
			// $data->save(); // saves post to database

			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $exceptions)
		{
			$errors = $exceptions->errors('validation');
		}
		
		$view = new View('category/edit');
		$view->set("content", $category);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}