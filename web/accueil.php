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
        <!--    Icons Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!--    Icons google-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- JS Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous" defer></script>
        <script src="../js/soundBar.js" defer></script>
        <script src="../js/progresBar.js" defer></script>
        <script src="../js/playlists.js" defer></script>
        <script src="../js/ajax.js" defer></script>
        <script src="../js/modal.js" defer></script>
        <script src="../js/track.js" defer></script>
        <script src="../js/accueil.js" defer></script>
        <script src="../js/window.js" defer></script>
        <script src="../js/artist.js" defer></script>
        <script src="../js/audio.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
            integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <div id="musique">
            <!-- Simple lecture audio -->
            <audio id="audioPlayer" src="https://cdns-preview-1.dzcdn.net/stream/c-198ac504cbfa7e1a5fe9d9e115693057-3.mp3" muted></audio>
        </div>
        <div class="global d-flex flex-row">
            <!--    Navbar----------------------------------------------------------------------------------->
            <div class="menu">
                <div>
                    <!--    logo----------------------------------------------------------------------------------->
                    <div class="logo d-flex flex-column align-items-center">
                        <img id="accueil" class="logo-image button" src="images/img.png" alt="logo deezertrent">
                        <p id="accueil" class="logo-text button re"  style="margin-top: -10px">Deezertrent</p>
                    </div>
                    <!--    link----------------------------------------------------------------------------------->
                    <div class="links d-flex flex-column justify-content-center" >
                        <!--    general----------------------------------------------------------------------------------->
                        <div class="general d-flex flex-column ">
                            <div id="accueil" class="general-link d-flex flex-row">
                                <div class="hide">
                                    <span class="material-symbols-outlined moove">home</span>
                                </div>
                                <p class="general-link-text">Accueil</p>
                            </div>
                            <div id="recherche" class="general-link d-flex flex-row">
                                <div class="hide">
                                    <span class="material-symbols-outlined moove">search</span>
                                </div>
                                <p class="general-link-text">Recherche</p>
                            </div>
                            <div id="historique" class="general-link d-flex flex-row">
                                <div class="hide">
                                    <span class="material-symbols-outlined moove">history</span>
                                </div>
                                <p class="general-link-text history get_playlist">Historique</p>
                            </div>
                            <div id="playlist" class="general-link d-flex flex-row" >
                                <div class="hide">
                                    <span class="material-symbols-outlined moove">format_list_bulleted</span>
                                </div>
                                <p class="general-link-text" style="margin-bottom: 5px">Playlist</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--    playlist----------------------------------------------------------------------------------->
                <div id="playlist-menu" class="playlist d-flex flex-column">

                </div>
                <!--    current music----------------------------------------------------------------------------------->
                <div id="info_music_played">
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
                                    <div style="margin-bottom: 10px"></div>
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
<!--                    <div id="title-page">-->
<!--                        <h2 class="nom-page" >Accueil</h2>-->
<!--                    </div>-->

                    <!-- Div avec form de recherche -->
                    <div id="title-page">
                        <input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">
                    </div>

                    <div class="click" id="profil" >
                        <div class="profil d-flex flex-row"   style="display:block;width:100%;height:100%;">
                            <h3>Profil</h3>
                            <span class="material-symbols-outlined" style="font-size: 2.5rem; margin-left: 10px">account_circle</span>

                        </div>
                    </div>
                </div>

                <!--    Contenu----------------------------------------------------------------------------------->

                <div id="content" class="content d-flex flex-column">
                    <div class="add_track" onclick="openModal()">
                        <p>add</p>
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
<!--  ------------------------------modal------------------------------------->
        <div class="modal fade" id="addPlaylist" tabindex="-1" aria-hidden="true" style="color: white">
            <div class="modal-dialog" >
                <div class="modal-content" style="background-color: #121212; border: solid 2px white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une playlist</h1>
                        <button style="background-color: #DC3545" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add_playlist">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" >Titre :</label>
                                <input type="text" class="form-control" id="titre-add" style="background-color: white">
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
