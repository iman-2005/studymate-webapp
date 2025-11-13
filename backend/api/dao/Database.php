<?php
require_once 'BaseDAO.php';

class Database extends BaseDAO{
  private static $instance = null;
  private $pdo;

  private function __construct() {
    $host = 'localhost';
    $db   = 'studymate';
    $user = 'root'; // default for XAMPP
    $pass = '';     // leave empty unless you set a password
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $this->pdo = new PDO($dsn, $user, $pass, $options);
  }

  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance->pdo;
  }
}
?>
