<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/ModulesDAO.php';

class ModulesService extends BaseService {
    public function __construct() {
        parent::__construct(new ModulesDAO());
    }

    public function create($data) {
        if (empty($data['title'])) {
            throw new Exception("Module title is required.");
        }
        if (empty($data['course_id'])) {
            throw new Exception("Each module must belong to a course.");
        }
        return $this->dao->create($data['title'], $data['content'], $data['course_id']);
    }

    public function updateModule($id, $data) {
        return $this->dao->update($id, $data);
    }
}
?>

