<?php
ob_start(); // Démarre la mise en tampon de sortie
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        * {
            color: white;
            border: 0px;
        }

        .logoSize {
            width: 30%;
        }

        .NoBorder {
            border: none;
        }

        .cardSize {
            width: 70%;
        }

        body {
            background-color: #121212;
        }

        .backBlack {
            background-color: #121212;
        }

        .color-DC3545 {
            background-color: #DC3545;
            border: none;
        }

        .color-DC3545:hover {
            color: #121212;
            background-color: white;
            transition: 0.4s ease-in-out;
            transform: scale(1.01);
        }

        .textColor-DC3545 {
            color: #DC3545;

        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card NoBorder">
                <div class="card-header backBlack">
                    <img class="d-block mx-auto logoSize" src="../logo.png" alt="Logo">
                    <h3 class="text-center">Bienvenue parmi nous</h3>
                    <p class="text-center">Content de te revoir !</p>
                    <p class="text-center">Veuillez entrer vos coordonnées.</p>
                </div>
                <div class="card-body backBlack">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="nom">Nom <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                        </div>
                        <div class="form-group">
                            <label for="datenaissance">Date de naissance <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="date" class="form-control" id="datenaissance" name="datenaissance" placeholder="Entrez votre date de naissance" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                        </div>
                        <div class="form-group">
                            <label for="emailconf">Confirmation de l'email <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="email" class="form-control" id="emailconf" name="emailconf" placeholder="Entrez à nouveau votre email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordconf">Confirmation du mot de passe <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>
                            <input type="password" class="form-control" id="passwordconf" name="passwordconf" placeholder="Entrez à nouveau votre mot de passe" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block color-DC3545" name="inscription" value="Se connecter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../php/database.php');

if (isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datenaissance = $_POST['datenaissance'];
    $email = $_POST['email'];
    $emailconf = $_POST['emailconf'];
    $password = $_POST['password'];
    $passwordconf = $_POST['passwordconf'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $image = '';
    if ($password == $passwordconf && $email == $emailconf) {
        $db = database::connexionBD();
        $query = "INSERT INTO utilisateur (nom, prenom, date_de_naissance, email, mot_de_passe, image_user) 
              VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$nom,$prenom,$datenaissance,$email,$hashpassword,'']);
        header('Location: ../index.php');

    }else{
        echo '
        <div class="card NoBorder">
                <div class="card-header backBlack">
                    <p class="text-center textColor-DC3545">Mot de passe ou Email non similaire !</p>
                </div>
                ';

    }


}
?>
</body>
</html>