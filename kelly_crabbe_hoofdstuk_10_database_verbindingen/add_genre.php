<?php
    require 'assets/db_conn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_POST['genre'])) {
            // select 
            $sql = "SELECT count(*) AS `num_rows` FROM `genres` where `name` = :name";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $_POST['genre'], PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $num_rows = $result['num_rows'];

                if ($num_rows > 0) {
                    echo "Genre bestaat al!";
                } else {
                    // Insert query
                    $sql = "INSERT INTO `genres` (`id`,`name`) VALUES (null, :genre)";

                    try {
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':genre', $_POST['genre'], PDO::PARAM_STR);
                        $stmt->execute();
                        echo "Genre toegevoegd!";
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg genre toe</title>
</head>
<body>
    <form method="post"> 
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre">
        <input type="submit" value="Voeg toe">
    </form>

    <?php

    $sql = "SELECT `id`, `name` FROM `genres`";

    try {
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll() returns an array of all rows with header from sql

        if ($results) {
            foreach ($results as $row) {
                echo $row['id'] . " - " .  $row['name'] . " <br>";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    ?>
</body>
</html>