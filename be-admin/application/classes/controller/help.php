<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Help extends Controller_Admin {

	public function action_index() {
        $this->template->content = View::factory('help/index');
	}

}