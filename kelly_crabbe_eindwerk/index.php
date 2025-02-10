<?php
session_start();
require "./assets/access.php";

if (!isset($_SESSION["knight_name"], $_SESSION["weapon"], $_SESSION["practiceHours"])) {
    header("Location: register.php");
    exit();
}

function calculateTournamentResults($knightData)
{
    $combatPoints = 100;
    $numberOfRounds = rand(2, 6);
    $practiceFactor = $knightData["practiceHours"] / 10;

    echo "<h2>Toernooi Resultaten voor " . $knightData["knight_name"] . "</h2>";
    echo "<p>Gekozen wapen: " . ucfirst($knightData["weapon"]) . "</p>";
    echo "<p>Aantal oefenuren: " . $knightData["practiceHours"] . "</p>";
    echo "<hr>";

    for ($round = 1; $round <= $numberOfRounds && $combatPoints > 0; $round++) {
        $damage = rand(10, 50) * (1 - $practiceFactor);
        $combatPoints -= $damage;

        $combatPoints = max(0, $combatPoints);

        echo "<div style='margin: 10px 0;'>";
        echo "<strong>Ronde " . $round . ":</strong> ";
        echo "Combat Points: " . number_format($combatPoints, 0) . "%";
        echo "</div>";
    }

    echo "<hr>";
    echo "<h3>Eindresultaat:</h3>";

    if ($combatPoints >= 50) {
        echo "<p style='color: green; font-weight: bold;'>
                    Gefeliciteerd! U heeft het toernooi gewonnen met " .
            number_format($combatPoints, 0) . "% combat points over!</p>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>
                    Helaas, u heeft het toernooi verloren met slechts " .
            number_format($combatPoints, 0) . "% combat points over.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultaat van het toernooi</title>
    <link rel="stylesheet" href="./assets/styles/style.css" type="text/css">
</head>

<body>
    <?php require "./assets/header.php"; ?>

    <h1 class="page-title">Resultaat van het toernooi</h1>

    <div class="container">
        <?php
        calculateTournamentResults([
            "knightName" => $_SESSION["knightName"],
            "weapon" => $_SESSION["weapon"],
            "practiceHours" => $_SESSION["practiceHours"]
        ]);
        ?>
    </div>

</body>

<?php 

include "./assets/footer.php";

if (isset($_SESSION)) {
    session_destroy();
}
?>

</html>