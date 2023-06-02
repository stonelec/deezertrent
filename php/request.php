<?php

    require_once('database.php');


// Database connection.
$db = dbConnect();
if (!$db) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestResource = array_shift($request);

    if($requestResource == 'search'){
        $data = false;
        $id = array_shift($request);



        // Send data to the client.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('HTTP/1.1 201 Created');

        echo json_encode($data);
        exit;


    }
    if($requestResource == 'tarck'){
        $data = false;
        $id = array_shift($request);



        // Send data to the client.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('HTTP/1.1 201 Created');

        echo json_encode($data);
        exit;
    }
    if($requestResource == 'artist'){
        $data = false;
        $id = array_shift($request);



        // Send data to the client.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('HTTP/1.1 201 Created');

        echo json_encode($data);
        exit;
    }
    if($requestResource == 'album'){
        $data = false;
        $id = array_shift($request);



        // Send data to the client.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('HTTP/1.1 201 Created');

        echo json_encode($data);
        exit;


    }else{
        header('HTTP/1.1 400 Bad request');
        exit;
    }