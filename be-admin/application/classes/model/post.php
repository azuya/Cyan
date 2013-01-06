<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Post extends ORM {
     
	// Contains relations
	protected $_has_many = array(

		// A post can have many comments
		'comments' => array(
			'model'			=> 'comment',
			'foreign_key'	=> 'id',
		),

		// A post can belong to many categories
		// 'categories' => array(
		// 	'model'			=> 'comment',
		// 	'foreign_key'	=> 'id',
		// ),

	);

	public function rules() {
		return array (
			'title' => array ( // property name to validate
				array('not_empty'), // validation type
			),
			/*
			'post' => array (
				array('not_empty'),
				array(
					'min_length',
					array(':value', 10)
				),
			),
			*/
			'type_id' => array ( // property name to validate
				array('not_empty'), // validation type
			),
		);
	}

	/*
	public function labels() {
		return array(
			'title'         => 'Title',
		);
	}
	*/
}