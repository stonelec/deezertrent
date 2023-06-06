<!DOCTYPE html>
<html>
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
        <script src="../js/historique.js" defer></script>
        <script src="../js/modal.js" defer></script>
        <script src="../js/accueil.js" defer></script>
        <script src="../js/window.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
                integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>

    </style>
</head>
<body>
<h2>Créer Boîte Modale</h2>
<div>
<p id="modal">ouvrir</p>

</div>
<div id="example">

    <div class="content-modal">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <button type="button" class="btn-close" aria-label="Close" id="modal"></button>
                <span class="visually-hidden">unread messages</span>
          </span>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de votre playlist</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Choisir une ilustration</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button id="submit-modal" type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>

</div>
</body>
</html>