<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>

</head>
    <audio src="https://cdns-preview-b.dzcdn.net/stream/c-b53be55456ff326e9c2a7bf1d0abe601-6.mp3" id="audioPlayer" controls></audio>
    <div class="progress-bar">
        <div class="progress"></div>
    </div>
    <div id="currentTime"></div>
    <div id="duration"></div>

<body>
</body>
</html>

<style>
    .progress-bar {
        width: 300px;
        height: 10px;
        background-color: #ccc;
        cursor: pointer;
    }

    .progress {
        height: 100%;
        background-color: #f00;
        width: 0;
    }

    #currentTime, #duration {
        margin-top: 10px;
    }

</style>
<script>
    var audioPlayer = document.getElementById("audioPlayer");
    var progressBar = document.querySelector(".progress-bar");
    var progress = progressBar.querySelector(".progress");
    var currentTimeDisplay = document.getElementById("currentTime");
    var durationDisplay = document.getElementById("duration");

    audioPlayer.addEventListener("timeupdate", function() {
        var progressPercentage = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progress.style.width = progressPercentage + "%";
        currentTimeDisplay.textContent = formatTime(audioPlayer.currentTime);
    });

    audioPlayer.addEventListener("durationchange", function() {
        durationDisplay.textContent = formatTime(audioPlayer.duration);
    });

    progressBar.addEventListener("click", function(event) {
        var progressBarWidth = progressBar.offsetWidth;
        var clickPosition = event.clientX - progressBar.getBoundingClientRect().left;
        var progressPercentage = (clickPosition / progressBarWidth) * 100;
        var newPosition = (progressPercentage / 100) * audioPlayer.duration;
        audioPlayer.currentTime = newPosition;
    });

    function formatTime(time) {
        var minutes = Math.floor(time / 60);
        var seconds = Math.floor(time % 60);
        seconds = seconds < 10 ? "0" + seconds : seconds;
        return minutes + ":" + seconds;
    }



</script>