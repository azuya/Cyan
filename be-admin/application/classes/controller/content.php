<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Content extends Controller_Template {
     
	public $template = 'template-admin';
    const MODULE = 'content';
     
    public function action_index() {
        $contents = ORM::factory('content')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $posts); // set "posts" object to view
        //$this->response->body($view);

        $this->template->content = View::factory(self::MODULE.'/index')->bind('contents', $contents);
    }
     
	public function action_view() {
		$content_id = $this->request->param('id');
		$content = ORM::factory('content', $content_id);
		$view = new View('content/single');
		$view->set("content", $content);
		
		$this->template->set('content', $view);
	}

    // loads the new content form
    public function action_new() {
        $content = new Model_Content();
         
        //$view = new View('content/edit');
        //$view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);

    }
     
    // edit the content
    public function action_edit() {
		$content_id = $this->request->param('id');
		$content = new Model_Content($content_id);
		
		// $view = new View('content/edit');
		// $view->set("content", $posts);
		// $this->response->body($view);
		$this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);
    }
 
    // delete the content
    public function action_delete() {
		$content_id = $this->request->param('id');
		$content = new Model_Content($content_id);
		
		$content->delete();
		$this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post() {
        $content_id = $this->request->param('id');
        $content = new Model_Content($content_id);
        $content->values($_POST); // populate $posts object from $_POST array
		$errors = array();
		
		try
		{
			$content->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');
		}
		
		$view = new View('content/edit');
		$view->set("content", $content);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}