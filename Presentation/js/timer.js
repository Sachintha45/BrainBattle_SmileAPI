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
