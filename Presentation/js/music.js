
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
