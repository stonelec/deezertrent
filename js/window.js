'use strict';
///////////////////   DEFAULT REQUEST   ///////////////////////////
ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);


///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);
});

///////////////////   PLAYLIST ACCUEIL REQUEST   ///////////////////////////
const divaccueil = document.getElementById('accueil');
divaccueil.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);
});


//////////////////////////    DIPSLAY PLAYLIST    //////////////////////////////

function displayListePlaylist(playlists)
{
    $('#content').html('<h3>OUI OUI OUI</h3>');
    console.log(playlists)
    for (let playlist of playlists)

        $('#content').append('' +
            '<div class="card">' +
            '<div class="card-body">'
            + playlist.nom_playlist+
            '</div>' +
            '</div>');
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


