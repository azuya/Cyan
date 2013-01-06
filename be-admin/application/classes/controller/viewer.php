<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Viewer extends Controller_Base {
	public $template = 'template-viewer';

   	public function action_index()
   	{
		// $content = "<p>Här renderar vi sidan...!</p>";

        $content_id = Arr::get($_GET, 'c', '0'); // $request->query('id'); // $this->request->param('id');
        
        $this_content = new Model_Post($content_id);
        
        // echo "<pre>";
        // print_r($this_content);
        // echo "</pre>";
        
        // Page title
		$this->template->title = $this_content->title;
        
        $content_html = $this_content->content;

        $this->template->content = $content_html; // View::factory('viewer/index');
	}
	
}