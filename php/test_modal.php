<!DOCTYPE html>
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title>Bootstrap Example</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <h1>TEST</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus tortor id suscipit porttitor. Proin non velit a magna tempor tincidunt aliquam vel libero. Vestibulum vitae erat est. Nam hendrerit massa non mi condimentum, ac condimentum nulla aliquet. Donec a sagittis orci. Aliquam viverra quam id ipsum accumsan hendrerit. Aenean vehicula commodo velit a gravida. Praesent aliquam mattis arcu, imperdiet consectetur diam rutrum vel. Phasellus ultrices sit amet ligula eu mattis. Sed sagittis tellus id enim auctor, in rhoncus massa volutpat.
        </p>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_playlist_modal" data-bs-whatever="@fat">New</button>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus tortor id suscipit porttitor. Proin non velit a magna tempor tincidunt aliquam vel libero. Vestibulum vitae erat est. Nam hendrerit massa non mi condimentum, ac condimentum nulla aliquet. Donec a sagittis orci. Aliquam viverra quam id ipsum accumsan hendrerit. Aenean vehicula commodo velit a gravida. Praesent aliquam mattis arcu, imperdiet consectetur diam rutrum vel. Phasellus ultrices sit amet ligula eu mattis. Sed sagittis tellus id enim auctor, in rhoncus massa volutpat.
        </p>

        <div class="modal fade" id="new_playlist_modal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" > Ajouter une nouvelle playlist</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="new_name" class="col-form-label"></label>
                                <input class="form-control" type="text" id="new_name"/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    <script>
        const new_modal = document.getElementById('new_playlist_modal')
        if (new_playlist_modal) {
            new_playlist_modal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-bs-whatever')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalBodyInput = new_playlist_modal.querySelector('.modal-body input')
                const new_name = $('new_name').val()
            })
        }
    </script>
    </body>
</html>

