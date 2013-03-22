<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Category extends ORM {

	protected $_table_name = 'categories';

	// Contains relations
	protected $_has_many = array(

		// A category can have many category_data rows
		'data' => array(
			'model'			=> 'category_data',
			'foreign_key'	=> 'category_id',
		),

	);

	public function rules() {
		return array (
			
			/*
			'title' => array ( // property name to validate
				array('not_empty'), // validation category
			),
			
			'alias' => array (
				array('not_empty'),
				array(array($this, 'unique'), array('alias', ':value')),
			),
			*/
			
			'parent_id' => array (
				array('numeric'),
			),
			
		);
	}

	public static function load($query = array("")) {
		// echo "load($query)<br>";
		
		if (!is_array($query)) {
			$query["id"] = $query;
		}
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
		
		$result = array("items" => array(), "count" => 0);
		
		// $category = ORM::factory('category'); // loads all categories object from table
		$categories = ORM::factory('category')
			->select('category_data.title')->select('category_data.description')
			->join('category_data', 'LEFT')->on('category_data.category_id', '=', 'category.id')
			->order_by('category_data.title', 'ASC');
			
		// Language
		$language = isset($query["language"]) ? $query["language"] : 1;
		// $categories->where('category_data.language', '=' , $language);
		
		// Limit & offset
		$categories->limit($query["limit"]);
		$categories->offset($query["offset"]);
			
		// Find all
		$result["items"] = $categories->find_all();
		// echo "<br><br><br>load(): ".Database::instance()->last_query;

		// Count
		$count = $categories->reset(FALSE);
		if (isset($query["category"])) {
			$categories->where('category', '=' , $query["category"]);
		}
		$result["count"] = $categories->count_all(); // 'active', '=', 1
		// echo "<br><br><br>count_all(): ".Database::instance()->last_query;

		// echo "[".$result["count"]."]<br>";


		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";

		return $result;
	}

	public static function loadByID($post_id) {
		echo "loadByID($post_id)<br>";
		
		// $post = ORM::factory('post'); // loads all post object from table
		$post = ORM::factory('post')
			->select('category_data.title')->select('category_data.description')
			// ->select('post_meta.key')->select('post_meta.value')
			// ->join('post_meta', 'LEFT')->on('post_meta.post_id', '=', 'post.id')
			->join('category_data', 'LEFT')->on('category_data.category_id', '=', 'category.id');
			
		// Language
		$language = isset($data["language"]) ? $data["language"] : 1;
		$post->where('category_data.language', '=' , $language);
		$post->where('category.id', '=' , $post_id);
		
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