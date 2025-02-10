<!-- Form handling -->
<?php
$errors = [
    "main" => "",
    "last_name" => "",
    "first_name" => "",
    "age" => "",
];

if (count($_POST) > 0) {
    // Naam
    if (!isset($_POST["last_name"])) {
        $errors["last_name"] =
            "Er liep iets mis met het verzenden van je achternaam.";
    } elseif (empty(trim($_POST["last_name"]))) {
        $errors["last_name"] = "Gelieve je achternaam op te geven.";
    } elseif (strlen(trim($_POST["last_name"])) < 2) {
        $errors["last_name"] =
            "Je achternaam moet uit minstens 2 tekens bestaan.";
    }

    // Voornaam
    if (!isset($_POST["first_name"])) {
        $errors["first_name"] =
            "Er liep iets mis met het verzenden van je voornaam.";
    } elseif (empty(trim($_POST["first_name"]))) {
        $errors["first_name"] = "Gelieve je voornaam op te geven.";
    } elseif (strlen(trim($_POST["first_name"])) < 2) {
        $errors["first_name"] =
            "Je voornaam moet uit minstens 2 tekens bestaan.";
    }

    // Leeftijd
    if (!isset($_POST["age"])) {
        $errors["age"] = "Er liep iets mis met het verzenden van je leeftijd.";
    } elseif (empty(trim($_POST["age"]))) {
        $errors["age"] = "Gelieve je leeftijd op te geven.";
    } elseif (!is_numeric($_POST["age"])) {
        $errors["age"] = "Je leeftijd moet een getal zijn.";
    } elseif ($_POST["age"] < 18 || $_POST["age"] > 65) {
        $errors["age"] = "Je voldoet niet aan de leeftijdseisen.";
    }

    // Als er geen errors zijn - go on
    if(empty(join("", $errors))) {
        echo "Welkom, " . $_POST["first_name"] . " " . $_POST["last_name"] . "!";
    }
}
?>

<!-- Form itself -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <style>
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="submit"] {
            margin-top: 15px;
        } 
    </style>
</head>
<body>
    <form action="form.php" method="POST">
        <label for="last_name">Naam:</label>
        <input type="text" id="last_name" name="last_name" required>
        <?php echo $errors["last_name"]; ?>
        <br>
        <label for="first_name">Voornaam:</label>
        <input type="text" id="first_name" name="first_name" required>
        <?php echo $errors["first_name"]; ?>
        <br>
        <label for="age">Leeftijd:</label>
        <input type="number" id="age" name="age" required>
        <?php echo $errors["age"]; ?>
        <br>

        <input type="submit" value="Gegevens controleren"><br>
    </form>
</body>
</html>
