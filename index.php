<?php
ob_start(); // Démarre la mise en tampon de sortie
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        *{
            color: white;
            border:0px;

        }
        .logoSize{
            width: 30%;
        }
        .NoBorder{
            border:none;
        }

        body{
            background-color:#121212;
        }
        .backBlack{
            background-color: #121212
        }
        .color-DC3545{
            background-color:#DC3545 ;
            border: none;
        }
        .color-DC3545:hover{
            color: #121212;
            background-color: white;
            transition: 0.4s ease-in-out;
            transform: scale(1.01);
        }

        .textColor-DC3545 {
            color: #DC3545;

        }
        .textColor-DC3545:hover {
            color: white;

        }

        .underline{
            text-decoration: underline;
        }

    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card NoBorder">
                <div class="card-header backBlack">
                    <img class="d-block mx-auto logoSize" src="web/images/logo.png">
                    <h3 class="text-center">Bienvenue sur <br>Deezertrent</h3>
                    <p class="text-center">Content de te revoir !</p>
                    <p class="text-center">Veuillez entrer vos coordonnées.</p>
                </div>
                <div class="card-body backBlack">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block color-DC3545" name="submit">Se connecter</button>
                    </form>
                </div>
            </div>
            <div class="card NoBorder">
                <div class="card-header backBlack">
                    <p class="text-center textColor-DC3545"><a class="textColor-DC3545 underline" href="web/register.php">Creer un compte !</a></p>
                </div>
            </div>
        </div>
    </div>

<?php
// login
session_start();

require_once('php/database.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = database::connexionBD();
    $query = "SELECT * FROM utilisateur WHERE email= ? ;";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) == 1) {
        if (password_verify($password, $result[0]['mot_de_passe'])) {
            $_SESSION['user_id'] = $result[0]['id_user'];
            //echo "<h1 style='font-size: 100px;color: white'>".$_SESSION['user_id']."</h1>";
            header("Location: web/acceuil.php");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Email incorrect.";
    }
}
?>
</body>
</html>
