<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-02-28 16:57:25 --- EMERGENCY: Database_Exception [ 1049 ]: Unknown database 'kohana_project' ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 108 ] in /Users/anders/Sites/Cyan/be-admin/modules/database/classes/Kohana/Database/MySQL.php:75
2013-02-28 16:57:25 --- DEBUG: #0 /Users/anders/Sites/Cyan/be-admin/modules/database/classes/Kohana/Database/MySQL.php(75): Kohana_Database_MySQL->_select_db('kohana_project')
#1 /Users/anders/Sites/Cyan/be-admin/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#2 /Users/anders/Sites/Cyan/be-admin/modules/database/classes/Kohana/Database/MySQL.php(358): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /Users/anders/Sites/Cyan/be-admin/modules/orm/classes/Kohana/ORM.php(1665): Kohana_Database_MySQL->list_columns('posts')
#4 /Users/anders/Sites/Cyan/be-admin/modules/orm/classes/Kohana/ORM.php(441): Kohana_ORM->list_columns()
#5 /Users/anders/Sites/Cyan/be-admin/modules/orm/classes/Kohana/ORM.php(386): Kohana_ORM->reload_columns()
#6 /Users/anders/Sites/Cyan/be-admin/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#7 /Users/anders/Sites/Cyan/be-admin/application/classes/Controller/Viewer.php(49): Kohana_ORM->__construct('0')
#8 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Controller.php(84): Controller_Viewer->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Viewer))
#11 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 /Users/Anders/Sites/Cyan/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/anders/Sites/Cyan/be-admin/modules/database/classes/Kohana/Database/MySQL.php:75
2013-02-28 17:03:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined index:  Cyan ~ APPPATH/classes/Theme.php [ 40 ] in /Users/anders/Sites/Cyan/be-admin/application/classes/Theme.php:40
2013-02-28 17:03:55 --- DEBUG: #0 /Users/anders/Sites/Cyan/be-admin/application/classes/Theme.php(40): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/anders/S...', 40, Array)
#1 /Users/Anders/Sites/Cyan/be-content/themes/bliss/index.php(24): Theme::get_footer()
#2 /Users/anders/Sites/Cyan/be-admin/application/views/template-viewer.php(1): require('/Users/Anders/S...')
#3 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/View.php(61): include('/Users/anders/S...')
#4 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/anders/S...', Array)
#5 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#6 /Users/anders/Sites/Cyan/be-admin/application/classes/Controller/Base.php(133): Kohana_Controller_Template->after()
#7 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Controller.php(87): Controller_Base->after()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Viewer))
#10 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/anders/Sites/Cyan/be-admin/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 /Users/Anders/Sites/Cyan/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/anders/Sites/Cyan/be-admin/application/classes/Theme.php:40