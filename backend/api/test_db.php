<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "dao/Database.php";

try {
  $pdo = Database::getInstance();
  echo "<h2 style='color:green'> Database connection successful!</h2>";
} catch (Exception $e) {
  echo "<h2 style='color:red'> Connection failed:</h2> " . $e->getMessage();
}
?>

