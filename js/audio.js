'use strict';

function displayAudio(info){
    $('#audioPlayer').attr('src', info[0]['lien_track']);

/*    //Changed the div that displays info for the current song
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
        '       </div>')*/
    displayAudioCard(info).then((result) => {
        $('#info_music_played').html(result);
    });
    audio = document.querySelector('audio');
    audioPlayer = document.getElementById("audioPlayer");
    is_playing = true;
    playTrack();
}
function displayAudioCard(info){
    return new Promise((resolve, reject) => {
        ajaxRequest('GET', '../php/request.php/playlist/', (playlists)=>{
            let result;
            result = '<div class="current-music d-flex justify-content-center">\n' +
                '           <div class="current-music-center d-flex flex-column click">\n' +
                '               <div class="text-center">\n' +
                '                   <img class="current-music-image" src="images/albums/'+info[0]['image_album']+'"  alt="Image du titre en cours">\n' +
                '               </div>\n' +
                '               <div class="current-music-infos d-flex justify-content-between">\n' +
                '                   <div class="d-flex flex-column">\n' +
                '                       <h6>'+info[0]['titre_track']+'</h6>\n' +
                '                       <p>'+info[0]['nom_artiste']+'</p>\n' +
                '                   </div>\n' +
                '                                <div class="infos-right d-flex flex-column align-items-center align-self-center" style="font-size: 20px; margin-top: -20px"  id="'+info['id_playlist']+'">'+
                '                                   <div class="dropdown" onclick="event.stopPropagation();" style=" margin-top: 8px">\n' +
                '                                       <div data-bs-toggle="dropdown" aria-expanded="false">\n' +
                '                                          <i class="bi bi-plus-lg button button-track infos-right-part add" id="'+info['id_track']+'"></i>\n' +
                '                                       </div>\n' +
                '                                       <ul class="dropdown-menu">\n';

            for(let playlist of playlists){
                if(playlist['nom_playlist'] !== "Historique" && playlist['nom_playlist'] !== "Favoris" && playlist['nom_playlist'] !== "Liste de lecture"){
                    result += '                                         <li><a class="dropdown-item add-track" onclick="addTrack('+info["id_track"]+","+playlist["id_playlist"]+')" id="'+playlist['id_playlist']+'">'+playlist['nom_playlist']+'</a></li>\n';

                }
            }

            result += '                              </ul>\n' +
                '                                   </div>\n'+
                '                                   <i class="bi bi-heart button button-track infos-right-part add_fav" id="'+info['id_track']+'"></i>\n' +
                '                   </div>\n' +
                '               </div>\n' +
                '           </div>\n' +
                '       </div>';
            resolve(result);

        });
    });
}

$(document).on('click', '.bi-play-fill', function (event){
    event.stopPropagation();
    var id_track = $(this).parent().parent().attr('id');
    ajaxRequest('GET', '../php/request.php/audio?id_track='+ id_track, displayAudio)
});
$(document).on('click', '.button_next', function (event){
    event.stopPropagation();
    console.log("next");
});
$(document).on('click', '.button_previous', function (event){
    event.stopPropagation();
    console.log("previous");
});
$(document).on('dblclick', '.get_track', function (event){
    event.stopPropagation();
    console.log("add wait-list");
});