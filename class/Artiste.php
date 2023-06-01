<?php

require_once("database.php");
session_start();

    class artiste {

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
    }
?>
