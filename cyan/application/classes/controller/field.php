<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Field extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'field';
     
    public function action_index()
    {
        $fields = ORM::factory('field')->order_by('sort', 'asc')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $field); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')
        	->bind('contents', $fields)
        	->set('query', $this->request->query());
    }
     
    // loads the new content form
    public function action_new()
    {
        $field = new Model_Field();
         
        //$view = new View('content/edit');
        //$view->set("content", $field);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $field)
        	->set('query', $this->request->query());

    }
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $field = new Model_Field($id);
 
        // $view = new View('content/edit');
        // $view->set("content", $field);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $field)
        	->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $field = new Model_Field($id);
 
        $field->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $field = new Model_Field($id);
        $field->values($_POST); // populate $field object from $_POST array
		$errors = array();
		
		try
		{
			$field->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $exceptions)
		{
			$errors = $exceptions->errors('validation');
		}
		
		$view = new View('admin/field/edit');
		$view->set("content", $field);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}