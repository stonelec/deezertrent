'use strict';

let menu_tri = '<div class="infos-left-part d-flex align-items-center">' +
    '               <i class="bi bi-file-plus infos-right-part button-track"></i>' +
    '               <i class="bi bi-sort-alpha-down infos-right-part button-track"></i>' +
    '           </div>';

function playlist_list(infos){
    return    '<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_playlist" id="'+infos['id_playlist']+'"   ">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['nom_playlist']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                     <div class="overflow">\n' +
            '                                        <h7 class="infos-right-date infos-right-part ">'+infos["date_creation"].slice(0,10)+'</h7>\n' +
            '                                    </div>'+
        '                                </div>\n' +
        '                                <div> \n' +
        '                                    <i class="bi bi-trash button button-track infos-right-part"></i>\n'+
        '                                </div> \n'+
        '                            </li>\n' +
        '                        </ul>'
}

function track_list(infos){
    return'<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_track" id="'+infos['id_track ']+'"   ">\n' +
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






///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);
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

function playlistDetail(playlist){
    $('#content').html('<h2 style="margin: 15px 0">Playlist</h2>' +
        '               <div>' +
        '                   <div>'+
                                playlist['nom_playlist'] +
                                playlist['date_creation'] +
        '                   </div>' +
        '                   <div>' +
        '                       Résultat' +
                                menu_tri +
        '                   </div>'+
                            playlist +
        '               </div>');

}
