<?php
ini_set ("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

Flight::set('flight.base_url', '/StudyMate_project/Backend/api');

/* ==========================================
LOAD DAO LAYER
========================================== */
require_once __DIR__ . '/dao/UsersDAO.php';
require_once __DIR__ . '/dao/CoursesDAO.php';
require_once __DIR__ . '/dao/ModulesDAO.php';
require_once __DIR__ . '/dao/NotesDAO.php';
require_once __DIR__ . '/dao/RolesDAO.php';

/* ==========================================
LOAD SERVICE LAYER
========================================== */
require_once __DIR__ . '/services/BaseService.php';
require_once __DIR__ . '/services/UsersService.php';
require_once __DIR__ . '/services/CoursesService.php';
require_once __DIR__ . '/services/ModulesService.php';
require_once __DIR__ . '/services/NotesService.php';
require_once __DIR__ . '/services/RolesService.php';

/* ==========================================
LOAD ROUTES
========================================== */
require_once __DIR__ . '/routes/UsersRoutes.php';
require_once __DIR__ . '/routes/CoursesRoutes.php';
require_once __DIR__ . '/routes/ModulesRoutes.php';
require_once __DIR__ . '/routes/NotesRoutes.php';
require_once __DIR__ . '/routes/RolesRoutes.php';

/* ==========================================
SWAGGER UI (Lab required)
========================================== */

// Swagger UI page
Flight::route('GET /swagger', function() {
readfile(__DIR__ . '/public/swagger.php');
});

// OpenAPI JSON
Flight::route('GET /api_documentation.json', function() {
header('Content-Type: application/json');
readfile(__DIR__ . '/public/api_documentation.json');
});

/* ==========================================
START APPLICATION
========================================== */
Flight::start();












