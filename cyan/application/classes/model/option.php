<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Option extends ORM {
    // protected $_primary_key = 'type'; 

	public function rules() {
		return array (
			'option_name' => array ( // property name to validate
				array('not_empty'), // validation type
			),
		);
	}

	public static function load($params = array("")) {
		// echo "load($params)<br>";
		
		$query = array();
		if (!is_array($params)) {
			$query["name"] = $params;
		}
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
		
		$result = array("items" => array(), "count" => 0);
		
		// $post = ORM::factory('post'); // loads all post object from table
		$options = ORM::factory('option');
			
		// Limit & offset
		if (is_array($params)) {
			$options->limit($params["limit"]);
			$options->offset($params["offset"]);
		}
			
		// Execute query -> Find all
		if (isset($query["name"])) {
			$options->where('option_name', '=' , $query["name"]);
		}
		$result["items"] = $options->find_all();
		// echo "<br><br><br>load(): ".Database::instance()->last_query;

		// Count
		$count = $options->reset(FALSE);
		if (isset($query["name"])) {
			$options->where('option_name', '=' , $query["name"]);
		}
		$result["count"] = $options->count_all(); // 'active', '=', 1
		// echo "<br><br><br>count_all(): ".Database::instance()->last_query;
		// echo "[".$result["count"]."]<br>";


		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";

		return $result;
	}
}