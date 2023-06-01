<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link href="style.css" rel="stylesheet">

    <!--    Bootstrap
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    -->
<!--    Icons google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<div class="global d-flex flex-row">
<!--    Navbar----------------------------------------------------------------------------------->
    <div class="menu d-flex flex-column ">
        <!--    logo----------------------------------------------------------------------------------->

        <div class="logo d-flex flex-column align-items-center">
            <img class="logo-image" src="images/img.png" alt="logo deezertrent">
            <p class="logo-text"  style="margin-top: -10px">Deezertrent</p>
        </div>
        <!--    link----------------------------------------------------------------------------------->
        <div class="links d-flex flex-column justify-content-center" >
            <div class="general d-flex flex-column ">
                <a href="../test.php"><p class="general-link">Accueil</p></a>
                <a href="../test.php"><p class="general-link">Recherche</p></a>
                <a href="../test.php"><p class="general-link">Playlist</p></a>
            </div>
            <div class="playlist d-flex flex-column ">
                <a href="../test.php"><p class="playlist-link">Favoris</p></a>
                <a href="../test.php"><p class="playlist-link">Playlist n°1</p></a>
                <a href="../test.php"><p class="playlist-link">Playlist pour dormir</p></a>
            </div>
        </div>
    </div>
    <div class="right d-flex flex-column" >
        <!--    Navbar TOP ----------------------------------------------------------------------------------->
        <div class="menu-top d-flex flex-row justify-content-between">
            <div>
                <a class="nom-page" href="../test.php"><h1>Acceuil</h1></a>
            </div>
            <!-- Div avec form de recherche -->
            <div>
                <form method="post" action="">
                    <input type="submit" name="recherche" value="🔍">
                    <label for="bar"></label>
                    <input type="text" id="bar" name="bar" placeholder="Recherche">
                </form>
            </div>

            <div>
                <a class="profil d-flex flex-row" href="../test.php"  style="display:block;width:100%;height:100%;">
                    <h2>Profil</h2>
                    <span class="material-symbols-outlined" style="font-size: 2.5rem; margin-left: 10px">account_circle</span>

                </a>
            </div>
        </div>
        <!--    Contenu----------------------------------------------------------------------------------->
        <div class="contenu d-flex flex-column">
            <!-- Resultats de la recherche -->
            <!-- <select name="type" id="type_choice">
                        <option value="type"> Type</option>
                        <option value="titre"> Titre</option>
                        <option value="artiste"> Artiste</option>
                        <option value="album"> Album</option>
                    </select>
                    -->
            <div>
                <?php
                require_once ('../class/Search.php');



                ?>
            </div>
        </div>
        <!-- Sound----------------------------------------------------------------------------------->
        <div class="sound d-flex flex-row">
            <div class="edit d-flex flex-column">
                <div class="play d-flex flex-row">
                    <span class="material-symbols-outlined">shuffle</span>
                    <span class="material-symbols-outlined">skip_previous</span>
                    <span class="material-symbols-outlined">play_circle</span>
                    <span class="material-symbols-outlined">skip_next</span>
                    <span class="material-symbols-outlined">laps</span>
                </div>
                <div class="progres d-flex flex-row">
                    <p>progres</p>
                    <p>progres</p>
                </div>
            </div>
            <div class="volume d-flex flex-column">
                <div class="volume-edit d-flex flex-row align-items-center">
                    <div class="volume-logo">
                        <span class="material-symbols-outlined">volume_up</span>
                    </div>
                    <div class="volume-bar">
                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px">
                            <div class="progress-bar bg-danger" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</body>
</html>