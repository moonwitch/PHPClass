<?php
session_start();
$_SESSION["debug"] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    $success = "";
    
    // Controleer of alle velden zijn ingevuld
    $required_fields = ['knightName', 'kingName', 'accessCode', 'practiceHours'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $error["main_error"] = "Alle velden zijn verplicht.";
            break;
        }
    }

    if (empty($error)) {
        $knightName = trim($_POST["knightName"]);
        $kingName = trim($_POST["kingName"]);
        $accessCode = trim($_POST["accessCode"]);
        $practiceHours = (int)$_POST["practiceHours"];

        // Valideer de invoer
        if (strlen($accessCode) !== 4) {
            $error["main_error"] = "De deelnemerscode moet exact 4 karakters lang zijn.";
        } elseif ($practiceHours < 1 || $practiceHours > 10) {
            $error["main_error"] = "Het aantal oefenuren moet tussen 1 en 10 liggen.";
        } else {
            require "./assets/connection.php";

            // Controleer of de ridder al bestaat
            $sql = "SELECT `id`, `weapon_name`, `registration_datetime` FROM `medieval_tournaments`.`highscores` WHERE `knight_name` = :knightName";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":knightName", $knightName);
            $stmt->execute();
            $knight = $stmt->fetch(PDO::FETCH_ASSOC);

            // Controleer of de toegangscode overeenkomt met de hash van 'apis'
            if (!password_verify($accessCode, "\$2a\$12\$rWIFfPlXVOYW1p/unsEihuYd9.7Kd8m60XbIYhzyXKV4ZhPHw68p.")) {
                $error["main_error"] = "Ongeldige toegangscode.";
            } else if ($knight) {
                // Ridder bestaat al
                $_SESSION["knight_name"] = $knightName;
                $_SESSION["knight_id"] = $knight["id"];
                $_SESSION["registration_time"] = $knight["registration_datetime"];
                $_SESSION["access"] = true;
                $_SESSION["king_name"] = $kingName;
                
                if (empty($knight["weapon_name"])) {
                    $success = "Welkom terug! U wordt doorgestuurd naar de wapenselectie...";
                    echo "<div class='success-message'>$success</div>";
                    echo "<script>setTimeout(function() { window.location.href = 'weapons.php'; }, 2000);</script>";
                    exit();
                } else {
                    header("Location: result.php");
                    exit();
                }
            } else {
                // Nieuwe ridder - registreren
                $sql = "INSERT INTO `medieval_tournaments`.`highscores` 
                        (`registration_datetime`, `knight_name`, `king_name`, `weapon_name`, `rounds_fought`, `outcome`) 
                        VALUES (NOW(), :knightName, :kingName, '', 0, '')";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":knightName", $knightName);
                $stmt->bindParam(":kingName", $kingName);
                
                if ($stmt->execute()) {
                    $_SESSION["knight_id"] = $conn->lastInsertId();
                    $_SESSION["knight_name"] = $knightName;
                    $_SESSION["practiceHours"] = $practiceHours;
                    $_SESSION["registration_time"] = date('Y-m-d H:i:s');
                    $_SESSION["king_name"] = $kingName;
                    $_SESSION["access"] = true;
                    $success = "Registratie succesvol! U wordt doorgestuurd naar de wapenselectie...";
                    echo "<div class='success-message'>$success</div>";
                    echo "<script>setTimeout(function() { window.location.href = 'weapons.php'; }, 2000);</script>";
                    exit();
                } else {
                    $error["main_error"] = "Er is een fout opgetreden bij de registratie.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie voor het toernooi</title>
    <link rel="stylesheet" href="./assets/styles/style.css" type="text/css">
</head>

<body>
    <?php require "./assets/header.php"; ?>

    <h1 class="page-title">Welkom bij het Riddertoernooi</h1>

    <div class="container">
        <?php
        if (!empty($error)) {
            echo '<div class="error-message">';
            echo htmlspecialchars($error["main_error"]);
            echo '</div>';
        }
        ?>
        <form action="" method="post">
            <label for="knightName">Uw geridderde naam:</label>
            <input type="text" id="knightName" name="knightName" value="<?php echo isset($_POST['knightName']) ? htmlspecialchars($_POST['knightName']) : ''; ?>">
            <br>
            <label for="kingName">Uw koning:</label>
            <input type="text" id="kingName" name="kingName" value="<?php echo isset($_POST['kingName']) ? htmlspecialchars($_POST['kingName']) : ''; ?>">
            <br>
            <label for="accessCode">Deelnemerscode (4 karakters):</label>
            <input type="text" id="accessCode" name="accessCode" maxlength="4">
            <br>
            <label for="practiceHours">Uw aantal oefenuren tussen 1 en 10:</label>
            <input type="number" id="practiceHours" name="practiceHours" min="1" max="10" value="<?php echo isset($_POST['practiceHours']) ? htmlspecialchars($_POST['practiceHours']) : ''; ?>">
            <br>
            <button type="submit">Registreer</button>
        </form>
    </div>

    <?php include "./assets/footer.php"; ?>
</body>

</html>