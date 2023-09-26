const audio = document.getElementById('myAudio');
const audioControl = document.getElementById('audioControl');
const playPauseIcon = document.getElementById('playPauseIcon');

audioControl.addEventListener('click', function () {
    if (audio.paused) {
        audio.play();
        playPauseIcon.src = 'img/pause.png';
    } else {
        audio.pause();
        playPauseIcon.src = 'img/play.png';
    }
});
