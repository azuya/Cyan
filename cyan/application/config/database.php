<?php defined('SYSPATH') or die('No direct access allowed.');
 
return array
(
    'default' => array
    (
        'type'       => 'mysql',
        'connection' => array(
            'hostname'   => 'localhost',
            'database'   => 'cyan',
            'username'   => 'root',
            'password'   => 'root',
            'persistent' => FALSE,
        ),
        'table_prefix' => 'cyan_',
        'charset'      => 'utf8',
        'caching'      => FALSE,
        'profiling'    => TRUE,
    )
);