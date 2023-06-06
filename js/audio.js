'use strict';

function displayAudio(info){
    $('#musique').html('' +
        '<audio id="audioPlayer" src="'+info[0]['lien_track']+'" autoplay></audio>');

    //Changed the div that displays info for the current song
    $('#info_music_played').html('<div class="current-music d-flex justify-content-center">\n' +
        '           <div class="current-music-center d-flex flex-column click">\n' +
        '               <div class="text-center">\n' +
        '                   <img class="current-music-image" src="images/albums/'+info[0]['image_album']+'"  alt="Image du titre en cours">\n' +
        '               </div>\n' +
        '               <div class="current-music-infos d-flex justify-content-between">\n' +
        '                   <div class="d-flex flex-column">\n' +
        '                       <h6>'+info[0]['titre_track']+'</h6>\n' +
        '                       <p>'+info[0]['nom_artiste']+'</p>\n' +
        '                   </div>\n' +
        '                   <div class="d-flex flex-column " style="font-size : 1.2rem;">\n' +
        '                       <i class="bi bi-heart button"></i>\n' +
        '                       <div style="margin-bottom: 10px"></div>\n' +
        '                       <i class="bi bi-plus-lg button"></i>\n' +
        '                   </div>\n' +
        '               </div>\n' +
        '           </div>\n' +
        '       </div>')

    audio = document.querySelector('audio');
    audioPlayer = document.getElementById("audioPlayer");
    is_playing = true;
    playTrack();
}

$(document).on('click', '.bi-play-fill', function (event){
    event.stopPropagation();
    var id_track = $(this).parent().parent().attr('id');
    ajaxRequest('GET', '../php/request.php/audio?id_track='+ id_track, displayAudio)
});
