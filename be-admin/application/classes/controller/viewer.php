<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Viewer extends Controller_Base {
	public $template = 'template-viewer';

   	public function action_index()
   	{
		// $content = "<p>Här renderar vi sidan...!</p>";

        $post_id = Arr::get($_GET, 'c', '0'); // $request->query('id'); // $this->request->param('id');
        
        $this_content = new Model_Post($post_id);
        
        // echo "<pre>";
        // print_r($this_content);
        // echo "</pre>";
        
        // Page title
		$this->template->title = $this_content->title;
        
        $content_html = $this_content->content;

        $this->template->content = View::factory('viewer/index')
        	->bind('contents', $content_html)
        	->set('query', $this->request->query())
        	->set('id', $id_id);
	}
	
}