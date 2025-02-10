<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leeftijdscontrole</title>
</head>
<body>
<form method="post">
    <label for="age">Voer je leeftijd in:</label>
    <input type="number" id="age" name="age" required>
    <button type="submit">Controleer</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["age"])) {
        $age = intval($_POST["age"]);
        if ($age >= 18) {
            echo "Je bent ouder dan 18 jaar. Welkom!";
        } else {
            echo "Sorry, je moet ouder zijn dan 18 jaar.";
        }
    }
}
?>
</body>
</html>