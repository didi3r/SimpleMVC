<?php
/* ---------------------- */
/* Template.php           */
/* ---------------------- */
require_once ROOT . UTL_DIRECTORY . 'ViewHelper.php';

class Template {
    protected $_variables = array();
    protected $_controller;
    protected $_action;
    /*
     * Construct
    */
    public function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }
    /*
     * Set a variable
    */
    public function set($name,$value) {
        $this->_variables[$name] = $value;
    }
    /*
     * Render template.
    */
    public function render($header = true, $footer = true) {
        extract($this->_variables);
        if ($header) {
            if (file_exists(ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . 'header.php')) {
                include (ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . 'header.php');
            } else {
                include (ROOT . APP_DIRECTORY . 'view' . DS . '_template' . DS . 'header.php');
            }
        }
        if (file_exists(ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . $this->_action . '.php')) {
            include (ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . $this->_action . '.php');
        }
        if ($footer) {
            if (file_exists(ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . 'footer.php')) {
                include (ROOT . APP_DIRECTORY . 'view' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include (ROOT . APP_DIRECTORY . 'view' . DS . '_template' . DS . 'footer.php');
            }
        }        
    }

}