<?php

class BaseDAO {
    protected $pdo;
    protected $table;

    public function __construct($table) {
        $this->table = $table;

        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=studymate;charset=utf8mb4", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("DATABASE ERROR: " . $e->getMessage());
        }
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
        $placeholders = implode(",", array_fill(0, count($fields), "?"));
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} VALUES (NULL, {$placeholders})");
        $stmt->execute($fields);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data) {
        $columns = [];
        $values = [];

        foreach ($data as $key => $value) {
            $columns[] = "$key = ?";
            $values[] = $value;
        }

        $values[] = $id;

        $query = "UPDATE {$this->table} SET " . implode(",", $columns) . " WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($values);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}







