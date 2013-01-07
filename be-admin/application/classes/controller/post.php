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

		$post = ORM::factory('post'); // loads all post object from table

		// Count items
		if ($type['type'])
		{
			$count = $post->reset(FALSE)
				->where('type_id', '=', $query['type'])
				->count_all(); // 'active', '=', 1
		}
		else
		{
			$count = $post->reset(FALSE)
				->count_all(); // 'active', '=', 1
			
		}
		
		// Get subset (limit)
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;

		if ($type['type'])
		{
			$posts = $post->limit($this->_config['ui_settings']['limit_items'])
						->where('type_id', '=', $query['type'])
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
		$post = ORM::factory('post', $post_id);
		$view = new View('post/single');
		$view->set("content", $post);
		
		$this->template->set('content', $view);
	}

    // loads the new post form
    public function action_new()
    {
        $post = new Model_Post();
         
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $post)
			->set('query', $this->request->query());

    }
     
    // edit the post
    public function action_edit()
    {
		$post_id = $this->request->param('id');
		$post = new Model_Post($post_id);
		
		$this->template->content = View::factory(self::MODULE.'/edit')
			->bind('content', $post)
			->set('query', $this->request->query());
    }
 
    // delete the post
    public function action_delete()
    {
		$post_id = $this->request->param('id');
		$post = new Model_Post($post_id);
		
		$post->delete();
		$this->redirect(self::MODULE);
    }
     
    // save the post
    public function action_post()
    {
        $post_id = $this->request->param('id');
        $post = new Model_Post($post_id);

		// Load the user information
		$user = Auth::instance()->get_user();
		
		$_POST["author_id"] = $user->id;
		$_POST["active"] = ! empty($_POST['active']);

		// Only created
		if (!$post_id)
		{
			$_POST["created_date"] = date('Y-m-d H:i:s');
		}
		else
		{
			$_POST["modified_date"] = date('Y-m-d H:i:s');
		}

        $post->values($_POST); // populate $posts object from $_POST array
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