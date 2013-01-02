<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Option extends Controller_Template {
     
	public $template = 'template-admin';
    const MODULE = 'option';
     
    public function action_index() {
        $contents = ORM::factory('option')->find_all(); // loads all content object from table
         
        // $view = new View('content/index');
        // $view->set("content", $posts); // set "posts" object to view
        //$this->response->body($view);
        
        $this->template->content = View::factory(self::MODULE.'/index')->bind('contents', $contents);
    }
     
    // loads the new content form
    public function action_new() {
        $content = new Model_Option();
         
        //$view = new View('content/edit');
        //$view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);

    }
     
    // edit the content
    public function action_edit() {
        $content_id = $this->request->param('id');
        $content = new Model_Option($content_id);
 
        // $view = new View('content/edit');
        // $view->set("content", $posts);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('content', $content);
    }
 
    // delete the content
    public function action_delete() {
        $content_id = $this->request->param('id');
        $content = new Model_Option($content_id);
 
        $content->delete();
        $this->redirect(self::MODULE);
    }
     
    // save the content
    public function action_post() {
        $content_id = $this->request->param('id');
        $posts = new Model_Option($content_id);
        $posts->values($_POST); // populate $posts object from $_POST array
        $posts->save(); // saves content to database
         
        $this->redirect(self::MODULE);
    }
 
}