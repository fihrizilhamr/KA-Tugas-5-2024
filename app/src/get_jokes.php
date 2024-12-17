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
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const formattedTime = `${hours}:${minutes}:${seconds}`;
            timestampElement.innerText = formattedTime;
        }

        setInterval(updateTimestamp, 1000);
    </script>
</head>
<body>
    <div class="timestamp-container">
        <span id="timestamp"></span>
    </div>
    <div class="container">
        <h1>Selected Joke</h1>
        <?php
            $images = [
                "image1.jpg",
                "image2.jpg",
                "image3.jpg",
                "image4.jpg",
            ];

            $random_image = $images[array_rand($images)];

            echo "<img src='images/$random_image' alt='Random Image' class='random-image'/>";

            if (isset($_GET['joke_text']) && isset($_GET['created_at'])) {
                $joke_text = htmlspecialchars($_GET['joke_text']);
                $created_at = htmlspecialchars($_GET['created_at']);

                echo "<div class='joke-item-stylized'>";
                echo "<p class='joke-text'>$joke_text</p>";
                echo "<p class='joke-date'>Saved on: $created_at</p>";
                echo "</div>";
            } else {
                echo "<p class='no-jokes'>Invalid joke!</p>";
            }
        ?>
    </div>
</body>
</html>
