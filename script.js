document.querySelectorAll(".playlist-card").forEach(card => {
    card.addEventListener("click", function () {
        const img = this.querySelector(".playlist-img").src; // Get image source
        const title = this.querySelector(".playlist-name").textContent; // Get song name
        const description = this.querySelector(".playlist-description").textContent; // Get artist & description

        document.querySelector(".song-img").src = img;
        document.querySelector(".song-title").textContent = title;
        document.querySelector(".song-description").textContent = description;
        document.querySelector(".song-details").classList.add("active");
    });
});

document.querySelector(".close-btn").addEventListener("click", function () {
    document.querySelector(".song-details").classList.remove("active");
});
