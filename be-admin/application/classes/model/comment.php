<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends ORM {
 
	// Belongs to only one content
	protected $_belongs_to = array (
		
		// Belongs to only one content
		'post' => array (
			'model'			=> 'post',
			'foreign_key'	=> 'post_id'
		)
	);
    
}