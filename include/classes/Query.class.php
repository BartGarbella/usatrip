<?php 

class Query extends DatabaseConnect {

	private $_db;
    
    function __construct() {
        $this->_db = $this->connection();
    }

	

	// Reviece string-Payload from Ajax POST and decode into array	    
    public function decode($string) {
    	$data = array();

    	parse_str($string, $data);

    	$this->insert($data);
    }




    public function selectAll($table) {


        $selectQuery = "SELECT * FROM ".$table;

    	try {
        	$stmt = $this->_db->prepare($selectQuery);
        	$stmt->execute();
        	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	
    	} catch (PDOException $e) {
    		print "Error:" . $e->getMessage() . "<br/>";
            die();	
    	}
        $this->_db = NULL;
        return $result;
    }



    private function insert($data) {




        $insertQuery = 'INSERT INTO users 
        ('.implode(",",array_keys($data)).') 
        VALUES ('.implode(",",array_fill(0,count($data),"?")).')';



    	try {
            $stmt = $this->_db->prepare($insertQuery);
            $stmt->execute(array_values($data));
            $this->_db = NULL;
		} catch (PDOException $e) {
    		print "Error: ".$e->getMessage() . "<br/>";
            die();
    	}

    }
}