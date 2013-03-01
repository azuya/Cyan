<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Generic parent for all admin controllers in Cyan
 *
 * Author: Anders Dahlgren <anders@bobolo.se>
 * Created On: 2013-01-06
 */
class Controller_Base_Admin extends Controller_Base_Controller {
	public function before()
	{
		parent::before();

		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			$this->redirect('login');
		}
	}
}
