<?php
session_start();

if ($_SESSION['loggedin']) {
  $username = $_SESSION['username'];  
  $score = $_POST['score'];
  $conn = mysqli_connect('localhost', 'root', '', 'brainbattle');
  $query = "SELECT scores FROM score WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $scores = $row['scores'];
    if ($score > $scores) {
      $query = "UPDATE score SET scores = $score WHERE username = '$username'";
      mysqli_query($conn, $query);
    }
  } else {
    $query = "INSERT INTO score (username, scores) VALUES ('$username', $score)";
    mysqli_query($conn, $query);
  }
  mysqli_close($conn);
  if ($score > $scores) {
    echo 'update';
  } else {
    echo 'insert';
  }
}
