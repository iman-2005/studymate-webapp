<?php

Flight::route('GET /notes', function(){
    $service = new NotesService();
    Flight::json($service->getAll());
});

Flight::route('GET /notes/@id', function($id){
    $service = new NotesService();
    Flight::json($service->getById($id));
});

Flight::route('POST /notes', function(){
    $data = Flight::request()->data->getData();
    $service = new NotesService();
    Flight::json(['id' => $service->create($data)], 201);
});

Flight::route('PUT /notes/@id', function($id){
    $data = Flight::request()->data->getData();
    $service = new NotesService();
    Flight::json(['updated' => $service->updateNote($id, $data)]);
});

Flight::route('DELETE /notes/@id', function($id){
    $service = new NotesService();
    Flight::json(['deleted' => $service->delete($id)]);
});
