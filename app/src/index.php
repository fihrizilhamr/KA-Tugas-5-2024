<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Norris Jokes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Chuck Norris Jokes</h1>
        <div class="jokes-list">
            <?php
                $sql = "SELECT id, joke_text, created_at FROM jokes ORDER BY created_at DESC"; 
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='joke-item'>";
                        echo "<a href='get_jokes.php?joke_id=" . urlencode($row["id"]) . "'>";
                        echo "<p class='joke-text'>" . htmlspecialchars($row["joke_text"]) . "</p>";
                        echo "<p class='joke-date'>Saved on: " . htmlspecialchars($row["created_at"]) . "</p>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-jokes'>No jokes found.</p>";
                }
                $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
