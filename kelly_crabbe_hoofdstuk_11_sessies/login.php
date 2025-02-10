<?php 
    session_start(); 

    $error = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            $error["main_error"] = "Er is iets misgelopen bij de verzending van de gegevens.";
        } else if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
            $error["main_error"] = "Gebruikersnaam en wachtwoord zijn vereist.";
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $_SESSION["username"] = $username;

            require "./assets/connection.php";

            $sql = "SELECT `email`, `password` FROM `air_travel`.`customers` WHERE `email` = :username";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!isset($user["email"])) {
                $error["main_error"] = "Gebruikersnaam bestaat.";
            } else if (!password_verify($password, $user["password"])) {
                $error["main_error"] = "Wachtwoord is incorrect.";
            } else {
                $_SESSION["access"] = true;
                header("Location: index.php"); // redirect naar index.php met sessie variabele access true
            }
        }
    }

    if (count($error) > 0) {
        echo "<pre>";
        print_r($error["main_error"]);
        echo "</pre>";
    }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Formulier</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Inloggen</button>
    </form>
</body>
</html>
