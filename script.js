// // Create the audio object from the audio element
// const audio = document.querySelector(".audio-player");

// // Get important elements from the music player
// const playButton = document.querySelector(".play");
// const progressBar = document.querySelector(".progress-bar");
// const progress = document.querySelector(".progress");
// const currentTimeEl = document.querySelector(".current-time");
// const totalTimeEl = document.querySelector(".total-time");
// const musicPlayer = document.querySelector('.music-player');
// const musicAlbum = musicPlayer.querySelector('.album');
// const musicName = musicPlayer.querySelector('.name');
// const musicArtist = musicPlayer.querySelector('.artist');

// // Play/Pause toggle
// playButton.addEventListener("click", function () {
//     const icon = this.querySelector("i");

//     if (icon.classList.contains("fa-play-circle")) {
//         icon.classList.remove("fa-play-circle");
//         icon.classList.add("fa-pause-circle");
//         audio.play();
//     } else {
//         icon.classList.remove("fa-pause-circle");
//         icon.classList.add("fa-play-circle");
//         audio.pause();
//     }
// });

// // Format time in mm:ss
// function formatTime(time) {
//     const minutes = Math.floor(time / 60);
//     const seconds = Math.floor(time % 60).toString().padStart(2, "0");
//     return `${minutes}:${seconds}`;
// }

// // Update progress bar and times
// audio.addEventListener("timeupdate", () => {
//     const current = audio.currentTime;
//     const duration = audio.duration;

//     const percent = (current / duration) * 100;
//     progress.style.width = `${percent}%`;

//     currentTimeEl.textContent = formatTime(current);
//     totalTimeEl.textContent = isNaN(duration) ? "0:00" : formatTime(duration);
// });

// // Allow clicking on progress bar to seek
// progressBar.addEventListener("click", (e) => {
//     const barWidth = progressBar.clientWidth;
//     const clickX = e.offsetX;
//     const duration = audio.duration;

//     audio.currentTime = (clickX / barWidth) * duration;
// });

// // Handle song list click and update music player
// document.querySelectorAll(".song-item").forEach(item => {
//     item.addEventListener("click", function() {
//         const img = this.querySelector(".song-list-img").src;
//         const title = this.querySelector("h4").textContent;
//         const artist = this.querySelector("p").textContent;

//         document.querySelector(".song-img").src = img;
//         document.querySelector(".song-title").textContent = title;
//         document.querySelector(".song-description").textContent = artist;

//         // NEW: Change audio source based on song title (or better if you have data-src)
//         let songSrc = ""; 

//         if (title.toLowerCase().includes("khairiyat")) {
//             songSrc = "songs/KHAIRIYAT.mp3";
//         } else if (title.toLowerCase().includes("tum hi ho")) {
//             songSrc = "songs/TUMHIHO.mp3";
//         } else if (title.toLowerCase().includes("nadania")) {
//             songSrc = "songs/NADANIA.mp3";
//         } else if (title.toLowerCase().includes("sunsathia")) {
//             songSrc = "songs/SUNSATHIYA.mp3";
//         }

//         audio.src = songSrc;
//         audio.load();
//         audio.play();

//         // Change play button to pause icon
//         const icon = playButton.querySelector("i");
//         icon.classList.remove("fa-play-circle");
//         icon.classList.add("fa-pause-circle");

//         // Active class to selected song
//         document.querySelectorAll(".song-item").forEach(item => {
//             item.classList.remove("active-song");
//         });
//         this.classList.add("active-song");

//         // Update song details in the player container
//         musicAlbum.src = img; // Update album image
//         musicName.textContent = title; // Update song name
//         musicArtist.textContent = artist; // Update artist name

//         // Open music player
//         musicPlayer.classList.add('active');
//     });
// });

// // Handle playlist card click and update music player
// document.querySelectorAll(".playlist-card").forEach(card => {
//     card.addEventListener("click", function () {
//         const img = this.querySelector(".playlist-img").src;
//         const title = this.querySelector(".playlist-name").textContent;
//         const description = this.querySelector(".playlist-description").textContent;

//         document.querySelector(".song-img").src = img;
//         document.querySelector(".song-title").textContent = title;
//         document.querySelector(".song-description").textContent = description;

//         // Same idea: load corresponding song
//         let songSrc = "";

//         if (title.toLowerCase().includes("khairiyat")) {
//             songSrc = "songs/KHAIRIYAT.mp3";
//         } else if (title.toLowerCase().includes("tum hi ho")) {
//             songSrc = "songs/TUMHIHO.mp3";
//         } else if (title.toLowerCase().includes("nadania")) {
//             songSrc = "songs/NADANIA.mp3";
//         } else if (title.toLowerCase().includes("sunsathia")) {
//             songSrc = "songs/SUNSATHIYA.mp3";
//         }

//         audio.src = songSrc;
//         audio.load();
//         audio.play();

//         // Update player details
//         musicAlbum.src = img;
//         musicName.textContent = title;
//         musicArtist.textContent = description;

//         // Change play button to pause icon
//         const icon = playButton.querySelector("i");
//         icon.classList.remove("fa-play-circle");
//         icon.classList.add("fa-pause-circle");

//         // Open music player
//         musicPlayer.classList.add('active');
//     });
// });

// // Close button to close the music player
// document.querySelector(".close-btn").addEventListener("click", function () {
//     musicPlayer.classList.remove("active");
//     audio.pause();
//     const icon = playButton.querySelector("i");
//     icon.classList.add("fa-play-circle");
//     icon.classList.remove("fa-pause-circle");
// });
