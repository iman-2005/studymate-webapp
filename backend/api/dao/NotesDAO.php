<?php
require_once "Database.php";
require_once 'BaseDAO.php';


class NotesDAO extends BaseDAO {
  private $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance();
  }

  // CREATE
  public function create($user_id, $course_id, $content) {
    $sql = "INSERT INTO notes (user_id, course_id, content) VALUES (?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$user_id, $course_id, $content]);
    return $this->pdo->lastInsertId();
  }

  // READ all
  public function getAll() {
    $stmt = $this->pdo->query("SELECT id, user_id, course_id, content FROM notes");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // READ by ID
  public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT id, user_id, course_id, content FROM notes WHERE id = ?");
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
    $sql = "UPDATE notes SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($values);
  }

  // DELETE
  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
?>


