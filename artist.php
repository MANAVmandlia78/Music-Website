<?php
include 'connect.php';
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE id= $id");
    $row = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="music.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="stylu.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>WaveTune: Where Music Finds Its Rhythm</title>
    
</head>

<body>
    <div class="sidebar">
        <a href="#" class="logo">
            <img class="logoimage" src="music.png" alt="">
            <span>WaveTune</span>
        </a>

        <nav>
            <a href="indexee.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="Explore.php" class="nav-item">
                <i class="fas fa-compass"></i>
                <span>Explore</span>
            </a>
            <a href="artist.php" class="nav-item">
                <i class="fa-solid fa-palette"></i>
                <span>Artist</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-headphones"></i>
                <span>Top chart</span>
            </a>

        </nav>

        <div class="divider"></div>

        <button class="new-playlist">
            <i class="fas fa-plus" style="margin-right: 10px;"></i>
            <span>New playlist</span>
        </button>

        <h3 class="playlist-title">Liked music</h3>
        <a href="#" class="playlist-item">Auto playlist</a>

        <h3 class="playlist-title">Your playlists</h3>
        <a href="#" class="playlist-item">CSS Animation Effects Tutorial</a>
        <a href="#" class="playlist-item">Episodes for later</a>
        <a href="#" class="playlist-item">Workout Mix</a>
        <a href="#" class="playlist-item">Study Music</a>
        <a href="#" class="playlist-item">Chill Vibes</a>
        <a href="#" class="playlist-item">Rock Classics</a>
    </div>
    <div class="main-content">
        <div class="top-bar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search songs, albums, artists, podcasts">
            </div>
            <div class="user-menu">
                <h4>
                    <?php echo $row["name"]; ?>
                </h4>
                <button><i class="fas fa-cast"></i></button>
                <button><i class="fas fa-user"></i></button>
            </div>
        </div>

        <div class="mood-pills">
            <button class="mood-pill">Podcasts</button>
            <button class="mood-pill">Romance</button>
            <button class="mood-pill">Feel good</button>
            <button class="mood-pill">Relax</button>
            <button class="mood-pill">Energise</button>
            <button class="mood-pill">Party</button>
            <button class="mood-pill">Work out</button>
            <button class="mood-pill">Commute</button>
            <button class="mood-pill">Sad</button>
            <button class="mood-pill">Focus</button>
            <button class="mood-pill">Sleep</button>
        </div>

        <div class="home">

        </div>

        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Artist : Darshan Raval</h2>
                <a href="#" class="see-all">More</a>
            </div>

            <div class="music-player">
                <i class="fas fa-times" id="close"></i>

                <div class="box">
                    <img src="" class="album" alt="Album Art">

                    <div class="song-info">
                        <div class="name">Song Name</div>
                        <div class="artist">Artist Name</div>
                    </div>

                    <audio src="" controls class="music"></audio>
                </div>
            </div>

            <div class="playlists-grid">
                <section class="playlist">
<!-- GRID 1 SECTION -->
                    <div class="playlists-grid">
                        <?php $select_songs = mysqli_query($conn, "SELECT * FROM `songs` WHERE grid_type = 'grid4'");
      if(mysqli_num_rows($select_songs) > 0){
         while($fetch_song = mysqli_fetch_assoc($select_songs)){
      ?>
         <div class="playlist-card" data-src="uploaded_music/<?= $fetch_song['music']; ?>">
            <?php if($fetch_song['album'] != ''){ ?>
               <img src="uploaded_album/<?= $fetch_song['album']; ?>" alt="" class="playlist-img">
            <?php }else{ ?>
               <img src="images/disc.png" alt="" class="playlist-img">
            <?php } ?>
            <h3 class="playlist-name"><?= $fetch_song['name']; ?></h3>
            <p class="playlist-description"><?= $fetch_song['artist']; ?></p>
         </div>
      <?php
         }
      } else {
         echo "<p>No songs in Grid 1 yet.</p>";
      }
      ?>
                        <!-- Upload Music card OUTSIDE the above loop -->
                        <!-- Upload Music card OUTSIDE the above loop -->
                        <?php if ($row["name"] === "Manav Mandalia") { ?>
                        <div class="playlist-card upload-music-card">
                            <a href="upload_music.php" class="btn">Upload Music</a>
                        </div>
                        <?php } ?>


                    </div>


                </section>
            </div>
        </div>
<div class="section-header">
                <h2 class="section-title">Music shorts</h2>
                <a href="#" class="see-all">More</a>
            </div>
  <div class="nav-tabsee">
    <button class="tabee activeee">All</button>
    <button class="tabee">Music</button>
    <button class="tabee">Podcasts</button>
  </div>
<div class="containeree">
  <!-- Salem Ilese Mix Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="khat.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">Likhe jo khat</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="khat.mp4" type="video/mp4">
      </video>
      <div class="artistsee">Bella Poarch, Charlie Puth and Em Beihold</div>
      <div class="badgeee">LIVE</div>
    </div>
  </div>

  <!-- King Gnu Mix Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="falak.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">Falak tak chal</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="falak.mp4" type="video/mp4">
      </video>
      <div class="artistsee">Mrs. GREEN APPLE, Hitsujiburugaku and SPITZ</div>
    </div>
  </div>

  <!-- Kaise Hua Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="EK tarfa.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">Ek Tarfa 2.0</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="EK tarfa.mp4" type="video/mp4">
      </video>
    </div>
  </div>
</div>

          <div class="section">
            <div class="section-header">
                <h2 class="section-title">Artist : Jubin Nautiyal</h2>
                <a href="#" class="see-all">More</a>
            </div>
            <div class="playlists-grid">
                <section class="playlist">
<!-- GRID 5 SECTION -->
                    <div class="playlists-grid">
                       <div class="playlists-grid">
   <section class="playlist">
      <?php 
      $select_songs = mysqli_query($conn, "SELECT * FROM `songs` WHERE grid_type = 'grid5'");
      if(mysqli_num_rows($select_songs) > 0){
         while($fetch_song = mysqli_fetch_assoc($select_songs)){
      ?>
         <div class="playlist-card" data-src="uploaded_music/<?= $fetch_song['music']; ?>">
            <?php if($fetch_song['album'] != ''){ ?>
               <img src="uploaded_album/<?= $fetch_song['album']; ?>" alt="" class="playlist-img">
            <?php }else{ ?>
               <img src="images/disc.png" alt="" class="playlist-img">
            <?php } ?>
            <h3 class="playlist-name"><?= $fetch_song['name']; ?></h3>
            <p class="playlist-description"><?= $fetch_song['artist']; ?></p>
         </div>
      <?php
         }
      } else {
         echo "<p>No songs in Grid 5 yet.</p>";
      }
      ?>
</div>
            </div>


                </section>
            </div>
        </div>    <div class="song-details">
                    <div class="glass-container">
                        <button class="close-btn">×</button>

                        <div class="song-details-content">
                            <!-- Right Side: Player Controls -->
                            <div class="player-section">
                                <img src="" alt="Song Image" class="song-img">
                                <h3 class="song-title" style="color: white;"></h3>
                                <p class="song-description"></p>

                                <div class="progress-container">
                                    <span class="current-time">1:45</span>
                                    <div class="progress-bar">
                                        <div class="progress"></div>
                                    </div>
                                    <span class="total-time">2:30</span>
                                </div>

                                <div class="player-controls">
                                    <button class="control-btn shuffle"><i class="fas fa-random"></i></button>
                                    <button class="control-btn prev"><i class="fas fa-step-backward"></i></button>
                                    <button class="control-btn play"><i class="fas fa-play-circle"></i></button>
                                    <button class="control-btn next"><i class="fas fa-step-forward"></i></button>
                                    <button class="control-btn repeat"><i class="fas fa-redo-alt"></i></button>
                                </div>

                                <audio id="playerAudio">
                                    <source id="playerSource" src="" type="audio/mpeg">
                                </audio>

                            </div>
                            <div class="song-list">
                                <h3>Playlist</h3>
                                <ul class="songs">
                                    <?php 
        $select_songs = mysqli_query($conn, "SELECT * FROM `songs`");

        if(mysqli_num_rows($select_songs) > 0){
            while($fetch_song = mysqli_fetch_assoc($select_songs)){
                // Default album image if not provided
                $album_image = $fetch_song['album'] !== '' ? "uploaded_album/{$fetch_song['album']}" : "images/disc.png";

                // Dummy duration — replace with actual duration logic if available
                $duration = "3:30"; 
        ?>
                                    <li class="song-item" data-src="uploaded_music/<?= $fetch_song['music']; ?>">
                                        <img src="<?= $album_image; ?>"
                                            alt="<?= htmlspecialchars($fetch_song['name']); ?>" class="song-list-img">
                                        <div class="song-info">
                                            <h4>
                                                <?= htmlspecialchars($fetch_song['name']); ?>
                                            </h4>
                                            <p>
                                                <?= htmlspecialchars($fetch_song['artist']); ?>
                                            </p>
                                        </div>
                                        <span class="song-duration">
                                            <?= $duration; ?>
                                        </span>
                                    </li>
                                    <?php
            }
        } else {
            echo '<li class="song-item"><p>No songs uploaded yet.</p></li>';
        }
        ?>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
                

            <div class="section">
            <div class="section-header">
                <h2 class="section-title">Artist : Shreya ghoshal</h2>
                <a href="#" class="see-all">More</a>
            </div>
            <div class="playlists-grid">
                <section class="playlist">
<!-- GRID 6 SECTION -->
                    <div class="playlists-grid">
                       <div class="playlists-grid">
   <section class="playlist">
      <?php 
      $select_songs = mysqli_query($conn, "SELECT * FROM `songs` WHERE grid_type = 'grid6'");
      if(mysqli_num_rows($select_songs) > 0){
         while($fetch_song = mysqli_fetch_assoc($select_songs)){
      ?>
         <div class="playlist-card" data-src="uploaded_music/<?= $fetch_song['music']; ?>">
            <?php if($fetch_song['album'] != ''){ ?>
               <img src="uploaded_album/<?= $fetch_song['album']; ?>" alt="" class="playlist-img">
            <?php }else{ ?>
               <img src="images/disc.png" alt="" class="playlist-img">
            <?php } ?>
            <h3 class="playlist-name"><?= $fetch_song['name']; ?></h3>
            <p class="playlist-description"><?= $fetch_song['artist']; ?></p>
         </div>
      <?php
         }
      } else {
         echo "<p>No songs in Grid 6 yet.</p>";
      }
      ?>
</div>
            </div>


                </section>
            </div>
        </div>
        <div class="section-header">
                <h2 class="section-title">Music shorts</h2>
                <a href="#" class="see-all">More</a>
            </div>
  <div class="nav-tabsee">
    <button class="tabee activeee">All</button>
    <button class="tabee">Music</button>
    <button class="tabee">Podcasts</button>
  </div>
<div class="containeree">
  <!-- Salem Ilese Mix Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="Montero.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">MONTERO</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="Montero.mp4" type="video/mp4">
      </video>
      <div class="artistsee">Bella Poarch, Charlie Puth and Em Beihold</div>
      <div class="badgeee">LIVE</div>
    </div>
  </div>

  <!-- King Gnu Mix Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="judas  gojo edit.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">King Gnu Mix</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="judas  gojo edit.mp4" type="video/mp4">
      </video>
      <div class="artistsee">Mrs. GREEN APPLE, Hitsujiburugaku and SPITZ</div>
    </div>
  </div>

  <!-- Kaise Hua Card -->
  <div class="playlist-cardee">
    <div class="card-contentee">
      <div class="thumbnail-containeree">
        <video class="hidden-videoee" autoplay loop muted playsinline>
          <source src="EK tarfa.mp4" type="video/mp4">
        </video>
      </div>
      <h2 class="titleee">Ek Tarfa 2.0</h2>
      <p class="subtitleee">Playlist • Wavetune 🎸🎵🎸</p>
    </div>
    <div class="preview-containeree">
      <video class="preview-videoee" autoplay loop muted playsinline>
        <source src="EK tarfa.mp4" type="video/mp4">
      </video>
    </div>
  </div>
</div>
    <script src="script.js"></script>
    <script src="scriptee.js"></script>
   <script>
document.addEventListener('DOMContentLoaded', function () {
  // Hover for thumbnail video
  const thumbnailContainers = document.querySelectorAll('.thumbnail-containeree');
  thumbnailContainers.forEach(container => {
    const video = container.querySelector('.hidden-videoee');
    container.addEventListener('mouseenter', function () {
      video.play();
    });
    container.addEventListener('mouseleave', function () {
      video.pause();
      video.currentTime = 0;
    });
  });

document.addEventListener('DOMContentLoaded', function () {
  const playlistCards = document.querySelectorAll('.playlist-card');
  const containeree = document.querySelector('.containeree');
  const closeBtn = document.querySelector('.glass-container .close-btn');

  playlistCards.forEach(card => {
    card.addEventListener('click', function () {
      if (containeree) {
        containeree.style.display = 'none';
      }
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', function () {
      if (containeree) {
        containeree.style.display = 'flex';
      }
    });
  }
});
</script>
</body>

</html>