<?php
require_once "Database.php";

class UsersDAO {
  private $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance();
  }

  // CREATE
  public function create($name, $email, $password, $role_id = 1) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$name, $email, $hashed, $role_id]);
    return $this->pdo->lastInsertId();
  }

  // READ all
  public function getAll() {
    $stmt = $this->pdo->query("SELECT id, name, email, role_id FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // READ by ID
  public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT id, name, email, role_id FROM users WHERE id = ?");
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
    $sql = "UPDATE users SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($values);
  }

  // DELETE
  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
?>


