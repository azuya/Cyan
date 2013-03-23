<?php defined('SYSPATH') or die('No direct script access.');

class Hook {

	/**
	 * Calls a hook
	 *
	 *		echo Hook::call(string);
	 *
	 * @return  ID
	 */
	public static function call($name)
	{
		
		/*
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
		*/
		
		return true;
	}

}
?>