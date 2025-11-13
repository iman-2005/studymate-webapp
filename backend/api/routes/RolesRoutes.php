<?php

Flight::route('GET /roles', function(){
    $service = new RolesService();
    Flight::json($service->getAll());
});

Flight::route('GET /roles/@id', function($id){
    $service = new RolesService();
    Flight::json($service->getById($id));
});

Flight::route('POST /roles', function(){
    $data = Flight::request()->data->getData();
    $service = new RolesService();
    Flight::json(['id' => $service->create($data)], 201);
});

Flight::route('PUT /roles/@id', function($id){
    $data = Flight::request()->data->getData();
    $service = new RolesService();
    Flight::json(['updated' => $service->updateRole($id, $data)]);
});

Flight::route('DELETE /roles/@id', function($id){
    $service = new RolesService();
    Flight::json(['deleted' => $service->delete($id)]);
});
