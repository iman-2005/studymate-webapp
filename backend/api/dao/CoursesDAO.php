<?php

require_once __DIR__ . '/BaseDAO.php';

class CoursesDAO extends BaseDAO {
public function __construct() {

parent::__construct("courses");
}
}

