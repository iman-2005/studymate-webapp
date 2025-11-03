<?php
require 'vendor/autoload.php';

require_once 'dao/UsersDAO.php';
require_once 'dao/CoursesDAO.php';
require_once 'dao/ModulesDAO.php';
require_once 'dao/NotesDAO.php';
require_once 'dao/RolesDAO.php';

use flight\Engine;

$app = new Engine();
$app->set('flight.base_url', '/study'); // Fix za rute bez .htaccess


/* ============================================================
   USERS CRUD
============================================================ */
$app->route('GET /users', function() use ($app) {
    $dao = new UsersDAO();
    $app->json($dao->getAll());
});

$app->route('GET /users/@id', function($id) use ($app) {
    $dao = new UsersDAO();
    $app->json($dao->getById($id));
});

$app->route('POST /users', function() use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new UsersDAO();
    $id = $dao->create($body['name'], $body['email'], $body['password'], $body['role_id']);
    $app->json(['message' => 'User created', 'id' => $id]);
});

$app->route('PUT /users/@id', function($id) use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new UsersDAO();
    $dao->update($id, $body);
    $app->json(['message' => 'User updated']);
});

$app->route('DELETE /users/@id', function($id) use ($app) {
    $dao = new UsersDAO();
    $dao->delete($id);
    $app->json(['message' => 'User deleted']);
});


/* ============================================================
   COURSES CRUD
============================================================ */
$app->route('GET /courses', function() use ($app) {
    $dao = new CoursesDAO();
    $app->json($dao->getAll());
});

$app->route('GET /courses/@id', function($id) use ($app) {
    $dao = new CoursesDAO();
    $app->json($dao->getById($id));
});

$app->route('POST /courses', function() use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new CoursesDAO();
    $id = $dao->create($body['title'], $body['description']);
    $app->json(['message' => 'Course created', 'id' => $id]);
});

$app->route('PUT /courses/@id', function($id) use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new CoursesDAO();
    $dao->update($id, $body);
    $app->json(['message' => 'Course updated']);
});

$app->route('DELETE /courses/@id', function($id) use ($app) {
    $dao = new CoursesDAO();
    $dao->delete($id);
    $app->json(['message' => 'Course deleted']);
});


/* ============================================================
   MODULES CRUD
============================================================ */
$app->route('GET /modules', function() use ($app) {
    $dao = new ModulesDAO();
    $app->json($dao->getAll());
});

$app->route('GET /modules/@id', function($id) use ($app) {
    $dao = new ModulesDAO();
    $app->json($dao->getById($id));
});

$app->route('POST /modules', function() use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new ModulesDAO();
    $id = $dao->create($body['title'], $body['content'], $body['course_id']);
    $app->json(['message' => 'Module created', 'id' => $id]);
});

$app->route('PUT /modules/@id', function($id) use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new ModulesDAO();
    $dao->update($id, $body);
    $app->json(['message' => 'Module updated']);
});

$app->route('DELETE /modules/@id', function($id) use ($app) {
    $dao = new ModulesDAO();
    $dao->delete($id);
    $app->json(['message' => 'Module deleted']);
});


/* ============================================================
   NOTES CRUD
============================================================ */
$app->route('GET /notes', function() use ($app) {
    $dao = new NotesDAO();
    $app->json($dao->getAll());
});

$app->route('GET /notes/@id', function($id) use ($app) {
    $dao = new NotesDAO();
    $app->json($dao->getById($id));
});

$app->route('POST /notes', function() use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new NotesDAO();
    $id = $dao->create($body['user_id'], $body['course_id'], $body['content']);
    $app->json(['message' => 'Note created', 'id' => $id]);
});

$app->route('PUT /notes/@id', function($id) use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new NotesDAO();
    $dao->update($id, $body);
    $app->json(['message' => 'Note updated']);
});

$app->route('DELETE /notes/@id', function($id) use ($app) {
    $dao = new NotesDAO();
    $dao->delete($id);
    $app->json(['message' => 'Note deleted']);
});


/* ============================================================
   ROLES CRUD
============================================================ */
$app->route('GET /roles', function() use ($app) {
    $dao = new RolesDAO();
    $app->json($dao->getAll());
});

$app->route('GET /roles/@id', function($id) use ($app) {
    $dao = new RolesDAO();
    $app->json($dao->getById($id));
});

$app->route('POST /roles', function() use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new RolesDAO();
    $id = $dao->create($body['name']);
    $app->json(['message' => 'Role created', 'id' => $id]);
});

$app->route('PUT /roles/@id', function($id) use ($app) {
    $body = json_decode(file_get_contents('php://input'), true);
    $dao = new RolesDAO();
    $dao->update($id, $body);
    $app->json(['message' => 'Role updated']);
});

$app->route('DELETE /roles/@id', function($id) use ($app) {
    $dao = new RolesDAO();
    $dao->delete($id);
    $app->json(['message' => 'Role deleted']);
});


/* ============================================================
   START APP
============================================================ */
$app->start();
?>







