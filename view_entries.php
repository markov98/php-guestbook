<!DOCTYPE html>
<html>

<head>
    <title>Guestbook Entries</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Guestbook Entries</h2>
    <?php
    $file_path = "guestbook.json";
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $entries = json_decode($json_data, true);

        if (!empty($entries)) {
            foreach ($entries as $entry) {
                echo '<div class="entry">';
                echo '<p>Name: ' . htmlspecialchars($entry['name']) . '</p>';
                echo '<p>Email: ' . htmlspecialchars($entry['email']) . '</p>';
                echo '<p>Message: ' . htmlspecialchars($entry['message']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No entries yet.</p>';
        }
    } else {
        echo '<p>No entries yet.</p>';
    }
    ?>
    <br>
    <a href="guestbook.html">Back to Guestbook</a>
</body>

</html>
