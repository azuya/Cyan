<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Search extends Controller_Admin {
     
    const MODULE = 'search';
     
    public function action_index()
    {
	    // Get page number
	    $query = $this->request->query();
	    $page = isset($query['page']) ? $query['page'] : 0;
	    $type = isset($query['type']) ? $query['type'] : NULL;
	    $q = isset($query['q']) ? $query['q'] : NULL;

		$post = ORM::factory('post'); // loads all post object from table

		// Count items
		if ($type['type'])
		{
			$count = $post->reset(FALSE)
				->where('type', '=', $query['type'])
				->count_all(); // 'active', '=', 1
		}
		else
		{

			/*
			$count = $post->reset(FALSE)
				->where('title', 'LIKE', "%".$query['q']."%")
				->or_where('content', 'LIKE', "%".$query['q']."%")
				->count_all(); // 'active', '=', 1
			*/

			$count = $post->reset(FALSE)
				->select('post_data.title')->select('post_data.excerpt')->select('post_data.body')
				->join('post_data', 'LEFT')->on('post_data.post_id', '=', 'post.id')
				->where('title', 'LIKE', "%".$query['q']."%")
				->or_where('content', 'LIKE', "%".$query['q']."%")
				->count_all(); // 'active', '=', 1
			
		}
		
		// Get subset (limit)
		$offset = ($page-1) * $this->_config['ui_settings']['limit_items'];
		$offset = ($offset > 0) ? $offset : 0;

		if ($type['type'])
		{
			$posts = $post->limit($this->_config['ui_settings']['limit_items'])
						->where('title', 'LIKE', "%".$query['q']."%")
						->or_where('content', 'LIKE', "%".$query['q']."%")
						->order_by('title', 'asc')
						->offset($offset)
						->find_all();
		}
		else
		{
			$posts = $post->limit($this->_config['ui_settings']['limit_items'])
						->where('title', 'LIKE', "%".$query['q']."%")
						->or_where('content', 'LIKE', "%".$query['q']."%")
						->order_by('title', 'asc')
						->offset($offset)
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
			->set('pagination', $pagination)
			->set('query', $this->request->query());
    }
     
}