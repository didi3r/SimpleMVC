<?php
/* ---------------------- */
/* ModelBase.php          */
/* ---------------------- */
class ModelBase {
    private $_conexion;
    private $_resource;
    private $_sql;
    public static $queries;
    private static $_singleton;
    /*
     * Singleton
    */
    public static function getInstance() {
        if (is_null (self::$_singleton)) {
            self::$_singleton = new DataBase();
        }
        return self::$_singleton;
    }
    /*
     * Construct
    */
    private function __construct() {
        $this->_conexion = @mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        mysql_select_db(DB_DBNAME, $this->_conexion);
        $this->queries = 0;
        $this->_resource = null;
    }
    /*
     * Set the sql string to be executed
     * Returns true or false
    */
    public function setQuery($sql){
        if(empty($sql)){
            return false;
        }
        $this->_sql = $sql;
        return true;
    }
    /*
     * Executes query
     * Returns de resource result
    */
    public function execute(){
        if(!($this->_resource = mysql_query($this->_sql, $this->_conexion))){
            return null;
        }
        $this->queries++;
        return $this->_resource;
    }

    public function alter(){
        if(!($this->_resource = mysql_query($this->_sql, $this->_conexion))){
            return false;
        }
        return true;
    }
    /*
     * Counts total records of query
     * Returns int or null
    */
    public function count() {
        if (!($result = $this->execute())){
            return null;
        }
        return mysql_num_rows($result);
    }
    /*
     * Returns a record object of query
    */
    public function loadObject(){
        if ($result = $this->execute()){
            if ($object = mysql_fetch_object($result)){
                return $object;
            } else {
                return null;
            }
        } else {
            return false;
        }
    }
    /*
     * Return an array of records objects of query
    */
    public function loadObjectList(){
        if (!($result = $this->execute())){
            return null;
        }
        $array = array();
        while ($row = @mysql_fetch_object($result)){
            $array[] = $row;
        }
        return $array;
    }
    /*
     * Free space
    */
    public function freeResults(){
        @mysql_free_result($this->_resource);
        return true;
    }
    /*
     * Destruct
    */
    function __destruct(){
        @mysql_free_result($this->_resource);
        @mysql_close($this->_conexion);
    }
}