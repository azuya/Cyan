<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Viewer extends Controller_Base {
	public $template = 'template-viewer';

	public function action_index()
	{
		// $content = "<p>Här renderar vi sidan...!</p>";

		$post_id = Arr::get($_GET, 'c', '0'); // $request->query('id'); // $this->request->param('id');

		// $post = new Model_Post($post_id);

		// $this_content = new Model_Post();
		// $this_content->loadByID($post_id);

		// echo "<pre>";
		// print_r($post);
		// echo "</pre>";

		// Page title
		// $this->template->title = $this_content->title;

		// $content_html = $this_content->content;


		/*
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
			"id"		=> $post_id,
			"type"		=> $type,
			"limit"		=> 1,
			"offset"	=> $offset,
		);
		*/
		// $post = Model_Post::loadByID($post_id);

		// Get post
		$post = new Model_Post($post_id);
		
		// Get post data
		$data = $post->datas->where('post_id', '=' , $post_id)->find();

		// echo "<pre>";
		// print_r($post);
		// echo "</pre>";


		$this->template->content = View::factory('viewer/index')
			->bind('post', $post)
			->bind('data', $data)
			->set('query', $this->request->query())
			->set('id', $post_id);
	}

}