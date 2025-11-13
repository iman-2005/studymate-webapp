<?php

Flight::route('GET /modules', function(){
    $service = new ModulesService();
    Flight::json($service->getAll());
});

Flight::route('GET /modules/@id', function($id){
    $service = new ModulesService();
    Flight::json($service->getById($id));
});

Flight::route('POST /modules', function(){
    $data = Flight::request()->data->getData();
    $service = new ModulesService();
    Flight::json(['id' => $service->create($data)], 201);
});

Flight::route('PUT /modules/@id', function($id){
    $data = Flight::request()->data->getData();
    $service = new ModulesService();
    Flight::json(['updated' => $service->updateModule($id, $data)]);
});

Flight::route('DELETE /modules/@id', function($id){
    $service = new ModulesService();
    Flight::json(['deleted' => $service->delete($id)]);
});
