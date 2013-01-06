<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Settings extends Controller_Admin {

    const MODULE = 'settings';
     
    public function action_index()
    {
        $all_settings = ORM::factory('settings')->find_all(); // loads all settings object from table
         
        // $view = new View('settings/index');
        // $view->set("settings", $all_settings); // set "settings" object to view
        //$this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/index')->bind('settings', $all_settings);
    }
     
    // loads the new settings form
    public function action_new()
    {
        $settings = new Model_Settings();
         
        //$view = new View('settings/edit');
        //$view->set("settings", $settings);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('settings', $settings);

    }
     
    // edit the settings
    public function action_edit()
    {
        $settings_id = $this->request->param('id');
        $settings = new Model_Settings($settings_id);
 
        // $view = new View('settings/edit');
        // $view->set("settings", $settings);
        // $this->response->body($view);
        $this->template->content = View::factory(self::MODULE.'/edit')->bind('settings', $settings);
    }
 
    // save the settings
    public function action_post()
    {
        $settings_id = $this->request->param('id');
        $settings = new Model_Settings($settings_id);
        $settings->values($_POST); // populate $settings object from $_POST array
        $settings->save(); // saves settings to database
         
        $this->redirect(self::MODULE);
    }
 
}