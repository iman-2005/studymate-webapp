<?php

require_once __DIR__ . '/Database.php';

class BaseDAO {

protected $pdo;
protected $table;

public function __construct($table) {
$this->pdo = Database::getInstance()->getConnection();
$this->table = $table;
}

public function getAll() {
$stmt = $this->pdo->prepare("SELECT * FROM {$this->table}");
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getById($id) {
$stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
$stmt->execute([$id]);
return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function create(...$fields) {
$placeholders = implode(',', array_fill(0, count($fields), '?'));
$sql = "INSERT INTO {$this->table} VALUES (NULL, {$placeholders})";
$stmt = $this->pdo->prepare($sql);
$stmt->execute($fields);
return $this->pdo->lastInsertId();
}

public function update($id, $data) {
$columns = [];
$values = [];

foreach ($data as $key => $value) {
$columns[] = "{$key} = ?";
$values[] = $value;
}

$values[] = $id;

$sql = "UPDATE {$this->table} SET " . implode(', ', $columns) . " WHERE id = ?";
$stmt = $this->pdo->prepare($sql);
return $stmt->execute($values);
}

public function delete($id) {
$stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
return $stmt->execute([$id]);
}
}









