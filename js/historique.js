///////////////////   HISTORIQUE REQUEST   ///////////////////////////
const divhistorique = document.getElementById('historique');
divhistorique.addEventListener('click', function() {
    var id_playlist = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/playlist/?id_playlist='+ id_playlist, playlistDetail)
});
