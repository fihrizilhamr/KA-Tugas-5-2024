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
                $servername = "mysql1"; 
                $username = "root";
                $password = "mydb6789tyui";
                $dbname = "mydb_tugas3"; 

                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("<p class='error'>Connection failed: " . htmlspecialchars($conn->connect_error) . "</p>");
                }

                $sql = "SELECT id, joke_text, created_at FROM jokes ORDER BY created_at DESC"; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output each joke
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='joke-item'>";
                        echo "<a href='get_jokes.php?joke_text=" . urlencode($row["joke_text"]) . "&created_at=" . urlencode($row["created_at"]) . "'>";
                        echo "<p class='joke-text'>" . htmlspecialchars($row["joke_text"]) . "</p>";
                        echo "<p class='joke-date'>Saved on: " . $row["created_at"] . "</p>";
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
