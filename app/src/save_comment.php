<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $joke_id = isset($_POST['joke_id']) ? intval($_POST['joke_id']) : 0;
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    if ($joke_id > 0 && $rating >= 1 && $rating <= 5 && !empty($username) && !empty($password) && !empty($comment)) {
        // Check user credentials
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $user_id = $user['id'];
                // Insert comment
                $stmt = $conn->prepare("INSERT INTO comment (joke_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiis", $joke_id, $user_id, $rating, $comment);
                if ($stmt->execute()) {
                    header("Location: get_jokes.php?joke_id=$joke_id&success=true");
                    exit;
                } else {
                    echo "<p class='error'>Error saving comment: " . htmlspecialchars($conn->error) . "</p>";
                }
            } else {
                echo "<p class='error'>Invalid password.</p>";
            }
        } else {
            echo "<p class='error'>User not found.</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>Invalid input. Please fill in all fields correctly.</p>";
    }
}

$conn->close();
?>
