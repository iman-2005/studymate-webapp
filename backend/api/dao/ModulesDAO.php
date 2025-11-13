<?php
require_once "Database.php";
require_once 'BaseDAO.php';


class ModulesDAO extends BaseDAO{
  private $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance();
  }

  // CREATE
  public function create($title, $content, $course_id) {
    $sql = "INSERT INTO modules (title, content, course_id) VALUES (?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$title, $content, $course_id]);
    return $this->pdo->lastInsertId();
  }

  // READ all
  public function getAll() {
    $stmt = $this->pdo->query("SELECT id, title, content, course_id FROM modules");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // READ by ID
  public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT id, title, content, course_id FROM modules WHERE id = ?");
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
    $sql = "UPDATE modules SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($values);
  }

  // DELETE
  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM modules WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
?>

