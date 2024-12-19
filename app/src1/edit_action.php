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
            echo "<script>alert('Name field is empty.');</script>";
        }
        if (empty($age)) {
            echo "<script>alert('Age field is empty.');</script>";
        }
        if (empty($email)) {
            echo "<script>alert('Email field is empty.');</script>";
        }
        if (empty($username)) {
            echo "<script>alert('Username field is empty.');</script>";
        }
        echo "<script>history.back();</script>";
    } else {
        // Check if the username already exists
        $checkUsername = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' AND id != $id");
        if (mysqli_num_rows($checkUsername) > 0) {
            echo "<script>alert('Username already exists. Please choose a different one.');</script>";
            echo "<script>history.back();</script>";
        } else {
            // Update user details
            if ($password) {
                $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `id` = $id");
            } else {
                $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `username` = '$username' WHERE `id` = $id");
            }
            echo "<script>alert('Data updated successfully!');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }
}
?>
