'use strict';

// Frame of a list to show the playlist
function playlist_list(infos){
    return    '<ul class="list-infos list-group justify-content-center info_playlist">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center get_playlist" id="'+infos['id_playlist']+'" value="'+infos['id_playlist']+'">\n' +
        '                                <div class="infos-left-part d-flex align-items-center ">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['nom_playlist']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                   <div class="overflow">\n'+
        '                                       <h7 class="infos-right-date infos-right-part ">'+infos["date_creation"]+'</h7>\n' +
        '                                   </div>\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part del_playlist" id="del'+ infos['id_playlist']+'"></i>\n'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}

// Frame of a list to show the track in a playlist
function playlist_card(playlist){
    return '         <div class="card-playlist d-flex flex-column get_playlist id"'+playlist['id_playlist']+'">\n' +
        '                            <div style="margin-left: auto; margin-right: auto;">\n' +
        '                                <img class="card-playlist-image " src="images/imaginedragons_nightvisions.png"  alt=".....">\n' +
        '                            </div>\n' +
        '                            <div class="card-playlist-text">\n' +
        '                                <p >'+playlist["nom_playlist"]+'</p>\n' +
        '                            </div>\n' +
        '                        </div>';
}
function track_list_playlist(infos){
    console.log(infos);
    return'<ul class="list-infos list-group justify-content-center">\n' +
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
        '                                <div class="infos-right d-flex flex-row align-items-center"  id="'+infos['id_track']+'">'+
        '                                   <div class="overflow">\n'+
        '                                       <h7 class="infos-right-date infos-right-part">'+infos["date_ajout"].slice(0,10)+'</h7>\n' +
        '                                   </div id="'+infos['id_track']+'">\n'+
        '                                    <i class="bi bi-trash button button-track infos-right-part del_track" id="'+infos['id_playlist']+'" ></i>\n'+
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part add"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part add_fav" id="'+infos['id_track']+'"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'




}


function track_list_search(infos){
    //console.log(infos);
    return'<ul class="list-infos list-group justify-content-center">\n' +
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
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part" id="'+infos['id_track']+'"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'

}

function playlistDetail(playlist){
    // console.log('fonction playlist detail');
    if (playlist.length == 0){
        console.log('playlist est vide');
        $('#content').html('<h4>Votre playlist est vide</h4>');
    }else{
        // console.log('playlist est pas vide');
        console.log(playlist);
        $('#content').html('<h2 style="margin: 15px 0;">'+playlist[0]["nom_playlist"]+'</h2>\n');
        $('#content').append('<div class="d-flex justify-content-between" style="padding-right: 10%;   height: 4rem">\n' +
            '                        <div>' +
            '                            <p style="">'+playlist[0]['date_creation']+'</p>\n' +
            '                        </div>'+
            '                        <div class="d-flex flex-row" style="font-size: 2rem;">' +
            '                           <i class="bi bi-sort-alpha-down button button_sort"></i>\n'+
            '                        </div>'+

            '                    </div>');
        for(let info of playlist) {
            $('#content').append(track_list_playlist(info))
        }
    }
}

// Function to open a window to ask the name of a new playlist
function open_modal(){
    console.log('try to open');
    let new_modal = document.getElementById("new_modal");
    new_modal.style.visibility = new_modal.style.visibility === "visible" ? "hidden" : "visible";
}

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
        $('#title-page').empty();
        $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
        $('#content').html('<h2 style="margin: 15px 0;">Vos playlist</h2>\n');
        $('#content').append('<div class="d-flex flex-row-reverse" style="padding-right: 10%; font-size: 2rem;  height: 4rem">\n' +
            '                        <i class="bi bi-sort-alpha-down button button_sort" style="padding-left: 1%"></i>\n'+
            '                        <i class="bi bi-file-plus button button_add_playlist"></i>\n' +
            '                    </div>');
        for (let playlist of playlists)
            $('#content').append(playlist_list(playlist));


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
    var id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ id_playlist, playlistDetail)

});


///////////////    DELETE A PLAYLIST    ///////////////////
// PB effectue la fonction affiche détaill en mme temps et ne supprime pas
$(document).on('click', '.del_playlist', ()=>{
    console.log("delete");
    console.log($(event.target).parent().parent().attr('id'));
    ajaxRequest('DELETE', '../php/request.php/playlist/' +'?id=' + $(event.target).parent().parent().attr('id') , () => {
        ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
        })
})


$(document).on('click', '.del_track', function(event) {
    var idplaylist = $(this).attr('id');
    var idtrack = $(this).parent().attr('id');
    console.log('/');
    console.log(idtrack);
    console.log(idplaylist);
    console.log('/');

    ajaxRequest('DELETE', `../php/request.php/deltrack?idtrack=${idtrack}&idplaylist=${idplaylist}`,affichebien);
});


function affichebien(info){
    console.log('ca passe'+info)
}