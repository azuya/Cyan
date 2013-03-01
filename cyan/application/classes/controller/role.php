<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Role extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'role';
     
    public function action_index()
    {
        $roles = ORM::factory('role')->order_by('sort', 'asc')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $role); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')
        	->bind('contents', $roles)
        	->set('query', $this->request->query());
    }
     
    // loads the new content form
    public function action_new()
    {
        $role = new Model_Role();
         
        //$view = new View('content/edit');
        //$view->set("content", $role);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $role)
        	->set('query', $this->request->query());

    }
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $role = new Model_Role($id);
 
        // $view = new View('content/edit');
        // $view->set("content", $role);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $role)
        	->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $role = new Model_Role($id);
 
        $role->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $role = new Model_Role($id);
        $role->values($_POST); // populate $role object from $_POST array
		$errors = array();
		
		try
		{
			$role->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $exceptions)
		{
			$errors = $exceptions->errors('validation');
		}
		
		$view = new View('role/edit');
		$view->set("content", $role);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}