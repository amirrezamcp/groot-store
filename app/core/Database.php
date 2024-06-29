<?php

require_once "init.php";

class Database {
    private $dsn = "mysql:host=". HOST . "; dbname=" . DB;
    protected $connection = null;
    public function __construct() {
        try{
            $this->connection = new PDO($this->dsn, USERNAME, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage() . $e->getLine();
            die();
        }
    }

    public function __destruct() {
        $this->connection = null;
    }
}
