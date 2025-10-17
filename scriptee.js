function bindPlaylistCardEvents() {
    const playlistCards = document.querySelectorAll('.playlist-card:not(.upload-music-card)');

    playlistCards.forEach(card => {
        card.addEventListener('click', () => {
            console.log("Clicked a song card");

            let src = card.getAttribute('data-src');
            let album = card.querySelector('.playlist-img');
            let name = card.querySelector('.playlist-name');
            let artist = card.querySelector('.playlist-description');

            playSong({
                src: src,
                imgSrc: album.src,
                title: name.textContent,
                artist: artist.textContent
            });
        });
    });
}

let songDetails = document.querySelector('.song-details');

let detailSongImage = songDetails.querySelector('.song-img');
let detailSongTitle = songDetails.querySelector('.song-title');
let detailSongDescription = songDetails.querySelector('.song-description');

let playerAudio = document.getElementById('playerAudio');
let playerSource = document.getElementById('playerSource');

const playControlBtn = document.querySelector('.player-controls .play');
const prevControlBtn = document.querySelector('.player-controls .prev');
const nextControlBtn = document.querySelector('.player-controls .next');
const shuffleControlBtn = document.querySelector('.player-controls .shuffle');
const repeatControlBtn = document.querySelector('.player-controls .repeat');

const progressContainer = document.querySelector('.progress-bar');
const progress = document.querySelector('.progress');
const currentTimeEl = document.querySelector('.current-time');
const totalTimeEl = document.querySelector('.total-time');

let isPlaying = false;
let isShuffle = false;
let isRepeat = false;

// === Common function to play any song ===
function playSong({ src, imgSrc, title, artist }) {
    detailSongImage.src = imgSrc;
    detailSongTitle.textContent = title;
    detailSongDescription.textContent = artist;

    playerSource.src = src;
    playerAudio.load();
    playerAudio.play();

    isPlaying = true;
    updatePlayButton();

    songDetails.classList.add('active');
    songDetails.style.display = 'flex';
}

// Song list items click
let songListItems = document.querySelectorAll('.song-item');

document.addEventListener("DOMContentLoaded", function () {
    bindPlaylistCardEvents(); // ✅ binds all playlist cards in all grids

    const songItems = document.querySelectorAll('.song-item');

    songItems.forEach(item => {
        const audioSrc = item.getAttribute('data-src');
        const durationSpan = item.querySelector('.song-duration');

        const tempAudio = new Audio();
        tempAudio.src = audioSrc;

        tempAudio.addEventListener('loadedmetadata', function () {
            const duration = tempAudio.duration;
            const formatted = formatTime(duration);
            durationSpan.textContent = formatted;
        });

        tempAudio.addEventListener('error', function () {
            durationSpan.textContent = 'N/A';
        });

        item.addEventListener('click', () => {
            console.log("Clicked a song item from the list");

            let src = item.getAttribute('data-src');
            let album = item.querySelector('.song-list-img');
            let name = item.querySelector('h4');
            let artist = item.querySelector('p');

            playSong({
                src: src,
                imgSrc: album.src,
                title: name.textContent,
                artist: artist.textContent
            });
        });
    });
});

// Close button
document.querySelector('.close-btn').onclick = () => {
    songDetails.classList.remove('active');
    songDetails.style.display = 'none';
    playerAudio.pause();
    playerAudio.currentTime = 0;
    isPlaying = false;
    updatePlayButton();
};

// Update play/pause button icon
function updatePlayButton() {
    if (isPlaying) {
        playControlBtn.innerHTML = '<i class="fas fa-pause-circle"></i>';
    } else {
        playControlBtn.innerHTML = '<i class="fas fa-play-circle"></i>';
    }
}

// Play/Pause toggle
playControlBtn.addEventListener('click', () => {
    if (playerAudio.paused) {
        playerAudio.play();
        isPlaying = true;
    } else {
        playerAudio.pause();
        isPlaying = false;
    }
    updatePlayButton();
});

// Previous button
prevControlBtn.addEventListener('click', () => {
    playerAudio.currentTime = 0;
});

// Next button
nextControlBtn.addEventListener('click', () => {
    playerAudio.currentTime = playerAudio.duration;
});

// Shuffle button


// Repeat button
repeatControlBtn.addEventListener('click', () => {
    isRepeat = !isRepeat;
    repeatControlBtn.classList.toggle('active', isRepeat);
    playerAudio.loop = isRepeat;
});

// Update progress bar
playerAudio.addEventListener('timeupdate', () => {
    const { currentTime, duration } = playerAudio;
    if (duration) {
        const progressPercent = (currentTime / duration) * 100;
        progress.style.width = `${progressPercent}%`;

        currentTimeEl.textContent = formatTime(currentTime);
        totalTimeEl.textContent = formatTime(duration);
    }
});

// Click to seek
progressContainer.addEventListener('click', (e) => {
    const width = progressContainer.clientWidth;
    const clickX = e.offsetX;
    const duration = playerAudio.duration;

    playerAudio.currentTime = (clickX / width) * duration;
});

// Format time helper
function formatTime(time) {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}

const downloadBtn = document.querySelector('.download-btn');
  const source = document.getElementById('playerSource');

  downloadBtn.addEventListener('click', () => {
    const songURL = source.getAttribute('src');

    if (!songURL) {
      alert('No song is currently loaded to download.');
      return;
    }

    const a = document.createElement('a');
    a.href = songURL;
    a.download = songURL.split('/').pop(); // Optional: extract filename
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
     });

      window.addEventListener('DOMContentLoaded', () => {
        gsap.from(".sidebar a", {
            x: -200,
            opacity: 0,
            duration: 1,
            ease: "power2.out",
            stagger: 0.2
        });
        gsap.from(".search-bar", {
            y: 50,
            opacity: 0,
            duration: 2,
            ease: "power2.out",
            stagger: 0.2
        });
        gsap.from(".mood-pill", {
            y: 20,
            opacity: 0,
            duration: 1,
            ease: "power2.out",
            stagger: 0.2
        });
    });
