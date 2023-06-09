<?php

require_once ('../php/database.php');
//session_start();

class User{
    // Get the user's data

    // Get all the information about user
    public static function user_info($id){
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT * FROM utilisateur
                    WHERE id_user = :id';
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

    public static function ModifUserInfo($id, $nom, $prenom, $datenaissance, $email, $password)
    {
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $db = database::connexionBD();
        $query = "UPDATE utilisateur SET nom=?, prenom=?, date_de_naissance=?, email=?, mot_de_passe=? WHERE id_user=?;";
        $stmt = $db->prepare($query);
        $stmt->execute([$nom, $prenom, $datenaissance, $email, $hashpassword, $id]);
        return true;
    }

    public static function change_image($iduser,$file){
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        move_uploaded_file($file_tmp, "/images/" . $file_name);
        $conn = Database::connexionBD();
        $sql = 'UPDATE utilisateur SET image_user= ? WHERE id_user=?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$file_name,$iduser]);
    }


    public static function user_history($id)
    {
        try {
            $conn = Database::connexionBD();
            $sql = "SELECT id_playlist FROM playlist where id_user=? and nom_playlist='Historique';";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sql = "SELECT t.* ,a.titre_album, a.image_album, a.date_parution, s.nom_style, ar.nom_artiste, a.id_album, ar.id_artiste FROM comprendre c
    LEFT JOIN track t on t.id_track=c.id_track
    LEFT JOIN album a on a.id_album=t.id_album
    LEFT JOIN style_a s on s.id_style=a.id_style
    LEFT JOIN artiste ar on ar.id_artiste=a.id_artiste  
WHERE c.id_playlist=?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$result[0]['id_playlist']]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
          
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }
    public static function user_history_id($id)
    {
        try {
            $conn = Database::connexionBD();
            $sql = "SELECT id_playlist FROM playlist
                    WHERE id_user = :id AND nom_playlist = 'Historique'";
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

    // Get the user's name
    public static function name($id_user) {
        try {
            $conn = Database::connexionBD();
            $sql = 'SELECT nom FROM utilisateur WHERE id_user = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_user);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nom'];

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

    }

    // Get the user's first name
    public static function prenom($id_user) {
        try {
            $conn = Database::connexionBD();
            if($conn){
                $sql = 'SELECT prenom FROM utilisateur WHERE id_user = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_client', $id_user);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['prenom'];
            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }

    // Get the user's email
    public static function mail($id_user) {
        try {
            $conn = Database::connexionBD();
            if($conn){
                $sql = 'SELECT email FROM utilisateur WHERE id_user = :id';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id_user);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['email'];
            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }


    //Modification of user's data
    // Modify the user's name
    static function change_name($id){
        if(!empty($_POST)){
            $name = $_POST['name'];
        }

        $conn = Database::connexionBD();
        if(!$conn){
            return false;
        }
        try {
            $stmt = $conn->prepare('UPDATE utilisateur
                                            SET nom= :nom
                                            WHERE id_user= :id');
            $stmt->bindParam(':nom', $name);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }

    // Modify the user's first name
    static function change_prenom($id){
        if(!empty($_POST)){
            $prenom = $_POST['prenom'];
        }

        $conn = Database::connexionBD();
        if(!$conn){
            return false;
        }
        try {
            $stmt = $conn->prepare('UPDATE utilisateur
                                            SET prenom= :prenom
                                            WHERE id_user= :id');
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }

    // Modify the user's email
    static function change_mail($id){
        if(!empty($_POST)){
            $mail = $_POST['mail'];
        }

        $conn = Database::connexionBD();
        if(!$conn){
            return false;
        }
        try {
            $stmt = $conn->prepare('UPDATE utilisateur
                                            SET email= :mail
                                            WHERE id_user= :id');
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }

    // Modify the user's email
    static function change_photo($id){
        if(!empty($_POST)){
            $photo = $_POST['photo'];
        }

        $conn = Database::connexionBD();
        if(!$conn){
            return false;
        }
        try {
            $stmt = $conn->prepare('UPDATE utilisateur
                                            SET image_user= :photo
                                            WHERE id_user= :id');
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }

    // Modify the user's password
    static function change_pwd($id){
        if(!empty($_POST)){
            $pwd = $_POST['pwd'];
            $verif_pwd = $_POST['verif_pwd'];
                }

        $conn = Database::connexionBD();
        if(!$conn){
            return false;
        }
        try{
            $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);
            $pwd_verif_hash = password_hash($verif_pwd, PASSWORD_BCRYPT);

            if($pwd_hash == $pwd_verif_hash){
                $stmt = $conn->prepare('UPDATE utilisateur
                                                SET mot_de_passe= :mdp
                                                 WHERE id= :id');
                $stmt->bindParam(':mdp', $pwd);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            }else{
                return false;
            }
        }catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return false;
    }


    // Disconnect the user of the application
    static function disconnect() {

        unset($_SESSION['id_client']);

    }
}
