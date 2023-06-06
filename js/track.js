$(document).on('click', '.bi-plus-lg', function(event) {
    let id_track = $(this).attr('id');
    let id_playlist = $(this).parent().attr('id');
    console.log(id_track);
    console.log(id_playlist);

    // ajaxRequest('POST', '../php/request.php/playlist/?id_track=' + id_track +'&id_playlist='+id_playlist, divplaylist );
    event.stopPropagation();
});
