<?php

    require_once('database.php');
    require_once ('../class/Search.php');
    require_once ('../class/Playlist.php');


    // Database connection.
    $db = Database::connexionBD();
    if (!$db) {
        header('HTTP/1.1 503 Service Unavailable');
        exit;
    }

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestResource = array_shift($request);

    switch ($requestMethod) {
        case 'GET':
            if ($requestResource == "playlist") {
                echo json_encode(Playlist::playlist_info($_SESSION['user_id']));
            } elseif ($requestResource == "profil") {
                echo json_encode(User::user_info($_SESSION['user_id']));
            }

            elseif($requestResource == 'search'){
                $data = false;
                $id = array_shift($request);

                //if(isset($_GET['bar'])){
                    $data = Search::all_search($_GET['bar']);
                    echo json_encode($data);
                //}
            }
            else {
                http_response_code(400); /* Bad request*/
                exit();
            }
            break;
    }


        // Send data to the client.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('HTTP/1.1 201 Created');

        exit;

        /*
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

        */