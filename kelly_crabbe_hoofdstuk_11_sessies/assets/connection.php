<?php
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "air_travel";

    $dsn = "mysql:host=$db_servername;dbname=$db_name";

    try {
        $conn = new PDO($dsn, $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
        exit(); // verkomen van verdere uitvoering omdat het een require file is
    }
?>