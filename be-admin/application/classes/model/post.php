<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Post extends ORM {
     
	// Contains relations
	protected $_has_many = array(

		// A post can have many comments
		'comments' => array(
			'model'			=> 'comment',
			'foreign_key'	=> 'post_id',
		),

		// A post can have many datas
		'data' => array(
			'model'			=> 'data',
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
			'foreign_key'	=> 'post_id',
		),
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
	
	public static function load($data = array("")) {
		// echo "load($data)<br>";
		
		if (!is_array($data)) {
			$data["id"] = $data;
		}
		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$result = array("items" => array(), "count" => 0);
		
		// $post = ORM::factory('post'); // loads all post object from table
		$posts = ORM::factory('post')
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.content')
			->join('post_data', 'LEFT')->on('post_data.post_id', '=', 'post.id');
			
		// Language
		$language = isset($data["language"]) ? $data["language"] : 1;
		// $posts->where('post_data.language', '=' , $language);
		
		// Type
		if (isset($data["type"])) {
			$posts->where('type', '=' , $data["type"]);
		}

		// Limit & offset
		$posts->limit($data["limit"]);
		$posts->offset($data["offset"]);
			
		// Find all
		$result["items"] = $posts->find_all();
		// echo "<br><br><br>load(): ".Database::instance()->last_query;

		// Count
		$count = $posts->reset(FALSE);
		if (isset($data["type"])) {
			$posts->where('type', '=' , $data["type"]);
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
			->select('post_data.title')->select('post_data.excerpt')->select('post_data.content')
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