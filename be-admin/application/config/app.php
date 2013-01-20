<?php
/*
 * Default settings for fof-front
 */

return array(
	'bliss_engine' => array(
		'name'			=> 'Bliss Engine',
		'version'		=> '0.1 Alpha',
		'copyright'		=> '2013',
		'jquery'		=> '1.9.0',
        'site_content'	=> DOCROOT.'be-content/',
        'file_upload'	=> DOCROOT.'be-content/files/',
	),

    'site' => array(
        'title'			=> 'Bliss Engine CMS',
        'title_suffix'	=> ' | Bliss Engine CMS',
        'theme'			=> 'bliss',
    ),
    
    // Default meta information. will be used for other then post page
    'meta' => array(
        'keywords'		=> 'These, are, dummy, keywords, change, it, from, application/config/app.php',
        'description'	=> 'Dummy description. Change it from application/config/app.php',
    ),
    
    'ui_settings' => array(
        'limit_items'	=> 20,
    ),
);