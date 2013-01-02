<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Content_Type extends Controller_Template {
     
	public $template = 'template-admin';
    const MODULE = 'content_type';
     
    public function action_index() {
        $content_types = ORM::factory('content_type')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $posts); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')->bind('contents', $content_types);
    }
     
    // loads the new content form
    public function action_new() {
        $content_type = new Model_Content_Type();
         
        //$view = new View('content/edit');
        //$view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content_type);

    }
     
    // edit the content
    public function action_edit() {
        $content_id = $this->request->param('id');
        $content_type = new Model_Content_Type($content_id);
 
        // $view = new View('content/edit');
        // $view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content_type);
    }
 
    // delete the content
    public function action_delete() {
        $content_type_id = $this->request->param('id');
        $content_type = new Model_Content_Type($content_type_id);
 
        $content_type->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post() {
        $content_type_id = $this->request->param('id');
        $content_type = new Model_Content_Type($content_type_id);
        $content_type->values($_POST); // populate $posts object from $_POST array
		$errors = array();
		
		try
		{
			$content_type->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');
		}
		
		$view = new View('content_type/edit');
		$view->set("content", $content_type);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}