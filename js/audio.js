'use strict';

function displayAudio(info){
    $('#audio').html('' +
        '<audio id="audioPlayer" src="'+info['lien_track']+'"></audio>')

    //Modification de la div qui affiche les infos du morceau en cours
}

$(document).on('click', '.bi-play-fill', function (event){
    var id_track = $(this).attr('id');
    ajaxRequest('GET', '../php/request.php/audio/?id_track='+ id_track, displayAudio)

});
