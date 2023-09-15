<?php require_once "../Application/howtoplaysession.php"; ?>
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
            <h1>BRAIN BATTLE</h1>
            <h2 class="howtoplayheader">Settings</h2>
            <div class="container-fluid mx-auto">
                <div class="row text-white board-outer">
                    <div class="col-md-4 col-lg-5 score-area mx-auto">
                        <div class="p-3 text-dark score-table ">
                            <div class="bg-blue rounded p-5 d-flex justify-content-center align-items-center " style="font-family: 'Agency FB'; color: yellow; font-size:25px">
                                <p font-family='Agency FB'>User must guess the correct solution for the problem. If the user guesses correctly, they will receive points, and if they guess incorrectly, they will receive zero points. After five incorrect attempts, the game will give a new image for the user to guess and lives will be reduced by one</p>
                            </div>
                        </div>
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

        <script>
            var musicOn = true;
            var bgmusic = document.getElementById("bgmusic");
            var musicSwitch = document.getElementById("music-switch");

            musicSwitch.checked = true;

            musicSwitch.addEventListener("change", function() {
                if (this.checked) {
                    bgmusic.play();
                    musicOn = true;
                } else {
                    bgmusic.pause();
                    musicOn = false;
                }
            });
        </script>
    </section>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

</html>