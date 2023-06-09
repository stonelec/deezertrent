<?php
require_once ('../php/database.php');

    class Track{
        // Get all the information about tracks
        public static function tracks_info(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT * FROM track t
                        JOIN album a ON t.id_album = a.id_album
                        JOIN artiste ar ON ar.id_artiste = a.id_artiste';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }


        public static function track_info($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT t.* ,a.titre_album, a.image_album, a.date_parution, s.nom_style, ar.nom_artiste, a.id_album, ar.id_artiste 
                        FROM track t LEFT JOIN album a on a.id_album=t.id_album
                        LEFT JOIN style_a s on s.id_style=a.id_style
                        LEFT JOIN artiste ar on ar.id_artiste=a.id_artiste 
                        WHERE id_track=?;';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the track's name
        public static function name($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT titre_track FROM track WHERE id_track = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['titre_track'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the duration of the track
        public static function time($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT duree FROM track WHERE id_track = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['duree'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get the link to listen the track
        public static function link($id){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT lien_track FROM track WHERE id_track = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['lien_track'];

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        // Get all the tracks name
        public static function tracks(){
            try {
                $conn = Database::connexionBD();
                $sql = 'SELECT titre_track FROM track t';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        public static function add_track($id_track, $id_playlist){
            try {
                $conn = Database::connexionBD();

                $sql = "INSERT INTO comprendre (id_track, id_playlist, date_ajout)
                        VALUES
                        (:idT, :idP, CURRENT_TIMESTAMP)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idT', $id_track);
                $stmt->bindParam(':idP', $id_playlist);
                $stmt->execute();
            }catch (PDOException $exception){
                error_log('Connection error: ' . $exception->getMessage());
            }
            return false;
        }

        public static function id_history($id_user){
            try{
                $conn = Database::connexionBD();
                $sql ="SELECT id_playlist FROM playlist
                        WHERE id_user = :id AND nom_playlist = 'Historique'";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id_user);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }
        }

        public static function update_history($id_user, $id_track){
            try{
                $id_history = Track::id_history($id_user);
                $conn = Database::connexionBD();
                $sql = "DELETE FROM comprendre WHERE id_track=? and id_playlist=?;";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id_track,$id_history['id_playlist']]);
                $sql = "INSERT INTO comprendre (id_track, id_playlist, date_ajout)
                        VALUES
                        (:idT, :idP, CURRENT_TIMESTAMP)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idT', $id_track);
                $stmt->bindParam(':idP', $id_history['id_playlist']);
                $stmt->execute();
            }catch (PDOException $exception){
                error_log('Connection error: ' . $exception->getMessage());
            }
        }

    }