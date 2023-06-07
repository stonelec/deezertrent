function addTrack(id_track, id_playlist) {
    console.log("add-track");
    console.log(id_track);
    console.log(id_playlist);
    ajaxRequest('POST', '../php/request.php/add_track/', () => {

    } , 'id_track=' + id_track + '&id_playlist=' + id_playlist);

}
