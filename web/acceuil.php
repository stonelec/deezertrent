<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link href="style.css" rel="stylesheet">

    <!--    Bootstrap    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!--    font-->
    <link href="https://fonts.cdnfonts.com/css/marianne" rel="stylesheet">
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
            <div>
                <a class="profil d-flex flex-row" href="../test.php"  style="display:block;width:100%;height:100%;">
                    <h2>Profil</h2>
                    <span class="material-symbols-outlined" style="font-size: 2.5rem; margin-left: 10px">account_circle</span>

                </a>
            </div>
        </div>
        <!--    Contenu----------------------------------------------------------------------------------->
        <div class="contenu d-flex flex-column">

        </div>
        <!--    Sound----------------------------------------------------------------------------------->
        <div class="sound d-flex flex-row">
            <div class="edit d-flex flex-column">
                <div class="play d-flex flex-row">
                    <p>play</p>
                    <p>play</p>
                    <p>play</p>
                </div>
                <div class="progres d-flex flex-row">
                    <p>progres</p>
                    <p>progres</p>
                </div>
            </div>
            <div class="volume d-flex flex-column">
                <div class="volume-edit">
                    <p>volume</p>
                </div>
            </div>
        </div>
    </div>


</div>

</body>
</html>