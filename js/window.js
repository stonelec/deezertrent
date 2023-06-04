'use strict';
let button_all = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
'                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
'                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
'                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_track = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger active">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_album = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger active">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_artiste = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger active">Artiste</a>\n' +
    '         </div>'
function track_list(infos){
    return'<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center name="'+infos['id_track ']+'"   ">\n' +
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
        '                                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        '                                    <i class="bi bi-heart button button-track infos-right-part"></i>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'


}
function album_list(infos){
    return    '<ul class="list-infos list-group justify-content-center">\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center name="'+infos['id_album ']+'"   ">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div>\n' +
        '                                        <img class="music-image infos-left-part " src="images/albums/'+infos['image_album']+'"  alt=".....">\n' +
        '                                    </div>\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_album']+'</h7>\n' +
        '                                        </div>\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part">'+infos["nom_artiste"]+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                                     <div class="overflow">\n' +
        '                                        <h7 class="infos-right-date infos-right-part ">'+infos["date_parution"].slice(0,10)+'</h7>\n' +
        '                                    </div>'+
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>'
}
function artist_list(infos){
    // console.log('artist_list');
    // console.log(infos);
    return'                        <ul class="list-infos list-group justify-content-center">\n' +
        '\n' +
        '                            <li class="infos d-flex justify-content-between align-items-center">\n' +
        '                                <div class="infos-left-part d-flex align-items-center">\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder; margin-left: 20px;">'+infos['nom_artiste']+'</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </li>\n' +
        '                        </ul>';
}
$(document).on('click', '#recherche', () =>
    {
        $('#title-page').empty();
        $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);
$(document).on('keydown', '#bar', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);

$(document).on('click', '#all_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);

    }
);

$(document).on('click', '#track_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_track);
    }
);
$(document).on('click', '#album_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_album);
    }
);
$(document).on('click', '#artiste_search', () =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_artist);
    }
);



// Search functions
function display_track(results) {
    $('#content').empty();
    $('#content').append( button_track);
    show_track(results);

}
function show_track(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les titres</h2>');

    results = JSON.parse(results);
    // console.log(results);
    let tracks = results[0];
    if (tracks.length === 0){
        $('#content').append('<p style="margin: 15px 0">Aucun morceaux trouvé</p>');
    }else {
        for (let track of tracks) {
            // console.log(track);
            $('#content').append(track_list(track));
        }
    }
}
function display_artist(results){
    $('#content').empty();
    $('#content').append( button_artiste);
    show_artist(results);
}
function show_artist(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les artistes</h2>');

    results = JSON.parse(results);
    // console.log(results);
    let artists = results[5];
    if (artists.length === 0){
        $('#content').append('<p style="margin: 15px 0">Aucun artiste trouvé</p>');
    }else {
        for (let artist of artists) {
            // console.log(artist);
            $('#content').append(artist_list(artist));
        }
    }
}
function display_album(results){
    $('#content').empty();
    $('#content').append(button_album);
    show_album(results)
}
function show_album(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les albums</h2>');

    results = JSON.parse(results);
    // console.log(results);
    let albums = results[3];
    if (albums.length === 0){
        $('#content').append('<p style="margin: 15px 0">Aucun album trouvé</p>');
    }else {
        for (let album of albums) {
            // console.log("album");
            console.log(album);
            $('#content').append(album_list(album));
        }
    }
}
function display_all(results){
    $('#content').empty();
    $('#content').append(button_all);
    show_track(results);
    show_artist(results);
    show_album(results);
}