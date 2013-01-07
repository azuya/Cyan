<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Type extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'type';
     
    public function action_index()
    {
        $types = ORM::factory('type')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $type); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')
        	->bind('contents', $types)
        	->set('query', $this->request->query());
    }
     
    // loads the new content form
    public function action_new()
    {
        $type = new Model_Type();
         
        //$view = new View('content/edit');
        //$view->set("content", $type);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $type)
        	->set('query', $this->request->query());

    }
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $type = new Model_Type($id);
 
        // $view = new View('content/edit');
        // $view->set("content", $type);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $type)
        	->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $type = new Model_Type($id);
 
        $type->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $type = new Model_Type($id);
        $type->values($_POST); // populate $type object from $_POST array
		$errors = array();
		
		try
		{
			$type->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $exceptions)
		{
			$errors = $exceptions->errors('validation');
		}
		
		$view = new View('type/edit');
		$view->set("content", $type);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}