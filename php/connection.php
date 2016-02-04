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

            $dbDetails = array(
                'db_name' => 'PHOTO4130',
                'db_host' => 'localhost',
                'db_user' => 'root',
                'db_pass' => 'root'
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
    
}

?>