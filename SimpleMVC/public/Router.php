<?php

class Router {
    private $_routes = array();
    
    public function __construct() {

    }
   
    public function registerRoute(Route $route) {
        $this->_routes[] = $route;
    }
    
    public function getCurrentRoute() {
        $url = '';
        if(!empty($_GET['route'])) {
            $url = trim($_GET['route']);
        }
        return $this->getMatchingRoute($url);
    }    
    
    public function getMatchingRoute($url) {
        foreach($this->_routes as &$route) {
            if ($route->isMatch($url)) {
                return $route;            
            }
        }
        return null;
    }
    
    public function callControllerAction() {
        $url = '';
        if (!empty($_GET['route'])) {
            $url = trim($_GET['route']);
        }

        $route = $this->getMatchingRoute($url);
        if ($route != null) {
            $actionValues = explode('/', ltrim(str_replace($route->getUrl(), '', $url), '/'));

            $controller = $route->getControllerName();
            $controllerName = ucfirst($controller) . 'Controller';
            $actionName = $route->getActionName();
            
            if(empty($actionName)) {
                $controllerObject = new $controllerName($controller, $actionName);
                $controllerObject->index($actionValues);
            } else {
                $controllerObject = new $controllerName($controller, $actionName);
                $controllerObject->$actionName($actionValues);
            }

        } else {
            echo 'Error 404 - Pagina no encontrada! <br />' . $_GET['route'];
        }
        
    }
}
