<?php
/* ---------------------- */
/* ControllerBase.php     */
/* ---------------------- */
class Router {
    private $_controller;
    private $_action;
    private $_values;
    /*
     * Construct
    */
    public function __construct() {
        $this->_controller = 'home';
        $this->_action = 'index';

        if (!empty($_GET['url'])) {
            $url = explode('/', trim($_GET['url']));
            @$this->_controller = $url[0] ? $url[0] : $this->_controller;
            @$this->_action = $url[1] ? $url[1] : $this->_action;
            @$this->_values = $url[2] ? $url[2] : $this->_values;
        }
    }
    /*
     * Calls Controller->Action
    */
    public function callControllerAction() {
            $controller = ucfirst(strtolower($this->_controller));
            $controllerName = $controller . 'Controller';
            $actionName = strtolower($this->_action);
            $actionValues = strtolower($this->_values);

            $controllerObject = new $controllerName($controller, $actionName);
            $controllerObject->$actionName($actionValues);
    }

}
