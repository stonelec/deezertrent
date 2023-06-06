'use strict';

// La taille et le posotionnnement à revoir
let menu_tri = '<div class="w-50 infos-right-part d-flex align-self-end ms-auto p-2" style="right: 5em">' +
    '               <i class="bi bi-file-plus infos-right-part button-track"></i>' +
    '               <i class="bi bi-sort-alpha-down infos-right-part button-track"></i>' +
    '           </div>';

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
        '                                    <i class="bi bi-trash button button-track infos-right-part"></i>\n'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}
function playlist_card(playlist){
    return '         <div class="card-playlist d-flex flex-column">\n' +
        '                            <div style="margin-left: auto; margin-right: auto;">\n' +
        '                                <img class="card-playlist-image " src="images/imaginedragons_nightvisions.png"  alt=".....">\n' +
        '                            </div>\n' +
        '                            <div class="card-playlist-text">\n' +
        '                                <p >'+playlist["nom_playlist"]+'</p>\n' +
        '                            </div>\n' +
        '                        </div>';
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
        '                                    <i class="bi bi-trash button button-track infos-right-part"></i>\n'+
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'


}
function track_list_search(infos){
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
        '                                    <i class="bi bi-trash button button-track infos-right-part"></i>\n'+
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'


}

///////////////////   DEFAULT REQUEST   ///////////////////////////
// ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);





///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
});

//////////////////////////    DIPSLAY PLAYLIST    //////////////////////////////
function displayListePlaylist(playlists)
{
    $('#title-page').empty();
    $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
    $('#content').html('<h2 style="margin: 15px 0">Playlist</h2>');
    $('#content').append(menu_tri);
    for (let playlist of playlists)
        $('#content').append(playlist_list(playlist));
}


$(document).on('click', '.get_playlist', function (event){
    var id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ id_playlist, playlistDetail)
});

function playlistDetail(playlist){
    console.log('fonction playlist detail');
    $('#content').html('<h2 style="margin: 15px 0">'+playlist[0]['nom_playlist']+'</h2>' +
    '                   <div class="container">' +
    '                       <div class="row">' +
    '                            <div class="col-6">'+
    '                               <div>' +
                                        playlist[0]['date_creation'] +
    '                               </div>' +
    '                                   <div>' +
    '                                   Résultats'+
    '                               </div>' +
    '                               </div>' +
    '                           <div class="col-6">' +
                                    menu_tri +
    '                           </div >' +
    '                       </div>'+
    '                       <div id="liste">' +
    '                       </div>'+
    '                   </div>');

    for(let info of playlist) {
        $('#liste').append(track_list(info))
    }
}

//////////////////////////    DIPSLAY HISTORIQUE    //////////////////////////////
