<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Option extends ORM {
    // protected $_primary_key = 'type_id'; 

	public function rules() {
		return array (
			'option_name' => array ( // property name to validate
				array('not_empty'), // validation type
			),
		);
	}

}