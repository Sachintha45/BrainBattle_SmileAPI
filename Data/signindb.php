<?php
require_once "Connection.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty(trim($_POST['username']))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = 'SELECT id FROM users WHERE username = ?';
        if ($stmt = $mysql_db->prepare($sql)) {
            $param_username = trim($_POST['username']);

            $stmt->bind_param('s', $param_username);

            if ($stmt->execute()) {

                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = 'Please enter another username';
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "${$username} something went wrong. Please try again later.";
            }
            $stmt->close();
        } else {
            $mysql_db->close();
        }
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Your password needs to be a minimum of 6 characters long";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Try again";
        }
    }
    if (empty($username_err) && empty($password_err) && empty($confirm_err)) {
        $sql = 'INSERT INTO users (username, password) VALUES (?,?)';
        if ($stmt = $mysql_db->prepare($sql)) {
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 

            $stmt->bind_param('ss', $param_username, $param_password);
            if ($stmt->execute()) {
                header('location: ./login.php');
            } else {
                echo "Try signing in again.";
            }
            $stmt->close();
        }
        $mysql_db->close();
    }
}
?>