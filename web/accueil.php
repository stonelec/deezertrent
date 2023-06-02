<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>deezertrent</title>
    <link href="style.css" rel="stylesheet">

    <!--    Bootstrap    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--    Icons Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--    Icons google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<!-- Simple lecture audio -->
<audio src="https://cdns-preview-b.dzcdn.net/stream/c-b53be55456ff326e9c2a7bf1d0abe601-6.mp3" autoplay muted></audio>


<body>
<div class="global d-flex flex-row">
    <!--    Navbar----------------------------------------------------------------------------------->
    <div class="menu d-flex flex-column justify-content-between">
        <div>
            <!--    logo----------------------------------------------------------------------------------->
            <div class="logo d-flex flex-column align-items-center">
                <img class="logo-image" src="images/img.png" alt="logo deezertrent">
                <p class="logo-text"  style="margin-top: -10px">Deezertrent</p>
            </div>
            <!--    link----------------------------------------------------------------------------------->
            <div class="links d-flex flex-column justify-content-center" >
                <!--    general----------------------------------------------------------------------------------->
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
            </div>
            <!--    playlist----------------------------------------------------------------------------------->
            <div class="playlist-flow">
                <div class="playlist d-flex flex-column ">
                    <a href="../test.php"><p class="playlist-link">Favoris</p></a>
                    <a href="../test.php"><p class="playlist-link">Playlist n°1</p></a>
                    <a href="../test.php"><p class="playlist-link">Playlist n°1</p></a>
                    <a href="../test.php"><p class="playlist-link">Playlist n°1</p></a>
                    <a href="../test.php"><p class="playlist-link">Playlist n°1</p></a>
                    <a href="../test.php"><p class="playlist-link">Playlist pour dormir</p></a>
                </div>
            </div>
        </div>
        <!--    current music----------------------------------------------------------------------------------->
        <div>
            <div class="current-music d-flex justify-content-center">
                <div class="current-music-center d-flex flex-column ">
                    <div class="text-center">
                        <a href="../test.php">
                            <img class="current-music-image" src="images/imaginedragons_nightvisions.png"  alt="Image du titre en cours">
                        </a>
                    </div>
                    <div class="current-music-infos d-flex justify-content-between">
                        <a href="../test.php">
                            <div class="d-flex flex-column">
                                <h6>Nothing Left To Say</h6>
                                <p>Imagines Dragons</p>
                            </div>
                        </a>
                        <div class="d-flex flex-column " style="font-size : 1.2rem;">
                            <i class="bi bi-heart button"></i>
                            <i class="bi bi-plus-lg button"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="right d-flex flex-column" >
        <!--    Navbar TOP ----------------------------------------------------------------------------------->
        <div class="menu-top d-flex flex-row justify-content-between">
            <div>
                <a class="nom-page" href="../test.php"><h2>Accueil</h2></a>
            </div>
            <!-- Div avec form de recherche -->
            <div>
                <form method="post" action="">
                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
                    <label for="bar"></label>
                    <input type="text" id="bar" name="bar" placeholder="Recherche">
                </form>
            </div>

            <div>
                <a class="profil d-flex flex-row" href="../test.php"  style="display:block;width:100%;height:100%;">
                    <h3>Profil</h3>
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
        <!--    Sound----------------------------------------------------------------------------------->
        <div class="sound d-flex flex-row">
            <div class="edit d-flex flex-column align-items-center">
                <div class="play d-flex justify-content-around align-items-center">
                    <span class="material-symbols-outlined play-icon-third button button_random">shuffle</span>
                    <span class="material-symbols-outlined play-icon-second button button_previous">skip_previous</span>
                    <span class="material-symbols-outlined play-icon-first button button_play_pause" onclick="playPauseTrack();">play_circle</span>
                    <span class="material-symbols-outlined play-icon-second button button_next" >skip_next</span>
                    <div class="button button_laps" onclick="onOffLoop();">
                        <span class="material-symbols-outlined button play-icon-third ">laps</span>
                    </div>
                </div>
                <div class="progres d-flex flex-row justify-content-around align-items-center">
                    <div>0:52</div>
                    <div class="test">
                        <input type="range" min="0" max="100" value="100" class="slider slider-progres" id="volume">
                    </div>
                    <div>3:40</div>
                </div>
            </div>
            <div class="volume d-flex flex-column ">
                <div class="volume-edit d-flex align-items-center ">
                    <div class="volume-logo button">
                        <span class="material-symbols-outlined button_on_off" onclick="onOffTrack();">volume_off</span>
                    </div>

                    <input type="range" min="0" max="100" value="100" class="slider slider_volume" id="volume" onchange="setVolume();">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="accueil.js"></script>