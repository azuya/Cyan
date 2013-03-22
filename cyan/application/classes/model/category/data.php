<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Category_Data extends ORM {
    
	protected $_table_name = 'category_data';

	protected $_belongs_to = array (
		
		// Belongs to only one post
		'category' => array (
			'model'     	=> 'category',
			'foreign_key'   => 'category_id',
		)
	);

	public function rules() {
		return array (
			'category_id' => array ( // property name to validate
				array('not_empty'), // validation type
			),

			'title' => array ( // property name to validate
				array('not_empty'), // validation type
			),
		);
	}

}