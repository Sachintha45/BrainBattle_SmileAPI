<?php require_once "../Application/scoressession.php"; ?>
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
    <script>
        var timeRemaining = 30; // Set the initial time remaining
        var timerInterval; // Declare a variable to hold the timer interval ID
        function startTimer() {
            timerInterval = setInterval(function() {
                // Decrement the time remaining
                timeRemaining--;

                // Update the timer display
                var minutes = Math.floor(timeRemaining / 60);
                var seconds = timeRemaining % 60;
                var timerDisplay = document.getElementById("timer");
                timerDisplay.textContent = "Time Remaining: " + minutes.toString().padStart(2, "0") + ":" + seconds.toString().padStart(2, "0");

                // If time runs out, clear the interval and display a message
                if (timeRemaining === 0) {
                    clearInterval(timerInterval);
                    alert("Your time is up!");
                    document.getElementById("BrainForm").submit(); // Submit the form to end the game
                }
            }, 1000);
        }
        $(document).ready(function() {
            startTimer();
            loadstation();
        });

        function loadstation() {
            $("#scoretable").load("highscores.php");
            setTimeout(loadstation, 500);
        }
    </script>

</head>

<body>
    <audio id="bgmusic" autoplay loop>
        <source src="music/magic.mp3" type="audio/mpeg">
    </audio>
    <style>
        h2 {
            font-size: 3em;
        }
    </style>
    <section class="quiz-section bg-dark text-center ">
        <form action="" method="POST" id="BrainForm">

            <span id="username"><?php echo "Welcome, " . $loggedInUserName . "!"; ?></span>
            <h1>BRAIN BATTLE</h1>
            <h2>High Scores</h2>
            <div class="container-fluid mx-auto">
                <div class="row text-white board-outer">
                    <div class="col-md-3 col-lg-4 score-area mx-auto">
                        <div class="p-3 text-dark score-table ">
                            <div class=" p-2 rounded text-center" id="scoretable" class="text-center fs-3"></div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="post">
            <button type="submit" name="menu" id="menu-btn">Menu</button>
            <button type="submit" name="logout" id="exit-btn">Exit</button>
        </form>
    </section>
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
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

</html>