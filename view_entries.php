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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $deleteIndex = $_POST['delete'];
        if (file_exists($file_path)) {
            $json_data = file_get_contents($file_path);
            $entries = json_decode($json_data, true);

            if (isset($entries[$deleteIndex])) {
                unset($entries[$deleteIndex]);
                $entries = array_values($entries);
                file_put_contents($file_path, json_encode($entries));
            }
        }
    }

    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $entries = json_decode($json_data, true);

        if (!empty($entries)) {
            foreach ($entries as $index => $entry) {
                echo '<div class="entry">';
                echo '<p><strong>Name:</strong> ' . htmlspecialchars($entry['name']) . '</p>';
                echo '<p><strong>Email:</strong> ' . htmlspecialchars($entry['email']) . '</p>';
                echo '<p><strong>Message:</strong> ' . htmlspecialchars($entry['message']) . '</p>';
                echo '<form method="post">';
                echo '<input type="hidden" name="delete" value="' . $index . '">';
                echo '<button type="submit">Delete</button>';
                echo '</form>';
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
