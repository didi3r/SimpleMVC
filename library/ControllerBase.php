<?php
/* ---------------------- */
/* ControllerBase.php     */
/* ---------------------- */
abstract class ControllerBase {
    protected $_template;
    /*
     *  Construct
    */
    public function __construct($controller, $action) {
        $this->_template = new Template($controller, $action);
    }
    /*
     * Set a variable into template
    */
    public function set($name, $value) {
        $this->_template->set($name, $value);
    }
    /*
     * Desctruct
    */
    function __destruct() {
        $this->_template->render();
    }
}
