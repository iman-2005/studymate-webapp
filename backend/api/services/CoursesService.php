<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/CoursesDAO.php';

class CoursesService extends BaseService {
    public function __construct() {
        parent::__construct(new CoursesDAO());
    }

    public function create($data) {
        if (empty($data['title']) || strlen($data['title']) < 3) {
            throw new Exception("Course title must be at least 3 characters long.");
        }
        return $this->dao->create($data['title'], $data['description']);
    }

    public function updateCourse($id, $data) {
        return $this->dao->update($id, $data);
    }
}
?>

