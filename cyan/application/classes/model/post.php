<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Post extends ORM {
     
	// Contains relations
	protected $_has_many = array(

		// A post can have many comments
		'comments' => array(
			'model'			=> 'comment',
			'foreign_key'	=> 'post_id',
		),

		// A post can have many post_data rows
		'data' => array(
			'model'			=> 'post_data',
			'foreign_key'	=> 'post_id',
		),

		// A post can have many post_meta rows
		'meta' => array(
			'model'			=> 'post_meta',
			'foreign_key'	=> 'post_id',
		),

		/*
		// A post can belong to many categories
		'categories' => array(
			'model'			=> 'category',
			'foreign_key'	=> 'id',
		),
		*/

	);

	// Belongs to
	protected $_belongs_to = array(
		'type' => array(
			'model'			=> 'type',
			'foreign_key'	=> 'id',
		),
	);

	public function rules() {
		return array (
			// 'title' => array ( // property name to validate
			// 	array('not_empty'), // validation type
			// ),
			/*
			'post' => array (
				array('not_empty'),
				array(
					'min_length',
					array(':value', 10)
				),
			),
			*/
			'type' => array ( // property name to validate
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
	
	public static function load($query = array("")) {
		// echo "load($data)<br>";
		
		if (!is_array($query)) {
			$query["id"] = $query;
		}
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
		
		$result = array("items" => array(), "count" => 0);
		
		// $post = ORM::factory('post'); // loads all post object from table
		$posts = ORM::factory('post')
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.body')
			->join('post_data', 'LEFT')->on('post_data.post_id', '=', 'post.id');
			
		// Language
		$language = isset($query["language"]) ? $query["language"] : 1;
		// $posts->where('post_data.language', '=' , $language);
		
		// Type
		if (isset($query["type"])) {
			$posts->where('type', '=' , $query["type"]);
		}

		// Limit & offset
		$posts->limit($query["limit"]);
		$posts->offset($query["offset"]);
			
		// Find all
		$result["items"] = $posts->find_all();
		// echo "<br><br><br>load(): ".Database::instance()->last_query;

		// Count
		$count = $posts->reset(FALSE);
		if (isset($query["type"])) {
			$posts->where('type', '=' , $query["type"]);
		}
		$result["count"] = $posts->count_all(); // 'active', '=', 1
		// echo "<br><br><br>count_all(): ".Database::instance()->last_query;

		// echo "[".$result["count"]."]<br>";


		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";

		return $result;
	}
	
	public static function loadByID($post_id) {
		// echo "loadByID($post_id)<br>";
		
		// $post = ORM::factory('post'); // loads all post object from table
		$post = ORM::factory('post')
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.body')
			// ->select('post_meta.key')->select('post_meta.value')
			// ->join('post_meta', 'LEFT')->on('post_meta.post_id', '=', 'post.id')
			->join('post_data', 'LEFT')->on('post_data.post_id', '=', 'post.id');
			
		// Language
		$language = isset($data["language"]) ? $data["language"] : 1;
		$post->where('post_data.language', '=' , $language);
		$post->where('post.id', '=' , $post_id);
		
		// Find
		$result = $post->find();
		// echo "<br><br><br>load(): ".Database::instance()->last_query;

		// echo "[".$result["count"]."]<br>";

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";

		return $result;
	}

}