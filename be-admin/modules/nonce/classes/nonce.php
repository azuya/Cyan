<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Nonce helper class. Provides generic methods for generating and
 * validating nonces.
 *
 * @category   Helpers
 * @author     Anders Dahlgren
 * @copyright  (c) 2013 Anders Dahlgren
 * @license    None
 */
class Nonce {

	/**
	 * Retrieve URL with nonce added to URL query.
	 *
	 * @param	String	$actionurl URL to add nonce action
	 * @param	String	$action Optional. Nonce action name
	 * @return	String	URL with nonce action added.
	 */
	public static function nonce_url($actionurl, $action = -1) {
		// echo "nonce_url($actionurl, $action)<br>";
	
		// $actionurl = str_replace('&amp;', '&', $actionurl);
		// return append_parameter_to_url($actionurl, '_benonce', Nonce::create_nonce($action));
		
		$query = $actionurl.URL::query(array('_benonce' => Nonce::create_nonce($action)));
		return $query;
	}
	
	/**
	 * Retrieve or display nonce hidden field for forms.
	 *
	 * The nonce field is used to validate that the contents of the form came from
	 * the location on the current site and not somewhere else. The nonce does not
	 * offer absolute protection, but should protect against most cases. It is very
	 * important to use nonce field in forms.
	 *
	 * The $action and $name are optional, but if you want to have better security,
	 * it is strongly suggested to set those two parameters. It is easier to just
	 * call the function without any parameters, because validation of the nonce
	 * doesn't require any parameters, but since crackers know what the default is
	 * it won't be difficult for them to find a way around your nonce and cause
	 * damage.
	 *
	 * The input name will be whatever $name value you gave. The input value will be
	 * the nonce creation value.
	 *
	 * @param	String	$action Optional. Action name.
	 * @param	String	$name Optional. Nonce name.
	 * @param	Bool	$referer Optional, default true. Whether to set the referer field for validation.
	 * @param	Bool	$echo Optional, default true. Whether to display or return hidden form field.
	 * @return	String	Nonce field.
	 */
	public static function nonce_field($action = -1, $name = "_benonce", $echo = false) {
		// echo "nonce_field($action, $name, $echo)";
		
		// $nonce_field = '<input type="text" id="' . $name . '" name="' . $name . '" value="' . Nonce::create_nonce($action) . '" />';
		$nonce_field = Form::hidden($name, Nonce::create_nonce($action), array("id" => $name));
		// if ($referer) {
		// 	$nonce_field .= Nonce::referer_field(false);
		// }
	
		if ($echo) {
			echo $nonce_field;
		}
	
		return $nonce_field;
	}
	
	/**
	 * Get the time-dependent variable for nonce creation.
	 *
	 * A nonce has a lifespan of two ticks. Nonces in their second tick may be
	 * updated, e.g. by autosave.
	 *
	 * @return	Int
	 */
	public static function nonce_tick() {
		// echo "nonce_tick()<br>";
		$nonce_life = 86400; // 24 hours
	
		return ceil(time() / ($nonce_life / 2));
	}
	
	/**
	 * Verify that correct nonce was used with time limit.
	 *
	 * The user is given an amount of time to use the token, so therefore, since the
	 * UID and $action remain the same, the independent variable is the time.
	 *
	 * @param	String		$nonce Nonce that was used in the form to verify
	 * @param	String|int	$action Should give context to what is taking place and be the same when nonce was created.
	 * @return	Bool		Whether the nonce check passed or failed.
	 */
	public static function verify_nonce($nonce, $action = -1) {
		// Load the user information
		$user = Auth::instance()->get_user();
		$uid = (int) $user->id;
	
		$i = Nonce::nonce_tick();
	
		// Nonce generated 0-12 hours ago
		if (substr(hash('sha256',$i . $action . $uid), -12, 10) == $nonce) {
			return 1;
		}
		
		// Nonce generated 12-24 hours ago
		if (substr(hash('sha256',($i - 1) . $action . $uid), -12, 10) == $nonce) {
			return 2;
		}
	
		// Invalid nonce
		return false;
	}
	
	/**
	 * Creates a random, one time use token.
	 *
	 * @param	String|int	$action Scalar value to add context to the nonce.
	 * @return	String		The one use form token
	 */
	public static function create_nonce($action = -1) {
		// echo "create_nonce($action)<br>";
	
		// Load the user information
		$user = Auth::instance()->get_user();
	
		$uid = (int) $user->id;
		$i = Nonce::nonce_tick();
	
		return substr(hash('sha256', $i . $action . $uid), -12, 10);
	}
	
	/**
	 * Handle when wrong nonce occurrs.
	 *
	 * @param	String|int	$action Scalar value to add context to the nonce.
	 * @return	String		The one use form token
	 */
	public static function nonce_error() {
		// echo "nonce_error()";
	
		// header("Location: " . $_SESSION[SESSION_SITE]->site_url . INDEXFILE . "?special=403");
		// die();
		// $request = Request::factory("post/");
		// echo "error!";

		throw new HTTP_Exception_403(__('Permission denied'));
	}
} // End nonce
