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
	/*
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
	*/

	public static function form_field($field, $value = "")
	{
		$field["placeholder"] = isset($field["placeholder"]) ? $field["placeholder"] : $field["label"];
		$field["properties"] = json_decode($field["properties"]);
	
		$attributes = array(
			"placeholder" => $field["placeholder"],
		);

		if (isset($field["properties"]->required) and $field["properties"]->required == true) {
			$attributes["required"] = '';
		}
		
		switch($field["type"])
		{
			case "text":
				if (isset($field["properties"]->maxlength) and $field["properties"]->maxlength > 0) {
					$attributes["maxlength"] = $field["properties"]->maxlength;
				}
				
				return Form::input($field["name"], $value, $attributes);
				break;
			case "textarea":
				if (isset($field["properties"]->rows) and $field["properties"]->rows > 0) {
					$attributes["rows"] = $field["properties"]->rows;
				}
			
				return Form::textarea($field["name"], $value, $attributes);
				break;
			case "html":
			
				$attributes["class"] = "ckeditor";
			
				return Form::textarea($field["name"], $value, $attributes);
				break;
			case "select":
				return Form::select($field["name"], array('iff' => 'uff'));
				break;
			case "int":
				return Form::input($field["name"], $value, $attributes);
				break;
			case "float":
				return Form::input($field["name"], $value, $attributes);
				break;
			case "files":
				return Form::input($field["name"], $value);
				break;
			case "images":
				return Form::input($field["name"], $value);
				break;
			default:
				return "Meh?";
		}
	}
}
?>