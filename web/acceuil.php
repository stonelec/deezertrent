<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link href="style.css" rel="stylesheet">
    <script src="acceuil.js"></script>

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
                <a href="../test.php">
                    <div class="general-link d-flex flex-row">
                        <span class="material-symbols-outlined">home</span>
                        <p class="general-link-text">Accueil</p>
                    </div>
                </a>
                <a href="../test.php">
                    <div class="general-link d-flex flex-row">
                        <span class="material-symbols-outlined">search</span>
                        <p class="general-link-text">Recherche</p>
                    </div>
                </a>
                <a href="../test.php">
                    <div class="general-link d-flex flex-row" >
                        <span class="material-symbols-outlined">format_list_bulleted</span>
                        <p class="general-link-text" style="margin-bottom: 5px">Playlist</p>
                    </div>
                </a>
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
                <a class="nom-page" href="../test.php"><h1>Accueil</h1></a>
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
            <div class="edit d-flex flex-column align-items-center">
                    <div class="play d-flex justify-content-around align-items-center">
                    <span class="material-symbols-outlined play-icon-third">shuffle</span>
                    <span class="material-symbols-outlined play-icon-second">skip_previous</span>
                    <span class="material-symbols-outlined play-icon-first">play_circle</span>
                    <span class="material-symbols-outlined play-icon-second">skip_next</span>
                    <span class="material-symbols-outlined play-icon-third">laps</span>
                </div>
                <div class="progres d-flex flex-row justify-content-around align-items-center">
                    <div>00:0</div>
                    <div class="test">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                            <div class="progress-bar bg-danger" style="width: 25%"></div>
                        </div>
                    </div>
                    <div>03:4</div>
                </div>
            </div>
            <div class="volume d-flex flex-column ">
                <div class="volume-edit d-flex align-items-center ">
                    <div class="volume-logo">
                        <span class="material-symbols-outlined">volume_up</span>
                    </div>
                    <div class="volume-bar align-items-center">
                        <input type="range" min="0" max="100" value="10" class="slider" id="volume">
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</body>
</html>