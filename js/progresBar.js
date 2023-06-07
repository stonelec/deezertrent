'use strict';
let audioPlayer = document.getElementById("audioPlayer");
let progressBar = document.querySelector(".progres-bar");
let progress = progressBar.querySelector(".slider-progres");
let track_current_time = document.getElementById("track_current_time");
let track_lenght = document.getElementById("track_lenght");

let isDragging = false;


progressBar.addEventListener("mousedown", function(event) {
    isDragging = true;
    updateProgressBar(event);
});

progressBar.addEventListener("mousemove", function(event) {
    if (isDragging) {
        updateProgressBar(event);
    }
});

progressBar.addEventListener("mouseup", function() {
    isDragging = false;
});


function updateProgressBar(event) {
    let progressPercentage = ((event.clientX - progressBar.getBoundingClientRect().left) / progressBar.offsetWidth) * 100;

    progress.style.width = progressPercentage + "%";

    audioPlayer.currentTime = (progressPercentage / 100) * audioPlayer.duration;
}

audioPlayer.addEventListener("timeupdate", function() {
    console.log("timeupdate");
    progress.style.width = (audioPlayer.currentTime / audioPlayer.duration) * 100 + "%";
    track_current_time.textContent = formatTime(audioPlayer.currentTime);
    if (formatTime(audioPlayer.duration) !== "NaN:NaN"){
        track_lenght.textContent = formatTime(audioPlayer.duration);
    }else {
        track_lenght.textContent = "0:00";
    }

});
function formatTime(time) {
    let minutes = Math.floor(time / 60);
    let seconds = Math.floor(time % 60);
    seconds = seconds < 10 ? "0" + seconds : seconds;
    return minutes + ":" + seconds;
}


