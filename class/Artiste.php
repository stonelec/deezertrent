<?php

require_once ('../php/database.php');
//session_start();

    class Artiste {

        // Get all the information about artist

        public static function artists_info(){
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

        // Get all the information about one artist
        // Get all the information about one artist
        public static function artist_info($id) {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT ar.*, a.* FROM artiste a
                LEFT JOIN art ar ON ar.id_type = a.id_type
                WHERE id_artiste = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $sql = 'SELECT alb.* FROM artiste a
                LEFT JOIN album alb ON alb.id_artiste = a.id_artiste
                WHERE a.id_artiste = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
                $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $result['albums'] = $albums;
                $sql = 'SELECT t.* FROM track t
                    LEFT JOIN album alb on alb.id_album=t.id_album
                    LEFT JOIN artiste art on art.id_artiste=alb.id_artiste
WHERE art.id_artiste = ?;';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
                $titres = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $result['titre']=$titres;
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
        public static function track_artist($id)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM track t
                        JOIN album a ON t.id_album = a.id_album
                        JOIN artiste ar ON ar.id_artiste = a.id_artiste
                        WHERE ar.id_artiste = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $result;


            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }


        // Get all the album of an artist
        public static function album_artist($id)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM album a
                        JOIN artiste ar ON ar.id_artiste = a.id_artiste
                        WHERE ar.id_artiste = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }
    }
?>
