<?php
require_once "Database.php";

class RolesDAO {
  private $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance();
  }

  // CREATE
  public function create($name) {
    $sql = "INSERT INTO roles (name) VALUES (?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$name]);
    return $this->pdo->lastInsertId();
  }

  // READ all
  public function getAll() {
    $stmt = $this->pdo->query("SELECT id, name FROM roles");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // READ by ID
  public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT id, name FROM roles WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // UPDATE
  public function update($id, $fields) {
    $set = [];
    $values = [];
    foreach ($fields as $key => $value) {
      $set[] = "$key = ?";
      $values[] = $value;
    }
    $values[] = $id;
    $sql = "UPDATE roles SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($values);
  }

  // DELETE
  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM roles WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
?>

