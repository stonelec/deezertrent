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

    $data = false;
    $id = array_shift($request);
    if ($id == null) {
        $id = '';
    }

    switch ($requestMethod) {
        case 'GET':
            if ($requestResource == "playlist") {
                $data =  json_encode(Playlist::playlist_info($_SESSION['user_id']));
            } elseif ($requestResource == "profil") {
                $data =  json_encode(User::user_info($_SESSION['user_id']));
            } elseif($requestResource == 'search'){
                if(isset($_GET['key'])){
                    $data =  json_encode(Search::all_search($_GET['key']));
                }
                // Test pour les fiches infos
            }elseif($requestResource == "artiste"){
                $data =  json_encode(Artiste::artist_info($_GET['id_artiste']));
            }elseif ($requestResource == "track"){
                $data =  json_encode(Track::track_info($_GET['id_track'], $_GET['id_album']));
            }elseif ($requestResource    == "album"){
                $data =  json_encode(Album::album_info($_GET['id_album']));
            }elseif ($requestResource == "test") {
                $data =  json_encode([["id" => 1, "nom" => "test1"], ["id" => 2, "nom" => "test2"]]);
            }else {
                http_response_code(400); /* Bad request*/
                break;
            }
            break;
        default:
            http_response_code(405); /* Method not allowed*/
            break;
    }


        // Send data to the client.
//        header('Content-Type: application/json; charset=utf-8');
//        header('Cache-control: no-store, no-cache, must-revalidate');
//        header('Pragma: no-cache');
//        header('HTTP/1.1 201 Created');

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
*/
        echo json_encode($data);
        exit;

