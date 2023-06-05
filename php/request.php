<?php

require_once('database.php');
require_once ('../class/Playlist.php');
require_once ('../class/User.php');


session_start();
// Database connection.
$db = Database::connexionBD();
if (!$db) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', substr($_SERVER['PATH_INFO'], 1));
$requestResource = array_shift($request);

$id = array_shift($request);
if ($id == '') {
    $id = NULL;
}


switch ($method) {
    case 'GET':
        if ($requestResource == "playlist") {
            echo json_encode(Playlist::playlist_info($_SESSION['user_id']));
        }
        elseif ($requestResource == "profil") {
            echo json_encode(User::user_info($_SESSION['user_id']));
        }
        elseif ($requestResource == "historique") {
            echo json_encode(User::user_history($_SESSION['user_id']));
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
            echo json_encode($success);
        } else {
            http_response_code(400);
            exit();
        }
        break;

    /*
        case 'POST':
            if ($id === NULL && $requestResource == "tweets") {
                $login = $_POST['login'];
                $text = $_POST['text'];
                var_dump($id);
                echo json_encode(dbAddTweet($db, $login, $text));
            } else {
                http_response_code(400);
                exit();
            }
            break;

        case 'PUT':
            if ($id !== NULL && $requestResource == "tweets") {
                parse_str(file_get_contents("php://input"), $put);
                $login = $put['login'];
                $text = $put['text'];
                echo json_encode(dbModifyTweet($db, $id, $login, $text));
            } else {
                http_response_code(400);
                exit();
            }
            break;

        case 'DELETE':
            if ($id !== NULL && $requestResource == "tweets") {
                $login = $_GET['login'];
                echo json_encode(dbDeleteTweet($db, $id, $login));
            } else {
                exit();
            }
            break;*/

    default:
        http_response_code(405);
        exit();
}