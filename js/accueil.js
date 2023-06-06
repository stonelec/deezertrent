///////////////////   PLAYLIST ACCUEIL REQUEST   ///////////////////////////

///////////////////   DEFAULT REQUEST   ///////////////////////////

displayAccueil();
// loadHistorique();
$(document).on('click', '#accueil', displayAccueil);



function displayAccueil(){
    $('#title-page').empty();
    $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/profil/', displayUserAccueil );

    // ajaxRequest('GET', '../php/request.php/playlist/', displayHistorique);
}

function displayUserAccueil(result){
    $('#content').append('<h2 style="margin: 15px 0; color: #DC3545;">Bienvenue '+result[0]['prenom']+' '+result[0]['nom']+' !</h2>');
    $('#content').append('<h5 style="margin: 15px 0">Vos playlist</h5>');
    ajaxRequest('GET', '../php/request.php/playlist/', displayCardPlaylistsAccueil)
}
function displayCardPlaylistsAccueil(playlists){
    $('#content').append('<div class="d-flex flex-row scroller-card-playlist">');
    for (let playlist of playlists) {
        if (playlist['nom_playlist'] != 'Historique') {
            if (playlist['nom_playlist'] != 'Liste de lecture') {
                $('.scroller-card-playlist').append(playlist_card(playlist));
            }
        }
    }
    $('#content').append('</div>');
    $('#content').append('<h5 style="margin: 15px 0">Votre historique</h5>');
    ajaxRequest('GET', '../php/request.php/historique/', historiqueAccueil)

}
function historiqueAccueil(playlist) {
    for (let track of playlist)
        $('#content').append(track_list(track));
}
///////////////////   LOAD HISTORIQUE   ///////////////////////////

function loadHistorique(){

}

///////////////////   PLAYLIST MENU   ///////////////////////////

showPlaylistMusic();

function showPlaylistMusic(){
    ajaxRequest('GET', '../php/request.php/playlist/', playlistMenu);
}
function playlistMenu(result){
    $('#playlist-menu').empty();
    // console.log('playlistMenu');

    for (let playlist of result){
        // console.log('playlist');
        if(playlist['nom_playlist'] != 'Historique'){
            if (playlist['nom_playlist'] != 'Liste de lecture'){
                $('#playlist-menu').append('<div class="playlist-link get_playlist" id="'+playlist['id_playlist']+'"><p>'+playlist['nom_playlist']+'</p></div>\n');
            }
        }
        // console.log(playlist);
    }
}