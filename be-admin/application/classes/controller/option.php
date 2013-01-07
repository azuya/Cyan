<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Option extends Controller_Admin {
     
    const MODULE = 'option';
     
    public function action_index()
    {
        $options = ORM::factory('option')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $posts); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')
        	->bind('contents', $options)
        	->set('query', $this->request->query());
    }
     
    // loads the new content form
    public function action_new()
    {
        $option = new Model_Option();
         
        //$view = new View('content/edit');
        //$view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $option)
        	->set('query', $this->request->query());

    }
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $option = new Model_Option($id);
 
        // $view = new View('content/edit');
        // $view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')
        ->bind('content', $option)
        ->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $option = new Model_Option($id);
 
        $option->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $option = new Model_Option($id);
        $option->values($_POST); // populate $option object from $_POST array
		$errors = array();
		
		try
		{
			$option->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $ex)
		{
			$errors = $ex->errors('validation');
		}
		
		$view = new View('option/edit');
		$view->set("content", $option);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}