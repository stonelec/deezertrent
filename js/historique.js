///////////////////   HISTORIQUE REQUEST   ///////////////////////////
const divhistorique = document.getElementById('historique');
divhistorique.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/historique/', displayListePlaylist());
});
