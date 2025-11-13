<?php

require_once __DIR__ . '/baseDAO.php';

class UsersDAO extends BaseDAO {
    public function __construct() {
        parent::__construct("users");
    }
}







