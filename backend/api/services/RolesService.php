<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/RolesDAO.php';

class RolesService extends BaseService {
    public function __construct() {
        parent::__construct(new RolesDAO());
    }

    public function create($data) {
        if (empty($data['name'])) {
            throw new Exception("Role name cannot be empty.");
        }
        return $this->dao->create($data['name']);
    }

    public function updateRole($id, $data) {
        return $this->dao->update($id, $data);
    }
}
?>

