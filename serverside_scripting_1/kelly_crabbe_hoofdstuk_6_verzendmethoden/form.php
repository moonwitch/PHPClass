<!-- Form handling -->
<?php
    $errors = [
        "main" => "",
        "last_name" => "",
        "first_name" => "",
        "age" => ""
    ];

    if (count($_GET) > 0){ // Als er iets in de GET zit
        if (i!sset($_GET['last_name']){ // Als er geen achternaam is ingevuld
            $errors["last_name"] = "Er liep iets mis bij het versturen van je achternaam.";
        }  else if(empty(trim($_GET["last_name"]))){
            $errors["last_name"] = "Gelieve je achternaam op te geven.";
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
    <form action="form.php" method="GET"> <!-- beetje overbodig, maar voor de duidelijkheid -->
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
