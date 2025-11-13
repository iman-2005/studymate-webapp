<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/NotesDAO.php';

class NotesService extends BaseService {
    public function __construct() {
        parent::__construct(new NotesDAO());
    }

    public function create($data) {
        if (empty($data['content'])) {
            throw new Exception("Note content cannot be empty.");
        }
        if (empty($data['user_id']) || empty($data['course_id'])) {
            throw new Exception("Note must have both user_id and course_id.");
        }
        return $this->dao->create($data['user_id'], $data['course_id'], $data['content']);
    }

    public function updateNote($id, $data) {
        return $this->dao->update($id, $data);
    }
}
?>

