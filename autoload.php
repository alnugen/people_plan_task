<?php

function my_autoloader($className) {
    $autoloadPaths = array (
      'Libs/',
      'Dev/Schemas/',
    );

    foreach ($autoloadPaths as $autoloadPath) {
        $autoloadPath = str_replace('/', DS, $autoloadPath);
        $classPath    = BASE_DIR . $autoloadPath . $className . '.php';
        if (file_exists($classPath)) {
            if (is_file($classPath)) {
                if (is_readable($classPath)) {
                    require_once $classPath;

                }
            }
        }
    }
}

spl_autoload_register('my_autoloader');
