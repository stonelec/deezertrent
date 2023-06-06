///////////////////   DISPLAY REQUEST    ////////////////////////////////////////

function album_card(album){
    return '         <div class="card-playlist d-flex flex-column get_album" id="'+album['id_album']+'">\n' +
        '                            <div style="margin-left: auto; margin-right: auto;">\n' +
        '                                <img class="card-playlist-image album_info" src="images/albums/'+album["image_album"]+'"  alt=".....">\n' +
        '                            </div>\n' +
        '                            <div class="card-playlist-text">\n' +
        '                                <p >'+album["titre_album"]+'</p>\n' +
        '                            </div>\n' +
        '                        </div>';
}

$(document).on('click', '.info_artiste', function(event) {
    console.log('get_artist form card');
    let Value = $(this).attr('id');
    ajaxRequest('GET', `../php/request.php/artiste/${Value}`, displayArtisteInfo);
});

$(document).on('click', '.get_artist', function(event) {
    console.log('get_artist');
    let Value = $(this).attr('id');
    ajaxRequest('GET', `../php/request.php/artiste/${Value}`, displayArtisteInfo);
});


function displayArtisteInfo(artisteInfo) {
    $('#content').empty();
    //console.log(artisteInfo);
    $('#content').append('<div class="d-flex flex-row top-artiste" style="height: 15rem;">\n' +
        '                        <div style="height: 100%">\n' +
        '                            <img style="height: 100%" class="logo-image" src="images/img.png" alt="logo deezertrent">\n' +
        '                        </div>\n' +
        '                        <div style="height: 100%">\n' +
        '                            <div style="height: 25%">\n' +
        '                            </div>\n' +
        '                            <div class="d-flex flex-column justify-content-evenly" style="height: 40%">\n' +
        '                                <h2 class="nom-page align-self-center" >'+artisteInfo[0]["nom_artiste"]+'</h2>\n' +
        '                            </div>\n' +
        '                            <div style="height: 25%;" class="d-flex align-items-center">\n' +
        '                                <div style="background-color: black; border-radius: 15px;">\n' +
        '                                    <h5 style="margin: 10px 30px">'+artisteInfo[0]["nom_type"]+'</h5>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                    <h2 style="margin: 15px 0;">Albums</h2>\n');

    let playlists = artisteInfo['albums'];
    $('#content').append('<div class="d-flex flex-row scroller-card-playlist">');
    for (let playlist of playlists)
        $('.scroller-card-playlist').append(album_card(playlist));
    $('#content').append('</div>');
    $('#content').append('<h2 style="margin: 15px 0;">Tracks</h2>\n');
    let tracks = artisteInfo['titre'];
    for (let track of tracks)
        $('#content').append(track_list(track));
}


