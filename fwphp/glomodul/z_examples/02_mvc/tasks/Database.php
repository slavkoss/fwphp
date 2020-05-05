<?php
include "Config.php";

class Database extends Config {
    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        $config = new Config();
        $dsn = 'mysql:host=' . $config->host . ';dbname=' . $config->name;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //create a new instance of pdo
        try {
            $this->dbh = new PDO($dsn,$config->user, $config->password,$options);
        } catch(PDOException $ex) {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }

    //1. PREPARE sql statement
    public function prep_qry($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //2. BIND values
    public function bind($param, $value, $type=null) {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    //3. EXECUTE query
    public function execute(){
        return $this->stmt->execute();
    }



    //result Set
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //single record
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}