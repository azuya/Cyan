<?php defined('SYSPATH') or die('No direct script access.');

class Form extends Kohana_Form {

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
	public static function input($name, $value = NULL, array $attributes = NULL)
	{
		// Set the input name
		$attributes['name'] = $name;

		// Set the input value
		$attributes['value'] = $value;

		if ( ! isset($attributes['type']))
		{
			// Default type is text
			$attributes['type'] = 'text';
		}

		return '<input'.HTML::attributes($attributes).' />';
	}

}
?>