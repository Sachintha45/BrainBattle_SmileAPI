<?php require_once "../Application/mainmenusession.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Main Menu</title>
	<link rel="stylesheet" type="text/css" href="css/LogReg.css">
</head>

<body>
	<audio id="bgmusic" autoplay loop>
		<source src="music/magic.mp3" type="audio/mpeg">
	</audio>

	<div id="header">
		<span id="usernamecurrent"><?php echo "Welcome, " . $loggedInUserName . "!"; ?></span>

		<form method="post">
			<button type="submit" name="logout" id="exit-btn">Exit</button>
		</form>
	</div>

	<h1 class="display-4 pt-3 text-center">BRAIN BATTLE</h1>

	<div id="menu">
		<div id="menu-buttons">
			<button id="play-btn" onclick="window.location.href='brainbattle.php'">Play</button>
			<button id="highscores-btn" onclick="window.location.href='scores.php'">Highscores</button>
			<button id="howtoplay-btn" onclick="window.location.href='howtoplay.php'">How to play</button>
			<!-- <button id="settings-btn" onclick="window.location.href='settings.php'">Settings</button> -->
		</div>
	</div>


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

</html>