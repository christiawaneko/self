<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);


spl_autoload_register(function($class){
    require_once 'Core/'. $class .'.php';
});

require_once 'Config/Config.php';

$GLOBALS['path'] = '/~christiawaneko/mini/public';
