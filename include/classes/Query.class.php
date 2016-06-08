<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Query extends DatabaseConnect {

	private $_db;
    
    function __construct() {
        $this->_db = $this->connection();
    }

	

	// Reviece string-Payload from Ajax POST and decode into array	    
    public function decode($string) {


    	$data = array();

        if(array_key_exists("submit", $string)) {
        	parse_str($string['submit'], $data);
        	$this->insert($data);
        }elseif(array_key_exists("update", $string)){
            parse_str($string['update'], $data);
            $this->update($data);
        }
    }




    public function select($table,$row) {
        $special = '';
        if(!empty($row)) {
            $special = ' AND id = '.$row;
        }

        $selectQuery = "SELECT * FROM ".$table.$special;


    	try {
        	$stmt = $this->_db->prepare($selectQuery);
        	$stmt->execute();
            if(isset($row)) {
            	$result = $stmt->fetch(PDO::FETCH_ASSOC);	
            } else {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
    	} catch (PDOException $e) {
    		print "Error:" . $e->getMessage() . "<br/>";
            die();	
    	}
        $this->_db = NULL;
        return $result;
    }


    public function update($data) {


        $query = "";
        if(isset($data['BalancedDate'])) {
            $data['BalancedDate'] = date("Y-m-d");
            $data['Balanced'] = "1";
        }

        if(isset($data['id'])){
            $id = substr($data['id'], 9);
            unset($data['id']);
        }

        $data = array_merge($data,array('Changed' => date("Y-m-d")));


        


        foreach ($data as $key => $value) {
            $query .= "`".$key."` = ?,";
        }

        $query = substr($query,0, -1);

        $insertQuery = "UPDATE costs SET ".$query." WHERE id = '".$id."'";


        try {
            $stmt = $this->_db->prepare($insertQuery);
            $stmt->execute(array_values($data));
            $this->_db = NULL;
        }catch (PDOException $e) {
            print "Error: ".$e->getMessage() . "<br/>";
            die();
        }

        return("success");

    }



    private function insert($data) {

        $data['Sum'] = str_replace(",", ".", $data['Sum']);
        if (!strpos($data['Sum'], '.')) {
            $data['Sum'] = $data['Sum'].'.00';
        }

        $data = array_merge($data,array('Created' => date("Y-m-d"),'BalancedDate' => '0'));



        $insertQuery = 'INSERT INTO costs 
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