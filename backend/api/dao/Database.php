<?php

class Database {
// Singleton instance
private static $instance = null;


protected $pdo;


private $host = "localhost";
private $user = "root";
private $pass = "";
private $db = "studymate";


private function __construct() {
try {
$dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
$this->pdo = new PDO($dsn, $this->user, $this->pass);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
die("DB ERROR: " . $e->getMessage());
}
}

// Singleton accessor
public static function getInstance() {
if (self::$instance === null) {
self::$instance = new Database();
}
return self::$instance;
}


public function getConnection() {
return $this->pdo;
}
}