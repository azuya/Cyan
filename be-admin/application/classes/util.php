<?php defined('SYSPATH') or die('No direct script access.');

class Util {

	/**
	 * Creates a form input. If no type is specified, a "text" type input will
	 * be returned.
	 *
	 *     echo Form::input('username', $username);
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 * @uses    HTML::attributes
	 */
	public static function get_page_id()
	{
		$url	= Request::detect_uri();
		$params	= URL::query();

		$url = substr($url, 1);

		// echo "URL: ".$url."<br>";
		// echo "Query: ".$params."<br>";
	
		// Transliterate non-ASCII characters
        $params = UTF8::transliterate_to_ascii($params);
 
		$id = $url . (($params) ? $params : "");
		// echo "ID: [".$id."]<br>";
        
        // Remove all characters that are not the separator, a-z, 0-9, or whitespace
        $id = preg_replace('![^'.preg_quote('-').'a-z0-9\s]+!', '-', strtolower($id));
		// echo "ID: [".$id."]<br>";

		// Replace all separator characters and whitespace by a single separator
		$id = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $id);
			
		// echo "ID: [".$id."]<br>";

		return $id;
	}

}
?>