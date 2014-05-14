<?php

class ViewHelper {   
    public function __construct() {
    }
    
    // Creates a hyperlink url based on a controller and action
    public static function createLinkUrl($controller, $action = '') {
        echo BASE_URL . $controller . '/' . $action;
    }
    
    // Creates a hyperlink url based on a static file url
    public static function createStaticUrl($url) {
        echo BASE_URL . 'public/' . $url;
    }
}
