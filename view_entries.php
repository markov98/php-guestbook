<!DOCTYPE html>
<html>

<head>
    <title>Guestbook Entries</title>
</head>

<body>
    <h2>Guestbook Entries</h2>
    <?php
    if (file_exists("guestbook.txt")) {
        $entries = file_get_contents("guestbook.txt");
        echo nl2br(htmlspecialchars($entries));
    } else {
        echo "<p>No entries yet.</p>";
    }
    ?>
    <br>
    <a href="guestbook.html">Back to Guestbook</a>
</body>

</html>