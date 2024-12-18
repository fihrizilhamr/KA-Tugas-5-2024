<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Comment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Write Comment</h1>
        <?php
            if (isset($_GET['joke_id']) && is_numeric($_GET['joke_id'])) {
                $joke_id = intval($_GET['joke_id']);
        ?>
        <form action="save_comment.php" method="POST">
            <input type="hidden" name="joke_id" value="<?php echo $joke_id; ?>">
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
