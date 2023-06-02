'use strict';
let button_all = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
'                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
'                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
'                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_track = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_album = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
let button_artiste = '<div class="btn-group" style="width:30%;"   >\n' +
    '            <a id="all_search" class="btn btn-danger active">Tous</a>\n' +
    '                <a id="track_search"  class="btn btn-danger">Morceaux</a>\n' +
    '                <a id="album_search" class="btn btn-danger">Albums</a>\n' +
    '                <a id="artiste_search" class="btn btn-danger">Artiste</a>\n' +
    '         </div>'
function track_list(image, titre, artiste, date, showDate, showLike, showTrash, showPlaylist, isLike){
    let stockDate='';
    let stockLike='<i class="bi bi-heart button button-track infos-right-part"></i>\n';
    let stockTrash='';
    if(showDate){
        stockDate = '<h7 class="infos-right-date infos-right-part ">'+date+'</h7>\n';
    }
    if(isLike){
        let stockLike = '<i class="bi bi-heart-fill button button-track infos-right-part"></i>\n';
    }
    if(!showLike){

    }
    if (showTrash){
        let stockTrash = '<i class="bi bi-trash button button-track infos-right-part"></i>\n';
    }

    return '        <ul class="list-infos list-group justify-content-center">\n' +
        '            <li class="infos d-flex justify-content-between align-items-center">\n' +
        '                <div class="infos-left-part d-flex align-items-center">\n' +
        '                    <div>\n' +
        '                        <img class="music-image infos-left-part " src="images/'+image+'.png"  alt=".....">\n' +
        '                    </div>\n' +
        '                    <div>\n' +
        '                        <i class="bi bi-play-fill button button-track infos-left-part infos-left-play"></i>\n' +
        '                    </div>\n' +
        '                    <div class="d-flex flex-row align-items-center">\n' +
        '                        <div class="overflow">\n' +
        '                            <h7 class="infos-left-part" style="font-weight: bolder;">'+titre+'</h7>\n' +
        '                        </div>\n' +
        '                        <div class="overflow">\n' +
        '                            <h7 class="infos-left-part">'+artiste+'</h7>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <div class="infos-right d-flex flex-row align-items-center">\n' +
        '                    <div class="overflow">\n' +
        stockDate+
        '                    </div>\n' +
        '                    ' +
        '                    <i class="bi bi-plus-lg button button-track infos-right-part"></i>\n' +
        stockLike+
        '                </div>\n' +
        '            </li>\n' +
        '        </ul>';
}
$('#search_button').click(()=>
    {
        let search = $('#bar').value;
        ajaxRequest('GET', '../php/request.php/search/?bar='+ search, display_all);
    }
);

$('#all_search').click(() =>
    {
        ajaxRequest('GET', '../php/request.php/search/', display_all);
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
function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );
    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

function display_track(results){
    // $('#content').
    for (let track of results){
        $('#search_result').append('un morceau de musique'+ track.titre_track);
    }
}

function display_artist(results){
    for(let artist of results){
        $('#search_result').append('un artiste' + artist.nom_artiste);
    }
}

function display_album(results){
    for(let album of results){
        $('#search_result').append('un album : '+ album.titre_album);
    }
}

function display_all(results){
    console.log('display_all');
    $('#content').empty();
    $('#content').append(button_all);
    display_track(results);
    display_artist(results);
    display_album(results);
}
