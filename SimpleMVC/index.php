<?php
/* Load Configuration File */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);
require_once ROOT . 'config' . DS . 'config.php';

/* Load Library, Models and Controllers */
function __autoload($className) {
    if(file_exists(ROOT . LIB_DIRECTORY . ucfirst($className) . '.php')) {
        require_once(ROOT . LIB_DIRECTORY . ucfirst($className) . '.php');
    } elseif(file_exists(ROOT . APP_DIRECTORY . 'model' . DS . ucfirst($className) . '.php')) {
        require_once(ROOT . APP_DIRECTORY . 'model' . DS . ucfirst($className) . '.php');
    } elseif(file_exists(ROOT . APP_DIRECTORY . 'controller' . DS . ucfirst($className) . '.php')) {
        require_once ROOT . APP_DIRECTORY . 'controller' . DS . ucfirst($className) . '.php';
    } else {
        /* Error Generation Code Here */
    }
}

/* Routing */
$router = new Router();
$router->callControllerAction();
