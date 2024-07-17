/* Java Script da Página de Música */
const playButton = document.getElementById('playButton');
const musicIcon = document.getElementById('musicIcon');
const audioPlayer = document.getElementById('audioPlayer');
const progressBar = document.getElementById('progressBar');
const currentTimeDisplay = document.getElementById('currentTime');

playButton.addEventListener('click', function () {
    if (audioPlayer.paused) {
        audioPlayer.play();
        musicIcon.classList.add('rotate');
        playButton.innerHTML = '<i class="bx bx-pause-circle"></i>';
    } else {
        audioPlayer.pause();
        musicIcon.classList.remove('rotate');
        playButton.innerHTML = '<i class="bx bx-play-circle"></i>';
    }
});

audioPlayer.addEventListener('timeupdate', function () {
    const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    progressBar.style.width = `${progress}%`;
    const currentMinutes = Math.floor(audioPlayer.currentTime / 60);
    const currentSeconds = Math.floor(audioPlayer.currentTime % 60);
    currentTimeDisplay.textContent = `${currentMinutes}:${currentSeconds < 10 ? '0' : ''}${currentSeconds}`;
});
