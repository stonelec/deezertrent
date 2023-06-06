<?php
require_once ('../php/database.php');

class Playlist{

    // Get all the information about playlist

    public static function playlist_info($id){
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT * FROM playlist where id_user=?;';
            $stmt = $conn->prepare($sql);
            $stmt->execute([intval($id)]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    // Get all the data of a playlist
    public static function playlist_detail($id_user, $id_playlist){
        try {
            $conn = Database::connexionBD();
            $sql = "SELECT p.id_playlist, p.nom_playlist, p.date_creation, t.*, a.image_album, ar.nom_artiste, c.date_ajout FROM playlist p
                    JOIN comprendre c ON c.id_playlist = p.id_playlist
                    JOIN track t ON c.id_track = t.id_track
                    JOIN album a ON a.id_album = t.id_album
                    JOIN artiste ar ON ar.id_artiste = a.id_artiste
                    WHERE p.id_user=? AND p.id_playlist = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_user, $id_playlist]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    public static function addtofavoris($idtrack, $iduser) {
        try {
            $conn = Database::connexionBD();
            $sql = "SELECT id_playlist FROM playlist WHERE nom_playlist='Favoris' and id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$iduser]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



            if (!empty($result)) {
                $idPlaylist = $result[0]['id_playlist'];

                $sql = "INSERT INTO comprendre (id_track, id_playlist, date_ajout) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $timestamp = date("Y-m-d H:i:s.u");

                $stmt->execute([$idtrack, $idPlaylist, $timestamp]);
                return true;
            } else {
                return false; // Ajoutez ici le code approprié en cas d'absence de playlist "Favoris"
            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    public static function deltrack($idplaylist, $idtrack) {
        try {
            $conn = Database::connexionBD();
            $sql = 'DELETE FROM comprendre WHERE id_playlist = ? AND id_track = ?;';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idplaylist, $idtrack]);
            return true;

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }


    // Get the playlist's name
    public static function name($id){
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT nom_playlist FROM playlist WHERE id_playlist = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nom_playlist'];

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    // Get the playlist's creation date
    public static function date_creation($id){
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT date_creation FROM playlist WHERE id_playlist = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['date_creation'];

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    // Get the addition date of a track in a playlist
    public static function date_ajout($id_playlist, $id_track)
    {
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT co.date_ajout as dateA FROM comprendre co
                    JOIN playlist p ON co.id_playlist = p.id_playlist
                    JOIN track t ON co.id_track = t.id_track
                    WHERE co.id_playlist = :id_p AND co.id_track = :id_t';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_p', $id_playlist);
            $stmt->bindParam(':id_t', $id_track);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['dateA'];

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

    }

    public static function add_playlist($nom){
        try {
            $conn = Database::connexionBD();
            $sql = "INSERT INTO playlist (nom_playlist, date_creation, id_user)
                    VALUES
                        (:nom, :dateC, :id_user);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $date = date('Y-m-d');
            $stmt->bindParam(':dateC', $date );
            $stmt->bindParam(':id_user', $_SESSION['id_user']);
            $stmt->execute();
        }catch (PDOException $exception){
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    public static function del_playlist($id_playlist){
        try {
            $conn = Database::connexionBD();
            $sql = 'DELETE FROM playlist
                    WHERE id_playlist = :id
                    CASCADE';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_playlist);
            $stmt->execute();
        }catch (PDOException $exception){
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }
}
