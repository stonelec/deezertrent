<?php

    require_once('database.php');
    require_once ('../class/Search.php');
    require_once ('../class/Playlist.php');
    require_once ('../class/User.php');
    require_once ('../class/Track.php');
    require_once ('../class/Artiste.php');
    require_once ('../class/Album.php');





session_start();
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
if ($id == '') {
        $id = null;
}

    switch ($requestMethod) {
        case 'GET':
            if ($requestResource == "profil") {
                $data =  User::user_info($_SESSION['user_id']);
            } elseif($requestResource == 'search'){
                if(isset($_GET['key'])){
                    $data =  Search::all_search($_GET['key']);
                }
            }elseif ($requestResource == "track"){
                $data =  Track::track_info($id);
            }
            elseif ($requestResource == "artiste") {
                $data = Artiste::artist_info($id);
            }
            elseif ($requestMethod == "favoris"){
                $data = Playlist::addtofavoris($_POST['idadd'],$_SESSION['user_id']);
            }
            elseif ($requestResource == "album"){
                $data =  Album::albums_fiche_info($id);
            }elseif($requestResource == "playlist" and isset($_GET['id_playlist']) ){
                $data = Playlist::playlist_detail($_SESSION['user_id'], $_GET['id_playlist']);
            } elseif ($requestResource == "playlist") {
                $data = Playlist::playlist_info($_SESSION['user_id']);
            } elseif ($requestResource == "historique") {
                $data = User::user_history($_SESSION['user_id']);
            } elseif ($requestResource == "historique_id") {
                $data = User::user_history_id($_SESSION['user_id']);
            }elseif($requestResource == "audio" and isset($_GET['id_track'])){
                $data = Track::track_info($_GET['id_track']);
                Track::update_history($_SESSION['user_id'], json_encode($data[0]['id_track']));   // Permet de faire l'historique mais avec
                                                                                                    // les deux fonction l'audio ne fonctoinne plus
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

        case 'POST' :
            if($requestResource == "image") {

                $file = $_FILES['imageuser'];
                $iduser = $_POST['iduserimage'];
                move_uploaded_file($file['tmp_name'], "../web/images/".$file['name']);

                $conn = Database::connexionBD();
                $sql = 'UPDATE utilisateur SET image_user = ? WHERE id_user = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$file['name'], $iduser]);
            }
            if(isset($_POST['nom_playlist'])) {
                if ($requestResource == "add_playlist") {

//                    echo("test");
                    $date = Playlist::add_playlist($_POST['nom_playlist'], $_SESSION['user_id']);

                }
            }
            elseif(isset($_POST['idadd'])){
                $data = Playlist::addtofavoris($_POST['idadd'],$_SESSION['user_id']);
            }

            elseif ($requestResource == "add_track"){

                $data =  Track::add_track($_POST['id_track'], $_POST['id_playlist']);
            }
            break;

        case 'DELETE':
            if(isset($_GET['idplaylistdel'])){
                $data = Playlist::del_playlist($_GET['idplaylistdel']);
            }
            if(isset($_GET['idplaylist']) and isset($_GET['idtrack'])){
                $data = Playlist::deltrack($_GET['idplaylist'],$_GET['idtrack']);
            }elseif(isset($_GET['id'])){
                $data = Playlist::del_playlist($_GET['id']);
            }
            break;

        }

    echo json_encode($data);
    exit;

?>
