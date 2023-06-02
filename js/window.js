'use strict';
let button = '<div class="d-flex flex-row">\n' +
    '           <button id="all_search" class="btn btn-info">Tous</button>\n' +
    '           <button id="track_search" class="btn btn-info">Morceaux</button>\n' +
    '           <button id="album_search" class="btn btn-info">Albums</button>\n' +
    '           <button id="artiste_search" class="btn btn-info">Artiste</button>\n' +
    '         </div>'

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
    console.log(results);
    $('#content').append('LE TEST');
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
    console.log('LE TEST');
    $('#search_result').append(button);
    display_track(results);
    display_artist(results);
    display_album(results);
}
