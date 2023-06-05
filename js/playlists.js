'use strict';

// From to create a new playlist
let form = '<form method="post">' +
    '           <label for="nom_playlist">Ajouter une nouvelle playlist:</label>'  +
    '           <input type="text" name="nom_playlist" id="new_playlist"/>' +
    '           <input type="submit" value="Ajouter"/>' +
    '       </form>'

// Frame of a list to show the playlist
function playlist_list(infos){
    return    '<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_playlist" id="'+infos['id_playlist']+'" value="'+infos['id_playlist']+'">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['nom_playlist']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                   <div class="overflow">\n'+
        '                                       <h7 class="infos-right-date infos-right-part ">'+infos["date_creation"].slice(0,10)+'</h7>\n' +
        '                                   </div>\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part delete"></i>\n'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}

function track_list(infos){
    console.log(infos);
    return'<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_track" id="'+infos['id_track ']+'" >\n' +
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
        '                                   <div class="overflow">\n'+
        '                                       <h7 class="infos-right-date infos-right-part ">'+infos["date_ajout"].slice(0,10)+'</h7>\n' +
        '                                   </div>\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part del"></i>\n'+
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part add"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part add_fav"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'

}

///////////////////   DEFAULT REQUEST   ///////////////////////////
ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);


///////////////////   PLAYLIST ACCUEIL REQUEST   ///////////////////////////
const divaccueil = document.getElementById('accueil');
divaccueil.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
});

///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
});

//////////////////////////    DIPSLAY PLAYLIST    //////////////////////////////
function displayListePlaylist(playlists)
{
    $('#content').html('<h2 style="margin: 15px 0">Playlist</h2>');
    $('#content').append('  <div class="w-50 infos-right-part d-flex align-self-end ms-auto p-2" style="right: 5em">' +
        '                       <i class="bi bi-file-plus infos-right-part button-track" id="add_playlist"></i>' +
        '                       <i class="bi bi-sort-alpha-down infos-right-part button-track" id="del_playlist"></i>' +
        '                   </div>');
    for (let playlist of playlists)
        $('#content').append(playlist_list(playlist));
}


$(document).on('click', '.get_playlist', function (event){
    var id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ id_playlist, playlistDetail)
});

///////////////    CREATE A NEW PLAYLIST    ///////////////////
$('#add_playlist').click((event) =>
    {
        console.log('LE TEST DE NEW');
        event.preventDefault();
        window.open(form);
        event.preventDefault();
        ajaxRequest('POST', '../php/request.php/playlist/', () =>
        {
            ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
        },'nom=' + $('#new_playlist').val() );
    }
);

function playlistDetail(playlist){
    console.log('fonction playlist detail');
    $('#content').html('<h2 style="margin: 15px 0">'+playlist[0]['nom_playlist']+'</h2>' +
    '                   <div class="container">' +
    '                       <div class="row">' +
    '                           <div class="col-6">'+
    '                               <div>' +
    '                                   <h7>'+playlist[0]['date_creation']+'</h7>' +
    '                               </div>' +
    '                                   <div>' +
    '                                   Résultats'+
    '                               </div>' +
    '                            </div>' +
    '                            <div class="col-6 w-50 infos-right-part d-flex align-self-end ms-auto p-2" style="right: 5em">' +
    '                               <i class="bi bi-sort-alpha-down infos-right-part button-track id=del_playlist"></i>' +
    '                            </div>'+
    '                           </div >' +
    '                       </div>'+
    '                       <div id="liste">' +
    '                       </div>'+
    '                   </div>');

    for(let info of playlist) {
        $('#liste').append(track_list(info))
    }

}