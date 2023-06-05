'use strict';

let menu_tri = '<div>' +
    '               <i class="bi bi-file-plus"></i>' +
    '               <i class="bi bi-sort-alpha-down"></i>' +
    '           </div>';

function playlist_list(infos){
    return    '<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center name="'+infos['id_playlist']+'"   ">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div>\n' +
        '                                        <img class="music-image infos-left-part " src="images'+infos['image_playlist']+'"  alt=".....">\n' +
        '                                    </div>\n' +
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
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n'+
        '                                </div> \n'+
        '                            </li>\n' +
        '                        </ul>'
}

///////////////////   DEFAULT REQUEST   ///////////////////////////
ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);


///////////////////   PLAYLIST ACCUEIL REQUEST   ///////////////////////////
const divaccueil = document.getElementById('accueil');
divaccueil.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);
});

///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/10', displayListePlaylist);
});

//////////////////////////    DIPSLAY PLAYLIST    //////////////////////////////

function displayListePlaylist(playlists)
{
    $('#content').html('<h2 style="margin: 15px 0">Playlist</h2>');
    $('#content').append(menu_tri);
    for (let playlist of playlists)
        $('#content').append(playlist_list(playlist));
}
