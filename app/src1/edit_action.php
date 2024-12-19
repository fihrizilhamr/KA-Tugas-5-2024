<?php
require_once("db_connect.php");

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = !empty($_POST['password']) ? password_hash(mysqli_real_escape_string($mysqli, $_POST['password']), PASSWORD_DEFAULT) : null;

    if (empty($name) || empty($age) || empty($email) || empty($username)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if (empty($username)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Check if the username already exists
        $checkUsername = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' AND id != $id");
        if (mysqli_num_rows($checkUsername) > 0) {
            echo "<font color='red'>Username already exists. Please choose a different one.</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // Update user details
            if ($password) {
                $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `id` = $id");
            } else {
                $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `username` = '$username' WHERE `id` = $id");
            }
            echo "<p><font color='green'>Data updated successfully!</font></p>";
            echo "<a href='index.php'>View Result</a>";
        }
    }
}

