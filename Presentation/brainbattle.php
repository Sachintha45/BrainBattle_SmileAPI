<?php include '../Application/brainbattlesession.php' ?>
<?php include '../Data/api.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/brainbattle1.css">


    <title>Brain Battle</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/timer.js"></script>

</head>

<body>
    <audio id="bgmusic" autoplay loop>
        <source src="music/magic.mp3" type="audio/mpeg">
    </audio>

    <section class="quiz-section bg-dark text-center">
        <h1>BRAIN BATTLE </h1>
        <span id="usernamecurrent"><?php echo "Welcome, " . $loggedInUserName . "!"; ?></span>


        <div id="game-info">
            <span id="timer">Time Remaining: 00:30</span>
            <div id="score-container">
                Score: <span id="score">0</span>
            </div>
            <div id="lives-container">
                Lives: <span id="lives">3</span>
            </div>

        </div>
        <div id="level-container">Level: <span id="level">0</span>
        </div>
        </div>
        <form action="" method="POST" id="BrainForm">
            <div class="container-fluid ">
                <div class="container ">
                    <div class="row text-white  board-outer ">
                        <div class="col-md-6 col-lg-6 flip-area mx-auto">
                            <div class="p-3 mx-auto">
                                <div class="lucky-area">
                                    <div class="quiz-image">
                                        <?php require_once "../Application/function.php"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </form>
        <div id="music-switch-container">
            <label for="music-switch">Music</label>
            <input type="checkbox" id="music-switch">
        </div>

        <script>
            var musicOn = true;
            var bgmusic = document.getElementById("bgmusic");
            var musicSwitch = document.getElementById("music-switch");

            // Set toggle switch on by default
            musicSwitch.checked = true;

            // Add change listener to music switch

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

        <div>
            <form method="post">
                <button type="submit" name="menu" id="menu-btn">Menu</button>
                <button type="submit" name="logout" id="exit-btn">Exit</button>
            </form>
        </div>
    </section>

    <script src="score.php"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var solution = '<?php echo $solution; ?>';
            var buttons = document.querySelectorAll("#BrainForm button");
            var form = document.querySelector("#BrainForm");
            var score = parseInt(localStorage.getItem("score")) || 0;
            var lives = localStorage.getItem("lives") || 3;
            var level = parseInt(localStorage.getItem("level")) || 1;

            var scoreContainer = document.querySelector("#score-container");
            var livesContainer = document.querySelector("#lives-container");
            var levelContainer = document.querySelector("#level-container");
            var menuButton = document.getElementById("menu-btn");
            var exitButton = document.getElementById("exit-btn");

            function updateScore() {
                scoreContainer.textContent = "Score: " + score;
            }

            function updateLives() {
                livesContainer.textContent = "Lives: " + lives;
            }

            function updateLevel() {
                levelContainer.textContent = "Level: " + level;
            }

            function saveScore() {
                localStorage.setItem("score", score);
            }

            function saveLives() {
                localStorage.setItem("lives", lives);
            }

            function saveLevel() {
                localStorage.setItem("level", level);
            }

            function resetScoreAndLives() {
                score = 0;
                lives = 3;
                level = 1;
                saveScore();
                saveLives();
                saveLevel();
                updateScore();
                updateLives();
                updateLevel();
                location.reload();
            }

            updateScore();
            updateLives();
            updateLevel();

            buttons.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // prevent form submission behavior
                    if (this.value === solution) {
                        score += 10;
                        saveScore();
                        updateScore();
                        if (score >= 400) {
                            alert("Congratulations mate, you have won the game!");
                            resetScoreAndLives();
                            window.location.href = "mainmenu.php";
                        } else if (score >= 200) {
                            level = 3;
                            updateLevel();
                            saveLevel();
                            

                            

                        } else if (score >= 30) {
                            level = 2;
                            updateLevel();
                            saveLevel();

                        }
                        alert("Congratulations mate your answer is correct!");
                        window.location.href = "brainbattle.php";
                    } else {
                        lives--;
                        saveLives();
                        updateLives();
                        alert("Sorry, your answer is incorrect. Please try again.");
                        event.stopPropagation(); // stop API response

                        if (lives == 0) {
                            alert("Game Over! Thanks for playing!");

                            // Send an AJAX request to the PHP file
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var response = this.responseText;
                                    if (response == "update") {
                                        window.location.href = "gameover.php";
                                    } else if (response == "insert") {
                                        window.location.href = "gameover.php";
                                    }
                                }
                            };
                            xmlhttp.open("POST", "score.php", true);
                            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xmlhttp.send("score=" + score);

                            level = 1;
                            score = 0;
                            lives = 3;
                            saveScore();
                            saveLives();
                            updateScore();
                            updateLives();
                            updateLevel();

                            window.location.href = "gameover.php";

                        }
                    }
                });
            });

            menuButton.addEventListener("click", function(event) {
                event.preventDefault();
                resetScoreAndLives();
                window.location.href = "mainmenu.php";
            });

            exitButton.addEventListener("click", function(event) {
                // event.preventDefault();
                resetScoreAndLives();
                window.location.href = "login.php";
            });

            form.addEventListener("submit", function(event) {
                event.preventDefault(); // prevent form submission behavior
            });
        });
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
</html>