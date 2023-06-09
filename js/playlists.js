'use strict';

// Frame of a list to show the playlist
function playlist_list(infos){
    return    '<ul class="list-infos list-group justify-content-center info_playlist">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_playlist" id="'+infos['id_playlist']+'" value="'+infos['id_playlist']+'">\n' +
        '                                <div class="infos-left-part d-flex align-items-center ">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder; padding-left: 30px;">'+infos['nom_playlist']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                   <div class="overflow">\n'+
        '                                       <h7 class="infos-right-date infos-right-part ">'+infos["date_creation"]+'</h7>\n' +
        '                                   </div>\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part del_playlist" id="'+ infos['id_playlist']+'"></i>\n'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}

// Frame of a list to show the track in a playlist
function playlist_card(playlist){
    return '         <div class="card-playlist d-flex flex-column get_playlist" id="'+playlist['id_playlist']+'">\n' +
        '                            <div style="margin-left: auto; margin-right: auto;">\n' +
        '                                <img class="card-playlist-image " src="images/image_playlis.png"  alt=".....">\n' +
        '                            </div>\n' +
        '                            <div class="card-playlist-text">\n' +
        '                                <p >'+playlist["nom_playlist"]+'</p>\n' +
        '                            </div>\n' +
        '                        </div>';
}

function track_list_playlist(infos){
    return new Promise((resolve, reject) => {
        ajaxRequest('GET', '../php/request.php/playlist/', (playlists)=>{
            let result;
            result = '<ul class="list-infos list-group justify-content-center">\n' +
                '                            <li class="infos d-flex justify-content-between align-items-center get_track" id="'+infos['id_track']+'" >\n' +
                '                                <div class="infos-left-part d-flex align-items-center">\n' +
                '                                    <div>\n' +
                '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
                '                                    </div>\n' +
                '                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
                '                                    <div class="d-flex flex-row align-items-center">\n' +
                '                                        <div class="overflow">\n' +
                '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_track']+'</h7>\n' +
                '                                        </div>\n' +
                '                                        <div class="overflow">\n' +
                '                                            <h7 class="infos-left-part">'+infos["nom_artiste"]+'</h7>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="infos-right d-flex flex-row align-items-center align-self-center"  id="'+infos['id_playlist']+'">'+
                '                                   <div class="overflowr">\n'+
                '                                       <h7 class="infos-right-date infos-right-part">'+infos["date_ajout"].slice(0,10)+'</h7>\n' +
                '                                   </div id="'+infos['id_track']+'">\n'+
                '                                   <i class="bi bi-trash button button-track infos-right-part del_track" id="'+infos['id_track']+'" ></i>\n'+
                '                                   <div class="dropdown" onclick="event.stopPropagation();" style=" margin-top: 8px">\n' +
                '                                       <div data-bs-toggle="dropdown" aria-expanded="false">\n' +
                '                                          <i class="bi bi-plus-lg button button-track infos-right-part add" id="'+infos['id_track']+'"></i>\n' +
                '                                       </div>\n' +
                '                                       <ul class="dropdown-menu">\n';

                for(let playlist of playlists){
                    if(playlist['nom_playlist'] !== "Historique" && playlist['nom_playlist'] !== "Favoris" && playlist['nom_playlist'] !== "Liste de lecture"){
                        result += '                                         <li><a class="dropdown-item add-track" onclick="addTrack('+infos["id_track"]+","+playlist["id_playlist"]+')" id="'+playlist['id_playlist']+'">'+playlist['nom_playlist']+'</a></li>\n';

                    }
                }

                result += '                              </ul>\n' +
                '                                   </div>\n'+
                '                                   <i class="bi bi-heart button button-track infos-right-part add_fav" id="'+infos['id_track']+'"></i>\n' +
                '                                </div>\n' +
                '                            </li>\n' +
                '                        </ul>';
                // console.log(result);
            resolve(result);

        });
    });
}

function track_list_search(infos){
    // console.log(infos);
    return new Promise((resolve, reject) => {
        ajaxRequest('GET', '../php/request.php/playlist/', (playlists)=>{
            let result;
            result = '<ul class="list-infos list-group justify-content-center">\n' +
                '                            <li class="infos d-flex justify-content-between align-items-center get_track" id="'+infos['id_track']+'" >\n' +
                '                                <div class="infos-left-part d-flex align-items-center">\n' +
                '                                    <div>\n' +
                '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
                '                                    </div>\n' +
                '                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
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
                '                                   <div class="dropdown" onclick="event.stopPropagation();" style=" margin-top: 8px">\n' +
                '                                       <div data-bs-toggle="dropdown" aria-expanded="false">\n' +
                '                                          <i class="bi bi-plus-lg button button-track infos-right-part add" id="'+infos['id_track']+'"></i>\n' +
                '                                       </div>\n' +
                '                                       <ul class="dropdown-menu">\n';

            for(let playlist of playlists){
                if(playlist['nom_playlist'] !== "Historique" && playlist['nom_playlist'] !== "Favoris" && playlist['nom_playlist'] !== "Liste de lecture"){
                    result += '                                         <li><a class="dropdown-item add-track" onclick="addTrack('+infos["id_track"]+","+playlist["id_playlist"]+')" id="'+playlist['id_playlist']+'">'+playlist['nom_playlist']+'</a></li>\n';

                }
            }

            result += '                                </ul>\n' +
                '                                   </div>\n'+
                '                                    <i class="bi bi-heart button button-track infos-right-part" id="'+infos['id_track']+'"></i>\n' +
                '                                </div>\n' +
                '                            </li>\n' +
                '                        </ul>';
            // console.log(result);
            resolve(result);

        });
    });
}

// function track_list_search(infos){
//     //console.log(infos);
//     return'<ul class="list-infos list-group justify-content-center">\n' +
//         '                            <li class="infos d-flex justify-content-between align-items-center get_track" id="'+infos['id_track']+'" >\n' +
//         '                                <div class="infos-left-part d-flex align-items-center">\n' +
//         '                                    <div>\n' +
//         '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
//         '                                    </div>\n' +
//         '                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
//         '                                    <div class="d-flex flex-row align-items-center">\n' +
//         '                                        <div class="overflow">\n' +
//         '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_track']+'</h7>\n' +
//         '                                        </div>\n' +
//         '                                        <div class="overflow">\n' +
//         '                                            <h7 class="infos-left-part">'+infos["nom_artiste"]+'</h7>\n' +
//         '                                        </div>\n' +
//         '                                    </div>\n' +
//         '                                </div>\n' +
//         '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
//         '                                    <i class="bi bi-plus-lg button button-track infos-right-part" id="'+infos['id_track']+'"></i>\n' +
//         '                                    <i class="bi bi-heart button button-track infos-right-part" id="'+infos['id_track']+'"></i>\n' +
//         '                                </div>\n' +
//         '                            </li>\n' +
//         '                        </ul>'
// }

function playlistDetail(playlist){
    console.log(playlist);
    playlist=playlist.reverse();
    if (playlist.length === 0){
        console.log('playlist est vide');
        $('#content').html('<h4>Votre playlist est vide</h4>');
    }else{
        console.log('playlist est pas vide');
        //consfole.log(playlist);
        $('#content').html('<h2 style="margin: 15px 0;">'+playlist[0]["nom_playlist"]+'</h2>\n');
        $('#content').append('<div class="d-flex justify-content-between" style="padding-right: 10%;   height: 4rem">\n' +
            '                        <div>' +
            '                            <p style="">'+playlist[0]['date_creation']+'</p>\n' +
            '                        </div>'+

            '                    </div>');
        Promise.all(playlist.map(info => track_list_playlist(info)))
            .then(results => {
                results.forEach(result => {
                    $('#content').append(result);
                });
            });

    }
}

// // Function to open a window to ask the name of a new playlist
// function open_dmodal(){
//     console.log('try to open');
//     let new_modal = document.getElementById("new_modal");
//     new_modal.style.visibility = new_modal.style.visibility === "visible" ? "hidden" : "visible";
// }

// Ajax request

///////////////////   DEFAULT REQUEST   ///////////////////////////
// ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);



///////////////////   PLAYLIST REQUEST   ///////////////////////////
const divplaylist = document.getElementById('playlist');
divplaylist.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
});


//////////////////////////    DIPSLAY PLAYLIST    //////////////////////////////
function displayListePlaylist(playlists) {
    {
        // console.log('on est censé sup un truc');
        console.log(playlists);

        $('#content').empty();
        $('#title-page').empty();
        $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
        $('#content').html('<h2 style="margin: 15px 0;">Vos playlist</h2>\n');
        $('#content').append('<div class="d-flex flex-row-reverse" style="padding-right: 10%; font-size: 2rem;  height: 4rem">\n' +
                '                        <i class="bi bi-file-plus button button_add_playlist"></i>\n' +
            '                    </div>');
        for (let playlist of playlists) {
            // console.log(playlist['nom_playlist']);
            if (playlist['nom_playlist'] !== "Favoris" && playlist['nom_playlist'] !== "Liste de lecture" && playlist['nom_playlist'] !== "Historique") {
                $('#content').append(playlist_list(playlist));
            }
        }


        ///////////////    CREATE A NEW PLAYLIST    ///////////////////
        /*$('#add_playlist').click((event) =>
            {
                console.log('LE TEST DE NEW');
                //$('#content').append(form);
                ajaxRequest('POST', '../php/request.php/playlist/', () =>
                {
                    ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
                },'nom=' + modal_body.value , $('#new_playlist').val() );
            }
        );*/
    }
}

//////////////     INFORMATION ABOUT A PLAYLIST     //////////////
$(document).on('click', '.get_playlist', function (event){
    event.stopPropagation();
    console.log('click sur une playlist');
    let id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist?id_playlist='+ id_playlist, playlistDetail)

});


///////////////    DELETE A PLAYLIST    ///////////////////
$(document).on('click', '.del_playlist', function(event) {
    event.stopPropagation();
    console.log("delete");
    console.log($(event.target).parent().parent().attr('id'));
    let id_playlist = $(event.target).parent().parent().attr('id');

    ajaxRequest('DELETE', '../php/request.php/playlist?id_playlist=' + id_playlist, () => {
        console.log('Dans le delete');
        ajaxRequest('GET', '../php/request.php/playlist?id_playlist=' + id_playlist, displayListePlaylist);
        ajaxRequest('GET', '../php/request.php/playlist/', playlistMenu);
    });
});


/////////////   DELTE A TRACK OF A PLAYLIST ///////////////
$(document).on('click', '.del_track', function(event) {
    let idplaylist = $(this).parent().attr('id');
    let idtrack = $(this).attr('id');
    event.stopPropagation();
    console.log('/');
    console.log(idtrack);
    console.log(idplaylist);
    console.log('/');

    ajaxRequest('DELETE', `../php/request.php/deltrack?idtrack=${idtrack}&idplaylist=${idplaylist}`,()=>{
        ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ idplaylist, playlistDetail)

    });
});


$(document).on('click', '.del_playlist',function (event){
    let idplaylist = $(this).attr('id');

    ajaxRequest('DELETE', `../php/request.php/delplaylist?idplaylistdel=${idplaylist}`,()=>{
        ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);

    });
    showPlaylistMusic()
});



