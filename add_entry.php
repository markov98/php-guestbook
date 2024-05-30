<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $new_entry = array(
        "name" => $name,
        "email" => $email,
        "message" => $message
    );
    
    $file_path = "guestbook.json";
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $entries = json_decode($json_data, true);
    } else {
        $entries = array();
    }
    
    $entries[] = $new_entry;
    
    file_put_contents($file_path, json_encode($entries, JSON_PRETTY_PRINT | LOCK_EX));
    
    header("Location: guestbook.html");
    exit();
}

