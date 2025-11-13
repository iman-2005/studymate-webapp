<?php
require_once __DIR__ . '/../dao/UsersDAO.php';

class UsersService {
    private $dao;

    public function __construct() {
        $this->dao = new UsersDAO();
    }

    public function getAll() {
        return $this->dao->getAll();
    }

    public function getById($id) {
        return $this->dao->getById($id);
    }

    public function create($data) {

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            throw new Exception("Invalid email");

        if (strlen($data['password']) < 4)
            throw new Exception("Password too short");

        return $this->dao->create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => $data["password"],
            "role_id" => $data["role_id"]
        ]);
    }

    public function update($id, $data) {
        return $this->dao->update($id, $data);
    }

    public function delete($id) {
        return $this->dao->delete($id);
    }
}


