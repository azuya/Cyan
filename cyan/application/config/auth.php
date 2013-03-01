<?php defined('SYSPATH') or die('No direct access allowed.');
 
return array(
 
    'driver'       => 'orm',
    'hash_method'  => 'sha256',
    'hash_key'     => 'NzMB1uPRQHZOfsOmSxBGtSWazpshC8iwZHXVLEC08ZNm7qJZJ64Wc1UcOVSBWe97',
    'lifetime'     => 1209600,
	'session_type' => Session::$default,
    'session_key'  => 'auth_user',
     
);