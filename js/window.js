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
        '                                        <img class="music-image infos-left-part " src="images/imaginedragons_nightvisions.png"  alt=".....">\n' +
        '                                    </div>\n' +
        '                                    <div>\n' +
        '                                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
        '                                    </div>\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part" style="font-weight: bolder;">'+infos['titre_track']+'</h7>\n' +
        '                                        </div>\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="infos-left-part">Imagines Dragons</h7>\n' +
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
function album_list(album){

    let artist = album["nom_artiste"];
    return'                        <ul class="list-album list-group justify-content-center">\n' +
        '\n' +
        '                            <li class="album d-flex justify-content-between align-items-center">\n' +
        '                                <div class="album-left-part d-flex align-items-center">\n' +
        '                                    <div>\n' +
        '                                        <img class="music-image album-left-part " src="images/albums/"'+album["image_album"]+' alt=".....">\n' +
        '                                    </div>\n' +
        '                                    <div class="d-flex flex-row align-items-center">\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="album-left-part" style="font-weight: bolder;">'+album["titre_album"]+'</h7>\n' +
        '                                        </div>\n' +
        '                                        <div class="overflow">\n' +
        '                                            <h7 class="album-left-part">test test</h7>\n' +
        '                                        </div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                                <div class="album-right d-flex flex-row align-items-center">\n' +
        '                                    <div class="overflow">\n' +
        '                                        <h7 class="album-right-date album-right-part ">'+album["date_parution"].slice(0, 10)+'</h7>\n' +
        '                                    </div>'+
        '                                </div>'+
        '                            </li>\n' +
        '                        </ul>';
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
$('#bar').on("keydown",()=>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);


$('#all_search').click(() =>
    {
        let search = $('#bar').val();
        ajaxRequest('GET', '../php/request.php/search/?key='+ search, display_all);
    }
);

$('#track_search').click(() =>
    {
        ajaxRequest('GET', '../php/request.php/search/track/', display_track);
    }
);

$('#album_search').click(() =>
    {
        ajaxRequest('GET', '../php/request.php/search/album/', display_album);
    }
);

$('#artiste_search').click(() =>
    {
        ajaxRequest('GET', '../php/request.php/search/artist/', display_artist);
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
    for (let track of tracks) {
        // console.log(track);
        $('#content').append(track_list(track));
    }
}
function display_artist(results){
    $('#content').empty();
    $('#content').append( button_artiste);
}
function show_artist(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les artistes</h2>');

    results = JSON.parse(results);
    // console.log(results);
    let artists = results[5];
    for (let artist of artists) {
        // console.log(artist);
        $('#content').append(artist_list(artist));
    }
}
function display_album(results){
    $('#content').empty();
    $('#content').append(button_album);
}
function show_album(results) {
    $('#content').append('<h2 style="margin: 15px 0">Les albums</h2>');

    results = JSON.parse(results);
    // console.log(results);
    let albums = results[3];
    for (let album of albums) {
        console.log("album");
        console.log(album);
        $('#content').append(album_list(album, ));
    }
}
function display_all(results){
    $('#content').empty();
    console.log('display_all');
    $('#content').empty();
    $('#content').append(button_all);
    show_track(results);
    show_artist(results);
    show_album(results);
}