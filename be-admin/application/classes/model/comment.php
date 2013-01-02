<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends ORM {
 
	// Belongs to only one content
	protected $_belongs_to = array (
		
		// Belongs to only one content
		'article' => array (
			'model'			=> 'content',
			'foreign_key'	=> 'content_id'
		)
	);
    
}