<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('BASE_DIR', dirname(__FILE__) . DS);
 //-----------------------------------------------------------------
require_once 'configs' . DS . 'configs.inc.php';
require_once 'autoload.php';
//-----------------------------------------------------------------
//Schema Up
echo UsersSchema::Up();

//Schema Down
// echo UsersSchema::Down();
