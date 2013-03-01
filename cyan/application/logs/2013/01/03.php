<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-01-03 12:57:23 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'cache' at 'MODPATH/cache' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/anders/Sites/Bliss-Engine/be-admin/application/bootstrap.php:125
2013-01-03 12:57:23 --- DEBUG: #0 /Users/anders/Sites/Bliss-Engine/be-admin/application/bootstrap.php(125): Kohana_Core::modules(Array)
#1 /Users/anders/Sites/Bliss-Engine/index.php(102): require('/Users/anders/S...')
#2 {main} in /Users/anders/Sites/Bliss-Engine/be-admin/application/bootstrap.php:125
2013-01-03 21:11:34 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH/static/admin-header.php [ 76 ] in :
2013-01-03 21:11:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-01-03 21:21:07 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH/views/template-viewer.php [ 37 ] in :
2013-01-03 21:21:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :