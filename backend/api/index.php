<?php
require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DAO
require_once __DIR__ . '/dao/UsersDAO.php';

// SERVICES
require_once __DIR__ . '/services/UsersService.php';

// ROUTES
require_once __DIR__ . '/routes/UsersRoutes.php';

// SWAGGER
Flight::route('GET /swagger', function(){
    readfile(__DIR__ . '/public/swagger.html');
});

Flight::route('GET /api_documentation.json', function(){
    header("Content-Type: application/json");
    readfile(__DIR__ . "/public/api_documentation.json");
});

Flight::start();











