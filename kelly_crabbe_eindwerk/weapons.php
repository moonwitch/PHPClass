<?php
session_start();

require "./assets/access.php";

if (isset($_GET["weapon"])) {
    $_SESSION["weapon"] = $_GET["weapon"];
    
    require "./assets/connection.php";
    $sql = "UPDATE `medieval_tournaments`.`highscores` 
            SET `weapon_name` = :weapon 
            WHERE `knight_name` = :knight";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":weapon", $_GET["weapon"]);
    $stmt->bindParam(":knight", $_SESSION["knight_name"]);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$adjectives = ["Dappere", "Nobele", "Machtige", "Eervolle", "Grootmoedige", "Onverschrokken", "Heldhaftige", "Wijze"];
$randomAdjective = $adjectives[array_rand($adjectives)];
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wapenselectie</title>
    <link rel="stylesheet" href="./assets/styles/style.css" type="text/css">
</head>

<body>
    <?php require "./assets/header.php"; ?>

    <h1 class="page-title">Kies uw wapen</h1>

    <div class="container">
        <p>Welkom <?php echo $randomAdjective . " " . $_SESSION["knight_name"]; ?> van de tafel van <?php echo $_SESSION["king_name"]; ?>. Gelieve een wapen te selecteren.</p>

        <div class="weapons">
            <div class="weapon">
                <a href="?weapon=sword">
                    <img src="./assets/images/sword.jpg" alt="Zwaard">
                    <span>Zwaard</span>
                </a>
            </div>

            <div class="weapon">
                <a href="?weapon=axe">
                    <img src="./assets/images/axe.jpg" alt="Bijl">
                    <span>Bijl</span>
                </a>
            </div>

            <div class="weapon">
                <a href="?weapon=mace">
                    <img src="./assets/images/mace.jpg" alt="Knots">
                    <span>Knots</span>
                </a>
            </div>

            <div class="weapon">
                <a href="?weapon=flail">
                    <img src="./assets/images/flail.jpg" alt="Morgenster">
                    <span>Morgenster</span>
                </a>
            </div>

            <div class="weapon">
                <a href="?weapon=warhammer">
                    <img src="./assets/images/war-hammer.jpg" alt="Oorlogshamer">
                    <span>Oorlogshamer</span>
                </a>
            </div>
        </div>

    </div>

    <?php include "./assets/footer.php"; ?>
</body>

</html>