<?php

class DBConnector {

    private $dbName = null;
    private $dbHost = null;
    private $dbPass = null;
    private $dbUser = null;
    private $conn = null;

    // static AKA class variable - belongs to the class not the object
    private static $instance = null;

    private function __construct($dbDetails = array()) {

        $this->dbName = $dbDetails['db_name'];
        $this->dbHost = $dbDetails['db_host'];
        $this->dbUser = $dbDetails['db_user'];
        $this->dbPass = $dbDetails['db_pass'];


        try {

            $this->conn = new PDO('mysql:host=' . $this->dbHost . ';dbname='
                . $this->dbName, $this->dbUser, $this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            //echo $e->getMessage();
            Messages::addMessage("error", "DBConnector contructor: " . $e->getMessage());
        }

    }

    public static function getInstance($dbDetails = null) {

        if($dbDetails == null) {
			//keith's home computer localhost:8889 root root
            //jonathan's home computer localhost:8888 root 
            $dbDetails = array(
                'db_name' => 'photo4130',
                'db_host' => 'localhost:8888',
                'db_user' => 'root',
                'db_pass' => ''
            );

        }

        // Check if instance already exists
        if(self::$instance == null) {
            self::$instance = new DBConnector($dbDetails);
        }

        return self::$instance;

    }
    
        public function query($sql, $params = array()) {
        try {
            if($this->conn != null) {
                $statement = $this->conn->prepare($sql);
                $statement->execute($params);
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $rows;

            } else {
                // connection failed, add that to the messages
                Messages::addMessage("error",
                    "DBConnector 'query' failure, PDO Connection was null.");
            }
            return array();

        } catch(PDOException $e) {

            Messages::addMessage("error", "DBConnector 'query' failure, "
                . $e->getMessage());

        }

    }
    
    
    public function affectRows($sql) {

        try {
            if($this->conn != null) {

                $numberOfAffectedRows = $this->conn->exec($sql);
                return $numberOfAffectedRows;

            } else {
                // connection failed, add that to the messages
                Messages::addMessage("error",
                    "DBConnector 'affectRows' failure, PDO Connection was null.");
                return 0;
            }
            return 0;

        } catch(PDOException $e) {

            Messages::addMessage("error", "DBConnector 'affectRows' failure, "
                . $e->getMessage());
        }
    }
    
    
    public function getTransactionID($sql) {
        try {
            if($this->conn != null) {

                $this->conn->beginTransaction();
                 $this->conn->exec($sql);
                // the id of the last inserted row into a table
                $lastID = $this->conn->lastInsertId();
                $this->conn->commit();
                return $lastID;

            } else {
                // connection failed, add that to the messages
                Messages::addMessage("error",
                    "DBConnector 'getTransactionID' failure, PDO Connection was null.");
                return -1;
            }
            return -1;

        } catch(PDOException $e) {
            $this->conn->rollBack();
            Messages::addMessage("error", "DBConnector 'getTransactionID' failure, "
                . $e->getMessage());
        }
    }
}

?>