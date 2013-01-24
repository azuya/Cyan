<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Post_Data extends ORM {
    // protected $_primary_key = 'type'; 

	protected $_belongs_to = array (
		
		// Belongs to only one post
		'post' => array (
			'model'     	=> 'post',
			'foreign_key'   => 'post_id',
		)
	);

	public function rules() {
		return array (
			'post_id' => array ( // property name to validate
				array('not_empty'), // validation type
			),

			'title' => array ( // property name to validate
				array('not_empty'), // validation type
			),
		);
	}

}