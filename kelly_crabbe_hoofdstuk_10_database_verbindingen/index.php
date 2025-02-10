<?php
    require_once 'assets/db_conn.php';

    // Removal of song
    if (isset($_GET['action']) && isset ($_GET['id'])) {
        if ($_GET['action'] == 'delete') {
            $sql = "DELETE FROM `songs` WHERE `id` = :id";

            try {
                $stmt = $conn->prepare($sql); // SQL injection prevention
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                $stmt->execute();
                echo "Lied ". $_GET['id'] . "werd verwijderd!<br><br>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                echo "Lied " . $_GET['id'] . "werd niet verwijderd!<br><br>";
            }
        }
    }

    // Display all songs
    $sql = "SELECT `id`, `title` FROM `songs`";
    try {
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll() returns an array of all rows with header from sql

        if ($results) {
            foreach ($results as $row) {
                echo $row['id'] ." - ".  $row['title'] ." <a href='".basename($_SERVER['PHP_SELF'])."?action=delete&id=".$row['id']."' style='color:red;'>[X]</a> <br>";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>