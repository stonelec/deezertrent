let button_random = document.querySelector(".button_random");
let button_previous = document.querySelector(".button_previous");
let button_play_pause = document.querySelector(".button_play_pause");
let button_next = document.querySelector(".button_next");
let button_laps = document.querySelector(".button_laps");
let button_on_off = document.querySelector(".button_on_off");
let slider_volume = document.querySelector(".slider_volume");

let audio = document.querySelector('audio')

let is_playing = false;
let track_id;

let track_now = document.createElement('audio');

function playPauseTrack(){
    if(is_playing){
        pauseTrack();
    }else {
        playTrack();
    }
}
function playTrack(){
    audio.play();
    button_play_pause.innerHTML = 'pause_circle';
    is_playing = true;
    console.log("play");
}
function pauseTrack(){
    audio.pause();
    button_play_pause.innerHTML = 'play_circle';
    is_playing = false;
    console.log("pause");
}
function onOffTrack(){
    if(audio.muted){
        onTrack();
    }else {
        offTrack();
    }
}
function onTrack(){
    audio.muted = false;
    button_on_off.innerHTML = 'volume_up';
    console.log("track : on");
}
function offTrack(){
    audio.muted = true;
    button_on_off.innerHTML = 'volume_off';
    console.log("track : off");
}
function setVolume(){
    audio.volume =  slider_volume.value/100;
    console.log("volume : "+audio.volume*100+"%");
}
function editVolume(vol){
    let volume = audio.volume*100;
    volume += vol;
    if(volume > 100){
        volume = 100;
    }
    if(volume < 0){
        volume = 0;
    }
    slider_volume.value = volume;
    setVolume();
}
function onOffLoop(){
    console.log(audio.loop)
    if(audio.loop){
        offLoop();
    }else {
        onLoop();
    }
}
function  onLoop(){
    audio.loop = true;
    button_laps.innerHTML = "<span class=\"material-symbols-outlined play-icon-third-click button\" >laps</span>"
    console.log("loop : on");
}
function offLoop(){
    audio.loop = false;
    button_laps.innerHTML = "<span class=\"material-symbols-outlined play-icon-third button\">laps</span>"
    console.log("loop : off");
}

$(document).keydown(function(event) {
    console.log(event.keyCode)
    if (event.keyCode === 32) {
        playPauseTrack();
        event.preventDefault();
    }
    if (event.keyCode === 38) {
        editVolume(1);
        event.preventDefault();
    }
    if (event.keyCode === 40) {
        editVolume(-1);
        event.preventDefault();
    }
});