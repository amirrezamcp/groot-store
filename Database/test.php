<?php
namespace Database;

include "./autoload.php";

use PDO;
// use PDOException;

class test extends Database {
    public function test () {
        $sql = "SELECT * FROM users WHERE id = 8 ";
        $stmt = $this->executeStatement($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    }
}

$s = new test();
$s->test();