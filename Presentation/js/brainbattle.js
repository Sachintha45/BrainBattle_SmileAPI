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
                            alert("Congratulations, you have won the game!");
                            resetScoreAndLives();
                            window.location.href = "mainmenu.php";
                        } else if (score >= 200) {
                            level = 3;
                            updateLevel();
                            saveLevel();

                        } else if (score >= 100) {
                            level = 2;
                            updateLevel();
                            saveLevel();

                        }
                        alert("Answer is correct!");
                        window.location.href = "brainbattle.php";
                    } else {
                        lives--;
                        saveLives();
                        updateLives();
                        alert("Answer is incorrect!");
                        event.stopPropagation(); // stop API response

                        if (lives == 0) {
                            alert("Game over!");

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
