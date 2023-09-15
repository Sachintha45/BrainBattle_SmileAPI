<?php require_once "../Application/gameoversession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/brainbattle1.css">
    <title>Scores</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <audio id="bgmusic" autoplay loop>
        <source src="music/magic.mp3" type="audio/mpeg">
    </audio>
    <section class="quiz-section bg-dark text-center ">
        <form action="" method="POST" id="BrainForm">
            <span id="username"><?php echo "Welcome, " . $loggedInUserName . "!"; ?></span>
            <h1 class="topic">BRAIN BATTLE</h1>
            <div class="container-fluid mx-auto">
                <div class="row text-white board-outer">
                    <div class="col-md-4 col-lg-10 score-area mx-auto">
                        <h2 class="lost">BETTER LUCK NEXT TIME !</h2>
                        <a href="brainbattle.php" class="play-btn">Play Again</a>
                    </div>
                </div>
            </div>
        </form>
        <form method="post">
            <button type="submit" name="menu" id="menu-btn">Menu</button>
            <button type="submit" name="logout" id="exit-btn">Exit</button>
        </form>

        <div id="music-switch-container">
            <label for="music-switch">Music</label>
            <input type="checkbox" id="music-switch">
        </div>

        <script src="js/music.js"></script>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

</html>