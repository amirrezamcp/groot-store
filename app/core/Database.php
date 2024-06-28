<?php
namespace core\Database;

require_once "init.php";

use PDO;
use PDOException;

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

    protected function executeStatement($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            die("Error : " . $this->connection->errorInfo()[2]);
        }
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }
}
