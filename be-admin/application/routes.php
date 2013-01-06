<?php
/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

Route::set('admin','admin(/<controller>(/<action>(/<id>)))')
	->defaults(array(
	    'controller' => 'dashboard',
	    'action'     => 'index',
	));

/*    
Route::set('admin','be(/<ad>(/<affiliate>))')
	->defaults(array(
	    'controller' => 'dashboard',
	    'action'     => 'index',
	));
*/

// TODO: Make all except /admin/controller/action/… go to the viewer.

Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'viewer',
		'action'     => 'index',
	));
?>