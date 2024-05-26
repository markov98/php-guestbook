<!DOCTYPE html>
<html>

<head>
    <title>Guestbook Entries</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Guestbook Entries</h2>
    <?php
    if (file_exists("guestbook.txt")) {
        $entries = file_get_contents("guestbook.txt");
        $entriesArray = explode("---", $entries);
        
        foreach ($entriesArray as $entry) {
            echo "<div class='entry'>" . nl2br(htmlspecialchars(trim($entry))) . "</div>";
        }
    } else {
        echo "<p>No entries yet.</p>";
    }
    ?>
    <br>
    <a href="guestbook.html">Back to Guestbook</a>
</body>

</html>
