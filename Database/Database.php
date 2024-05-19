<?php
namespace Database;

use PDO;
use PDOException;

class Database {
    private const host = 'localhost';
    private const username = 'root';
    private const password =  '';
    private const db = 'groot-store';
    private $dsn = "mysql:host=". self::host . "; dbname=" . self::db;
    protected $connection = null;
    public function __construct() {
        try{
            $this->connection = new PDO($this->dsn, self::username, self::password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage() . $e->getLine();
            die();
        }
        echo " return = 1 <br>";
    }

    public function __destruct() {
        $this->connection = null;
    }

    protected function executeStatement($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            die("خطا در آماده‌سازی دستور: " . $this->connection->errorInfo()[2]);
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
