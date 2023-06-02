<?php
require_once ('../php/database.php');

class Playlist{

    // Get all the information about album
    public static function playlist_info(){
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT * FROM playlist';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

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
}
