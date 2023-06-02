<?php

require_once ('../php/database.php');
session_start();

    class Artiste {

        // Get all the information about artist
        public static function artist_info(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM artiste';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the artist's name
        public static function nom($id_artiste)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT nom_artiste FROM artiste WHERE id_artiste = :id_artiste';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_artiste', $id_artiste);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['nom_artiste'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

        }

        // Get the type of the artist
        public static function type($id_artiste)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT art.nom_type as type FROM artiste a 
                        JOIN art ON art.id_type = a.id_type
                        WHERE a.id_artiste = :id_artiste';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_artiste', $id_artiste);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['type'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

        }

        // Get all the artists name
        public static function artists(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT nom_artiste FROM artiste a';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get all the track of an artist
        public static function track_artist($name)
        {
            try {
                $list_final = [];
                $conn = Database::connexionBD();
                $sql = 'SELECT t.titre_track ar.nom_artiste FROM album a
                        JOIN track t ON t.id_album = a.id_album
                        JOIN artiste ar ON ar.id_artiste = a.id_artiste';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $elt) {
                    if (substr_compare(strtolower($name), strtolower($elt['nom_artiste']), 0, count($name))) {
                        $list_final += $elt['nom_artiste'];
                    }
                }

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
            return false;
        }

        // Get all the albums af an artist
        public static function album_artist($name)
        {
            try {
                $list_final = [];
                $conn = Database::connexionBD();
                $sql = 'SELECT  a.titre_album, ar.nom_artiste FROM album a
                        JOIN artiste ar ON ar.id_artiste = a.id_artiste';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $elt) {
                    if (substr_compare(strtolower($name), strtolower($elt['nom_artiste']), 0, count($name))) {
                        $list_final += $elt['nom_artiste'];
                    }
                }
            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
            return false;
        }

    }
?>
