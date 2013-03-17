<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Type extends Controller_Admin {
     
	public $template = 'template-admin';
    const MODULE = 'type';
     
    public function action_index()
    {
        $types = ORM::factory('type')->order_by('sort', 'asc')->order_by('name', 'asc')->find_all(); // loads all content object from table
         
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
        $type->fields = unserialize($type->fields);
 
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
 
		// Nonce ----------------------------------
		if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-delete-type-".$id)) { Nonce::nonce_error(); }
		// ----------------------------------------

        $type->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post()
    {
    
        $id = $this->request->param('id');
        $type = new Model_Type($id);
        
        $field_names = $_POST["field_name"];
        unset($_POST["field_name"]);
        
        $field_labels = $_POST["field_label"];
        unset($_POST["field_label"]);

        $field_types = $_POST["field_type"];
        unset($_POST["field_type"]);

        $field_properties = $_POST["field_properties"];
        unset($_POST["field_properties"]);

        $fields = array();
        for ($i = 0; $i <= count($field_names)-1; $i++) {
	        
	        if ($field_labels[$i] != "") {
		        $fields[$i] = array(
		        	"name"		=> ($field_names[$i]) ? URL::title($field_names[$i], "-", true) : URL::title($field_labels[$i], "-", true),
		        	"label"		=> $field_labels[$i],
		        	"type"		=> $field_types[$i],
		        	"properties"=> $field_properties[$i],
		        );
	        }

        }
        
        $_POST["fields"] = serialize($fields);
        
        $type->values($_POST);
		$errors = array();
		
		// Nonce ----------------------------------
		if ($id) {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-update-type-".$id)) { Nonce::nonce_error(); }
		} else {
			if (!Nonce::verify_nonce($_REQUEST["_benonce"], "be-create-type")) { Nonce::nonce_error(); }
		}
		// ----------------------------------------

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