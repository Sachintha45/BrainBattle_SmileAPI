<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

$loggedInUserName = $_SESSION['username'];
include '../Data/api.php';
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header("location: login.php");
    exit;
} else
if (isset($_POST['menu'])) {


    header("location: mainmenu.php");
    exit;
}

?>