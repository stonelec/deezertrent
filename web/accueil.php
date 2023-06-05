<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    echo 'test';
}
?>
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

        <!-- JS Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous" defer></script>
        <script src="../js/accueil.js" defer></script>
        <script src="../js/ajax.js" defer></script>
        <script src="../js/window.js" defer></script>
        <script src="../js/progresBar.js" defer></script>
        <script src="../js/playlists.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
            integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>

    </head>
    <!-- Simple lecture audio -->
    <audio id="audioPlayer" src="https://cdns-preview-b.dzcdn.net/stream/c-b53be55456ff326e9c2a7bf1d0abe601-6.mp3" muted></audio>


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
                            <div id="accueil" class="general-link d-flex flex-row">
                                <span class="material-symbols-outlined">home</span>
                                <p class="general-link-text">Accueil</p>
                            </div>
                            <div id="recherche" class="general-link d-flex flex-row">
                                <span class="material-symbols-outlined">search</span>
                                <p class="general-link-text">Recherche</p>
                            </div>
                            <div id="historique" class="general-link d-flex flex-row">
                                <span class="material-symbols-outlined">history</span>
                                <p class="general-link-text">historique</p>
                            </div>
                            <div id="playlist" class="general-link d-flex flex-row" >
                                <span class="material-symbols-outlined">format_list_bulleted</span>
                                <p class="general-link-text" style="margin-bottom: 5px">Playlist</p>
                            </div>
                        </div>
                    </div>
                    <!--    playlist----------------------------------------------------------------------------------->
                    <div style="height: 1rem">
                        <div class="playlist-flow" >
                            <div class="playlist d-flex flex-column ">
                                <p class="playlist-link">Favoris</p>
                                <p class="playlist-link">Playlist n°1</p>
                                <p class="playlist-link">Playlist n°1</p>
                                <p class="playlist-link">Playlist n°1</p>
                                <p class="playlist-link">Playlist n°1</p>
                                <p class="playlist-link">Playlist pour dormir</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--    current music----------------------------------------------------------------------------------->
                <div>
                    <div class="current-music d-flex justify-content-center">
                        <div class="current-music-center d-flex flex-column click">
                            <div class="text-center">
                                <img class="current-music-image" src="images/imaginedragons_nightvisions.png"  alt="Image du titre en cours">
                            </div>
                            <div class="current-music-infos d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <h6>Nothing Left To Say</h6>
                                    <p>Imagines Dragons</p>
                                </div>
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
                    <div id="title-page">
                        <h2 class="nom-page" >Accueil</h2>
                    </div>
                    <!-- Div avec form de recherche -->
<!--                    <div>-->
<!--                        <input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">-->
<!--                    </div>-->

                    <div class="click" id="profil" >
                        <div class="profil d-flex flex-row"   style="display:block;width:100%;height:100%;">
                            <h3>Profil</h3>
                            <span class="material-symbols-outlined" style="font-size: 2.5rem; margin-left: 10px">account_circle</span>

                        </div>
                    </div>
                </div>
                <!--    Contenu----------------------------------------------------------------------------------->
                <div id="content" class="content d-flex flex-column">

                        <div class="btn-group" style="width:30%;">
                            <a id="all_search" class="btn btn-danger active ">Tous</a>
                            <a id="track_search"  class="btn btn-danger ">Morceaux</a>
                            <a id="album_search" class="btn btn-danger">Albums</a>
                            <a id="artiste_search" class="btn btn-danger">Artiste</a>
                        </div>
                        <h2 style=" margin: 15px 0">Les titres</h2>
                        <ul class="list-infos list-group justify-content-center">

                            <li class="infos d-flex justify-content-between align-items-center">
                                <div class="infos-left-part d-flex align-items-center">
                                    <div>
                                        <img class="music-image infos-left-part " src="images/imaginedragons_nightvisions.png"  alt=".....">
                                    </div>
                                    <div>
                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="overflow">
                                            <h7 class="infos-left-part" style="font-weight: bolder;">Nothing Nothing Nothing Left To Say</h7>
                                        </div>
                                        <div class="overflow">
                                            <h7 class="infos-left-part">Imagines Dragons</h7>
                                        </div>
                                    </div>
                                </div>
                                <div class="infos-right d-flex flex-row align-items-center">
                                    <div class="overflow">
                                        <h7 class="infos-right-date infos-right-part ">28 mai 2023</h7>
                                    </div>
                                    <i class="bi bi-trash button button-track infos-right-part"></i>
                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>
                                    <i class="bi bi-heart button button-track infos-right-part"></i>
                                </div>
                            </li>
                        </ul>
                        <div class="card-playlist d-flex flex-column">
                            <div style="margin-left: auto; margin-right: auto;">
                                <img class="card-playlist-image " src="images/imaginedragons_nightvisions.png"  alt=".....">
                            </div>
                            <div class="card-playlist-text">
                                <p >Nothing Nothing Left To Say</p>
                            </div>
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
                            <div class="time-display" id="track_current_time"></div>
                            <div class="progres-bar">
                                <div type="range" class="slider-progres"></div>
                            </div>
                            <div class="time-display" id="track_lenght"></div>
                        </div>
                    </div>
                    <div class="volume d-flex flex-column ">
                        <div class="volume-edit d-flex justify-content-around align-items-center">
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
