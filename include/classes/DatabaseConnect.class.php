<?php

class DatabaseConnect  {

    private $_properties;
    private $_dbname;
    private $_dbhost;
    private $_charset;
    private $_user;
    private $_pass;

    protected $_dbc;

    function __construct() {

    }

    protected function connection() {

        $this->_properties = DbProps::$_properties;


    	//Config::getInstance()


    	// $this->_dbhost = 'localhost';
     //    $this->_dbname = 'test';
     //    $this->_user = 'root';
     //    $this->_pass = '';
     //    $this->_dbc = 'emtpy';

        try {
            $dbc = new PDO(
            	'mysql:host='.$this->_properties['hostname'].
            	';dbname='.$this->_properties['database'].
                ';charset='.$this->_properties['charset'],
            	$this->_properties['username'],
            	$this->_properties['password'],
            	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        } catch (PDOException $e) {
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }
        return $dbc;
    }
}