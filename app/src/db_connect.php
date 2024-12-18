<?php
$servername = "mysql1"; 
$username = "root";
$password = "mydb6789tyui";
$dbname = "mydb_tugas5"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . htmlspecialchars($conn->connect_error) . "</p>");
}
?>
