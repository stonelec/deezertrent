'use strict';

// From to create a new playlist
let form = '<div class="modal fade" id="new_playlist_modal" tabindex="-1" style="display: none;" aria-hidden="true">\n' +
    '            <div class="modal-dialog">\n' +
    '                <div class="modal-content">\n' +
    '                    <div class="modal-header">\n' +
    '                        <h1 class="modal-title fs-5" > Ajouter une nouvelle playlist</h1>\n' +
    '                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
    '                    </div>\n' +
    '                    <div class="modal-body">\n' +
    '                        <form>\n' +
    '                            <div class="mb-3">\n' +
    '                                <label for="new_name" class="col-form-label"></label>\n' +
    '                                <input class="form-control" type="text" id="new_name"/>\n' +
    '                            </div>\n' +
    '                        </form>\n' +
    '                    </div>\n' +
    '                    <div class="modal-footer">\n' +
    '                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>\n' +
    '                        <button type="button" class="btn btn-primary">Ajouter</button>\n' +
    '                    </div>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '        </div>';

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
        '                                    <i class="bi bi-trash button button-track infos-right-part delete" id="del'+ infos['id_playlist']+'"></i>\n'+
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
        '                                       <h7 class="infos-right-date infos-right-part ">'+infos["date_ajout"]+'</h7>\n' +
        '                                   </div>\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part del"></i>\n'+
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part add"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part add_fav"></i>\n' +
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
function displayListePlaylist(playlists) {
    {
        $('#title-page').empty();
        $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
        $('#content').html('<h2 style="margin: 15px 0;">Vos playlist</h2>\n');
        $('#content').append('<div class="d-flex flex-row-reverse" style="padding-right: 10%; font-size: 2rem;  height: 4rem">\n' +
            '                        <i class="bi bi-sort-alpha-down button button_sort"></i>\n' +
            '                        <i class="bi bi-file-plus button button_add_playlist"></i>\n' +
            '\n' +
            '                    </div>');
        for (let playlist of playlists)
            $('#content').append(playlist_list(playlist));

    }
///////////////    CREATE A NEW PLAYLIST    ///////////////////
$('#add_playlist').click((event) =>
        {
            console.log('LE TEST DE NEW');
            modal();
            //$('#content').append(form);
            ajaxRequest('POST', '../php/request.php/playlist/', () =>
            {
                ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
            },'nom=' + modalBodyInput , $('#new_playlist').val() );
        }
    );
}

function modal(){
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
}

$(document).on('click', '.get_playlist', function (event){
    var id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ id_playlist, playlistDetail)
});



///////////////    DELETE A PLAYLIST    ///////////////////
$('#content').on('click', '.del', ()=>{
    ajaxRequest('DELETE', '../php/request.php/playlist/' +'?id=' + $(event.target).parent().parent().attr('id') , () => {
        ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
        })
});

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

//////////////////////////    DIPSLAY HISTORIQUE    //////////////////////////////
