<?php

include ('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reprodutor de Música</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container-music">
    <div class="player">
        <img src="https://images.genius.com/72c13b2c63ff3425351c23ea53855c03.1000x1000x1.png" alt="Ícone de música" id="musicIcon">
        <h2>WILDFLOWER - BILLIE EILISH</h2>
        <div class="progress">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="time" id="currentTime">0:00</div>
        <button id="playButton"><i class='bx bx-play-circle'></i></button>
    </div>
    <audio id="audioPlayer" src="audio/billieeilish.mp3"></audio>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>