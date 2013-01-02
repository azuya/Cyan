<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Content_Type extends ORM {
    // protected $_primary_key = 'content_type_id'; 

	public function rules() {
		return array (
			'name' => array ( // property name to validate
				array('not_empty'), // validation type
			),
			'alias' => array (
				array('not_empty'),
			),
		);
	}

}