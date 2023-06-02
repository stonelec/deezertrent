'use strict';


$('#all_search').click(() =>
    {
        ajaxRequest('GET', 'php/request.php/search', display_all);
    }
);

$('#track_search').click(() =>
    {
        ajaxRequest('GET', 'php/request.php/search/track', display_track);
    }
);

$('#album_search').click(() =>
    {
        ajaxRequest('GET', 'php/request.php/search/album', display_album);
    }
);

$('#artiste_search').click(() =>
    {
        ajaxRequest('GET', 'php/request.php/search/artist', display_artist);
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

function display_track(tracks){
    for (let track of tracks)
        $('#search_result').append('un morceau de musique'+ track.titre_track);
}

function display_artist(artists){
    for (let artist of artists)
        $('#search_result').append('un artiste'+ artist.nom_artiste);
}

function display_album(albums){
    for (let album of albums)
        $('#search_result').append('un album'+ album.titre_album);
}

function display_all(tracks, artists, albums){
    display_track(tracks);
    display_album(albums);
    display_artist(artists);
}
