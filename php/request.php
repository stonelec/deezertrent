<?php

    require_once('database.php');
    require_once ('../class/Search.php');
    require_once ('../class/Playlist.php');
    require_once ('../class/User.php');


session_start();
// Database connection.
$db = Database::connexionBD();
if (!$db) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = explode('/', substr($_SERVER['PATH_INFO'], 1));
$requestResource = array_shift($request);

$data = false;
$id = array_shift($request);
if ($id == '') {
        $id = null;
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
            }elseif ($requestResource == "playlist") {
            $data =Playlist::playlist_info($_SESSION['user_id']);
        }
        elseif ($requestResource == "historique") {
            $data =User::user_history($_SESSION['user_id']);
        }
        else {
            http_response_code(400);
            exit();
        }
            break;
        case 'PUT':
            if ($requestResource == "profil") {
                $put = json_decode(file_get_contents('php://input'), true);
                $nom = $put['nom'];
                $prenom = $put['prenom'];
                $datenaissance = $put['datenaissance'];
                $email = $put['email'];
                $password = $put['password'];
                $success = User::ModifUserInfo($_SESSION['user_id'], $nom, $prenom, $datenaissance, $email, $password);
                $data =$success;
            } else {
                http_response_code(400);
                exit();
            }
            break;

    }

    echo json_encode($data);
    exit;

?>
