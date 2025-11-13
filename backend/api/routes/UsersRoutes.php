<?php

require_once __DIR__ . '/../services/UsersService.php';

Flight::route('GET /users', function() {
    $service = new UsersService();
    Flight::json($service->getAll());
});

Flight::route('GET /users/@id', function($id) {
    $service = new UsersService();
    Flight::json($service->getById($id));
});

Flight::route('POST /users', function() {
    $data = Flight::request()->data->getData();
    $service = new UsersService();
    Flight::json(["id" => $service->create($data)], 201);
});

Flight::route('PUT /users/@id', function($id) {
    $data = Flight::request()->data->getData();
    $service = new UsersService();
    Flight::json(["updated" => $service->update($id, $data)]);
});

Flight::route('DELETE /users/@id', function($id) {
    $service = new UsersService();
    Flight::json(["deleted" => $service->delete($id)]);
});

