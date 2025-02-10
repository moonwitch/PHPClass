<?php
    // Database connectie
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "music_library";

    // Create connection
    try {
        $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>