<?php
    require_once ('../php/database.php');

    class Album{
        // Get all the information about album

        public static function album_info(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM album';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get all the information about album

        public static function albums_info($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM album WHERE id_album';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the album's name
        public static function name($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT titre_album FROM album WHERE id_album = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['titre_album'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the album' s publication date
        public static function date($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT date_parution FROM album WHERE id_album = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['date_parution'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the link to  the album's image
        public static function image($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT image_album FROM album WHERE id_album = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['image_album'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }


        // Get the style of the album
        public static function style($id_album)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT s.nom_style as style FROM album a 
                    JOIN style_A s ON s.id_style = a.id_style
                    WHERE a.id_album = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id_album);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['style'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

        }

        // Get the album's artist
        public static function artist($id_album)
        {
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT ar.nom_artiste as name FROM album a 
                    JOIN artiste ar ON ar.id_artiste = a.id_artiste
                    WHERE a.id_album = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id_album);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['name'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

        }


        // Get all the track of the album
        public static function liste_track($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM track WHERE id_album = :id';
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

        // Get all the albums name
        public static function albums(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT titre_album FROM album a';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

    }