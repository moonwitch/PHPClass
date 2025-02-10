<?php

function calc_shoesize($length)
{

    return "EU" . round(($length * 3) / 2);
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shoe size calulcator</title>
    </head>
    <body>
        <form action="shoe_size.php" method="post">
            <label for="length">Enter your foot length in cm:</label>
            <input type="number" name="length" id="length">
            <input type="submit" value="Calculate">
        </form>
        <p id="result">
            <?php if (isset($_POST["length"])) {
                echo "Your shoe size is " . calc_shoesize($_POST["length"]);
            } ?>
        </p>
    </body>
</html>
