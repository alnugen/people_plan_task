<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('BASE_DIR', dirname(__FILE__) . DS . '..' . DS);
define ('BASE_URL', '../');

//------------------------------------------------------

require_once BASE_DIR . 'configs' . DS . 'configs.inc.php';
require_once BASE_DIR . 'autoload.php';

//------------------------------------------------------
Utils::$templatePath = BASE_DIR . 'templates' . DS;
//------------------------------------------------------

echo Utils::Render('master.phtml', array(
  'page_title' => 'PeoplePlan Task',
  'errors' => '',
  'error' => '',
  'success' => '',
  'content' => Utils::Render('app/index.phtml', [])
));
