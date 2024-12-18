<?php
include "db_connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $joke_id = isset($_POST['joke_id']) ? intval($_POST['joke_id']) : 0;
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    if ($joke_id > 0 && $rating >= 1 && $rating <= 5 && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comment (joke_id, rating, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $joke_id, $rating, $comment);

        if ($stmt->execute()) {
            header("Location: get_jokes.php?joke_id=$joke_id");
            exit;
        } else {
            echo "<p class='error'>Error saving comment: " . htmlspecialchars($conn->error) . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>Invalid input. Please make sure all fields are filled correctly.</p>";
    }
}
$conn->close();
?>
