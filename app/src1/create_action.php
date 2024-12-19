<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
require_once("db_connect.php");

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = password_hash(mysqli_real_escape_string($mysqli, $_POST['password']), PASSWORD_DEFAULT);

    if (empty($name) || empty($age) || empty($email) || empty($username) || empty($_POST['password'])) {
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
        if (empty($_POST['password'])) {
            echo "<script>alert('Password field is empty.');</script>";
        }
        echo "<script>history.back();</script>";
    } else {
        $checkUsername = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($checkUsername) > 0) {
            echo "<script>alert('Username already exists. Please choose a different one.');</script>";
            echo "<script>history.back();</script>";
        } else {
            $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`, `username`, `password`) VALUES ('$name', '$age', '$email', '$username', '$password')");
            echo "<script>alert('Data added successfully!');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }
}
?>
</body>
</html>
