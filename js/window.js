'use strict';
///////////////////   BUTTONS SEARCH   ///////////////////////////
let button_all = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
'                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
'                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
'                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'

let button_track = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger active">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'

let button_album = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger active">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'

let button_artiste = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger active">Artiste</a>\n' +
    '         </div>'

///////////////////   DISPLAY LISTES   ///////////////////////////
function track_list(infos){
    return'<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center name="'+infos['id_track ']+'"   ">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div>\n' +
        '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
        '                                    </div>\n' +
        '                                    <div>\n' +
        '                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
        '                                    </div>\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_track']+'</h7>\n' +
        '                                        </div>\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part">'+infos["nom_artiste"]+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'


}

function album_list(infos){
    return    '<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center name="'+infos['id_album ']+'"   ">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div>\n' +
        '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
        '                                    </div>\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_album']+'</h7>\n' +
        '                                        </div>\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part">'+infos["nom_artiste"]+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                     <div class="overflow">\n' +
        '                                        <h7 class="infos-right-date infos-right-part ">'+infos["date_parution"].slice(0,10)+'</h7>\n' +
        '                                    </div>'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}

function artist_list(infos){
    // console.log('artist_list');
    // console.log(infos);
    return'                        <ul class="list-infos list-group justify-content-center">\n' +
        '\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder; margin-left: 20px;">'+infos['nom_artiste']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>';
}

///////////////////   DISPLAY RECHERCHE   ///////////////////////////
$(document).on('click', '#recherche', () =>
    {
        $('#title-page').empty();
        $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);
///////////////////   DISPLAY RECHERCHE ON KEY   ///////////////////////////
$(document).on('keydown', '#bar', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);
///////////////////   DISPLAY RECHERCHE_ALL ON BUTTON ALLSEARCH   ///////////////////////////
$(document).on('click', '#all_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);

    }
);
///////////////////   DISPLAY RECHERCHE_TRACK ON BUTTON TRACK   ///////////////////////////
$(document).on('click', '#track_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_track);
    }
);
///////////////////   DISPLAY RECHERCHE_ALBUM ON BUTTON ALBUM   ///////////////////////////
$(document).on('click', '#album_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_album);
    }
);
///////////////////   DISPLAY RECHERCHE_ARTIST ON BUTTON ARTIST   ///////////////////////////
$(document).on('click', '#artiste_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_artist);
    }
);

// Search functions
// For tracks
function display_track(results) {
    $('#content').empty();
    $('#content').append( button_track);
    show_track(results);

}

function show_track(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les titres</h2>');
    let tracks = results[0];
    if (tracks.length === 0) {
        $('#content').append('<p style="margin: 15px 0">Aucun morceau trouvé</p>');
    } else {
        for (let track of tracks) {
            // console.log(track);
            $('#content').append(track_list(track));
        }
    }
}

// For artists
function display_artist(results) {
    $('#content').empty();
    $('#content').append(button_artiste);
    show_artist(results);
}

function show_artist(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les artistes</h2>');
    let artists = results[5];
    if (artists.length === 0) {
        $('#content').append('<p style="margin: 15px 0">Aucun artiste trouvé</p>');
    } else {
        for (let artist of artists) {
            // console.log(artist);
            $('#content').append(artist_list(artist));
        }
    }
}

// For albums
function display_album(results){
    $('#content').empty();
    $('#content').append(button_album);
    show_album(results)
}

function show_album(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les albums</h2>');
    let albums = results[3];
    if (albums.length === 0) {
        $('#content').append('<p style="margin: 15px 0">Aucun album trouvé</p>');
    } else {
        for (let album of albums) {
            // console.log("album");
            console.log(album);
            $('#content').append(album_list(album));
        }
    }
}
// To show all
function display_all(results){
    $('#content').empty();
    $('#content').append(button_all);
    show_track(results);
    show_artist(results);
    show_album(results);
}

///////////////////   PROFIL REQUEST    ////////////////////////////////////////
    const maDiv = document.getElementById('profil');
    maDiv.addEventListener('click', function() {
        $('#content').empty();
        ajaxRequest('GET', '../php/request.php/profil/10', displayProfil);
    });

///////////////////    DISPLAY PROFIL    ////////////////////////////////////////

    function displayProfil(profil) {
        let age=calculerAge(profil[0].date_de_naissance)
        $('#content').empty();
        $('#content').append('' +
            '<div class="container" style="margin: auto;  ">\n' +
            '    <div class="row ">\n' +
            '      <div class="col-md-6">\n' +
            '        <img src="../web/images/logo.png" alt="Profile Picture" class="img-fluid" style="width: 30%">\n' +
            '        <h2>'+profil[0].prenom+'  '+ profil[0].nom+ '</h2>\n' +
            '      </div>\n' +
            '      <div class="col-md-6">\n' +
            '<p><strong>Email:</strong> '+profil[0].email+'</p>\n' +
            '       <p><strong>Date de naissance:</strong> '+profil[0].date_de_naissance+'</p>\n' +
            '        <p><strong>Age:</strong>'+age+'</p>\n' +
            '        <p><strong>Autre information:</strong>...</p>\n' +
            '      </div>\n' +
            '<button type="button" class="btn btn-danger btn-block " id="modifier" name="submit">Modifier</button>'+
            '    </div>\n' +
            '  </div>' +
            '');
        const modifdiv= document.getElementById("modifier");

        modifdiv.addEventListener('click',function (){
            $('#content').empty();
            $('#content').append('' +
                '<div class="card-body backBlack">\n' +
                '                    <form method="post" id="profilForm">\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="nom">Nouveau Nom <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="prenom">Nouveau Prénom <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="datenaissance">Nouvelle Date de naissance <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="date" class="form-control" id="datenaissance" name="datenaissance" placeholder="Entrez votre date de naissance" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="email">Nouveau Email <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="password">Mot de passe <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label for="passwordconf">Nouveau mot de passe <i class="fas fa-star-of-life fa-xs textColor-DC3545"></i></label>\n' +
                '                            <input type="password" class="form-control" id="passwordconf" name="passwordconf" placeholder="Entrez à nouveau votre mot de passe" required>\n' +
                '                        </div>\n' +
                '                        <input type="submit" class="btn btn-danger btn-block " name="modification" value="modifier">\n' +
                '                    </form>\n' +
                '                </div>' +
                '');

            // Ajouter un gestionnaire d'événement pour le formulaire de profil
            const profilForm = document.getElementById("profilForm");
            profilForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Empêcher la soumission du formulaire

                // Obtenir les nouvelles données de profil
                const newProfileData = {
                    nom: document.getElementById("nom").value,
                    prenom: document.getElementById("prenom").value,
                    datenaissance: document.getElementById("datenaissance").value,
                    email: document.getElementById("email").value,
                    password: document.getElementById("password").value,
                    passwordconf: document.getElementById("passwordconf").value
                };
                console.log("/")
                console.log(newProfileData['prenom'])
                console.log(JSON.stringify(newProfileData));
                // Exécuter la requête AJAX pour mettre à jour le profil
                ajaxRequest('PUT', '../php/request.php/profil/10',  handleUpdateResponse,JSON.stringify(newProfileData));
                $('#content').empty();
                ajaxRequest('GET', '../php/request.php/profil/10', displayProfil);
                $('#content').empty();

                ajaxRequest('GET', '../php/request.php/profil/10', displayProfil);


            });
        });
    }

    function handleUpdateResponse(response) {
        // Gérer la réponse de la mise à jour du profil
        console.log(response);
    }



///////////////////   HISTORIQUE REQUEST   ///////////////////////////
    const divhistorique = document.getElementById('historique');
    divhistorique.addEventListener('click', function() {
        $('#content').empty();
        ajaxRequest('GET', '../php/request.php/historique/10', displayHistory);
    });

///////////////////   DISPLAY HISTORIQUE   ///////////////////////////

    function displayHistory(historiques)
    {
        $('#content').html('<h3>OUI OUI OUI</h3>');
        console.log(historiques)
        for (let historique of historiques)

            $('#content').append('' +
                '<div class="card">' +
                '<div class="card-body">'
                + historique.titre_track+
                '</div>' +
                '</div>');
    }

    function calculerAge(dateNaissance) {
        const dateActuelle = new Date();
        const [anneeNaissance, moisNaissance, jourNaissance] = dateNaissance.split('-');
        const anneeActuelle = dateActuelle.getFullYear();
        const moisActuel = dateActuelle.getMonth() + 1;
        const jourActuel = dateActuelle.getDate();

        let age = anneeActuelle - anneeNaissance;

        if (moisActuel < moisNaissance || (moisActuel === moisNaissance && jourActuel < jourNaissance)) {
            age--;
        }

        return age;
    }


