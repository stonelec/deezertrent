'use strict';
var audioPlayer = document.getElementById("audioPlayer");
var progressBar = document.querySelector(".progres-bar");
var progress = progressBar.querySelector(".slider-progres");
var track_current_time = document.getElementById("track_current_time");
var track_lenght = document.getElementById("track_lenght");

var isDragging = false;


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
    var progressBarWidth = progressBar.offsetWidth;
    var clickPosition = event.clientX - progressBar.getBoundingClientRect().left;
    var progressPercentage = (clickPosition / progressBarWidth) * 100;

    progressPercentage = Math.min(Math.max(progressPercentage, 0), 100);

    progress.style.width = progressPercentage + "%";

    var newPosition = (progressPercentage / 100) * audioPlayer.duration;
    audioPlayer.currentTime = newPosition;
}

audioPlayer.addEventListener("timeupdate", function() {
    var newPosition = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    progress.style.width = newPosition + "%";
    track_current_time.textContent = formatTime(audioPlayer.currentTime);
    track_lenght.textContent = formatTime(audioPlayer.duration);

});
function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    seconds = seconds < 10 ? "0" + seconds : seconds;
    return minutes + ":" + seconds;
}


