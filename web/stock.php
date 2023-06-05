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
</head>
<body>
    <div class="global" style="background-color: aquamarine">

        <!--   list-infos     ------------------------------------------------------>
        <ul class="list-infos list-group justify-content-center">

            <li class="infos d-flex justify-content-between align-items-center"  onclick=" console.log('track');">
                <div class="infos-left-part d-flex align-items-center">
                    <div>
                        <img class="music-image infos-left-part " src="images/imaginedragons_nightvisions.png"  alt=".....">
                    </div>
                    <div>
                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play" onclick="console.log('play');event.stopPropagation();"></i>
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

<!--   select search     ------------------------------------------------------>
        <div class="btn-group" style="width:30%;"   >
            <a id="all_search" class="btn btn-danger active">Tous</a>
            <a id="track_search"  class="btn btn-danger">Morceaux</a>
            <a id="album_search" class="btn btn-danger">Albums</a>
            <a id="artiste_search" class="btn btn-danger">Artiste</a>
        </div>

<!--   titre partie search    ------------------------------------------------------>
        <h2 style="margin: 15px 0">Les titres</h2>

<!--   card playlist    ------------------------------------------------------>
        <div class="card-playlist d-flex flex-column">
            <div style="margin-left: auto; margin-right: auto;">
                <img class="card-playlist-image " src="images/imaginedragons_nightvisions.png"  alt=".....">
            </div>
            <div class="card-playlist-text">
                <p >Nothing Nothing Left To Say</p>
            </div>
        </div>

<!--   recherche    ------------------------------------------------------>
        <div>
            <input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">
        </div>

<!--   titre top-bar    ------------------------------------------------------>
        <div>
            <a class="nom-page" href="../test.php"><h2>Accueil</h2></a>
        </div>

<!-- icon tri bar ------------------------------------------------------>
        <div>
            <i class="bi bi-file-plus"></i>
            <i class="bi bi-sort-alpha-up"></i>
            <i class="bi bi-sort-alpha-down"></i>
        </div>
    </div>
</body>

</html>
