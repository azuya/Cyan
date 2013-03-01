<?php
/*
 * Default settings for fof-front
 */

return array(
	'cyan' => array(
		'name'			=> 'Cyan',
		'version'		=> '0.1 Alpha',
		'copyright'		=> '2013',
		'jquery'		=> '1.9.1',
        'site_content'	=> DOCROOT.'cyan-content/',
        'file_upload'	=> DOCROOT.'cyan-content/files/',
	),

    'site' => array(
        'title'			=> 'Cyan',
        'title_suffix'	=> ' | Cyan',
        'theme'			=> 'cyanide',
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