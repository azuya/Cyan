<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Theme helper class. Provides generic methods for generating and
 * handling themes
 *
 * @category   Helpers
 * @author     Anders Dahlgren
 * @copyright  (c) 2013 Anders Dahlgren
 * @license    None
 */
class Theme {

	/**
	 * Draws header with all dependencies for Bliss Engine
	 *
	 */
	public static function get_header()
	{
		echo "get_header();<br>";

		// Admin menu
		require Kohana::find_file('static', 'admin-header','php');
	}

	/**
	 * Draws footer with all dependencies for Bliss Engine
	 *
	 */
	public static function get_footer()
	{
		echo "get_footer();<br>";
		
		// Scripts
		require Kohana::find_file('static', 'scripts','php');

	    // Load site configuration file
	    $site = Kohana::$config->load('app');

	    // Load theme's overall footer
		require $site["bliss_engine"]["site_content"].'themes/bliss/footer.php';
	}

	/**
	 * Draws admin things for Bliss Engine <head>
	 *
	 */
	public static function be_header()
	{
		// Load the user information
		$user = Auth::instance()->get_user();
	
	    if ($user) {
			echo '<link rel="stylesheet" type="text/css" href="'.URL::site(null, true, false).'be-admin/assets/css/be-admin.css">';
	    }
	
	}

	/**
	 * Draws admin things for Bliss Engine for the very end of <body>
	 *
	 */
	public static function be_footer()
	{
		echo "be_footer();<br>";
		echo "Such as analytics code etc...";
	}
}
?>