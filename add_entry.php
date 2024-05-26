<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $entry = "Name: " . $name . "\n" . "Email: " . $email . "\n" . "Message: " . $message . "\n---\n";
    
    file_put_contents("guestbook.txt", $entry, FILE_APPEND | LOCK_EX);
    
    header("Location: guestbook.html");
    exit();
}

