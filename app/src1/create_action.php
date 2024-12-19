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

    // Check if any field is empty
    if (empty($name) || empty($age) || empty($email) || empty($username) || empty($_POST['password'])) {
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
        if (empty($_POST['password'])) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Check if the username already exists
        $checkUsername = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($checkUsername) > 0) {
            echo "<font color='red'>Username already exists. Please choose a different one.</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // Insert new user
            $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`, `username`, `password`) VALUES ('$name', '$age', '$email', '$username', '$password')");
            echo "<p><font color='green'>Data added successfully!</font></p>";
            echo "<a href='index.php'>View Result</a>";
        }
    }
}

?>
</body>
</html>
