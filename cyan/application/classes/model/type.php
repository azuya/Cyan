<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Type extends ORM {

	// Contains relations
	protected $_has_many = array(

		// A type has many posts
		'post' => array(
			'model'			=> 'posts',
			'foreign_key'	=> 'id',
		),
	);

	public function rules() {
		return array (
			
			'name' => array ( // property name to validate
				array('not_empty'), // validation type
			),
			
			'alias' => array (
				array('not_empty'),
				array(array($this, 'unique'), array('alias', ':value')),
			),
			
			'parent_id' => array (
				array('numeric'),
			),
			
		);
	}

}