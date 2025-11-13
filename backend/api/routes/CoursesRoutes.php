<?php

Flight::route('GET /courses', function(){
    $service = new CoursesService();
    Flight::json($service->getAll());
});

Flight::route('GET /courses/@id', function($id){
    $service = new CoursesService();
    Flight::json($service->getById($id));
});

Flight::route('POST /courses', function(){
    $data = Flight::request()->data->getData();
    $service = new CoursesService();
    Flight::json(['id' => $service->create($data)], 201);
});

Flight::route('PUT /courses/@id', function($id){
    $data = Flight::request()->data->getData();
    $service = new CoursesService();
    Flight::json(['updated' => $service->updateCourse($id, $data)]);
});

Flight::route('DELETE /courses/@id', function($id){
    $service = new CoursesService();
    Flight::json(['deleted' => $service->delete($id)]);
});
