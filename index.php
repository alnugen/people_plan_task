<?php

define ('DS', DIRECTORY_SEPARATOR);
define ('BASE_DIR', dirname(__FILE__) . DS);

require_once BASE_DIR . 'configs' . DS . 'configs.inc.php';

echo "{'message': 'alive'}";
