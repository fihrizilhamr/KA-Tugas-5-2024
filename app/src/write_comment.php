<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Comment</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function goBack() {
            if (document.referrer) {
                window.history.back();
            } else {
                window.location.href = 'get_jokes.php?joke_id=<?php echo $_GET['joke_id']; ?>';
            }
        }
    </script>

</head>
<body>
    <div class="container">
        <h1>Write Comment</h1>
        <button onclick="goBack()" class="back-button">Back</button>
        <?php
            if (isset($_GET['joke_id']) && is_numeric($_GET['joke_id'])) {
                $joke_id = intval($_GET['joke_id']);
        ?>
        <form action="save_comment.php" method="POST">
            <input type="hidden" name="joke_id" value="<?php echo $joke_id; ?>">
            
            <label for="usename">Username</label>
            <input type="text" name="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required>

            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
        <?php
            } else {
                echo "<p class='no-jokes'>Invalid joke ID!</p>";
            }
        ?>
    </div>
</body>
</html>
