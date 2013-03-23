<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Snippet extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'snippet';
     
    public function action_index()
    {
        $snippets = ORM::factory('snippet')->order_by('sort', 'asc')->order_by('name', 'asc')->find_all(); // loads all content object from table
         
        $this->template->content = View::factory(self::MODULE.'/index')
        	->bind('contents', $snippets)
        	->set('query', $this->request->query());
    }
     
    // loads the new content form
    public function action_new()
    {
        $snippet = new Model_Snippet();
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $snippet)
        	->set('query', $this->request->query());

    }
     
    // edit the content
    public function action_edit()
    {
        $id = $this->request->param('id');
        $snippet = new Model_Snippet($id);
        $snippet->fields = unserialize($snippet->fields);
 
        $this->template->content = View::factory(self::MODULE.'/edit')
        	->bind('content', $snippet)
        	->set('query', $this->request->query());
    }
 
    // delete the content
    public function action_delete()
    {
        $id = $this->request->param('id');
        $snippet = new Model_Snippet($id);
 
		// Nonce ----------------------------------
		if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-delete-snippet-".$id)) { Nonce::nonce_error(); }
		// ----------------------------------------

        $snippet->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $snippet = new Model_Snippet($id);
                
        $snippet->values($_POST);
		$errors = array();
		
		// Nonce ----------------------------------
		if ($id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-snippet-".$id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-snippet")) { Nonce::nonce_error(); }
		}
		// ----------------------------------------

		try
		{
			$snippet->save(); // saves content to database
			$this->redirect(self::MODULE);
		}
		
		catch (ORM_Validation_Exception $exceptions)
		{
			$errors = $exceptions->errors('validation');
		}
		
		$view = new View('snippet/edit');
		$view->set("content", $snippet);
		$view->set('errors', $errors);
		
		$this->template->set('content', $view);
    }
 
}