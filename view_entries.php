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

    function loadEntries($file_path)
    {
        if (!file_exists($file_path)) {
            return [];
        }
        $json_data = file_get_contents($file_path);
        return json_decode($json_data, true);
    }

    function saveEntries($file_path, $entries)
    {
        file_put_contents($file_path, json_encode(array_values($entries)));
    }

    function deleteEntry($file_path, $index)
    {
        $entries = loadEntries($file_path);
        if (isset($entries[$index])) {
            unset($entries[$index]);
            saveEntries($file_path, $entries);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        deleteEntry($file_path, $_POST['delete']);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $entries = loadEntries($file_path);
    if (empty($entries)) {
        echo '<p>No entries yet.</p>';
        return;
    }

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
    ?>
    <br>
    <a href="guestbook.html">Back to Guestbook</a>
</body>

</html>