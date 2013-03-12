<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api extends Controller {

	/**
	 * Session instance
	 * @var Session
	 */
	protected $_session;
	/**
	 *Is logged in check
	 * @var boolean
	 */
	public $isLoggedIn;
	/**
	 * Database instance for regular app
	 * @var Database
	 */
	protected $_db;

	/**
	 * Basic application configs
	 * @var Kohana_Config
	 */
	protected $_config;

	// Flag to determine if request is an ajax call
	protected $_isAjax = false;

	// Params from active request
	protected $_params;

	// TO keep user's momiloop login info
	protected $_userData;

	// The response
	protected $api_response = array(
		"code"		=> 0,
		"message"	=> "",
		"data"		=> array(),
	);

	/**
	 * The before() method is called before your controller action.
	 * In our template controller we override this method so that we can
	 * set up default values. These variables are then available to our
	 * controllers if they need to be modified.
	 */
	public function before()
	{
		parent::before();

        $this->_config = Kohana::$config->load('app');

		$this->_session = Session::instance();
		$this->_db = Database::instance();
		$this->_params = array_merge($_GET, $this->request->param());

		View::set_global('site', $this->_config);

		define('API_SUCCESS', 1);
		define('API_FAILURE', -1);
	
		// Validate API-key
		$this->validate_key(isset($this->_params["key"]) ? $this->_params["key"] : "");
		
		// if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		// {
		// 	$this->_isAjax = true;
		// }

	}

	/**
	 * The after() method is called after your controller action.
	 * In our template controller we override this method so that we can
	 * make any last minute modifications to the template before anything
	 * is rendered.
	 */
	public function after()
	{
		// If ajax call, show only the content, no layout needed
		// if($this->_isAjax)
		// {
		// 	
		// 	$this->response->body($this->template->content);
		// 	return;
		// }
		
		// Show API response
		$this->show_response();

		parent::after();
	}

	public function action_index()
	{
		$data = array(
			"test"		=> "Anders is the best!",
		);
	
		$this->api_response["code"] = API_SUCCESS;
		$this->api_response["message"] = "This is the API";
		$this->api_response["data"] = $data;

	}

	protected function validate_key($api_key) {
		if ($api_key != "12345") {
			$this->api_response["code"] = API_FAILURE;
			$this->api_response["message"] = "API key failed";
			unset($this->api_response["data"]);

			$this->show_response();
			die();
		}
	}

	protected function show_response() {
		echo json_encode($this->api_response);
	}
}
