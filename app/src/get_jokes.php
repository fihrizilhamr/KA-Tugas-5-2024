<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Joke</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function updateTimestamp() {
            const timestampElement = document.getElementById("timestamp");
            const now = new Date();
            const formattedTime = now.toLocaleTimeString();
            timestampElement.innerText = formattedTime;
        }
        setInterval(updateTimestamp, 1000);
    </script>
</head>
<body>
    <div class="container">
        <h1>Selected Joke</h1>
        <div class="timestamp-container">
            <span id="timestamp"></span>
        </div><br><br>
        <?php
            $images = ["image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg"];
            $random_image = $images[array_rand($images)];
            echo "<img src='$random_image' alt='Random Image' class='random-image'/>";
            echo "<br><br>";

            if (isset($_GET['joke_id']) && is_numeric($_GET['joke_id'])) {
                $joke_id = intval($_GET['joke_id']);
                
                $stmt = $conn->prepare("SELECT joke_text, created_at FROM jokes WHERE id = ?");
                $stmt->bind_param("i", $joke_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div class='joke-item-stylized'>";
                    echo "<p class='joke-text'>" . htmlspecialchars($row['joke_text']) . "</p>";
                    echo "<p class='joke-date'>Saved on: " . htmlspecialchars($row['created_at']) . "</p>";
                    echo "</div>";
                } else {
                    echo "<p class='no-jokes'>Joke not found.</p>";
                }
                $stmt->close();

                echo "<h2>Comments</h2>";
                echo "<br>";
                echo "<a href='write_comment.php?joke_id=$joke_id' class='write-comment-link'>Write a Comment</a>";
                $stmt_comments = $conn->prepare("SELECT rating, comment, created_at FROM comment WHERE joke_id = ? ORDER BY created_at DESC");
                $stmt_comments->bind_param("i", $joke_id);
                $stmt_comments->execute();
                $result_comments = $stmt_comments->get_result();

                if ($result_comments->num_rows > 0) {
                    while ($comment_row = $result_comments->fetch_assoc()) {
                        echo "<div class='comment-item-stylized'>";
                        echo "<p class='comment-rating'>Rating: " . htmlspecialchars($comment_row['rating']) . "/5</p>";
                        echo "<p class='comment-text'>" . htmlspecialchars($comment_row['comment']) . "</p>";
                        echo "<p class='comment-date'>Posted on: " . htmlspecialchars($comment_row['created_at']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-jokes'>No comments yet. Be the first to comment!</p>";
                }
                $stmt_comments->close();
                
            } else {
                echo "<p class='no-jokes'>Invalid joke ID!</p>";
            }
        ?>
    </div>
</body>
</html>
