<?php
    // Constante voor het wachtwoord
    define('CORRECT_PASSWORD', 'MijnWachtwoord123');

    // Variabelen voor foutmeldingen en inputwaarden
    $errors = [
        'email' => '',
        'password' => '',
    ];

    $successMessage = ''; // Initialiseer de succesmelding

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Als het GET is - reject everything :D
        // Verkregen invoer trimmen om geen spaties te hebben
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // E-mailadres valideren
        if (!isset($_POST['email'])) {
            $errors['email'] = 'Er liep iets mis met het verzenden van je e-mailadres.';
        } elseif (empty($_POST['email'])) {
            $errors['email'] = 'Gelieve je e-mailadres op te geven.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Gelieve een geldig e-mailadres op te geven.';
        }

        // Wachtwoord valideren
        if (!isset($_POST['password'])) {
            $errors['password'] = 'Er liep iets mis met het verzenden van je wachtwoord.';
        } elseif (empty($_POST['password'])) {
            $errors['password'] = 'Gelieve je wachtwoord op te geven.';
        } elseif (strlen($_POST['password']) < 6) {
            $errors['password'] = 'Je wachtwoord moet uit minstens 6 tekens bestaan.';
        } elseif ($_POST['password'] !== CORRECT_PASSWORD) {
            $errors['password'] = 'Het opgegeven wachtwoord is niet correct.';
        }

        // Als er geen errors zijn - go on
        if (empty(join('', $errors))) {
            $successMessage = 'Ingelogd!'; // Show success message
            $email = ''; // Clear the input fields
            $password = ''; // Clear the input fields
        }
    }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login Formulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-size: 1em;
        }
        div {
            margin-top: 15px;
        }

    </style>
</head>
<body>
    <!-- Puntje 2 - het formulier -->
    <h2>Login Formulier</h2>

    <?php if (!empty($successMessage)): ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <p>Vul je e-mailadres en wachtwoord in om in te loggen.</p>
    <form action="" method="POST" novalidate>
        <div>
            <label for="email">E-mailadres:</label><br>
            <input type="email" id="email" name="email" required>
            <?php if (!empty($errors['email'])): ?>
                <p class="error"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
        </div>
        <div>
            <label for="password">Wachtwoord:</label><br>
            <input type="password" id="password" name="password" required>
            <?php if (!empty($errors['password'])): ?>
                <p class="error"><?php echo $errors['password']; ?></p>
            <?php endif; ?>
        </div>
        <div>
            <button type="submit">Inloggen</button>
        </div>
    </form>
</body>
</html>